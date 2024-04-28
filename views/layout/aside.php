        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="home" class="app-brand-link">              
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Repositorios</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="home" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>            

            <!-- Registro --> 
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Autores & Documentos</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Autores</div>
              </a>
              <ul class="menu-sub">                
                <li class="menu-item">
                  <a href="autor" class="menu-link">
                    <div data-i18n="Notifications">Registro</div>
                  </a>
                </li>                
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Authentications">Documentos</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="categoria" class="menu-link">
                    <div data-i18n="Basic">Categoría</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="documento" class="menu-link">
                    <div data-i18n="Basic">Registrar</div>
                  </a>
                </li>
              </ul>
            </li>            
          </ul>
        </aside>