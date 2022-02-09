<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detallecurso;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Semestre;
use App\Models\Escuela;
use App\Models\Facultad;
use App\Models\Aula;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;
 

class DetallecursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    const PAGINACION=4;
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $detallecurso=Detallecurso::where('año','like','%'.$buscarpor.'%')->where('idCurso','!=','1')->paginate($this::PAGINACION);//->paginate($this::PAGINACION);  
        $docente=Docente::where('estado','=','1')->get();
        $curso=Curso::where('estado','=','1')->get();
        $semestre=Semestre::where('estado','=','1')->get();
     //  $user=perfil::where('estado','=',TRUE)->get();
        return  view('detallecursos.index',compact('detallecurso','buscarpor','docente','curso','semestre'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $docente=Docente::where('estado','=','1')->get();
        $curso=Curso::where('estado','=','1')->get();
        $semestre=Semestre::where('estado','=','1')->get();

        return  view('detallecursos.create',compact('docente','curso','semestre'));  
   
    }

    public function semestres( Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $semestre=Semestre::where('semestre','like','%'.$buscarpor.'%')
        ->where('estado','=','1')->get();   
        
        $docente=Docente::where('estado','=','1')->get();
        $curso=Curso::where('estado','=','1')->get();
         

        return  view('detallecursos.semestres',compact('buscarpor', 'docente','curso','semestre'));  
   
    }

    public function cargasemanal( )
    {
        $user=Auth::user()->id;

        $semestre=Semestre::where('estado','=','1')->get();  

        $curso = DB::table('docentes as d','d.estado','=','1')
        ->where('d.idUsuario','=',$user)
        ->join('detallecursos as dc','d.id','=','dc.idDocente')
        ->join('semestres as s','s.id','=','dc.idSemestre')
        ->join('cursos as c','c.id','=','dc.idCurso')
        ->select('dc.id','dc.idCurso','c.nombre','c.codigo','dc.idSemestre')
        ->get();
        
        $carga = DB::table('cargas as c','c.estado','=','1')
        ->select('c.id','c.carga')
        ->get();

        $aula=Aula::where('estado','=','1')->get();

        return  view('detalleaulas.createf',compact('aula', 'carga','curso','semestre'));  
   
    }

    public function byHorarioSemanal($id){

         
        return DB::table('docentes as d','d.estado','=','1')
        ->where('d.idUsuario','=',Auth::user()->id)
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
    }

    public function cargadocente( )
    {
        $user=Auth::user()->id;

        $semestre=Semestre::where('estado','=','1')->get();  

        $curso = DB::table('docentes as d','d.estado','=','1')
        ->where('d.idUsuario','=',$user)
        ->join('detallecursos as dc','d.id','=','dc.idDocente')
        ->join('semestres as s','s.id','=','dc.idSemestre')
        ->join('cursos as c','c.id','=','dc.idCurso')
        ->select('dc.id','dc.idCurso','c.nombre','c.codigo','dc.idSemestre','dc.seccion')
        ->get();
        
        $carga = DB::table('cargas as c','c.estado','=','1')
        ->select('c.id','c.carga')
        ->get();

        $aula=Aula::where('estado','=','1')->get();

        return  view('detallecursos.create2',compact('aula', 'carga','curso','semestre'));  
   
    }
    public function byCargaSemanal($id){

         
        return DB::table('docentes as d','d.estado','=','1')
        ->where('d.idUsuario','=',Auth::user()->id)
        ->join('escuelas as e','e.id','=','d.idEscuela')
        ->join('detallecursos as dc','d.id','=','dc.idDocente')
        ->join('semestres as s','s.id','=','dc.idSemestre')
        ->where('s.id','=',$id)
        ->join('cursos as c','c.id','=','dc.idCurso')
        ->where('c.nombre','!=','CargaNoLectiva')
        ->select('c.nombre','c.codigo','dc.seccion','e.escuela','c.ciclo','dc.nroAlumnos','dc.horas','dc.horasT','dc.horasP','dc.horasL')
        ->get();
    }

    public function byCargaNLSemanal($id){

         
        return DB::table('docentes as d','d.estado','=','1')
        ->where('d.idUsuario','=',Auth::user()->id)
        ->join('detallecursos as dc','d.id','=','dc.idDocente')
        ->join('cargahorarias as ch','dc.id','=','ch.idDetallecurso')
        ->join('semestres as s','s.id','=','dc.idSemestre')
        ->where('s.id','=',$id)
        ->join('cursos as c','c.id','=','dc.idCurso')
        ->join('detalleaulas as da','da.idCargahoraria','=','ch.id')
        ->join('aulas as a','da.idAula','=','a.id')
        ->join('cargas as ca','ch.idCarga','=','ca.id')
        ->where('ca.carga','!=','curso')
        ->select('ca.carga','ca.descripcion','da.horas')
        ->get();
    }


    public function horariosemanal($id){
        
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
         
         
        
        $pdf = \PDF::loadView('detallecursos.horariosemanal', ['docente'=>$docente, 'cargahoraria'=>$cargahoraria,'semestre'=>$semestre]);
        return $pdf->setPaper('A4', 'landscape')->stream('horariosemanal.pdf');
            
    }

     
    
    public function cargahorariadeclaracion($id){
        
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
        ->select('c.id','c.nombre','dc.horas','dc.horasT','dc.horasL','dc.horasP','da.dia','da.inicio','da.fin')
        ->get();

        $curso = DB::table('docentes as d','d.estado','=','1')
        ->where('d.idUsuario','=',$user)
        ->join('detallecursos as dc','d.id','=','dc.idDocente')
        ->join('semestres as s','s.id','=','dc.idSemestre')
        ->where('s.id','=',$id)
        ->join('cursos as c','c.id','=','dc.idCurso')
        ->select('c.id','c.nombre','c.codigo','c.categoria','c.ciclo')
        ->get();
        $aula=Aula::where('estado','=','1')->get();

        
        $docente=Docente::where('idUsuario','=',$user)->first();
        $escuela=Escuela::where('id','=',$docente->idEscuela)->first();
         
        $pdf = \PDF::loadView('detallecursos.cargahorariadeclaracion', ['escuela'=>$escuela,'curso'=>$curso,'docente'=>$docente, 'cargahoraria'=>$cargahoraria,'semestre'=>$semestre]);
        return $pdf->setPaper('A4', 'portrait')->stream('cargahorariadeclaracion.pdf');
            
    }

    public function declaracioncargahoraria($id){
        
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
        ->select('ch.idCarga','ca.descripcion','ca.carga','c.id','c.nombre','da.horas','dc.horasT','dc.horasL','dc.horasP','da.dia','da.inicio','da.fin')
        ->get();

        $curso = DB::table('docentes as d','d.estado','=','1')
        ->where('d.idUsuario','=',$user)
        ->join('detallecursos as dc','d.id','=','dc.idDocente')
        ->join('semestres as s','s.id','=','dc.idSemestre')
        ->where('s.id','=',$id)
        ->join('cursos as c','c.id','=','dc.idCurso')
        ->select('dc.nroAlumnos','dc.seccion','dc.horas','c.id','c.nombre','c.codigo','c.categoria','c.ciclo')
        ->get();
        

        
        $docente=Docente::where('idUsuario','=',$user)->first();
        $escuela=Escuela::where('id','=',$docente->idEscuela)->first();
         
        //return $cargahoraria;
        $pdf = \PDF::loadView('detallecursos.declaracioncargahoraria', ['escuela'=>$escuela,'curso'=>$curso,'docente'=>$docente, 'cargahoraria'=>$cargahoraria,'semestre'=>$semestre]);
        return $pdf->setPaper('A4', 'portrait')->stream('declaracioncargahoraria.pdf');
            
    }

    public function declaracionjurada1($id){
        
        $semestre= Semestre::where('id','=',$id)->first();
            
        $user=Auth::user()->id;
 
        $docente=Docente::where('idUsuario','=',$user)->first();
        $escuela=Escuela::where('id','=',$docente->idEscuela)->first();
        $facultad=Facultad::where('id','=',$escuela->idFacultad)->first();

        $pdf = \PDF::loadView('detallecursos.declaracionjurada1', ['escuela'=>$escuela,'docente'=>$docente,'semestre'=>$semestre]);
        return $pdf->setPaper('A4', 'portrait')->stream('declaracionjurada1.pdf');
            
    }
    public function declaracionjurada2($id){
        
        $semestre= Semestre::where('id','=',$id)->first();
            
        $user=Auth::user()->id;
 
        $docente=Docente::where('idUsuario','=',$user)->first();
        $escuela=Escuela::where('id','=',$docente->idEscuela)->first();
        $facultad=Facultad::where('id','=',$escuela->idFacultad)->first();

        $pdf = \PDF::loadView('detallecursos.declaracionjurada2', ['escuela'=>$escuela,'docente'=>$docente,'semestre'=>$semestre]);
        return $pdf->setPaper('A4', 'portrait')->stream('declaracionjurada2.pdf');
            
    }



    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();  
        $data=request()->validate([
            'docente'=>'required',
            'curso'=>'required',
            'año'=>'required',
            'semestre'=>'required',
            'nroAlumnos'=>'required',
            'seccion'=>'required',
            'horas'=>'required',
            'horasT'=>'required',
            'horasP'=>'required',
            'horasL'=>'required',
            
        ],
        [
            'docente.required'=>'Ingrese Un docente ',
            'curso.required'=>'Ingrese Un curso ',
            'año.required'=>'Ingrese Un año ',
            'semestre.required'=>'Ingrese Un semestre ',
            'nroAlumnos.required'=>'Ingrese Un  numero Alumnos ',
            'seccion.required'=>'Ingrese Una seccion ',
            'horas.required'=>'Ingrese Una horas ',
            'horasT.required'=>'Ingrese las horasT ',
            'horasP.required'=>'Ingrese las horasP ',
            'horasL.required'=>'Ingrese las horasL ' 
             
            ]);
  
            $detallecurso=new Detallecurso();    //instanciamos nuestro modelo perfil
            $detallecurso->idDocente=$request->docente;  //designamos el valor de docente
            $detallecurso->idCurso=$request->curso;   //designamos el valor de curso
            $detallecurso->año=$request->año;  //designamos el valor de docente
            $detallecurso->idSemestre=$request->semestre;   //designamos el valor de curso
            $detallecurso->nroAlumnos=$request->nroAlumnos;  //designamos el valor de docente
            $detallecurso->seccion=$request->seccion;   //designamos el valor de curso
            $detallecurso->horas=$request->horas;   //designamos el valor de curso
            $detallecurso->horasT=$request->horasT;  //designamos el valor de docente
            $detallecurso->horasP=$request->horasP;   //designamos el valor de curso 
            $detallecurso->horasL=$request->horasL;  //designamos el valor de docente
            $detallecurso->estado='1';   //campo de descripcion
            $detallecurso->save();
            
            return redirect()->route('detallecurso.index')->with('datos','Registro Nuevo Guardado...!'); 
        
        //  $request->flash(); 
        // return  redirect()->route('usuario.create')->withInput();

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
        $detallecurso=Detallecurso::findOrfail($id); 
        $docente=Docente::where('estado','=','1')->get();
        $curso=Curso::where('estado','=','1')->get();
        $semestre=Semestre::where('estado','=','1')->get();

        return  view('detallecursos.edit',compact('detallecurso','docente','curso','semestre'));  
       

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
        $data=request()->validate([   // verificamos los requerimientos
            'docente'=>'required',
            'curso'=>'required',
            'año'=>'required',
            'semestre'=>'required',
            'nroAlumnos'=>'required',
            'seccion'=>'required',
            'horas'=>'required',
            'horasT'=>'required',
            'horasP'=>'required',
            'horasL'=>'required',
            'estado'=>'required',
            
        ],
        [
            'docente.required'=>'Ingrese Un docente ',
            'curso.required'=>'Ingrese Un curso ',
            'año.required'=>'Ingrese Un año ',
            'semestre.required'=>'Ingrese Un semestre ',
            'estado.required'=>'Ingrese Un estado ',
            'nroAlumnos.required'=>'Ingrese Un  numero Alumnos ',
            'seccion.required'=>'Ingrese Una seccion ',
            'horas.required'=>'Ingrese Una horas ',
            'horasT.required'=>'Ingrese las horasT ',
            'horasP.required'=>'Ingrese las horasP ',
            'horasL.required'=>'Ingrese las horasL ' 
             
            ]);
            $detallecurso=Detallecurso::findOrfail($id); //buscamos nuestro detalle que vamos a actualizar
            $detallecurso->idDocente=$request->docente;  //designamos el valor de docente
            $detallecurso->idCurso=$request->curso;   //designamos el valor de curso
            $detallecurso->año=$request->año;  //designamos el valor de docente
            $detallecurso->idSemestre=$request->semestre;   //designamos el valor de curso
             $detallecurso->nroAlumnos=$request->nroAlumnos;  //designamos el valor de docente
            $detallecurso->seccion=$request->seccion;   //designamos el valor de curso
            $detallecurso->horas=$request->horas;   //designamos el valor de curso
            $detallecurso->horasT=$request->horasT;  //designamos el valor de docente
            $detallecurso->horasP=$request->horasP;   //designamos el valor de curso 
            $detallecurso->horasL=$request->horasL;  //designamos el valor de docente
            $detallecurso->estado=$request->estado;   //campo de descripcion
            $detallecurso->save();
            
            return redirect()->route('detallecurso.index')->with('datos','Registro Nuevo Guardado...!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detallecurso=Detallecurso::findOrFail($id);
        if ( ($detallecurso->estado) =='1') {
         $detallecurso->estado='0';
         $detallecurso->save();
         return redirect()->route('detallecurso.index')->with('datos','Detalle Curso Desactivado...!');
            }
         elseif(($detallecurso->estado) =='0') {
         $detallecurso->estado='1';
         $detallecurso->save();
         return redirect()->route('detallecurso.index')->with('datos','Detalle Curso  Activado...!');
         } 
    }
}
