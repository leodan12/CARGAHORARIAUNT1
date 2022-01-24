@extends('layouts.plantillaDirector')

@section('contenido')

    <div class="container-fluid" >
        <div class="row">
            <div class="col">
                <h1 style="text-align: center">Nueva asignacion de un curso</h1>
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
  
        <form method="POST"  action="{{route('detallecurso.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @csrf   
           
            <div class="form-row">
                <div class="col col-4"></div>
                <div class="from-group col-md-4">
                    <label for="docente">DOCENTE:</label>
                    <select name="docente" id="docente" class="form-control"   style="border-radius: 40px;" required  >
                        <option value="{{ old('docente') }}" disabled selected> SELECCIONE UN DOCENTE:</option>
                        @foreach ( $docente as $itemp)
                    <option value="{{$itemp->id}}">{{$itemp->nombres}}</option>
                        @endforeach
                    </select>
        
                  </div>
            </div>

            <div class="form-row">
                <div class="col col-4"></div>
                <div class="from-group col-md-4">
                    <label for="curso">CURSO:</label>
                    <select name="curso" id="curso" class="form-control"   style="border-radius: 40px;" required  >
                        <option value="{{ old('curso') }}" disabled selected> SELECCIONE UN CURSO:</option>
                        @foreach ( $curso as $itemp)
                    <option value="{{$itemp->id}}">{{$itemp->nombre}}</option>
                        @endforeach
                    </select>
        
                  </div>
            </div>
           
           

         <div class="form-row">
            <div class="col col-4"></div>
            <div class="form-group col-md-4">
                <label for="año">AÑO:</label>
                <input type="number" class="form-control @error('año') is-invalid @enderror" id="año" name="año"  style="border-radius: 40px;" value="{{ old('curso') }}" required  >
                @error('año')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
           </div>
         </div>
         <div class="form-row">
            <div class="col col-4"></div>
            <div class="from-group col-md-4">
                <label for="semestre">SEMESTRE:</label>
                <select name="semestre" id="semestre" class="form-control"   style="border-radius: 40px;" required  >
                    <option value="{{ old('semestre') }}" disabled selected> SELECCIONE UN SEMESTRE:</option>
                    @foreach ( $semestre as $itemp)
                <option value="{{$itemp->id}}">{{$itemp->semestre}}</option>
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
                    <a href="{{route('cancelarDetalleCursos')}}" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
                <div class="col-md-3">&nbsp;</div> 
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 <script>
     /*
     $(document).ready(function(){

        //funcion para verificar el usuario

        $("#usuario").keyup(function(){
    		 
        var usuario = $(this).val();
        var cont = 0    
        $.get('/usuarioslista', function(data){ 
         //   console.log(data);
             for(var i=0; i<data.length;i++){
                 if(data[i].name == usuario){
                 cont=cont+1
                 }
             }
             if(cont>=1){
                document.getElementById("usuario").style.borderColor="#FF0000"
             }
             else if(cont==0){
                document.getElementById("usuario").style.borderColor="#0fff12"
             }  
             
	});

	});



        //funcion para verificar la contraseña

        $("#confirmpassword").keyup(function(){
    		if($("#password").val() === $("#confirmpassword").val()){
         //Si son iguales
         document.getElementById("confirmpassword").style.borderColor="#0fff12"
        }else if($("#password").val() !== $("#confirmpassword").val()){
         //Si no son iguales
         document.getElementById("confirmpassword").style.borderColor="#FF0000"
    } 
	});

     
    });*/
 </script>

