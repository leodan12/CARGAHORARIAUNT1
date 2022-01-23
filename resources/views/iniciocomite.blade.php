@extends('layouts.plantillaComite')

@section('contenido')
<div class="container">
    <div class="content-section-heading text-center">
      <h3 class="text-secondary mb-0"> ✔ Elige una de las opciones disponibles para el comite</h3>
      <br>
    </div>
    <div class="row no-gutters">

      <div class="col-12 col-sm-6 col-md-4">
        <a class="portfolio-item" href="/encuesta">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">ENCUESTAS</div>
              <p class="mb-0">Gestionar Encuestas</p>
            </div>
          </div>
          <img class="img-fluid" src="/img/matriculas.jpg" alt="">
        </a>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <a class="portfolio-item" href="/reporte">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">Reportes</div>
              <p class="mb-0">Ver Reportess</p>
            </div>
          </div>
          <img class="img-fluid" src="/img/colegiofondo01.jpg" alt="">
        </a>
      </div>           
      <div class="col-12 col-sm-6 col-md-4">
        <a class="portfolio-item" href="/alumno">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">OPCION 3</div>
              <p class="mb-0">opcion</p>
            </div>
          </div>
          <img class="img-fluid" src="/img/ALUMNOS.jpg" alt="">
        </a>
      </div>
    
     

<div class="row no-gutters">
  
   
  <!-- 
  <div class="col-lg-4">
    <a class="portfolio-item" href="/periodo">
      <div class="caption">
        <div class="caption-content">
          <div class="h2">PERIODOS</div>
          <p class="mb-0">Registra aquí Un Nuevo Periodo</p>
        </div>
      </div>
      <img class="img-fluid" src="/img/colegiofondo01.jpg" alt="">
    </a>
  </div>-->
</div>
</div>
@endsection
