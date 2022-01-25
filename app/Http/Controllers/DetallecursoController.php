<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detallecurso;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Semestre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;
 

class DetallecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $detallecurso=Detallecurso::where('año','like','%'.$buscarpor.'%')->get();//->paginate($this::PAGINACION);  
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
        $semestre=Semestre::where('semestre','like','%'.$buscarpor.'%')->get();   
        
        $docente=Docente::where('estado','=','1')->get();
        $curso=Curso::where('estado','=','1')->get();
         

        return  view('detallecursos.semestres',compact('buscarpor', 'docente','curso','semestre'));  
   
    }


    public function horariosemanal($id){
        
        $semestre= Semestre::where('id','=',$id)->first();
                        
        $detallecurso = DB::table('docentes as d','d.estado','=','1')
        ->join('detallecursos as dc','d.id','=','dc.idDocente')
        ->join('semestres as s','s.id','=','dc.idSemestre')
        ->where('s.id','=',$id)
        ->join('cursos as c','c.id','=','dc.idCurso')
        ->join('detalleaulas as da','da.idDetallecurso','=','dc.id')
        ->join('aulas as a','da.idAula','=','a.id')
        ->select('c.nombre','s.semestre')
        ->get();

        $cargahoraria = DB::table('docentes as d','d.estado','=','1')
        ->join('detallecursos as dc','d.id','=','dc.idDocente')
        ->join('semestres as s','s.id','=','dc.idSemestre')
        ->join('cargahorarias as ch','ch.idDetallecurso','=','dc.id')
        ->where('s.id','=',$id)
        ->join('cursos as c','c.id','=','dc.idCurso')
        ->join('detalleaulas as da','da.idDetallecurso','=','dc.id')
        ->join('aulas as a','da.idAula','=','a.id')
        ->select('c.nombre','s.semestre')
        ->get();

        $user=Auth::user()->id;
        $docente=Docente::where('idUsuario','=',$user)->first();
         

        
        $pdf = \PDF::loadView('detallecursos.horariosemanal', ['docente'=>$docente,'detallecurso'=>$detallecurso,'cargahoraria'=>$cargahoraria,'semestre'=>$semestre]);
        return $pdf->stream('horariosemanal.pdf');
               
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
            
        ],
        [
            'docente.required'=>'Ingrese Un docente ',
            'curso.required'=>'Ingrese Un curso ',
            'año.required'=>'Ingrese Un año ',
            'semestre.required'=>'Ingrese Un semestre '
             
            ]);
  
            $detallecurso=new Detallecurso();    //instanciamos nuestro modelo perfil
            $detallecurso->idDocente=$request->docente;  //designamos el valor de docente
            $detallecurso->idCurso=$request->curso;   //designamos el valor de curso
            $detallecurso->año=$request->año;  //designamos el valor de docente
            $detallecurso->idSemestre=$request->semestre;   //designamos el valor de curso
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
            'estado'=>'required',
            
        ],
        [
            'docente.required'=>'Ingrese Un docente ',
            'curso.required'=>'Ingrese Un curso ',
            'año.required'=>'Ingrese Un año ',
            'semestre.required'=>'Ingrese Un semestre ',
            'estado.required'=>'Ingrese Un estado '
             
            ]);
            $detallecurso=Detallecurso::findOrfail($id); //buscamos nuestro detalle que vamos a actualizar
            $detallecurso->idDocente=$request->docente;  //designamos el valor de docente
            $detallecurso->idCurso=$request->curso;   //designamos el valor de curso
            $detallecurso->año=$request->año;  //designamos el valor de docente
            $detallecurso->idSemestre=$request->semestre;   //designamos el valor de curso
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
