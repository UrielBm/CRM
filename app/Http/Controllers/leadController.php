<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;

class leadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
         //Instanciamos la clase Lead
         $lead = new Lead;
        //    dd($request->phone); 
         //Declaramos el nombre con el nombre enviado en el request

         $lead->name = $request->name;
         $lead->phone = $request->phone;
         $lead->message = $request->message;
         $lead->step_id = $request->step_id;
         $lead->email = $request->email;
         //Guardamos el cambio en nuestro modelo
         $lead->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Solicitamos al modelo el Lead con el id solicitado por GET.
        return Lead::where('id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lead = Lead::find($id);
        
        $lead->name = $request->name;
        $lead->phone = $request->phone;
        $lead->message = $request->message;
        $lead->step_id = $request->step_id;
        $lead->email = $request->email;
        $lead->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            //Delete del Lead con id
            $lead = Lead::find($id);
            $lead-> delete(); 
    }
}
