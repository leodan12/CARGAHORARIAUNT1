@extends('layouts.plantillaDirector')

@section('contenido')

    <div class="container-fluid" >
        <div class="row">
            <div class="col">
                <h1 style="text-align: center">NUEVO DOCENTE</h1>
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
  
        <form method="POST"  action="{{route('gestionardocentes.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @csrf   
           
         <div class="form-row">
            <div class="from-group col-md-4">
                <label for="idEscuela">Escuela</label>
                <select name="idEscuela" id="idEscuela" class="form-control"   style="border-radius: 40px;" required  >
                    <option   disabled selected> SELECCIONE UNA ESCUELA:</option>
                    @foreach ( $escuela as $itemp)
                <option value="{{$itemp->id}}">{{$itemp->escuela}}</option>
                    @endforeach
                </select>
    
              </div>
            <div class="form-group col-md-4">
                <label for="nombres">NOMBRES</label>
                <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres"  style="border-radius: 40px;">
                @error('nombres')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
           </div>
           <div class="form-group col-md-4">
            <label for="apellidos">APELLIDOS</label>
            <input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos"  style="border-radius: 40px;">
            @error('apellidos')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
       </div>
           <div class="form-group col-md-4">
            <label for="dni">DNI</label>
            <input type="number" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"  style="border-radius: 40px;">
            @error('dni')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
       </div>
         
       <div class="form-group col-md-4">
        <label for="condicion">CONDICION</label>
        <select name="condicion" id="condicion" class="form-control"   style="border-radius: 40px;" required  >
            <option    disabled selected> SELECCIONE UNA CONDICION:</option>
          
        <option value="CONTRATADO">CONTRATADO</option>
        <option value="NOMBRADO">NOMBRADO</option>
          
        </select>
   </div>
   <div class="form-group col-md-4">
    <label for="categoria">CATEGORIA</label>
    <select name="categoria" id="categoria" class="form-control"   style="border-radius: 40px;" required  >
        <option    disabled selected> SELECCIONE UNA MODALIDAD:</option>
      
    <option value="PRINCIPAL">PRINCIPAL</option>
    <option value="ASOCIADO">ASOCIADO</option>
    <option value="AUXILIAR">AUXILIAR</option>
      
    </select>
</div>
<div class="form-group col-md-4">
    <label for="modalidad">MODALIDAD</label>
    <select name="modalidad" id="modalidad" class="form-control"   style="border-radius: 40px;" required  >
        <option    disabled selected> SELECCIONE UNA MODALIDAD:</option>
      
    <option value="TIEMPO COMPLETO">TIEMPO COMPLETO</option>
    <option value="MEDIO TIEMPO">MEDIO TIEMPO</option>
      
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
                    <a href="{{route('cancelarDocente')}}" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
                <div class="col-md-3">&nbsp;</div> 
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 