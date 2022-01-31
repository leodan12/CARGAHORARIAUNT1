<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detallecurso;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Semestre;
use App\Models\Escuela;
use App\Models\Facultad;
use App\Models\Cargahoraria;
use App\Models\Carga;
use App\Models\Aula;
use App\Models\Detalleaula;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;

class CargahorariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PAGINACION=4;
    public function index(Request $request)
    {
        $user=Auth::user()->id;
        $docente=Docente::where('idUsuario','=',$user)->first();

        $buscarpor=$request->get('buscarpor');
        $carga =Cargahoraria::where('idDetallecurso','like','%'.$buscarpor.'%')->get();
        //->paginate($this::PAGINACION);
        
        $detallecurso=Detallecurso::where('estado','=','1')
        ->where('idDocente','=',$docente->id)->get();//->paginate($this::PAGINACION);  
        
        
        $curso=Curso::where('estado','=','1')->where('id','!=','1')->get();
        $semestre=Semestre::where('estado','=','1')->get();
      
        $cargahoraria = DB::table('docentes as d','d.estado','=','1')
        ->where('d.idUsuario','=',$user)
        ->join('detallecursos as dc','d.id','=','dc.idDocente')
        ->join('cargahorarias as ch','dc.id','=','ch.idDetallecurso')
        ->join('semestres as s','s.id','=','dc.idSemestre')
        ->where('s.estado','=','1')
        ->join('cursos as c','c.id','=','dc.idCurso')
         
        ->join('cargas as ca','ch.idCarga','=','ca.id')
        ->select('ch.id','c.nombre','s.semestre','ca.carga','dc.idSemestre','dc.horas','dc.nroAlumnos','dc.seccion','dc.año','ch.estado')
        ->paginate($this::PAGINACION);

        
        return  view('cargahoraria.index',compact('detallecurso','cargahoraria','buscarpor' ,'curso','semestre'));  
   
    }

    public function cargahorario($id){
        
        $semestre= Semestre::where('id','=',$id)->first();
           

        $user=Auth::user()->id;

        $cargahoraria = DB::table('docentes as d','d.estado','=','1')
        ->where('d.idUsuario','=',$user)
        ->join('detallecursos as dc','d.id','=','dc.idDocente')
        ->join('cargahorarias as ch','dc.id','=','ch.idDetallecurso')
        ->join('semestres as s','s.id','=','dc.idSemestre')
        ->where('s.id','=',$id)
        ->join('cursos as c','c.id','=','dc.idCurso')
        ->join('detalleaulas as da','da.idCargahoraria','=','ch.id')
        ->join('aulas as a','da.idAula','=','a.id')
        ->join('cargas as ca','ch.idCarga','=','ca.id')
        ->select('c.nombre','s.semestre','da.horas','ca.carga','da.dia','da.inicio','da.fin','a.local','a.numero','ch.id')
        ->get();

        
        $docente=Docente::where('idUsuario','=',$user)->first();
         
         
        
         return  view('cargahoraria.cargahorario',compact('docente','cargahoraria','semestre'));  
       
            
    }

    public function create()
    {
        $user=Auth::user()->id;
        $docente=Docente::where('idUsuario','=',$user)->first();

        $docentes=Docente::where('estado','=','1')->get();
        $curso=Curso::where('estado','=','1')->get();
        $semestre=Semestre::where('estado','=','1')->get();
        $detallecurso=Detallecurso::where('estado','=','1')
        ->where('idDocente','=',$docente->id)->get();//->paginate($this::PAGINACION);  
        $carga=Carga::where('estado','=','1')->get();

        return  view('cargahoraria.create',compact('detallecurso','carga','docente','curso','semestre'));  
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
            'idDetallecurso'=>'required',
            'idCarga'=>'required',
             
            
        ],
        [
            'idDetallecurso.required'=>'Ingrese   idDetallecurso ',
            'idCarga.required'=>'Ingrese  idCarga '
            
             
            ]);
  
            $cargahoraria=new Cargahoraria();    //instanciamos nuestro modelo perfil
            $cargahoraria->idDetallecurso=$request->idDetallecurso;  //designamos el valor de docente
            $cargahoraria->idCarga=$request->idCarga;   //designamos el valor de curso
           
            $cargahoraria->estado='1';   //campo de descripcion
            $cargahoraria->save();
            
            return redirect()->route('cargahoraria.index')->with('datos','Registro Nuevo Guardado...!'); 
        
    
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
    public function asignaraula($id)
    {
        $user=Auth::user()->id;
        $docente=Docente::where('idUsuario','=',$user)->first();

        $aula=Aula::where('estado','=','1')->get();
        $cargahoraria=Cargahoraria::where('estado','=','1')->get();
        $curso=Curso::where('estado','=','1')->get();
        $carga=Carga::where('estado','=','1')->get();
        $cargahoraria2 = DB::table('docentes as d','d.estado','=','1')
        ->where('d.idUsuario','=',$user)
        ->join('detallecursos as dc','d.id','=','dc.idDocente')
        ->join('cargahorarias as ch','dc.id','=','ch.idDetallecurso')
        ->join('semestres as s','s.id','=','dc.idSemestre')
        ->where('s.estado','=','1')
        ->join('cursos as c','c.id','=','dc.idCurso')
         
        ->join('cargas as ca','ch.idCarga','=','ca.id')
        ->select('ch.idCarga','ch.id','c.nombre','s.semestre','ca.carga','dc.horas','dc.nroAlumnos','dc.seccion','dc.año','ch.estado')->get();
        

        return  view('detalleaulas.created',compact('cargahoraria2','cargahoraria','aula','curso','carga'));    }

    
    public function edit($id)
    {
        $user=Auth::user()->id;
        $docente=Docente::where('idUsuario','=',$user)->first();

        $cargahoraria=Cargahoraria::where('id','=', $id)->first();
        $docentes=Docente::where('estado','=','1')->get();
        $curso=Curso::where('estado','=','1')->get();
        $detallecurso=Detallecurso::where('estado','=','1')
        ->where('idDocente','=',$docente->id)->get();
        $carga=Carga::where('estado','=','1')->get();

        return  view('cargahoraria.edit',compact('cargahoraria','detallecurso','docente','curso','carga'));  
       
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
            'idDetallecurso'=>'required',
            'idCarga'=>'required',
            'estado'=>'required',
             
            
        ],
        [
            'idDetallecurso.required'=>'Ingrese   idDetallecurso ',
            'idCarga.required'=>'Ingrese  idCarga ',
            'estado.required'=>'Ingrese  estado '
            
             
            ]);
  
            $cargahoraria=Cargahoraria::findOrfail($id);
            
            $cargahoraria->idDetallecurso=$request->idDetallecurso;  //designamos el valor de docente
            $cargahoraria->idCarga=$request->idCarga;   //designamos el valor de curso
           
            $cargahoraria->estado=$request->estado;   //campo de descripcion
            $cargahoraria->save();
            
            return redirect()->route('cargahoraria.index')->with('datos','Registro Nuevo Guardado...!'); 
        
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cargahoraria=Cargahoraria::findOrFail($id);
        if ( ($cargahoraria->estado) =='1') {
         $cargahoraria->estado='0';
         $cargahoraria->save();
         return redirect()->route('cargahoraria.index')->with('datos','Carga horaria Desactivado...!');
            }
         elseif(($cargahoraria->estado) =='0') {
         $cargahoraria->estado='1';
         $cargahoraria->save();
         return redirect()->route('cargahoraria.index')->with('datos','Carga horaria  Activado...!');
         } 
    }
}
