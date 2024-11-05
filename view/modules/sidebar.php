  <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <p class="navbar-brand mx-auto mt-2 flex-fill text-center"><a href="<?php echo SERVERURL ?>general">
          <img id="logo" class="navbar-brand mx-auto mt-2 text-center" src="<?php echo SERVERURL ?>view/assets/images/logo.png" style="width: 50%; height: auto; object-fit: scale-down;" alt="">
        </a></p>
      </div>
      <p class="text-muted nav-heading mt-4 mb-1">
        <span>Certificados</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item w-100">
          <a class="nav-link" href="<?php echo SERVERURL?>general">
            <i class="fe fe-trello fe-16"></i>
            <span class="ml-3 item-text">Generales</span>
          </a>
        </li>
      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
        <span>Administrar</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item w-100">
          <a class="nav-link" href="<?php echo SERVERURL?>usuarios">
            <i class="fe fe-user fe-16"></i>
            <span class="ml-3 item-text">Usuarios</span>
          </a>
        </li>
        <li class="nav-item w-100">
          <a class="nav-link" href="<?php echo SERVERURL?>cursos">
            <i class="fe fe-book fe-16"></i>
            <span class="ml-3 item-text">Cursos</span>
          </a>
        </li>
      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
        <span>Archivos</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item w-100">
          <a class="nav-link" href="widgets.html">
            <i class="fe fe-upload fe-16"></i>
            <span class="ml-3 item-text">Subir Matriz</span>
          </a>
        </li>
        <li class="nav-item w-100">
          <a class="nav-link" href="<?php echo SERVERURL?>files">
            <i class="fe fe-download fe-16"></i>
            <span class="ml-3 item-text">Descargas</span>
          </a>
        </li>
      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
        <span>Configuraciones</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item w-100">
          <a class="nav-link" href="widgets.html">
            <i class="fe fe-upload fe-16"></i>
            <span class="ml-3 item-text">Certificados</span>
          </a>
        </li>
        <li class="nav-item w-100">
          <a class="nav-link" href="widgets.html">
            <i class="fe fe-download fe-16"></i>
            <span class="ml-3 item-text">Registros</span>
          </a>
        </li>
      </ul>
    </nav>
  </aside>
<?php 
?>