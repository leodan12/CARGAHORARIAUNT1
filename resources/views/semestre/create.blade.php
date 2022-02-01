@extends('layouts.plantillaDirector')

@section('contenido')

    <div class="container-fluid" >
        <div class="row">
            <div class="col">
                <h1 style="text-align: center">Nuevo Semestre</h1>
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
  
        <form method="POST"  action="{{route('gestionarsemestres.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @csrf   
           
         <div class="form-row">
            
            <div class="form-group col-md-4">
                <label for="semestre">SEMESTRE</label>
                <input type="text" class="form-control @error('semestre') is-invalid @enderror" id="semestre" name="semestre"  style="border-radius: 40px;" required>
                @error('semestre')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
           </div>
           <div class="form-group col-md-4">
            <label for="año">AÑO</label>
            <input type="number" class="form-control @error('año') is-invalid @enderror" id="año" name="año"  style="border-radius: 40px;" required>
            @error('año')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
       </div>
       <div class="form-group col-md-4">
        <label for="inicio">INICIO</label>
        <input type="date" class="form-control @error('inicio') is-invalid @enderror" id="inicio" name="inicio"  style="border-radius: 40px;" required>
        @error('inicio')
            <span class="invalid-feedback" role="alert">
                 <strong>{{$message}}</strong>
             </span>                  
        @enderror
   </div>
   <div class="form-group col-md-4">
    <label for="fin">FIN</label>
    <input type="date" class="form-control @error('fin') is-invalid @enderror" id="fin" name="fin"  style="border-radius: 40px;" required>
    @error('fin')
        <span class="invalid-feedback" role="alert">
             <strong>{{$message}}</strong>
         </span>                  
    @enderror
</div>
<div class="form-group col-md-4">
    <label for="estado">ESTADO</label>
    <select name="estado" id="estado" class="form-control"   style="border-radius: 40px;" required  >
        <option    disabled selected> SELECCIONE UN ESTADO:</option>
      
    <option value="1">ACTIVO</option>
    <option value="0">INACTIVO</option>
      
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
                    <a href="{{route('cancelarSemestre')}}" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
                <div class="col-md-3">&nbsp;</div> 
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 