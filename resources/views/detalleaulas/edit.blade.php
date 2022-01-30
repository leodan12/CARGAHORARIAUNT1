@extends('layouts.plantillaDirector')

@section('contenido')

    <div class="container-fluid" >
        <div class="row"><div class="col">
            <h1 style="text-align: center">Editar Asignación de Aula</h1>
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
        <form method="POST"  action="{{route('detalleaula.update',$detalleaula->id)}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @method('put')
             @csrf  
           
             <div class="form-row">
                <div class="col col-4"></div>
                <div class="from-group col-md-4">
                    <label for="aula">AULA:</label>
                    <select name="aula" id="aula" class="form-control"   style="border-radius: 40px;" required  >
                        <option value="{{$detalleaula->aula->id}}"  selected> {{$detalleaula->aula->ubicacion}}</option>
                        @foreach ( $aula as $itemp)
                    <option value="{{$itemp->id}}">{{$itemp->ubicacion}}</option>
                        @endforeach
                    </select>
                  </div>
            </div>

            <div class="form-row">
                <div class="col col-4"></div>
                <div class="from-group col-md-4">
                    <label for="cargahoraria">CARGA HORARIA:</label>
                    <select name="cargahoraria" id="cargahoraria" class="form-control"   style="border-radius: 40px;" required  >
                        <option value="{{$detalleaula->cargahoraria->id}}"selected> {{$detalleaula->cargahoraria->horas}}</option>
                        @foreach ( $cargahoraria as $itemp)
                    <option value="{{$itemp->id}}">{{$itemp->horas}}</option>
                        @endforeach
                    </select>
        
                  </div>
            </div>
           
           

         <div class="form-row">
            <div class="col col-4"></div>
            <div class="form-group col-md-4">
                <label for="dia">DÍA:</label>
                <select name="dia" id="dia" class="form-control"   style="border-radius: 40px;">
                        <option value="{{$detalleaula->dia}}"  selected>{{$detalleaula->dia}}</option>
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miércoles">Miércoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                        <option value="Sábado">Sábado</option>
                    </select>
           </div>
         </div>

         <div class="form-row">
            <div class="col col-4"></div>
            <div class="form-group col-md-4">
                <label for="inicio">HORA DE INICIO:</label>
                <input type="time" class="form-control @error('inicio') is-invalid @enderror" id="inicio" name="inicio"  style="border-radius: 40px;" value="{{$detalleaula->inicio}}"   >
                @error('inicio')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
           </div>
         </div>

         <div class="form-row">
            <div class="col col-4"></div>
            <div class="form-group col-md-4">
                <label for="fin">HORA FINAL:</label>
                <input type="time" class="form-control @error('fin') is-invalid @enderror" id="fin" name="fin"  style="border-radius: 40px;"  value="{{$detalleaula->fin}}">
                @error('fin')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
           </div>
         </div>
        
        

         <div class="form-row">
         <div class="col col-4"></div>
         <div class="from-group col-md-4">
            <label for="">Estado</label>
            <select name="estado" id="estado" class="form-control" required  style="border-radius: 40px;">
                
              @if ($detalleaula->estado =='1') 
              { <option value="{{$detalleaula->estado}}" selected >  ACTIVO  </option>
              <option value="0">INACTIVO</option>
             } @else 
              { <option value="{{$detalleaula->estado}}" selected> INACTIVO </option>
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
