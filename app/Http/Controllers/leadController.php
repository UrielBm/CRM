<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
/**
* @OA\Info(title="API Leads", version="1.0")
*
* @OA\Server(url="http://127.0.0.1:8000")
*/
class leadController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/Lead",
    *     summary="Mostrar leads",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los leads."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Lead::all();
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
    /**
 * @OA\Post(
 *     path="/api/Lead",
 *    tags={"Lead"},
 *     summary="Adds a new Lead",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="name",
 *                     type="string"
 *                 ),
 *                     @OA\Property(
 *                     property="phone",
 *                     type="string"
 *                 ),
 * *                     @OA\Property(
 *                     property="id step",
 *                     type="string"
 *                 ),
 *                     @OA\Property(
 *                     property="created_at",
 *                     type="string"
 *                 ),
 *                     @OA\Property(
 *                     property="updated_at",
 *                     type="string"
 *                 ),
 *  *                     @OA\Property(
 *                     property="message",
 *                     type="string"
 *                 ),
 *                 example={"name": "Ruben",
 *                          "phone": "7711111111",
 *                          "message": "Esto es una prueba",
 *                          "step_id": "1",
 *                           "email": "prueba_ruben@prueba.com",}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     )
 * )
 */
    public function store(Request $request)
    {
        
        //creación de reglas de validación.
        $rules = [
            'name' => ['required' , 'string', 'min:3', 'max:25'],
            'phone' => ['required', 'integer', 'min:10', 'max:10'],
            'message' => ['required', 'string', 'min:5', 'max:255'],
            'step_id' => ['required', 'integer','numeric', 'min:1'],
            'email' =>  ['required', 'email']
        ];
            // Ejecuación de las reglas de validación
            $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return [
                'created' => false,
                'errors'  => $validator->errors()->all()
            ];
        }
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
    /**
     * @OA\Get(
     *      path="/api/Lead/{id}",
     *      operationId="getLeadById",
     *      tags={"Lead"},
     *      summary="Get Lead information",
     *      description="Returns Lead data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Lead id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     * )
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
    /**
 * @OA\Put(
 *     path="/api/Lead/{id}",
 *    tags={"Lead"},
 *     summary="Update a  Lead",
    *      @OA\Parameter(
     *          name="id",
     *          description="Lead id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
 *     @OA\RequestBody(
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="name",
 *                     type="string"
 *                 ),
 *                     @OA\Property(
 *                     property="phone",
 *                     type="string"
 *                 ),
 * *                     @OA\Property(
 *                     property="id step",
 *                     type="integer"
 *                 ),
 *                     @OA\Property(
 *                     property="created_at",
 *                     type="date time"
 *                 ),
 *                     @OA\Property(
 *                     property="updated_at",
 *                     type="date time"
 *                 ),
 *  *                     @OA\Property(
 *                     property="message",
 *                     type="string"
 *                 ),
 *                 example={"name": "Ruben",
 *                          "phone": "7712003337",
 *                          "message": "esto es una prueba de update",
 *                          "step_id": "4",
 *                          "email": "pruebaruben@prueba.com",
 *                          "created_at": "2020-11-07 15:45:00",
 *                           "updated_at": "2020-11-07 15:45:00",}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     )
 * )
 */
    public function update(Request $request, $id)
    {
        //creación de reglas de validación.
        $rules = [
            'name' => ['required' , 'string', 'min:3', 'max:25'],
            'phone' => ['required', 'integer', 'min:10', 'max:10'],
            'message' => ['required', 'string', 'min:5', 'max:255'],
            'step_id' => ['required', 'integer', 'min:1'],
            'email' =>  ['required', 'email']
        ];
            // Ejecuación de las reglas de validación
            $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return [
                'created' => false,
                'errors'  => $validator->errors()->all()
            ];
        }

        $lead = Lead::find($id);
        
        $lead->name = $request->name;
        $lead->phone = $request->phone;
        $lead->message = $request->message;
        $lead->step_id = $request->step_id;
        $lead->email = $request->email;
        $lead->created_at = $request->created_at;
        $lead->updated_at = $request->updated_at;
        $lead->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Delete(
     *      path="/api/Lead/{id}",
     *      operationId="delete Lead",
     *      tags={"Lead"},
     *      summary="Delete existing Lead",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Lead id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     * )
     */
    public function destroy($id)
    {
            //Delete del Lead con id
            $lead = Lead::find($id);
            $lead-> delete(); 
    }
}
