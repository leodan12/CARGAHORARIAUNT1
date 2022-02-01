<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detallecurso;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Semestre;
use App\Models\Escuela;
use App\Models\Facultad;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;

class DocenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    const PAGINACION=4;
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $docente=Docente::where('apellidos','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);//->paginate($this::PAGINACION);  
        $escuela=Escuela::where('estado','=','1')->get();
        $facultad=Facultad::where('estado','=','1')->get();
     //  $user=perfil::where('estado','=',TRUE)->get();
        return  view('docentes.index',compact('docente','buscarpor','docente','facultad'));  
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
        $escuela=Escuela::where('estado','=','1')->get();

        return  view('docentes.create',compact('escuela'));  

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
            'nombres'=>'required',
            'apellidos'=>'required',
            'dni'=>'required',
            'condicion'=>'required',
            'categoria'=>'required',
            'modalidad'=>'required',
            'idEscuela'=>'required',
            
        ],
        [
            'nombres.required'=>'Ingrese un  nombres ',
            'apellidos.required'=>'Ingrese Un apellidos',
            'dni.required'=>'Ingrese un dni',
            'condicion.required'=>'Ingrese una condicion',
            'categoria.required'=>'Ingrese una categoria ',
            'modalidad.required'=>'Ingrese una modalidad ',
            'idEscuela.required'=>'Ingrese una idEscuela '
             
            ]);

            $searchString=' ';
            $replaceString ='';
        $name=str_replace($searchString, $replaceString, $request->apellidos).$request->dni; 
        $email=$name."@unitru.edu.pe";
            
         

            $usuario=new User();    //instanciamos nuestro modelo
            $usuario->name=$name;  //designamos el valor de docente
            $usuario->email=$email; 
            $usuario->password=bcrypt('password');
            $usuario->perfils_id='2';   
            $usuario->estado='1';   
            $usuario->save();

            $usuario= User::where('name','=',$name)->first();

            $docente=new Docente();    //instanciamos nuestro modelo perfil
            $docente->nombres=$request->nombres;  //designamos el valor de docente
            $docente->apellidos=$request->apellidos;   //designamos el valor de curso
            $docente->dni=$request->dni;  //designamos el valor de docente
            $docente->condicion=$request->condicion;  //designamos el valor de docente
            $docente->categoria=$request->categoria;  //designamos el valor de docente
            $docente->modalidad=$request->modalidad;  //designamos el valor de docente
            $docente->idEscuela=$request->idEscuela;  //designamos el valor de docente

            $docente->idUsuario=$usuario->id;  //designamos el usuario

            $docente->estado='1';   //campo de descripcion
            $docente->save();
            
            return redirect()->route('gestionardocentes')->with('datos','Registro Nuevo Guardado...!'); 
    
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
        $docente=Docente::findOrfail($id); 
        $escuela=Escuela::where('estado','=','1')->get();
        
        

        return  view('docentes.edit',compact('escuela','docente'));  
       

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
            'nombres'=>'required',
            'apellidos'=>'required',
            'dni'=>'required',
            'condicion'=>'required',
            'categoria'=>'required',
            'modalidad'=>'required',
            'idEscuela'=>'required',
            
        ],
        [
            'nombres.required'=>'Ingrese un  nombres ',
            'apellidos.required'=>'Ingrese Un apellidos',
            'dni.required'=>'Ingrese un dni',
            'condicion.required'=>'Ingrese una condicion',
            'categoria.required'=>'Ingrese una categoria ',
            'modalidad.required'=>'Ingrese una modalidad ',
            'idEscuela.required'=>'Ingrese una idEscuela '
             
            ]);
/*
            $searchString=' ';
            $replaceString ='';
        $name=str_replace($searchString, $replaceString, $request->apellidos).$request->dni; 
        $email=$name."@unitru.edu.pe";
            
         

            $usuario=new User();    //instanciamos nuestro modelo
            $usuario->name=$name;  //designamos el valor de docente
            $usuario->email=$email; 
            $usuario->password=bcrypt('password');
            $usuario->perfils_id='2';   
            $usuario->estado='1';   
            $usuario->save();

            $usuario= User::where('name','=',$name)->first();*/

            $docente=  Docente::findOrfail($id);   //instanciamos nuestro modelo perfil
            
            $docente->nombres=$request->nombres;  //designamos el valor de docente
            $docente->apellidos=$request->apellidos;   //designamos el valor de curso
            $docente->dni=$request->dni;  //designamos el valor de docente
            $docente->condicion=$request->condicion;  //designamos el valor de docente
            $docente->categoria=$request->categoria;  //designamos el valor de docente
            $docente->modalidad=$request->modalidad;  //designamos el valor de docente
            $docente->idEscuela=$request->idEscuela;  //designamos el valor de docente

           // $docente->idUsuario=$usuario->id;  //designamos el usuario

            $docente->estado='1';   //campo de descripcion
            $docente->save();
            
            return redirect()->route('gestionardocentes')->with('datos','Registro Nuevo Guardado...!'); 
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docente=Docente::findOrFail($id);
        if ( ($docente->estado) =='1') {
         $docente->estado='0';
         $docente->save();
         return redirect()->route('gestionardocentes')->with('datos','Docente Desactivado...!');
            }
         elseif(($docente->estado) =='0') {
         $docente->estado='1';
         $docente->save();
         return redirect()->route('gestionardocentes')->with('datos','Docente Activado...!');
         }
         
        
    }
}
