@extends('layouts.plantillaDocente')
@section('contenido')
<style>
  :root {
    --body-bg-color: #1a1c1d;
    --hr-color: #26292a;
    --red: #e74c3c;
  }
  
  a {
    color: inherit;
    text-decoration: none;
  }
  
  .menu {
    display: flex;
    justify-content: center;
  }
  .alinealo{
    justify-content: center;
  }
  .menu a {
    position: relative;
    display: block;
    overflow: hidden;
  }
  
  .menu a span {
    transition: transform 0.2s ease-out;
  }
  
  .menu a span:first-child {
    display: inline-block;
    padding: 10px;
  }
  
  .menu a span:last-child {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    transform: translateY(-100%);
  }
  
  .menu a:hover span:first-child {
    transform: translateY(100%);
  }
  
  .menu a:hover span:last-child,
  .menu[data-animation] a:hover span:last-child {
    transform: none;
  }
  .menu[data-animation="to-top"] a span:last-child {
    transform: translateY(100%);
  }
  
  .menu[data-animation="to-top"] a:hover span:first-child {
    transform: translateY(-100%);
  }
  
  .menu[data-animation="to-right"] a span:last-child {
    transform: translateX(-100%);
  }
  
  .menu[data-animation="to-right"] a:hover span:first-child {
    transform: translateX(100%);
  }
  
  .menu[data-animation="to-left"] a span:last-child {
    transform: translateX(100%);
  }
  
  .menu[data-animation="to-left"] a:hover span:first-child {
    transform: translateX(-100%);
  }
  table tbody {
    background-color: #8ce1fd;
  }
  table tr:hover {
    background-color: #E3E4E5;
  }

  table td {
   
  text-align: center;
  padding: 5px;
   
  max-height: 70px;
}
  
  </style>
<div class="container-fluid ">
  <div class="form-group">
    
    <div class="container">
      <h3 class="text-center">LISTADO DE CARGAS HORARIAS</h3>
      <div class="d-none d-md-block col-12" style="position: relative;right: 40%">
        <button class=" btn btn-success" style="border-radius: 40px;"   type="menu"><a class="text-white" href="../docente" ><i class="fas fa-arrow-left"> </i> Regresar</a> </button>
      </div>
      <div class="col-12 d-md-none" >
        <button class=" btn btn-success" style="border-radius: 40px;"   type="menu"><a class="text-white" href="../docente" ><i class="fas fa-arrow-left"> </i> Regresar</a> </button>
      </div>

    @if(session('datos'))
      <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        {{session('datos')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <nav class="navbar navbar-light ">
      <a href="{{route('cargahoraria.create')}}" class="btn btn-success" style="border-radius: 40px;"><i class="fas fa-plus"></i>ASIGNAR CARGAS HORARIAS A LOS CURSOS ASIGNADOS</a> 
      <a href="{{route('cargahorario',$cargahoraria[1]->idSemestre)}}" class="btn btn-success" style="border-radius: 40px;"><i class="fas fa-eye"></i> VER CARGAS-HORARIO SEMANAL</a><br>
     <form class="form-inline my-2 my-lg-0 float-right" method="GET">  <!--Para que se vaya a la derecha de la pagina float-->
          <input name="buscarpor" class="form-control col-8 mr-2" type="search"  style="border-radius: 40px;" placeholder="Buscar por dia" aria-label="Search" value="{{ $buscarpor }}">
           <button class="btn btn-success my-2 my-sm-0" style="border-radius: 40px;" type="submit">Buscar <i class="fa fa-search"></i></button>
      </form>  <!--buscador por      -->
  
  </nav> 

      <br>
      <div class="table-responsive"  style="border-radius: 12px;">
        <table class="table td" style="border-radius: 12px;">
        <thead class="thead-dark">
          <tr>
             
            <th scope="col" style="text-align: center">CURSO/CARGA HORARIA</th>
         
            <th scope="col" style="text-align: center">NRO ALUMNOS</th>
            <th scope="col" style="text-align: center">SECCION</th>
            <th scope="col" style="text-align: center">AÑO</th>
            <th scope="col" style="text-align: center">SEMESTRE</th>
            <th scope="col" style="text-align: center">ASIGNAR AULA</th>
            
            <th scope="col" style="text-align: center">ESTADO</th>
           <th scope="col" style="text-align: center">EDITAR</th>
            <th scope="col" style="text-align: center;" >ELIMINAR</th>
          </tr>
        </thead>
        <tbody>
            @foreach($cargahoraria as $k)
                <tr>
                    
                    
                    @if ($k->carga == 'curso')
                        <td style="text-align: center"> {{$k->nombre}}</td>
                      @else
                        <td style="text-align: center"> {{$k->carga}}</td>
                      @endif
                   
                    <td style="text-align: center">{{$k->nroAlumnos}}</td>
                    <td style="text-align: center">{{$k->seccion}}</td>
                    <td style="text-align: center">{{$k->año}}</td>
                    <td style="text-align: center">{{$k->semestre}}</td>
                    <td class="menu" data-animation="to-left">  
                        <a href="{{route('asignaraula',$k->id)}}"> 
                          <span><b>ASIGNAR</b></span>
                          <span>
                            <i class="fas fa-edit" aria-hidden="true"></i>
                          </span>
                        </a> 
                      </td>
                      
                    <td style="text-align: center">{{$k->estado}}</td>
                    <td class="menu" data-animation="to-left">  
                      <a href="{{route('cargahoraria.edit',$k->id)}}"> 
                        <span><b>EDITAR</b></span>
                        <span>
                          <i class="fas fa-edit" aria-hidden="true"></i>
                        </span>
                      </a> 
                    </td>
                    <td>
                        <div class="form-group" style="text-align: center">
                          <form class="submit-eliminar " action="{{action('CargahorariaController@destroy', $k->id)}}" method="post">
                             @csrf
                             <input name="_method" type="hidden" value="DELETE">
                             <button onclick="return confirm('Desea cambiar el estado de la carga horaria?')" style="border-radius: 40px;" type="submit" class="btn btn-danger btn-sm">
                              <i class="fas fa-trash" ></i>
                               
                                  @if ($k->estado == '1')
                                    Desactivar                                    
                                  @else
                                    Activar                                    
                                  @endif
                              
                               
                          </button>
                           </form>
                          </div>
                      </td>
                     
                </tr>   
            @endforeach
        </tbody>
    </table>  
     
      <div class="align-center" style="margin-left: 45%"> {{$cargahoraria->links()}} </div>
</div>
 
@endsection