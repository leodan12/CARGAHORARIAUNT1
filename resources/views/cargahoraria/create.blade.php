@extends('layouts.plantillaDocente')

@section('contenido')

    <div class="container-fluid" >
        <div class="row">
            <div class="col">
                <h1 style="text-align: center">Nueva asignacion de una carga para un curso</h1>
            </div>
        </div>
       
        <div class="row">
            <div class="col-12">&nbsp;</div>
    </div>

    @if(session('datos'))  <!--Buscar una alerta en el caso q nuestro registro ha sido guardado o hemos cancelado-->
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
      {{ session('datos')   }}
        <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
  </div>
  @endif
  
        <form method="POST"  action="{{route('cargahoraria.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @csrf   
           
            <div class="form-row">
                <div class="from-group col-md-2">
                    
        
                  </div>
                <div class="from-group col-md-4">
                    <label for="idDetallecurso">DETALLE CURSO:</label>
                    <select name="idDetallecurso" id="idDetallecurso" class="form-control"   style="border-radius: 40px;" required  >
                        <option value="{{ old('idDetallecurso') }}" disabled selected> SELECCIONE UN CURSO:</option>
                        @foreach ( $detallecurso as $itemp)
                    <option value="{{$itemp->id}}"> {{$itemp->curso->nombre}}</option>
                        @endforeach
                    </select>
        
                  </div>
             
                
                <div class="from-group col-md-4">
                    <label for="idCarga">CARGA:</label>
                    <select name="idCarga" id="idCarga" class="form-control"   style="border-radius: 40px;" required  >
                        <option value="{{ old('idCarga') }}" disabled selected> SELECCIONE UNA CARGA:</option>
                        @foreach ( $carga as $itemp)
                    <option value="{{$itemp->id}}">{{$itemp->carga}}</option>
                        @endforeach
                    </select>
        
                  </div>
                  
             
            
            
        </div>
        
        
        
        <div class="row">
                <div class="col-12">&nbsp;</div>
        </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>
          <div class="row">
                <div class="col-md-4">&nbsp;</div> 
                <div class="col-md-4">
                    <button type="submit" style="border-radius: 40px;" class="btn btn-primary mr-4" ><i class="fas fa-save"></i>Guardar</button>
                    <a href="{{route('cancelarcarga')}}" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
                <div class="col-md-3">&nbsp;</div> 
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 <script>
    
 </script>

