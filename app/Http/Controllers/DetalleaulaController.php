<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalleaula;
use App\Models\Detallecurso;
use App\Models\Aula;
use App\Models\Curso;
use App\Models\Carga;
use App\Models\Docente;
use App\Models\Cargahoraria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;
 
class DetalleaulaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    const PAGINACION=4;
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $detalleaula=Detalleaula::where('dia','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);//->paginate($this::PAGINACION);  
        $aula=Aula::where('estado','=','1')->get();
        $cargahoraria=Cargahoraria::where('estado','=','1')->get();

        $curso=Curso::where('estado','=','1')->get();
        $carga=Carga::where('estado','=','1')->get();

        return  view('detalleaulas.index',compact('detalleaula','buscarpor','aula','cargahoraria','curso','carga'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aula=Aula::where('estado','=','1')->get();
        $cargahoraria=Cargahoraria::where('estado','=','1')->get();
        $curso=Curso::where('estado','=','1')->get();
        $carga=Carga::where('estado','=','1')->get();

        return  view('detalleaulas.create',compact('cargahoraria','aula','curso','carga'));  
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
            'aula'=>'required',
            'dia'=>'required',
            'inicio'=>'required',
            'fin'=>'required',
            'cargahoraria'=>'required',
            'horas'=>'required',
            
        ],
        [
            'aula.required'=>'Ingrese una aula ',
            'dia.required'=>'Ingrese Un día',
            'inicio.required'=>'Ingrese una hora de Inicio',
            'fin.required'=>'Ingrese una hora final',
            'cargahoraria.required'=>'Ingrese una carga horaria ',
            'horas.required'=>'Ingrese una horas '
             
            ]);
  
            $detalleaula=new Detalleaula();    //instanciamos nuestro modelo perfil
            $detalleaula->idAula=$request->aula;  //designamos el valor de docente
            $detalleaula->idCargahoraria=$request->cargahoraria;   //designamos el valor de curso
            $detalleaula->dia=$request->dia;  //designamos el valor de docente
            $detalleaula->inicio=$request->inicio;  //designamos el valor de docente
            $detalleaula->fin=$request->fin;  //designamos el valor de docente
            $detalleaula->horas=$request->horas;  //designamos el valor de docente
            $detalleaula->estado='1';   //campo de descripcion
            $detalleaula->save();
            
            return redirect()->route('detalleaula.index')->with('datos','Registro Nuevo Guardado...!'); 
    }


    public function store2(Request $request)
    {
        $input = $request->all();  
        $data=request()->validate([
            'aula'=>'required',
            'dia'=>'required',
            'inicio'=>'required',
            'fin'=>'required',
            'cargahoraria'=>'required',
            'horas'=>'required',
            
        ],
        [
            'aula.required'=>'Ingrese una aula ',
            'dia.required'=>'Ingrese Un día',
            'inicio.required'=>'Ingrese una hora de Inicio',
            'fin.required'=>'Ingrese una hora final',
            'cargahoraria.required'=>'Ingrese una carga horaria ',
            'horas.required'=>'Ingrese una horas '
             
            ]);
  
            $detalleaula=new Detalleaula();    //instanciamos nuestro modelo perfil
            $detalleaula->idAula=$request->aula;  //designamos el valor de docente
            $detalleaula->idCargahoraria=$request->cargahoraria;   //designamos el valor de curso
            $detalleaula->dia=$request->dia;  //designamos el valor de docente
            $detalleaula->inicio=$request->inicio;  //designamos el valor de docente
            $detalleaula->fin=$request->fin;  //designamos el valor de docente
            $detalleaula->horas=$request->horas;  //designamos el valor de docente
            $detalleaula->estado='1';   //campo de descripcion
            $detalleaula->save();
            
            return redirect()->route('cargahoraria.index')->with('datos','Aula Asignada...!'); 
    }

    public function store3(Request $request)
    {
        
        $data=request()->validate([
            'aula'=>'required',
            'dia'=>'required',
            'inicio'=>'required',
            'fin'=>'required',
            'horas'=>'required',
            
        ],
        [
            'aula.required'=>'Ingrese una aula ',
            'dia.required'=>'Ingrese Un día',
            'inicio.required'=>'Ingrese una hora de Inicio',
            'fin.required'=>'Ingrese una hora final',
            'horas.required'=>'Ingrese una horas '
             
            ]);

            $cargah =1;
            $detallec=1;

            $curso=Curso::where('nombre','=','CargaNoLectiva')->first(); 
            $docente=Docente::where('idUsuario','=',Auth::user()->id)->first(); 
            $cursob=Detallecurso::where('idCurso','=',$curso->id)->where('idDocente','=',$docente->id)
            ->where('idSemestre','=',$request->semestre)->first(); 
            $cargab=Carga::where('carga','=','curso')->first(); 

            if($request->curso != null){
                $cargahoraria=new Cargahoraria();
                $cargahoraria->idDetallecurso=$request->curso;
                $cargahoraria->idCarga=$cargab->id;
                $cargahoraria->save();
                //-----------
                $cargah = $cargab->id;
                $detallec =$request->curso;
                
            }
            if($request->carga != null){
                $cargahoraria=new Cargahoraria();
                $cargahoraria->idDetallecurso=$cursob->id;
                $cargahoraria->idCarga=$request->carga;
                $cargahoraria->save();
                //-----------
                $cargah = $request->carga;
                $detallec =$cursob->id;
            }

    $cargahoraI=Cargahoraria::where('idDetallecurso','=',$cursob->id)->where('idCarga','=',$cargah)->first(); 
            
  
          $detalleaula=new Detalleaula();    //instanciamos nuestro modelo perfil
            $detalleaula->idAula=$request->aula;  //designamos el valor de docente
            $detalleaula->idCargahoraria=$cargahoraI->id;   //designamos el valor de curso
            $detalleaula->dia=$request->dia;  //designamos el valor de docente
            $detalleaula->inicio=$request->inicio;  //designamos el valor de docente
            $detalleaula->fin=$request->fin;  //designamos el valor de docente
            $detalleaula->horas=$request->horas;  //designamos el valor de docente
            $detalleaula->estado='1';   //campo de descripcion
            $detalleaula->save();
            
        return redirect()->route('cargasemanal')->with('datos','Aula Asignada...!'); 
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
        $aula=Aula::where('estado','=','1')->get();
        $cargahoraria=Cargahoraria::where('estado','=','1')->get();
        $detalleaula=Detalleaula::findOrfail($id); 
        
        $curso=Curso::where('estado','=','1')->get();
        $carga=Carga::where('estado','=','1')->get();

        return  view('detalleaulas.edit',compact('cargahoraria','aula','detalleaula','curso','carga')); 
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
            'aula'=>'required',
            'dia'=>'required',
            'inicio'=>'required',
            'fin'=>'required',
            'cargahoraria'=>'required',
            
        ],
        [
            'aula.required'=>'Ingrese una aula ',
            'dia.required'=>'Ingrese Un día',
            'inicio.required'=>'Ingrese una hora de Inicio',
            'fin.required'=>'Ingrese una hora final',
            'cargahoraria.required'=>'Ingrese una carga horaria '
             
            ]);
  
            $detalleaula=Detalleaula::findOrfail($id);    //instanciamos nuestro modelo perfil
            $detalleaula->idAula=$request->aula;  //designamos el valor de docente
            $detalleaula->idCargahoraria=$request->cargahoraria;   //designamos el valor de curso
            $detalleaula->dia=$request->dia;  //designamos el valor de docente
            $detalleaula->inicio=$request->inicio;  //designamos el valor de docente
            $detalleaula->fin=$request->fin;  //designamos el valor de docente
            $detalleaula->estado='1';   //campo de descripcion
            $detalleaula->save();
            
            return redirect()->route('detalleaula.index')->with('datos','Registro Nuevo Guardado...!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalleaula=Detalleaula::findOrFail($id);
        if ( ($detalleaula->estado) =='1') {
         $detalleaula->estado='0';
         $detalleaula->save();
         return redirect()->route('detalleaula.index')->with('datos','Detalle Aula Desactivado...!');
            }
         elseif(($detalleaula->estado) =='0') {
         $detalleaula->estado='1';
         $detalleaula->save();
         return redirect()->route('detalleaula.index')->with('datos','Detalle Aula  Activado...!');
         } 
    }
}
