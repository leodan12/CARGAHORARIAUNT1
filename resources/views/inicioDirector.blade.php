@extends('layouts.plantillaDirector')

@section('contenido')
<div class="container">
    <div class="content-section-heading text-center">
      <h3 class="text-secondary mb-0"> ✔ Elige una de las opciones disponibles para el director</h3>
      <br>
    </div>
    <div class="row no-gutters">

      <div class="col-12 col-sm-6 col-md-4">
        <a class="portfolio-item" href="/asignarcursos">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">ASIGNAR CURSOS</div>
              <p class="mb-0">asignacion de cursos a docentes</p>
            </div>
          </div>
          <img class="img-fluid" src="/img/matriculas.jpg" alt="">
        </a>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <a class="portfolio-item" href="/asignaraulas">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">ASIGNAR AULAS</div>
              <p class="mb-0">asignar aulas a cursos</p>
            </div>
          </div>
          <img class="img-fluid" src="/img/colegiofondo01.jpg" alt="">
        </a>
      </div>           
       
    
     

       
       
      
    </div>
  <!--</div>-->

<div class="row no-gutters">
  
    
</div>
</div>
@endsection
