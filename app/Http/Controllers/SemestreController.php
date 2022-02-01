<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semestre;
use App\Models\Escuela;
use App\Models\Facultad;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;

class SemestreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    const PAGINACION=4;
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $semestre=Semestre::where('semestre','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);//->paginate($this::PAGINACION);  
        
        return  view('semestre.index',compact('semestre','buscarpor'));  
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semestre=Semestre::where('estado','=','1')->get();

        return  view('semestre.create',compact('semestre'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'semestre'=>'required',
            'año'=>'required',
            'inicio'=>'required',
            'fin'=>'required',
            'estado'=>'required',
          
        ],
        [
            'semestre.required'=>'Ingrese un  semestre ',
            'año.required'=>'Ingrese Un año',
            'inicio.required'=>'Ingrese un inicio',
            'fin.required'=>'Ingrese una fin',
            'estado.required'=>'Ingrese una estado '
             
             
            ]);
 

            $semestre=new Semestre();    //instanciamos nuestro modelo perfil
            $semestre->semestre=$request->semestre;  //designamos el valor de docente
            $semestre->año=$request->año;   //designamos el valor de curso
            $semestre->inicio=$request->inicio;  //designamos el valor de docente
            $semestre->fin=$request->fin;  //designamos el valor de docente
            $semestre->estado=$request->estado;  //designamos el valor de docente
            
            $semestre->save();
            
            return redirect()->route('gestionarsemestres')->with('datos','Registro Nuevo Guardado...!'); 
    
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $semestre=Semestre::findOrfail($id); 
        
        
        

        return  view('semestre.edit',compact('semestre'));  
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
        $data=request()->validate([
            'semestre'=>'required',
            'año'=>'required',
            'inicio'=>'required',
            'fin'=>'required',
            'estado'=>'required',
          
        ],
        [
            'semestre.required'=>'Ingrese un  semestre ',
            'año.required'=>'Ingrese Un año',
            'inicio.required'=>'Ingrese un inicio',
            'fin.required'=>'Ingrese una fin',
            'estado.required'=>'Ingrese una estado '
             
             
            ]);
 

         
            $semestre=  semestre::findOrfail($id); 
            $semestre->semestre=$request->semestre;  //designamos el valor de docente
            $semestre->año=$request->año;   //designamos el valor de curso
            $semestre->inicio=$request->inicio;  //designamos el valor de docente
            $semestre->fin=$request->fin;  //designamos el valor de docente
            $semestre->estado=$request->estado;  //designamos el valor de docente
            
            $semestre->save();
            
            return redirect()->route('gestionarsemestres')->with('datos','Registro Actualizado...!'); 
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semestre=Semestre::findOrFail($id);
        if ( ($semestre->estado) =='1') {
         $semestre->estado='0';
         $semestre->save();
         return redirect()->route('gestionarsemestres')->with('datos','Semestre Desactivado...!');
            }
         elseif(($semestre->estado) =='0') {
         $semestre->estado='1';
         $semestre->save();
         return redirect()->route('gestionarsemestres')->with('datos','Semestre Activado...!');
         }
    }
}
