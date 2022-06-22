<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\User;
class IncidentVueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $incidents = Incident::select('incidents.user_id','incidents.id','incidents.nameIncident','incidents.body','incidents.status_id','incidents.created_at','users.name','users.name')
                    ->join('users','users.id','=','incidents.operator_id')
                    ->orderBy('incidents.id','desc')
                    ->paginate(10);
     
        $incidents->each(function($incidents){
        $incidents->user->name;
        $incidents->status;
        $incidents->comments;

        });
               
        $pagination = [
            'total'        => $incidents->total(),
            'current_page' => $incidents->currentPage(),
            'per_page'     => $incidents->perPage(),
            'last_page'    => $incidents->lastPage(),
            'from'         => $incidents->firstItem(),
            'to'           => $incidents->lastItem()
        ];
         
        return ['incidents'=>$incidents,'pagination'=>$pagination];
        //return response()->json($incidents);
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
        
        $this->validate($request, [
            'nameIncident' => 'required',
            'body' => 'required'
        ]);


        
       $incident = new Incident;

       $incident->nameIncident  = $request->nameIncident;
       $incident->body = $request->body;
       $incident->status_id = 1;
       $incident->user_id = 2;//usuario, lo obtengo de la session.
       $incident->operator_id = 1;
       //$incident->save();
       
       // return redirect()->route('incidents.index')
       //        ->with('info', 'El incidente fue creado');
        $incident->save();
        return;

        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // $incidents = Incident::select('incidents.user_id','incidents.id','incidents.nameIncident','incidents.body','incidents.status_id','incidents.created_at','users.name')
         //           ->join('users','users.id','=','incidents.operator_id')
         //           ->orderBy('id','desc')
         //           ->paginate(10);
       
        $incident = Incident::findOrFail($id);

        return $incident;
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
       $this->validate($request, [
            'nameIncident' => 'required'
        ]);

        Incident::find($id)->update($request->all());
        return;
         
       // $incident = Incident::find($id);//Si no esta el id? 
       // $incident->nameIncident = $request->name;
       // $incident->body = $request->body;
       // $incident->save();
       
       //return;
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
        $incident = Incident::findOrFAil($id);
        $incident->delete();
    }

    public function atender(Request $request, $id){
        
        $incident = Incident::find($id);//Consulto

        $incident->status_id = 2;//Modifico el estatus de 1 a 2
        //$incident->operator_id = $request->user()->id;
        $incident->operator_id = 2;

        $incident->update();

        return;
    }
    public function cerrar($id){
        
        $incident = Incident::find($id);//Consulto

        $incident->status_id = 3;//Modifico el estatus de 2 a 3

        $incident->update();//Actualizo
        
        return;
    }
}
