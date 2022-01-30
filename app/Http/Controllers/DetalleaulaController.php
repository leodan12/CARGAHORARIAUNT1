<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalleaula;
use App\Models\Aula;
use App\Models\Cargahoraria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;
 
class DetalleaulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $detalleaula=Detalleaula::where('dia','like','%'.$buscarpor.'%')->get();//->paginate($this::PAGINACION);  
        $aula=Aula::where('estado','=','1')->get();
        $cargahoraria=Cargahoraria::where('estado','=','1')->get();
     //  $user=perfil::where('estado','=',TRUE)->get();
        return  view('detalleaulas.index',compact('detalleaula','buscarpor','aula','cargahoraria'));  
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

        return  view('detalleaulas.create',compact('cargahoraria','aula'));  
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
            
        ],
        [
            'aula.required'=>'Ingrese una aula ',
            'dia.required'=>'Ingrese Un día',
            'inicio.required'=>'Ingrese una hora de Inicio',
            'fin.required'=>'Ingrese una hora final',
            'cargahoraria.required'=>'Ingrese una carga horaria '
             
            ]);
  
            $detalleaula=new Detalleaula();    //instanciamos nuestro modelo perfil
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

        return  view('detalleaulas.edit',compact('cargahoraria','aula','detalleaula')); 
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
