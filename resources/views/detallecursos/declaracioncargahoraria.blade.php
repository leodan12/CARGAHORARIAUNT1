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
            
            <table class="table"  style="margin-left: 30px;">
                <tbody>
                    <tr>
                        <td colspan="5"  style="text-align: center"><h3 class="text-center"> <b>   DECLARACION DE CARGA HORARIA ASIGNADA  </b>  </h3></td>
                    </tr>
                    
                    
                </tbody>  
            </table>
        </div>
        <div class="row" >
            
            <table class="table"  style="margin-left: 30px;">
                <tbody>
                    <tr>
                        <td   style=" border: inset 0pt">  I. DATOS SOBRE LA SITUACIÓN DEL PROFESOR</td>
                    
                    </tr>
                    
                </tbody>  
            </table>
        </div>
        <div class="row" >
            
            <table class="table"  style="margin-left: 30px;">
                <tbody>
                    <tr>
                        <td   style=" border: inset 0pt"><b> FACULTAD : </b>&nbsp;&nbsp; {{$docente->escuela->facultad->facultad }} </td>
                    
                     
                        <td style=" border: inset 0pt"><b>DPTO ACADEMICO : </b>&nbsp;&nbsp;Dpto. de {{$docente->escuela->escuela }} </td>
                       
                    </tr> 
                    
                </tbody>  
            </table>
        </div>
        <br>
        <div class="row" >
            
            <table class="table"  style="margin-left: 110px;">
                  <tbody>
                    <tr>
                        <td style=" border: inset 1pt"><b>NOMBRE COMPLETO </b></td>  
                        <td style=" border: inset 1pt"><b>CONDICION </b></td>
                        <td style=" border: inset 1pt"><b>CATEGORIA</b></td>  
                        <td style=" border: inset 1pt"><b>MODALIDAD</b></td>  
                    </tr> 
                    <tr>
                        <td   style=" border: inset 1pt">{{$docente->nombres }} {{$docente->apellidos }}</td>
                        <td   style=" border: inset 1pt">{{$docente->condicion}}</td>
                        <td   style=" border: inset 1pt">{{$docente->categoria}}</td>
                        <td   style=" border: inset 1pt">{{$docente->modalidad}}</td>
                  
                    
                    </tr> 
                    
                </tbody>  
            </table>
        </div>
        <div class="row" >
            
            <table class="table"  style="margin-left: 30px;">
                <tbody>
                    <tr>
                        <td   style=" border: inset 0pt"><b> AÑO ACADEMICO: </b>  {{$semestre->año}} </td>
                    
                     
                        <td   style=" border: inset 0pt"><b> CICLO(sem): </b>  {{$semestre->semestre}} </td>
                        <td style=" border: inset 0pt"><b> INICIO: </b>{{$semestre->inicio}} </td>
                        <td style=" border: inset 0pt"><b> FINAL: </b>{{$semestre->fin}} </td>
                       
                    </tr> 
                    
                </tbody>  
            </table>
        </div>
        <br>
        <div class="row" >
            
            <table class="table"  style="margin-left: 10px;">
                <tbody>
                    <tr>
                        <td  colspan="11" style=" border: inset 1pt"> 1. TRABAJO LECTIVO.- Datos completos y con claridad</td>
                    
                    </tr>
                    <tr>
                        <td style=" border: inset 1pt"> <b>CODIGO</b></td>
                        <td style=" border: inset 1pt"> <b>NOMBRE</b></td>
                        <td style=" border: inset 1pt"> <b>CUR </b>   </td>
                        <td style=" border: inset 1pt"> <b>ESCUELA </b>   </td>
                        <td style=" border: inset 1pt"> <b>CIC</b>   </td>
                        <td style=" border: inset 1pt"> <b>SEC</b>   </td>
                        <td style=" border: inset 1pt"> <b>NRO AL</b>   </td>
                        <td style=" border: inset 1pt"> <b>HT</b>   </td>
                        <td style=" border: inset 1pt"> <b>HP</b>   </td>
                        <td style=" border: inset 1pt"> <b>HL</b>   </td>
                        <td style=" border: inset 1pt"> <b>TOTAL</b>   </td>
                    </tr>
                    @foreach($curso as $key )
                    
                    @if($key->codigo != 'CNL')
                    <tr>
                        <td   style=" border: inset 1pt">{{$key->codigo}}</td>
                        <td   style=" border: inset 1pt">{{$key->nombre}}</td>
                         
                        
                        <td   style=" border: inset 1pt">{{$key->categoria}}</td>
                        <td   style=" border: inset 1pt">{{$escuela->escuela}}</td>
                        <td   style=" border: inset 1pt">{{$key->ciclo}}</td>
                        <td   style=" border: inset 1pt">{{$key->seccion}}</td>
                        <td   style=" border: inset 1pt">{{$key->nroAlumnos}}</td>
                       
                            @php
                                $ch = 0;
                                $cf = 0;
                            @endphp
                            @foreach($cargahoraria as $k)
                        
                                @if($k->id == $key->id)
                                    @if($ch < 1)
                                    <td   style=" border: inset 1pt">
                                       {{$k->horasT}}  
                                    </td>
                                    <td   style=" border: inset 1pt">
                                        {{$k->horasP}}    
                                    </td>
                                    <td   style=" border: inset 1pt">
                                        {{$k->horasL}}
                                    </td>
                                    @endif
                                   
                                    @php
                                        $ch=$ch+1;
                                    @endphp 
                                @endif
                            @endforeach   
                        
                        
                        @php
                            $cht = 0;
                        @endphp
                        <td   style=" border: inset 1pt"> @foreach($cargahoraria as $k)
                        
                            @if($k->id == $key->id)
                                @php
                                $cf = $cf + $key->horas;
                                @endphp
                                @if($cht < 1)
                                {{$key->horas}}
                                
                                @endif
                               
                                @php
                                    $cht=$cht+1;
                                @endphp 
                            @endif
                        @endforeach  
                    </td>
                    </tr> 
                    @endif
                    
                               
               
                @endforeach 
                
                    @foreach($cargahoraria as $key )
                    @if($key->idCarga != 1)
                    <tr>

                        <td  colspan="5" style=" border: inset 1pt"> {{$key->idCarga}}. {{$key->carga}}: {{$key->descripcion}}  </td>
                        <td  colspan="5"  style=" border: inset 1pt">  </td>
                        <td  colspan="1"  style=" border: inset 1pt">  {{$key->horas}} </td>
                    @php
                        $cf = $cf + $key->horas;
                    @endphp
                    </tr>
                    @endif
                    
                    @endforeach
                
                    <tr>
                        <td  colspan="10"  style=" border: inset 1pt; text-align:right">  Total :  </td>
                        <td  colspan="1"  style=" border: inset 1pt; text-align:right"> {{ $cf }}  </td>  
                    </tr>
                </tbody>  
            </table>
        </div>
        <br>

          
         
        

        <div class="row"> 
            <table class="table"  style="margin-left: 60px;">
                <tbody>
                   
                  
                    <tr> 
                        <td    style="color: white">  .   </td>
                    </tr>
                   
                    <tr> 
                        <td    style="color: white">  .   </td>
                        <td    style="color: white">  .   </td>
                        <td    style="color: white">  .   </td> 
                        <td    style="color: black">  Trujillo, {{ date("j");}} de {{date("F");}} del {{date("Y");}}   </td>
                    </tr>
                    <tr> 
                        <td    style="color: white">  .   </td>
                    </tr>
                    <tr> 
                        <td    style="color: white">  .   </td>
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