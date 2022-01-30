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
                        <td colspan="5"  style=" text-align: center;"><h3 class="text-center"> <b>  DECLARACION JURADA DE NO ESTAR INCURSO EN CAUSALES
                            DE INCOMPATIBILIDAD O IMPEDIMENTO LABORAL
                            </b>  </h3></td>
                    </tr>
                    
                    
                </tbody>  
            </table>
        </div>
        <br>
        <div class="row" >
            
            <table class="table"  style="margin-left: 30px;">
                <tbody>
                    <tr>
                        <td  style=" border: inset 0pt; text-align: justify;"> YO, {{$docente->nombres}} {{$docente->apellidos}} identificado con DNI Nro {{$docente->dni}} del
                            Departamento Académico Dpto. de {{$escuela->escuela}} de la facultad de {{$escuela->facultad->facultad}};   en el marco del programa de
                            Homologación de la remuneración de los docentes universitarios, dispuesto por el D.U. Nro 033-2006 y D.S. Nro
                            019-2006-EF, DECLARO BAJO JURAMENTO Y EN HONOR A LA VERDAD, que
                        
                        
                        </td>
                    
                    </tr>
                </tbody>  
            </table>
        </div>
<br>
                    <div class="row" >
            
                        <table class="table"  style="margin-left: 30px;">
                            <tbody>
                    <tr>
                        <td  style=" border: inset 0pt; text-align: justify;"> NO ESTOY INCURSO en causales de incompatibilidad laboral y NO TENGO impedimento para ejercer la docencia en
                            la Universidad Nacional de Trujillo, de conformidad con lo previsto en el capitulo VII de las Incompatibilidades e
                            Impedimentos, del Titulo VI: Los Profesores, del Estatuto Institucional vigente.
                            
                        
                        
                        </td>
                    
                    </tr>
                </tbody>  
            </table>
        </div>
<br>
                    <div class="row" >
            
                        <table class="table"  style="margin-left: 30px;">
                            <tbody>
                    <tr>
                        <td   style=" border: inset 0pt; text-align: justify;"> NO ESTOY INCURSO en causales de incompatibilidad laboral y NO TENGO impedimento para ejercer la docencia en
                            la Universidad Nacional de Trujillo, de conformidad con lo previsto en el capitulo VII de las Incompatibilidades e
                            Impedimentos, del Titulo VI: Los Profesores, del Estatuto Institucional vigente.
                            
                        
                        
                        </td>
                    
                    </tr>
                </tbody>  
            </table>
        </div>
<br>
                    <div class="row" >
            
                        <table class="table"  style="margin-left: 30px;">
                            <tbody>
                    <tr>
                        <td   style=" border: inset 0pt; text-align: justify;">EN CASO DE FALTAR A LA VERDAD ME SOMETO A LAS SANCIONES QUE SEAN APLICABLES DE
                            ACUERDO A LEY; ASIMISMO, DE ENCONTRARME INCURSO EN SITUACION DE INCOMPATIBILIDAD O
                            IMPEDIMENTO PARA EJERCER LA DOCENCIA EN LA U.N.T., ME SOMETO A LAS SANCIONES PREVISTAS
                            POR SU ESTATUTO, </td>
                    
                    </tr>
                    
                </tbody>  
            </table>
        </div>
<br>
                    <div class="row" >
            
                        <table class="table"  style="margin-left: 30px;">
                            <tbody>
               
                    <tr>
                        <td   style=" border: inset 0pt; text-align: justify;"> <b> <i>Y AUTORIZO AL FUNCIONARIO COMPETENTE DISPONGA EL DESCUENTO DE MI PLANILLA DE HABERES,
                            DEL MONTO QUE LA UNIDAD DE REMUNERACIONES LIQUIDE COMO PAGOS INDEBIDOS POR EL LAPSO
                            DE TIEMPO LABORADO ILEGALMENTE.
                              </i>  </b>
                            </td>
                    
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
                        <td style=" border: inset 0pt">--------------------------------------   </td>
                          
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"> </td>
                        <td style=" border: inset 0pt"><b>FIRMA DEL DECLARANTE   </b></td>
                        
                         
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"> </td>
                        <td style=" border: inset 0pt;text-align:center"><b>DNI: {{$docente->dni}}   </b></td>
                        
                         
                    </tr>

                </tbody>  
            </table>
        </div>
<br><br><br><br><br><br><br><br><br><br>
        <div class="row" >
            
            <table class="table"  style="margin-left: 30px;">
                <tbody>
                    <tr>
                        <td   style=" border: inset 0pt; text-align: justify;">  Nota: Los docentes deben suscribir de forma obligatoria el presente formato en cada Semestre Académico, en el reverso de la
                            Declaracion de Carga Horaria Asignada
                            </td>
                    
                    </tr>
                    
                </tbody>  
            </table>
        </div>
      

        
              
        
    </div>
</div>
 
</body>
</html>