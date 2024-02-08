<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ObjectResponse;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{

    /**login */
    public function login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $user = User::where('username', $request->username)->first();
        if(!$user || !Hash::check($request->password, $user->password)) {
            $response = ObjectResponse::CatchResponse("Credenciales Incorrectas.");
            return response()->json($response,401);
        }
        $token = $user->createToken($request->username, ['user'])->plainTextToken;
        $response = ObjectResponse::CorrectResponse();
        data_set($response,'message','peticion satisfactoria | usuario logeado.');
        data_set($response,'token',$token);
        data_set($response,'data',$user);
        return response()->json($response,$response["status_code"]);
    }

    public function logout(int $id)
    {
        try {
            DB::table('personal_access_tokens')->where('tokenable_id', $id)->delete();
            
            $response = ObjectResponse::CorrectResponse();
            data_set($response,'message','peticion satisfactoria | sesión cerrada.');
            data_set($response,'alert_title','Bye!');
            
        } catch (\Exception $ex) {
            $response = ObjectResponse::CatchResponse($ex->getMessage());
        }
        return response()->json($response,$response["status_code"]);
    }
    /**Lista de usuarios activos con su rol */
    public function index()
    {
        $response = ObjectResponse::DefaultResponse();
        try {
            $list = User::where('active', true)
            ->join('roles', 'users.role_id', '=', 'roles.role_id')
            ->select('users.id','users.name','users.last_name','users.email','users.username','users.phone','roles.role_id','roles.role_name')
            ->get();
            
            $response = ObjectResponse::CorrectResponse();
            data_set($response,'message','peticion satisfactoria | lista de usuarios.');
            data_set($response,'data',$list);

        } catch (\Exception $ex) {
            $response = ObjectResponse::CatchResponse($ex->getMessage());
        }
        return response()->json($response,$response["status_code"]);
        
    }
    /*Guardar usuario */

    public function store(Request $request)
    {
        $response = ObjectResponse::DefaultResponse();
        try {
            $token = $request->bearerToken();
            
            $new_user = User::create([
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
            $response = ObjectResponse::CorrectResponse();
            data_set($response,'message','peticion satisfactoria | usuario registrado.');
            data_set($response,'alert_text','Usuario registrado');

        } catch (\Exception $ex) {
            $response = ObjectResponse::CatchResponse($ex->getMessage());
        }
        return response()->json($response,$response["status_code"]);
    }
    /*Mostrar usuario especifico*/
    public function show(Request $request, int $id)
    {
        $response = ObjectResponse::DefaultResponse();
        try {
            $user = User::where('id', $id)
            ->join('roles', 'users.role_id', '=', 'roles.role_id')
            ->select('users.id','users.name','users.last_name','users.email','users.username','users.phone','roles.role_id','roles.role_name')
            ->get();

            $response = ObjectResponse::CorrectResponse();
            data_set($response,'message','peticion satisfactoria | usuario encontrado.');
            data_set($response,'data',$user);

        } catch (\Exception $ex) {
            $response = ObjectResponse::CatchResponse($ex->getMessage());
        }
        return response()->json($response,$response["status_code"]);
    }
     /**
     * Actualizar un usuario especifico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $response = ObjectResponse::DefaultResponse();
        try {
            $user = User::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'role_id' => $request->role_id,
            ]);

            $response = ObjectResponse::CorrectResponse();
            data_set($response,'message','peticion satisfactoria | usuario actualizado.');
            data_set($response,'alert_text','Usuario actualizado');

        } catch (\Exception $ex) {
            $response = ObjectResponse::CatchResponse($ex->getMessage());
        }        
        return response()->json($response,$response["status_code"]);
    }

    /**
     * "Eliminar" (cambiar estado activo=false) un usuario especidifco.
     *
     * @param  \App\Models\User  $user
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $response = ObjectResponse::DefaultResponse();
        try {
            User::where('id', $id)
            ->update([
                'active' => false,
                'deleted_at' => date('Y-m-d H:i:s'),
            ]);
            $response = ObjectResponse::CorrectResponse();
            data_set($response,'message','peticion satisfactoria | usuario eliminado.');
            data_set($response,'alert_text','Usuario eliminado');

        } catch (\Exception $ex) {
            $response = ObjectResponse::CatchResponse($ex->getMessage());
        }
        return response()->json($response,$response["status_code"]);
    }
}
