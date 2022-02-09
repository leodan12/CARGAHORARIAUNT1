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
  
        <form method="POST"  action="" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @csrf   
           
            <div class="form-row">
                <div class="from-group col-md-2">
                      <label for="semestre">SEMESTRE:</label>
                    <select name="semestre" id="semestre" class="form-control"   style="border-radius: 40px;" required  >
                        <option   disabled selected> SELECCIONE:</option>
                       
                        @foreach ( $semestre as $i)
                        <option value="{{$i->id}}"   > {{$i->semestre}}</option>
                        @endforeach
                        
                        
                    </select> 
    </div>
      </div>
      <br>
        <div class="form-group col-md-12" style="align-items: center">
            <div class="table-responsive " style="align-items: center" >
                <table class="table" name="tabla1" id="tabla1"  >
                  <thead class="thead-dark text-center"  >
                    <th scope="col">CODIGO</th>
          
                    <th scope="col">NOMBRE</th>
                    <th scope="col">SECCION</th>
                    <th scope="col">ESCUELA</th>
                    <th scope="col">CICLO</th>
                    <th scope="col">ALUMNOS</th>
                    <th scope="col">H TEO</th>
                    <th scope="col">H PRAC</th>
                    <th scope="col">H LAB</th>
                    <th scope="col">TOTAL HORAS</th>

                    
                  </thead>
                  <tbody style="text-align: center"> 
                   
                 </tbody> 
               </table>
              </div>
        </div>

        <br><br>
        <div class="form-group col-md-12" style="align-items: center">
            <div class="table-responsive " style="align-items: center" >
                <table class="table" name="tabla2" id="tabla2"  >
                  <thead class="thead-dark text-center"  >
                    <th scope="col col-6">CARGAS</th>
                    <th scope="col col-4">CARGA</th>
                    <th scope="col col-2">HORAS</th>

                    
                  </thead>
                  <tbody style="text-align: center"> 
                   
                 </tbody> 
               </table>
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
       
       

//para mostrar las notas de alumnos por capacidades 

        $("#semestre").change(function(){
        var semestre = $(this).val();
        
        $.get('../cargabydocente/'+semestre, function(data){
          console.log(data);
            var producto_select ;

            for (var x=0; x<c+1;x++){
            $('#fila'+x).remove();
            }
            c=0;
             for (var i=0; i<data.length;i++){
               c=i;
                fila='<tr id="fila'+i+'"><td >'+data[i].codigo+'</td><td >'+data[i].nombre +' </td><td >'+ data[i].seccion+'</td><td >'+data[i].escuela+'</td><td >'+data[i].ciclo+'</td><td>'+data[i].nroAlumnos+'</td><td>'+data[i].horasT+'</td> <td>'+data[i].horasP+'</td><td>'+data[i].horasL+'</td><td>'+data[i].horas+'</td> </tr>';
 
            	  $('#tabla1').append(fila); 
            fila='';  } 
        });
      });


      $("#semestre").change(function(){
        var semestre1 = $(this).val();
        
        $.get('../cargaNLbydocente/'+semestre1, function(data){
          console.log(data);
            var producto_select ;

            for (var x=0; x<c+1;x++){
            $('#fila1'+x).remove();
            }
            c=0;
             for (var i=0; i<data.length;i++){
               c=i;
                fila='<tr id="fila1'+i+'"><td >'+data[i].carga+':'+data[i].descripcion +' </td><td >'+ data[i].carga+'</td><td >'+ data[i].horas+'</td> </tr>';
 
            	  $('#tabla2').append(fila); 
            fila='';  } 
        });
      });
   
   



        
       
        });
          
     
    
    </script>
     
    

