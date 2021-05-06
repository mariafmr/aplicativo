<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/plan-emergencias-unimar') }}" class="brand-link">
    <img src="/static/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">PÁGINA-PRINCIPAL</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/static/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ url('/administrador') }}" class="d-block"> {{ Auth::user()->email }}</a>
      </div>
    
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="../../index.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../index2.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
              </a>
            </li>
          </ul>
        </li> 
    {{--  RECURSOS  <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-table"></i>
            <p>
              Requisitos-Generales
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/administrador/requisitos') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Requisitos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/administrador/marcoLegal') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Marco-Legal</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/administrador/normasTecnicas') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Normas-Técnicas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/administrador/normasReferencia') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Normas-Referencia</p>
              </a>
            </li>
          </ul>
        </li>--}}
        
       {{-- <li class="nav-item">
          <a href="../widgets.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Widgets
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Layout Options
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="../layout/top-nav.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Top Navigation</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../layout/top-nav-sidebar.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Top Navigation + Sidebar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../layout/boxed.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Boxed</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../layout/fixed-sidebar.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fixed Sidebar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../layout/fixed-sidebar-custom.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fixed Sidebar <small>+ Custom Area</small></p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../layout/fixed-topnav.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fixed Navbar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../layout/fixed-footer.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fixed Footer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../layout/collapsed-sidebar.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Collapsed Sidebar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Charts
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="../charts/chartjs.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>ChartJS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../charts/flot.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Flot</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../charts/inline.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Inline</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../charts/uplot.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>uPlot</p>
              </a>
            </li>
          </ul>
        </li>--}}


      <!--ANALISIS-VULNERABILIDAD-->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="fab fa-accusoft"></i>
          <p>
            Análisis-Vulnerabilidad
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ url('/administrador/titulos-analisis-vulnerabilidad') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Título-Análisis-Vulner</p> 
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/administrador/titulos-amenazas') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Títulos-Amenazas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/administrador/amenazas') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Identificación-Amenazas</p>
            </a>
          </li>
       {{--  <li class="nav-item">
            <a href="{{ url('/administrador/descripcion-planta') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Descripción-Plan-Física</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/administrador/lineas-vitales') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Descripción-Lineas-Vitales</p>
            </a>
          </li>--}} 
      {{--  </ul>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-circle nav-icon"></i>
              <p>
                Amenazas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a> 
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/administrador/titulos-amenazas') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Títulos-Amenazas</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/administrador/amenazas') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Identificación-Amenazas</p>
                </a>
              </li>
            </ul>
          {{-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/administrador/amenazas') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Valoración-Amenazas</p>
                </a>
              </li>
            </ul>
          </li> 
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/administrador/titulo-analisis-vulnerabilidad') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Priorización-Amenazas</p> 
              </a>
            </li>
          </ul>--}} 
        </ul>
      </li>
      <!--ANALISIS-VULNERABILIDAD-->


      <!--RECURSOS DEL PLAN DE PREVENCIÓN, PREPARACIÓN Y RESPUESTA ANTE EMERGENCIAS-->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-users"></i>
            <p>
              Recursos-Plan-Emergencia
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/administrador/titulos-recursos') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Titulo-Recursos-Plan</p> 
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/administrador/titulos-talento-humano') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Talento-Humano</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/administrador/cargos') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Oficios-Empresa</p>
              </a>
            </li>
           {{-- <li class="nav-item">
              <a href="{{ url('/administrador/comite-emergencia') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Comité-Emergencia</p>
              </a>
            </li>--}}
            <li class="nav-item">
              <a href="{{ url('/administrador/brigada-emergencia') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Brigada-Emergencia</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/administrador/organismos-socorro') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lista-Organismos-Socorro</p>
              </a>
            </li>
          </ul>
        {{-- <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-circle nav-icon"></i>
                <p>
                  Personal-Asignado
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a> 
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/administrador/titulo-talento-humano') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Talento-Humano</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/administrador/comite-emergencia') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Comité-Emergencia</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/administrador/brigada-Emergencia') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Brigada-Emergencia</p>
                  </a>
                </li>
              </ul>
            </li> 
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-circle nav-icon"></i>
                <p>
                  Inventario-Recursos
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/administrador/recursos-fisicos') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recursos-Internos</p>
                  </a>
                </li> 
                <li class="nav-item">
                  <a href="{{ url('/administrador/organismoSocorro') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lista-Organismos-Socorro</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>--}} 
        </li>
        <!--RECURSOS DEL PLAN DE PREVENCIÓN, PREPARACIÓN Y RESPUESTA ANTE EMERGENCIAS-->

        <!--PLAN DE EVACUACIÓN-->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-th-large"></i>
            <p>
              Plan-Evacuación
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/administrador/titulos-plan-evacuacion') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Titulo-Plan-Evacuación</p> 
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/administrador/fases-evacuacion') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fases-Plan-Evacuación</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/administrador/bloques') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bloques</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/administrador/puntos-encuentro') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Puntos-Encuentro</p>
              </a>
            </li>
          </ul>
        </li>
        <!--PLAN DE EVACUACIÓN-->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-calendar-alt"></i>
            <p>
              Eventos
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/administrador/titulos-eventos') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Títulos-Eventos</p> 
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/administrador/eventos-nuevos') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Eventos-Nuevos</p> 
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/administrador/eventos-antiguos') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Eventos-Antiguos</p> 
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/administrador/noticias') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Noticias</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-file-archive"></i>
            <p>
              Sistema-Archivos
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/administrador/categorias') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Categorías</p> 
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/administrador/archivos') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Archivos</p> 
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="{{ url('/administrador/usuarios') }}" class="nav-link">
            <i class="fas fa-user"></i>
            <p>
              USUARIOS
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/administrador/usuarios') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lista-Usuarios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../UI/icons.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lista-Tipos-Amenazas</p>
              </a>
            </li> 
          </ul>
        </li>
      
      
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


