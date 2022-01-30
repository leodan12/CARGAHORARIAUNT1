<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS 
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    -->
       <title>Horario Semanal</title>
        
      
</head>
<body>
    
<div class="container-fluid">
    <div class="container-fluid"  >
        <img src="img/logo.png" alt="" width="10%" alt="" style="position:absolute;margin-left: 90%;">
        <div class="row" >
            
            <table class="table"  style="margin-left: 150px;">
                <tbody>
                    <tr>
                        <td colspan="5" style=" border: inset 0pt" style="align-items: center"><h2 class="text-center"> <b>    HORARIO SEMANAL DEL PERSONAL ACADEMICO</b>  </h2></td>
                    </tr>
                    
                    
                </tbody>  
            </table>
        </div>
        
        <div class="row" >
            
            <table class="table"  style="margin-left: 100px;">
                <tbody>
                      <tr>
                        <td   style=" border: inset 0pt"><b> FACULTAD : </b>&nbsp;&nbsp; {{$docente->escuela->facultad->facultad }} </td>
                    
                     
                        <td style=" border: inset 0pt"><b>ESCUELA : </b>&nbsp;&nbsp; {{$docente->escuela->escuela }} </td>
                       
                        <td style=" border: inset 0pt"><b>SEMESTRE : </b>&nbsp;&nbsp;{{$semestre->semestre}} </td>
                    
                    </tr>  
                    <tr> 
                        <td    style="color: white">  .   </td>
                    </tr>
                    <tr>
                        <td  style=" border: inset 0pt"><b>DNI  : </b>&nbsp;&nbsp; {{$docente->dni }} </td>
                     
                        <td  WIDTH="50"  style=" border: inset 0pt"><b>DOCENTE : </b>&nbsp;&nbsp; {{$docente->nombres }} {{$docente->apellidos }}</td>
                     <br><br>
                        <td  style=" border: inset 0pt"><b>DEL : </b>&nbsp;&nbsp;  {{$semestre->inicio}} </td>
                     
                        <td style=" border: inset 0pt"><b>AL : </b>&nbsp;&nbsp;  {{$semestre->fin}}<b> </b> </td>
                    </tr> 
                </tbody>  
            </table>
        </div>
        <br>
        <div class="row"> 
            <table class="table"  style="margin-left: 50px;">
                <tbody>
                   
                    <tr>
                        <td style=" border: inset 1pt"> <b>N° </b></td>
                        <td style=" border: inset 1pt"> <b>DIA </b></td>
                        <td style=" border: inset 1pt"> <b>HORARIO </b>   </td>
                        <td style=" border: inset 1pt"> <b>CURSO/CARGA </b>   </td>
                        <td style=" border: inset 1pt"> <b>LOCAL </b>   </td>
                        <td style=" border: inset 1pt"> <b>AULA </b>   </td>
                        <td style=" border: inset 1pt"> <b>TOTAL </b>   </td>
                    </tr> 
                    @php
                          $c = 0;
                    @endphp

                    @foreach($cargahoraria as $key )
                    <tr>
                        <td   style=" border:  inset 1pt"> {{$key->id}} </td>
                        <td   style=" border:  inset 1pt"> {{$key->dia}} </td>
                        <td   style=" border: inset 1pt"> {{$key->inicio}}-{{$key->fin}} </td>
                        @if($key->carga == 'curso')
                        <td   style=" border:  inset 1ptk"> {{$key->nombre}} </td>
                        @else
                        <td   style=" border:  inset 1ptk"> {{$key->carga}} </td>
                        @endif
                       

                        <td   style=" border:  inset 1pt"> {{$key->local}} </td>
                        <td   style=" border: inset 1pt"> {{$key->numero}} </td>
                        <td   style=" border: inset 1pt"> {{$key->horas}} </td>
                        @php
                             $c=$c+  $key->horas  ;
                        @endphp
                       
                    </tr>

                    @endforeach
                    
                    <tr>
                          <td style=" border: inset 0pt">  </td>
                          <td style=" border: inset 0pt">  </td>
                          <td style=" border: inset 0pt">  </td>
                          <td style=" border: inset 0pt">  </td>
                          <td style=" border: inset 0pt">  </td>
                          <td style=" border: inset 1pt"> Total </td>
                          <td style=" border: inset 1pt"> {{$c}}  </td>
                    </tr>
                    <tr> 
                        <td    style="color: white">  .   </td>
                    </tr>
                   
                    <tr> 
                        <td    style="color: white">  .   </td>
                        <td    style="color: black">  Fecha de Entrega: {{ date("j/ n/ Y");}}    </td>
                    </tr>
                    <tr> 
                        <td    style="color: white">  .   </td>
                    </tr>
                   
                    <tr>
                        <td style=" border: inset 0pt">    </td>
                        <td style=" border: inset 0pt">------------------------------   </td>
                        <td style=" border: inset 0pt">------------------------------   </td>
                        <td style=" border: inset 0pt">------------------------------   </td>  
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"> </td>
                        <td style=" border: inset 0pt"><b>FIRMA DEL DECANO   </b></td>
                        <td style=" border: inset 0pt"><b>FIRMA DEL DOCENTE   </b></td>
                        <td style=" border: inset 0pt"><b>FIRMA DEL DIRECTOR   </b></td> 
                    </tr>

                </tbody>  
            </table>
        </div>
        
        <div class="row" style="margin-left: 100px;margin-right: 230px" >
            <table class="table">
                <thead style="color: black;">  
                    
                      
                </thead>
                <tbody>
                   
                       
                     
                         
                   
                </tbody>  
            </table>
        </div>        
        
    </div>
</div>
 
</body>
</html>