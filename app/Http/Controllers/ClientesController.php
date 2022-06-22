<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Incident;
use App\User;
class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');//Necesita login     
    }

    public function index(Request $request)
    {
        
        //$incidents = Incident::orderBy('id','desc')->paginate(10);
        $incidents = Incident::where('user_id', $request->user()->id)
                     ->orderBy('id', 'desc')
                     ->paginate(10); //Listar los incidents asociados al usuario
        $user      = User::find($request->user()->id);


        return view('clientes/index',[
            'incidents' =>  $incidents,
            'user'      =>  $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');//Llamar a la vista para creaar una incidencia
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $incident = new Incident;

       $incident->nameIncident = $request->name;
       $incident->body = $request->body;
       $incident->status_id = 1;//El estatus es 1 por defecto porque inicialmente esta abierto el incident.
       $incident->user_id = $request->user()->id;//usuario, lo obtengo de la session.
       $incident->operator_id = 1;//El estatus es 1 por defecto porque inicialmente esta abierto 
       $incident->save();
       
       return redirect()->route('clientes.index')
              ->with('info', 'El incidente fue creado');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $incident = Incident::find($id); //Mostrar la incidencia

        return view('clientes.show',[
            'incident' => $incident
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $incident = Incident::find($id);//Eliminar la incidencia.
    	$incident->delete();
    	return back()->with('info','El incidente fue eliminado');
    }
}
