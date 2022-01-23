@extends('layouts.plantillaAdministrador')

@section('contenido')
<div class="container">
    <div class="content-section-heading text-center">
      <h3 class="text-secondary mb-0">✔ Elige una de las opciones disponibles para el administrador</h3>
      <br>
    </div>
    <div class="row no-gutters">

      <div class="col-12 col-sm-6 col-md-4">
        <a class="portfolio-item" href="/users">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">USUARIOS</div>
              <p class="mb-0">Gestionar los usuarios</p>
            </div>
          </div>
          <img class="img-fluid" src="/img/matriculas.jpg" alt="">
        </a>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <a class="portfolio-item" href="/perfiles">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">ROLES</div>
              <p class="mb-0">Gestionar los roles</p>
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
              <p class="mb-0">Gestionar la opcion 3</p>
            </div>
          </div>
          <img class="img-fluid" src="/img/ALUMNOS.jpg" alt="">
        </a>
      </div>
    
     
    <!--<div class="row no-gutters">-->
      <div class="col-12 col-sm-6 col-md-4">
        <a class="portfolio-item" href="/catedra">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">OPCION 3</div>
              <p class="mb-0">Gestionar la opcion 3</p>
             
            </div>
          </div>
            <img class="img-fluid" src="/img/CATEDRA.jpg" alt="">
          </a>
        </div>

      <div class="col-12 col-sm-6 col-md-4">
          <a class="portfolio-item" href="/profesor">
            <div class="caption">
              <div class="caption-content"> 
                <div class="h2">OPCION 3</div>
              <p class="mb-0">Gestionar la opcion 3</p>
            </div>
            </div>
            <img class="img-fluid" src="/img/ALUMNOSS.jpg" alt="">
          </a>
      </div>

      <div class="col-12 col-sm-6 col-md-4">
          <a class="portfolio-item" href="/seccion">
            <div class="caption">
              <div class="caption-content">
                <div class="h2">OPCION 3</div>
                <p class="mb-0">Gestionar la opcion 3</p>
              </div>
            </div>
            <img class="img-fluid" src="/img/SECCIONES.jpg" alt="">
          </a>
      </div>

  
      <div class="col-12 col-sm-6 col-md-4">
        <a class="portfolio-item" href="/periodo">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">OPCION 3</div>
              <p class="mb-0">Gestionar la opcion 3</p>
            </div>
          </div>
          <img class="img-fluid" src="/img/PERIODO.jpg" alt="">
        </a>
      </div>

      <div class="col-12 col-sm-6 col-md-4">
        <a class="portfolio-item" href="/curso">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">OPCION 3</div>
              <p class="mb-0">Gestionar la opcion 3</p>
            </div>
          </div>
          <img class="img-fluid" src="/img/CURSOS.jpg" alt="">
        </a>
      </div>
      <div class="col-3 d-md-none">

      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <a class="portfolio-item" href="/capacidad">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">OPCION 3</div>
              <p class="mb-0">Gestionar la opcion 3</p>
            </div>
          </div>
          <img class="img-fluid" src="/img/CAPACIDADES.jpg" alt="">
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
