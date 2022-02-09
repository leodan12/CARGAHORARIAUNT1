@extends('layouts.plantillaDocente')

@section('contenido')
<style>
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
    <div class="container-fluid" >
        <div class="row">
            <div class="col">
                <h1 style="text-align: center">CARGA HORARIA - HORARIO SEMANAL</h1>
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
  
        <form method="POST"  action="{{route('store3')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @csrf   
           
            <div class="form-row">
                <div class="from-group col-md-3" style="border: 1px solid black;">
                    <div class="row">

                    
                
                <div class="from-group col-md-6">
                    <label for="semestre">SEMESTRE:</label>
                    <select name="semestre" id="semestre" class="form-control"   style="border-radius: 40px;" required  >
                        <option   disabled selected> SELECCIONE:</option>
                       
                        @foreach ( $semestre as $i)
                        <option value="{{$i->id}}"   > {{$i->semestre}}</option>
                        @endforeach
                        
                        
                    </select>
        
                  </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="dia">DÍA:</label>
                    <select name="dia" id="dia" class="form-control"   style="border-radius: 40px;" required  >
                            <option value="{{ old('dia') }}" disabled selected> SELECCIONE:</option>
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
               <div class="form-group col-md-5">
                <label for="inicio">HORA INICIO:</label>
                <input type="time" class="form-control @error('inicio') is-invalid @enderror" id="inicio" name="inicio"  style="border-radius: 40px;"   required  >
                @error('inicio')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
           </div>

           <div class="form-group col-md-5">
            <label for="fin">HORA FINAL:</label>
            <input type="time" class="form-control @error('fin') is-invalid @enderror" id="fin" name="fin"  style="border-radius: 40px;"  required  >
            @error('fin')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
       </div>
    </div>
    
     
            <div class="form-row"  >
            <div class="form-group col-4"  >
                <button type="button" id="btncurso" name="btncurso" class="btn btn-outline-primary"  >CURSO</button> 
            </div>
            <div class="form-group col-md-8">
               
                <select name="curso" id="curso" class="form-control"   style="border-radius: 40px;" disabled  >
                    @foreach ( $curso as $i)
                    @if($i->nombre != "CargaNoLectiva")
                    <option value="{{$i->id}}"   selected> {{$i->nombre}}</option>
                    
                    @endif
                     @endforeach
                 </select>
            </div>
        </div>
        <div class="form-row" >
            <div class="form-group col-4"  >
                <button type="button" id="btncarga" name="btncarga" class="btn btn-outline-primary">CARGA</button>
            </div>
            <div class="form-group col-md-8">
               
                <select name="carga" id="carga" class="form-control"   style="border-radius: 40px;" disabled  >
                    @foreach ( $carga as $i)
                    @if($i->carga != "curso")
                    <option value="{{$i->id}}"   selected> {{$i->carga}}</option>
                    
                    @endif
                    
                    @endforeach
                 </select>
            </div>
        </div>
          

            
            <div class="form-row">
                <div class="from-group col-md-10">
                    <label for="aula">AULA:</label>
                    <select name="aula" id="aula" class="form-control"   style="border-radius: 40px;" required  >
                        <option value="{{ old('docente') }}" disabled selected> SELECCIONE UN AULA:</option>
                        @foreach ( $aula as $itemp)
                    <option value="{{$itemp->id}}">{{$itemp->local}}  {{$itemp->numero}}</option>
                        @endforeach
                    </select>
        
                  </div>
            </div>

            
           
           
 

         
         <div class="form-row">
           
            <div class="form-group col-md-8">
                <label for="horas">HORAS:</label>
                <input type="number" class="form-control @error('horas') is-invalid @enderror" id="horas" name="horas"  style="border-radius: 40px;" value="{{ old('horas') }}" required  >
                @error('horas')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
           </div>
         </div>

        </div>
        <div class="form-group col-md-9" style="border: 1px solid black;">
            <div class="table-responsive "  >
                <table class="table" name="tabla1" id="tabla1"  >
                  <thead class="thead-dark text-center"  >
                    <th scope="col">N°</th>
          
                    <th scope="col">DIA</th>
                    <th scope="col">HORARIO</th>
                    <th scope="col">CURSO/CARGA</th>
                    <th scope="col">LOCAL</th>
                    <th scope="col">AULA</th>
                    <th scope="col">TOTAL</th>

                    
                  </thead>
                  <tbody style="text-align: center"> 
                   
                 </tbody> 
               </table>
              </div>
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
                    <a href="../docente" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
                <div class="col-md-3">&nbsp;</div> 
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">

  
    var c=0;
    //para mostrar la opcion de curso y carga
        $(document).ready(function() {
       
        $("#btncurso").click(function(){
            $('#curso').removeAttr('disabled');
            $("#carga").prop('disabled', true);
        });

        $("#btncarga").click(function(){
             $("#curso").prop('disabled', true);
            $('#carga').removeAttr('disabled');
        });


//para mostrar las notas de alumnos por capacidades 

        $("#semestre").change(function(){
        var semestre = $(this).val();
        
        $.get('../horariobysemestre/'+semestre, function(data){
          console.log(data);
            var producto_select ;

            for (var x=0; x<c+1;x++){
            $('#fila'+x).remove();
            }
            c=0;
            //   periodo=document.getElementById('idperiodo').value;
             
             for (var i=0; i<data.length;i++){
              //  if(periodo==data[i].idperiodo){
                c=i;
                fila='<tr id="fila'+i+'"><td >'+data[i].id+'</td><td >'+data[i].dia +' </td><td > '+ data[i].inicio+'/'+ data[i].fin+'</td><td >'+  data[i].nombre +'/'+data[i].carga+'</td><td>'+data[i].local+'</td><td>'+data[i].numero+'</td> <td>'+data[i].horas+'</td></tr>';
 
            	  $('#tabla1').append(fila);
                  //}

            fila='';
   
              }
            
        });
      });
   
   



        
       
        });
          
     
    
    </script>
     
    

