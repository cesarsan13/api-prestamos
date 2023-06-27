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
            $customers = Customer::where('baja','')
            ->select('customers.id','customers.nombres')
            ->get();
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
            $customer = Customer::create([

                 'nombres'=>$request->nombres,
                 'ap_paterno'=>$request->ap_paterno,
                 'ap_materno'=>$request->ap_materno,
                 'fecha_nacimiento'=>$request->fecha_nacimiento,
                 'calle'=>$request->calle,
                 'colonia'=>$request->colonia,
                 'numero_exterior'=>$request->numero_exterior,
                 'cp'=>$request->cp,
                 'ciudad'=>$request->ciudad,
                 'estado'=>$request->estado,
                 'telefono'=>$request->telefono,
                 'capacidad'=>$request->capacidad

            ]);

            $response = ObjectResponse::CorrectResponse();
            data_set($response, 'message', 'peticion satisfactoria | Cliente Registrado');
            data_set($response, 'alert_text', 'Cliente Registrado');

        }catch(\Exception $ex){
            $response = ObjectResponse::CatchResponse($ex->getMessage());

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
