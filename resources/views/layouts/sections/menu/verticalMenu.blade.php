@php
$configData = Helper::appClasses();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  @if(!isset($navbarFull))
  <div class="app-brand demo">
    <a href="{{url('/')}}" class="app-brand-link">
      <span class="app-brand-logo demo">
        @include('_partials.macros',["height"=>20])
      </span>
      <span class="app-brand-text demo menu-text fw-bold">{{config('variables.templateName')}}</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
  </div>
  @endif


  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1 overflow-auto">
    
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="http://continental.test/dashboard" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>Home</div>
              </a>

      
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="app/acceso-usuarios" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div>Usuarios</div>
              </a>

      
          </li>
 
           
    
          <li class="menu-item ">
      <a href="http://continental.test/app/acceso-roles" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file"></i>
                <div>Roles</div>
              </a>

      
          </li>  
       

    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-book"></i>
                <div>Programas &amp; Period.</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="http://continental.test/app/acceso-programas" class="menu-link">
                    <div>Programas</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="http://continental.test/app/acceso-temporadas" class="menu-link">
                    <div>Periodos</div>
        </a>

        
              </li>
      </ul>
          </li>
        

    
    <li class="menu-item ">
      <a href="http://continental.test/app/acceso-produccion" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file"></i>
                <div>Producción General</div>
              </a>

      
          </li>





          </ul>

</aside>