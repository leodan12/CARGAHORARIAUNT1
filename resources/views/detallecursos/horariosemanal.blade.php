<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
       <title>Libreta de Notas</title>
       <style>
        .azul{
            color:blue;
        }
        .rojo{
            color:red;
        }

       
    </style>
</head>
<body>
    
<div class="container-fluid">
    <div class="container-fluid" style="background-image: url('img/logoInnova.png); background-size: contain;background-repeat: no-repeat; opacity:0.4;background-position: 50% 15%">
        <img src="img/logo.png" alt="" width="10%" alt="" style="position:absolute;margin-left: 90%;">
        <div class="row" >
            
            <table class="table"  style="margin-left: 30px;">
                <tbody>
                    <tr>
                        <td colspan="1" style=" border: inset 0pt"><h1 class="text-center"> <b>HORARIO SEMANAL </b>  </h1></td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"><b> FACULTAD : </b>&nbsp;&nbsp; {{$docente->escuela->facultad->facultad }} </td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"><b>ESCUELA : </b>&nbsp;&nbsp; {{$docente->escuela->escuela }} </td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"><b>DNI  : </b>&nbsp;&nbsp; {{$docente->dni }} </td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"><b>DOCENTE : </b>&nbsp;&nbsp; {{$docente->nombres }}</td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"><b>SEMESTRE : </b>&nbsp;&nbsp;{{$semestre->semestre}} </td>
                    </tr>
                    <tr>  
                    <td  style=" border: inset 0pt"><b>INICIO : </b>&nbsp;&nbsp;  {{$semestre->inicio}} </td>
                    </tr> 
                    <tr>
                        <td style=" border: inset 0pt"><b>FIN : </b>&nbsp;&nbsp;  {{$semestre->fin}}<b> </b> </td>
                    </tr> 
                </tbody>  
            </table>
        </div>
        <div class="row"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
        <div class="row"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
        <div class="row"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
        <div class="row"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div> 
        <div class="row"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
        <div class="row"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
      

        <div class="row" style="margin-left: 100px;margin-right: 230px" >
            <table class="table">
                <thead style="color: black;">  
                    <tr>
                        <th width="5" class="text-center" style=" border: inset 0pt"><b> Firma y Sello del Director: </b></th>  
                    </tr> 
                    <tr>
                        <th width="5" class="text-center" style=" border: inset 0pt"><b>BOY CHAVIL   </b></th>  
                    </tr> 
                </thead>
                <tbody>
                    <tr>
                        <td style=" border: inset 0pt" ><img src="img/firma.png" width="50%" alt="" style="margin-left: 30%;" ></td>
                    </tr>
                </tbody>  
            </table>
        </div>        

    </div>
</div>
<!--  para las libretas  de los alumnos
    </table> -->
    <div style="page-break-after:always;"></div>
    <table style="width:100%" style="text-align: center" border="1px">
        <thead style="background-color: cornflowerblue">
            <tr >
           
            <th  width=310px>CURSO/CAPACIDADES</th>
            <th  width=30px style="text-align: center">N1</th>
            <th width=30px style="text-align: center">N2</th>
            <th width=30px style="text-align: center">N3</th>
            <th width=30px style="text-align: center">PC</th></tr>
        </thead>
    </table>
    <table style="width:100%" style="text-align: center" border="1px">
       
         
           
        
    </table>
    </div>
</body>
</html>