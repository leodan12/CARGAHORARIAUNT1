@extends('layouts.plantillaDirector')

@section('contenido')

    <div class="container-fluid" >
        <div class="row"><div class="col">
            <h1 style="text-align: center">Editar Docente</h1>
        </div></div>
        
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
        <form method="POST"  action="{{route('gestionardocentes.update',$docente->id)}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @method('put')
             @csrf  
           
         <div class="form-row">
            
            <div class="form-group col-md-4">
              <label for="idEscuela">ESCUELA</label>
              <select name="idEscuela" id="idEscuela" class="form-control"   style="border-radius: 40px;" required  value="{{$docente->escuela->escuela}}">
                <option    value="{{$docente->escuela->id}}" selected> {{$docente->escuela->escuela}}</option>
              @foreach($escuela as $k)
              <option value="{{$k->id}}">{{$k->escuela}}</option>
              @endforeach
           
            
              
            </select>
           </div>
           <div class="form-group col-md-4">
            <label for="nombres">NOMBRES</label>
          <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres"  style="border-radius: 40px;" value="{{$docente->nombres}}">
            @error('nombres')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
         </div>
           <div class="form-group col-md-5">
            <label for="apellidos">APELLIDOS</label>
          <input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos"  style="border-radius: 40px;" value="{{$docente->apellidos}}">
            @error('apellidos')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
         </div>
         <div class="form-group col-md-3">
            <label for="dni">DNI</label>
          <input type="number" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"  style="border-radius: 40px;" value="{{$docente->dni}}">
            @error('dni')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
         </div>

         <div class="form-group col-md-4">
            <label for="condicion">CONDICION</label>
            <select name="condicion" id="condicion" class="form-control"   style="border-radius: 40px;" required  value="{{$docente->condicion}}">
                <option    value="{{$docente->condicion}}" selected> {{$docente->condicion}}</option>
              
            <option value="CONTRATADO">CONTRATADO</option>
            <option value="NOMBRADO">NOMBRADO</option>
              
            </select>
       </div>
       <div class="form-group col-md-4">
        <label for="categoria">CATEGORIA</label>
        <select name="categoria" id="categoria" class="form-control"   style="border-radius: 40px;" required value="{{$docente->categoria}}" >
            <option   value="{{$docente->categoria}}"   selected> {{$docente->categoria}}</option>
          
        <option value="PRINCIPAL">PRINCIPAL</option>
        <option value="ASOCIADO">ASOCIADO</option>
        <option value="AUXILIAR">AUXILIAR</option>
          
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="modalidad">MODALIDAD</label>
        <select name="modalidad" id="modalidad" class="form-control"   style="border-radius: 40px;" required  value="{{$docente->modalidad}}">
            <option  value="{{$docente->modalidad}}"    selected> {{$docente->modalidad}}</option>
          
        <option value="TIEMPO COMPLETO">TIEMPO COMPLETO</option>
        <option value="MEDIO TIEMPO">MEDIO TIEMPO</option>
          
        </select>
    </div>
     
             
         <div class="from-group col-md-2">
            <label for="">Estado</label>
            <select name="estado" id="estado" class="form-control" required  style="border-radius: 40px;">
                
              @if ($docente->estado =='1') 
              { <option value="{{$docente->estado}}" selected >  ACTIVO  </option>
              <option value="0">INACTIVO</option>
             } @else 
              { <option value="{{$docente->estado}}" selected> INACTIVO </option>
              <option value="1">ACTIVO</option>
             }
         @endif
                 
            </select>

          </div>



        </div>



        
        <div class="row">
                <div class="col-12">&nbsp;</div>
        </div>
        <div class="row"><div class="col-12">&nbsp;</div></div>   
          <div class="row"><div class="col-12">&nbsp;</div></div>
          <div class="row">
                <div class="col-md-4">&nbsp;</div> 
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary mr-4" style="border-radius: 40px;"><i class="fas fa-save"></i>Guardar</button>
                    <a href="../" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
