<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\ObjectResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = ObjectResponse::DefaultResponse();
        try{
            $customers = Customer::select('*')->where('baja','')
            ->get()
            ->makeHidden(['created_at', 'updated_at']);
            $response = ObjectResponse::CorrectResponse();
            data_set($response, 'message', 'Peticion satisfactoria. Lista de roles:');
            data_set($response, 'data', $customers);
        }catch(\Exception $ex){
            $response  = ObjectResponse::CatchResponse($ex->getMessage());
           

        }
        return response()->json($response,$response["status_code"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = ObjectResponse::DefaultResponse();
        try{

            $validateData = $request->validate([
                'nombres'=>'required',
                'ap_paterno'=>'required',
                'ap_materno'=>'required',
                'fecha_nacimiento'=>'required',
            ]);
           
             $customer = Customer::create($validateData);
            $response = ObjectResponse::CorrectResponse();
            data_set($response, 'message', 'peticion satisfactoria | Cliente Registrado');
            data_set($response, 'alert_text', 'Cliente Registrado');

        }catch(\Exception $ex){
            $response = ObjectResponse::CatchResponse($ex->getMessage());
            data_set($response, 'message', 'Peticion fallida | Registro de cliente');
            data_set($response, 'data', $ex);
        }
        return response()->json($response, $response["status_code"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $response = ObjectResponse::DefaultResponse();
        try {
            $validateData = $request->validate([
                'nombres'=>'required',
                'ap_paterno'=>'required',
                'ap_materno'=>'required',
                'fecha_nacimiento'=>'required',
                // 'baja'=>'required',

            ]);


            $cliente = Customer::where('id',$request->id)
            ->update($validateData);
            $response = ObjectResponse::CorrectResponse();
            data_set($response,'message','peticion satisfactoria | Cliente actualizado.');
            data_set($response,'alert_text','Cliente actualizado');

            //code...
        } catch (\Exception $ex) {
            //throw $th;
            $response = ObjectResponse::CatchResponse($ex->getMessage());
            data_set($response, 'message', 'Peticion fallida | Registro de cliente');
            data_set($response, 'data', $ex);

        }
        //
        return response()->json($response,$response["status_code"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
            public function destroy(Request $request)
    {
        $response = ObjectResponse::DefaultResponse();
        try {
            $validateData = $request->validate([
                'baja'=>'required',
            ]);
            $cliente = Customer::where('id',$request->id)
            ->update(['baja'=>'*',]);
            $response = ObjectResponse::CorrectResponse();
            data_set($response,'message','peticion satisfactoria | Cliente Eliminad.');
            data_set($response,'alert_text','Cliente Eliminado satifactoriamente.');

            //code...
        } catch (\Exception $ex) {
            //throw $th;
            $response = ObjectResponse::CatchResponse($ex->getMessage());
            data_set($response, 'message', 'Peticion fallida | ACtualizacion de cliente');
            data_set($response, 'data', $ex);

        }
        //
        return response()->json($response,$response["status_code"]);
        //
    }
}
