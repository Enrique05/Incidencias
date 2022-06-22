<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\User;
use App\Comment;
use App\Operator;
class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');//Solo level 1 o admin
        
    }

    public function index()
    {
        //
        
      //$incidents = Incident::orderBy('id','desc')->paginate(10);
        $incidents = Incident::select('incidents.user_id','incidents.id','incidents.nameIncident','incidents.body','incidents.status_id','incidents.created_at','users.name')
                   ->join('users','users.id','=','incidents.operator_id')
                   ->orderBy('id','desc')
                   ->paginate(10);
            
        return view('incidents/index',[
            'incidents' =>  $incidents,
            
        ]);
       /* return response()->json([
            'incidents' => $incidents

        ]);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('incidents.create');
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

       $incident->nameIncident  = $request->name;
       $incident->body = $request->body;
       $incident->status_id = 1;
       $incident->user_id = $request->user()->id;//usuario, lo obtengo de la session.
       $incident->operator_id = 1;
       $incident->save();
       
       return redirect()->route('incidents.index')
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
        //}
        /*$incident = Incident::find($id);//COnsulto

        $incident->status_id = 2;//Modifico el estatus de 1 a 2

        $incident->update();//Actualizo

        //Muestro el incidente individual
        return redirect()->route('incidents.index')
               ->with('info', 'Incidente fue creado');*/
    }

    public function atender(Request $request, $id){

        $incident = Incident::find($id);//Consulto

        $incident->status_id = 2;//Modifico el estatus de 1 a 2

        $incident->operator_id = $request->user()->id;

        $incident->update();

        //$operator = new Operator;

        //$operator->user_id = $request->user()->id;
        
        //$operator->save();
        //Actualizo
        //Muestro el incidente individual
        /*return response()->json([
            'message' => 'Incident en revision.'
        ]);*/
        return back()->with(['message'=>'Incidente en revision.']);

    }
    public function cerrar($id){

        $incident = Incident::find($id);//Consulto

        $incident->status_id = 3;//Modifico el estatus de 2 a 3

        $incident->update();//Actualizo
        
        return back()->with(['message'=>'Incidente ha sido cerrado.']);
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
        $incidents = Incident::select('incidents.user_id','incidents.id','incidents.nameIncident','incidents.body','incidents.status_id','incidents.created_at','users.name')
                   ->join('users','users.id','=','incidents.operator_id')
                   ->orderBy('id','desc')
                   ->paginate(10);

        $editIncident = Incident::find($id);
        
        
        return view('incidents.index',[
            'editIncident' => $editIncident,
            'incidents'    => $incidents
        ]);
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
       $incident = Incident::find($id);//Si no esta el id? 
       $incident->nameIncident = $request->name;
       $incident->body = $request->body;
       $incident->save();
       
       return redirect()->route('incidents.index')
              ->with('info', 'El incident fue actualizado');
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
        $incident = Incident::find($id);//Si no esta el id? 
        $incident->delete();
       
        return redirect()->route('incidents.index')
              ->with('info', 'El incident fue eliminado.');

    }
}
