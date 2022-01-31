@extends('layouts.plantillaDocente')
@section('contenido')
<style>
  :root {
    --body-bg-color: #1a1c1d;
    --hr-color: #26292a;
    --red: #e74c3c;
  }
  
  a {
    color: inherit;
    text-decoration: none;
  }
  
  .menu {
    display: flex;
    justify-content: center;
  }
  .alinealo{
    justify-content: center;
  }
  .menu a {
    position: relative;
    display: block;
    overflow: hidden;
  }
  
  .menu a span {
    transition: transform 0.2s ease-out;
  }
  
  .menu a span:first-child {
    display: inline-block;
    padding: 10px;
  }
  
  .menu a span:last-child {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    transform: translateY(-100%);
  }
  
  .menu a:hover span:first-child {
    transform: translateY(100%);
  }
  
  .menu a:hover span:last-child,
  .menu[data-animation] a:hover span:last-child {
    transform: none;
  }
  .menu[data-animation="to-top"] a span:last-child {
    transform: translateY(100%);
  }
  
  .menu[data-animation="to-top"] a:hover span:first-child {
    transform: translateY(-100%);
  }
  
  .menu[data-animation="to-right"] a span:last-child {
    transform: translateX(-100%);
  }
  
  .menu[data-animation="to-right"] a:hover span:first-child {
    transform: translateX(100%);
  }
  
  .menu[data-animation="to-left"] a span:last-child {
    transform: translateX(100%);
  }
  
  .menu[data-animation="to-left"] a:hover span:first-child {
    transform: translateX(-100%);
  }
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
<div class="container-fluid ">
  <div class="form-group">
    
    <div class="container">
      <h3 class="text-center">CARGA HORARIA - HORARIO SEMANAL</h3>
      <div class="d-none d-md-block col-12" style="position: relative;right: 40%">
        <button class=" btn btn-success" style="border-radius: 40px;"   type="menu"><a class="text-white" href="../docente" ><i class="fas fa-arrow-left"> </i> Regresar</a> </button>
      </div>
      <div class="col-12 d-md-none" >
        <button class=" btn btn-success" style="border-radius: 40px;"   type="menu"><a class="text-white" href="../docente" ><i class="fas fa-arrow-left"> </i> Regresar</a> </button>
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
                   

              </tbody>  
          </table>
      </div>
      
     
       
</div>
  </div>
</div>
 
@endsection