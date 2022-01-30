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
                        <td colspan="5" style=" border: inset 0pt" style="align-items: center"><h3 class="text-center"> <b>    Carga Horaria - Declaración de Carga Horaria Asignada a Docentes de la Sede Central, en las 
                            Subsedes Descentralizadas
                            </b>  </h3></td>
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
                    
                     
                        <td style=" border: inset 0pt"><b>ESCUELA : </b>&nbsp;&nbsp; {{$docente->escuela->escuela }} </td>
                       
                        <td style=" border: inset 0pt"><b>SEMESTRE : </b>&nbsp;&nbsp;{{$semestre->semestre}} </td>
                    
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
        <br>
        <div class="row" >
            
            <table class="table"  style="margin-left: 30px;">
                <tbody>
                    <tr>
                        <td   style=" border: inset 0pt"> II. TRABAJO LECTIVO.- Datos completos y con claridad</td>
                    
                    </tr>
                    
                </tbody>  
            </table>
        </div>
        <br>

        <div class="row" >
            
            <table class="table"  style="margin-left: 10px;">
                  <tbody>
                    <tr>
                        <td style=" border: inset 1pt"> <b>CODIGO</b></td>
                        <td style=" border: inset 1pt"> <b>NOMBRE</b></td>
                        <td style=" border: inset 1pt"> <b>HORARIO </b>   </td>
                        <td style=" border: inset 1pt"> <b>CURSO</b>   </td>
                        <td style=" border: inset 1pt"> <b>ESCUELA </b>   </td>
                        <td style=" border: inset 1pt"> <b>CICLO</b>   </td>
                        <td style=" border: inset 1pt"> <b>HORAS</b>   </td>
                        <td style=" border: inset 1pt"> <b>TOTAL</b>   </td>
                    </tr>
                    @foreach($curso as $key )
                    
                        @if($key->codigo != 'CNL')
                        <tr>
                            <td   style=" border: inset 1pt">{{$key->codigo}}</td>
                            <td   style=" border: inset 1pt">{{$key->nombre}}</td>
                            <td   style=" border: inset 1pt">
                            @foreach($cargahoraria as $k)
                            
                                @if($k->id == $key->id)
                                    {{$k->dia}} : {{$k->inicio}}-{{$k->fin}} <b>/</b> 
                                @endif
                            @endforeach
                            </td>
                            
                            <td   style=" border: inset 1pt">{{$key->categoria}}</td>
                            <td   style=" border: inset 1pt">{{$escuela->escuela}}</td>
                            <td   style=" border: inset 1pt">{{$key->ciclo}}</td>
                            <td   style=" border: inset 1pt">
                                @php
                                    $ch = 0;
                                @endphp
                                @foreach($cargahoraria as $k)
                            
                                    @if($k->id == $key->id)
                                        @if($ch < 1)
                                        Teo:{{$k->horasT}} Lab:{{$k->horasL}} Pract:{{$k->horasP}}    
                                        @endif
                                       
                                        @php
                                            $ch=$ch+1;
                                        @endphp 
                                    @endif
                                @endforeach   
                            
                            </td>
                            @php
                                $cht = 0;
                            @endphp
                            <td   style=" border: inset 1pt"> @foreach($cargahoraria as $k)
                            
                                @if($k->id == $key->id)
                                    @if($cht < 1)
                                    {{$k->horas}}
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
                    
                    
                </tbody>  
            </table>
        </div>
        <br>
        <div class="row" >
            
            <table class="table"  style="margin-left: 30px;">
                <tbody>
                    <tr>
                        <td   style=" border: inset 0pt; text-align: justify;">(*) Indique las fechas de Inicio y término si el curso es consignado para los casos de las Sedes de Cascas, Tayabamba y 
                            Huamachuco, concordando con su Licencia por Comisión de Servicios.</td>
                    
                    </tr>
                    
                </tbody>  
            </table>
        </div>
        <br>
        <div class="row" >
            
            <table class="table"  style="margin-left: 30px;">
                <tbody>
                    <tr>
                        <td   style=" border: inset 0pt; text-align: justify;">NOTA: Los docentes que suscriben la presente declaración se sujetan a lo dispuesto en el Reglamento de funcionamiento 
                            de Sedes Descentralizadas (R.C.U. Nro 072-CU-COG-05/UNT) y Directiva Nrp 01-07/VAC/UNT de Racionalización 
                            Académico del Personal docente de sedes descentralizadas (R.C.U. Nro 576-07/UNT)</td>
                    
                    </tr>
                    
                </tbody>  
            </table>
        </div>

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