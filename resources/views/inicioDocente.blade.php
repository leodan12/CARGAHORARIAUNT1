@extends('layouts.plantillaDocente')

@section('contenido')
<div class="container">
    <div class="content-section-heading text-center">
      <h3 class="text-secondary mb-0"> ✔ Elige una de las opciones disponibles para el docente ✔</h3>
      <br>
    </div>
    <div class="row row-cols-lg-1  no-gutters">
      <div class="col-12 col-md-4 ">
        <a class="portfolio-item" href="/horario">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">HORARIO SEMANAL</div>
              <p class="mb-0">Generar el horario semanal!</p>
            </div>
          </div>
          <img class="img-fluid" src="/img/matriculas.jpg" alt="">
        </a>
      </div>
      <div class="col-12 col-md-4 ">
        <a class="portfolio-item" href="/publicaciones">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">REPORTE CARGA-HORARIA</div>
              <p class="mb-0">Generar reporte de carga horaria!</p>
            </div>
          </div>
          <img class="img-fluid" src="/img/colegiofondo01.jpg" alt="">
        </a>
      </div>  
      <div class="col-12 col-md-4 ">
        <a class="portfolio-item" href="/responderencuestas">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">RESPONDER ENCUESTAS</div>
              <p class="mb-0">Responder encuestas disponibles aquí!</p>
            </div>
          </div>
          <img class="img-fluid" src="/img/colegiofondo01.jpg" alt="">
        </a>
      </div>  
    </div>
  <!--</div>-->

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
