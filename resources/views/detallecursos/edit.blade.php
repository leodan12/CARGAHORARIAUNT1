@extends('layouts.plantillaDirector')

@section('contenido')

    <div class="container-fluid" >
        <div class="row"><div class="col">
            <h1 style="text-align: center">Editar Detalle del Curso</h1>
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
        <form method="POST"  action="{{route('detallecurso.update',$detallecurso->id)}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @method('put')
             @csrf  
           
         <div class="form-row">
           
           <div class="from-group col-md-3">
            <label for="docente">DOCENTE:</label>
            <select name="docente" id="docente" class="form-control"   style="border-radius: 40px;">
                <option value="{{$detallecurso->docente->id}}"  selected> {{$detallecurso->docente->nombres}}</option>
                @foreach ( $docente as $itemp)
            <option value="{{$itemp->id}}">{{$itemp->nombres}}</option>
                @endforeach
            </select>

          </div>
          <div class="from-group col-md-3">
            <label for="curso">CURSO:</label>
            <select name="curso" id="curso" class="form-control"   style="border-radius: 40px;">
                <option value="{{$detallecurso->curso->id}}"  selected> {{$detallecurso->curso->nombre}}</option>
                @foreach ( $curso as $itemp)
            <option value="{{$itemp->id}}">{{$itemp->nombre}}</option>
                @endforeach
            </select>

          </div>
          
          <div class="from-group col-md-3">
            <label for="semestre">SEMESTRE:</label>
            <select name="semestre" id="semestre" class="form-control"   style="border-radius: 40px;">
                <option value="{{$detallecurso->semestre->id}}"  selected> {{$detallecurso->semestre->semestre}}</option>
                @foreach ( $semestre as $itemp)
            <option value="{{$itemp->id}}">{{$itemp->semestre}}</option>
                @endforeach
            </select>

          </div>
          <div class="form-group col-md-3">
            <label for="a??o">A??O:</label>
          <input type="number" class="form-control @error('a??o') is-invalid @enderror" id="a??o" name="a??o"  style="border-radius: 40px;" value="{{$detallecurso->a??o}}">
            @error('a??o')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
         </div>

         <div class="form-group col-md-3">
          <label for="seccion">SECCION:</label>
          <input type="text" class="form-control @error('seccion') is-invalid @enderror" id="seccion" name="seccion"  style="border-radius: 40px;" value="{{$detallecurso->seccion}}" required  >
          @error('seccion')
              <span class="invalid-feedback" role="alert">
                   <strong>{{$message}}</strong>
               </span>                  
          @enderror
     </div>
     <div class="form-group col-md-3">
      <label for="nroAlumnos">NUMERO DE ALUMNOS:</label>
      <input type="number" class="form-control @error('nroAlumnos') is-invalid @enderror" id="nroAlumnos" name="nroAlumnos"  style="border-radius: 40px;" value="{{$detallecurso->nroAlumnos}}" required  >
      @error('nroAlumnos')
          <span class="invalid-feedback" role="alert">
               <strong>{{$message}}</strong>
           </span>                  
      @enderror
 </div>
 <div class="form-group col-md-3">
  <label for="horas">HORAS TOTALES:</label>
  <input type="number" class="form-control @error('horas') is-invalid @enderror" id="horas" name="horas"  style="border-radius: 40px;" value="{{$detallecurso->horas}}" required  >
  @error('horas')
      <span class="invalid-feedback" role="alert">
           <strong>{{$message}}</strong>
       </span>                  
  @enderror
</div>
<div class="form-group col-md-3">
<label for="horasT">HORAS TEORIA:</label>
<input type="number" class="form-control @error('horasT') is-invalid @enderror" id="horasT" name="horasT"  style="border-radius: 40px;" value="{{$detallecurso->horasT}}" required  >
@error('horasT')
  <span class="invalid-feedback" role="alert">
       <strong>{{$message}}</strong>
   </span>                  
@enderror
</div>
<div class="form-group col-md-3">
<label for="horasP">HORAS PRACTICA:</label>
<input type="number" class="form-control @error('horasP') is-invalid @enderror" id="horasP" name="horasP"  style="border-radius: 40px;" value="{{$detallecurso->horasP}}" required  >
@error('horasP')
  <span class="invalid-feedback" role="alert">
       <strong>{{$message}}</strong>
   </span>                  
@enderror
</div>
<div class="form-group col-md-3">
<label for="horasL">HORAS LABORATORIO:</label>
<input type="number" class="form-control @error('horasL') is-invalid @enderror" id="horasL" name="horasL"  style="border-radius: 40px;" value="{{$detallecurso->horasL}}" required  >
@error('horasL')
  <span class="invalid-feedback" role="alert">
       <strong>{{$message}}</strong>
   </span>                  
@enderror
</div>

             
         <div class="from-group col-md-3">
            <label for="">Estado</label>
            <select name="estado" id="estado" class="form-control" required  style="border-radius: 40px;">
                
              @if ($detallecurso->estado =='1') 
              { <option value="{{$detallecurso->estado}}" selected >  ACTIVO  </option>
              <option value="0">INACTIVO</option>
             } @else 
              { <option value="{{$detallecurso->estado}}" selected> INACTIVO </option>
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
