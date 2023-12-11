@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Roles')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
@endsection

@section('page-script')
<!--<script src="{{asset('assets/js/app-access-roles.js')}}"></script>-->
<!--<script src="{{asset('assets/js/modal-add-role.js')}}"></script>-->
@endsection

@section('content')
<h4 class="mb-4">Listado de Roles</h4>

<!--<p class="mb-4">A role provided access to predefined menus and features so that depending on <br> assigned role an administrator can have access to what user needs.</p>-->
<!-- Role cards -->
<div class="row g-4">
  @foreach($roles as $data)
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h6 class="fw-normal mb-2">Total {{$data->usuarios->count()}} usuarios</h6>
          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
            @if($data->usuarios->count()<=5)
                @foreach($data->usuarios as $usuario)
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{$usuario->nombres}}" class="avatar avatar-sm pull-up">
                        <img class="rounded-circle" src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar">
                    </li>
                @endforeach
            @else
                @foreach($data->usuarios as $key => $usuario)
                  @if($key < 5)
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{$usuario->nombres}}" class="avatar avatar-sm pull-up">
                        <img class="rounded-circle" src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar">
                      </li>
                  @endif
                @endforeach
                  <span class="avatar-initial rounded-circle pull-up" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$data->usuarios->count() - 5}} mas">+ {{$data->usuarios->count() - 5}}</span>
            @endif
          </ul>
        </div>
        <div class="d-flex justify-content-between align-items-end mt-1">
          <div class="role-heading">
            <h4 class="mb-1">{{$data->nombre}}</h4>
            <div class="d-flex align-items-center">
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#EditarRol" data-ruta="{{ route('ObtenerRol', $data->id) }}" class="role-edit-modal"><i class="ti ti-edit ti-sm me-2"></i></a>
                @if($data->usuarios->count()==0)
                <a  href="#" type="button" class="delete-button" data-ruta="{{ route('EliminarRol', $data->id) }}" data-token="{{ csrf_token() }}"><i class="ti ti-trash ti-sm mx-2"></i></a>
                @endif
            </div>
          </div>
          <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card h-100">
      <div class="row h-100">
        <div class="col-sm-5">
          <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
            <img src="{{ asset('assets/img/illustrations/add-new-roles.png') }}" class="img-fluid mt-sm-4 mt-md-0" alt="add-new-roles" width="83">
          </div>
        </div>
        <div class="col-sm-7">
          <div class="card-body text-sm-end text-center ps-sm-0">
            <button data-bs-target="#AgregarRol" data-bs-toggle="modal" class="btn btn-primary mb-2 text-nowrap add-nuevo-rol">Nuevo Rol</button>
            <p class="mb-0 mt-1">Agregar nuevo rol, si no existe</p>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!--/ Role cards -->

<!-- Add Role Modal -->
@include('_partials/_modals_roles/agregar')
@include('_partials/_modals_roles/editar')

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const NuevoRol = document.querySelector(".add-nuevo-rol");
      NuevoRol.addEventListener("click", function () {
        const editarRolModal = document.getElementById("AgregarRol");
        const error=editarRolModal.querySelector("#error");
        error.style.display = "none";
      });
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const EditarRol = document.querySelectorAll(".role-edit-modal");
    EditarRol.forEach(function (button) {
      button.addEventListener("click", function () {
        const ruta = button.getAttribute("data-ruta");
        const editarRolModal = document.getElementById("EditarRol");
        const error=editarRolModal.querySelector("#error");
        error.style.display = "none";
        $.ajax({
          url: ruta,
          method: "GET",
          success: function (response) {
            editarRolModal.querySelector("#id").value = response.data.id;
            editarRolModal.querySelector("#nombre").value = response.data.nombre;
            editarRolModal.querySelector("#visible").checked = (response.data.visible==1) ? true:false;
          }
        });
      });
    });
  });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const deleteButtons = document.querySelectorAll('.delete-button');

  deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
      const ruta = button.getAttribute('data-ruta');
      const token = button.getAttribute('data-token');

      Swal.fire({
        title: '¿Estas seguro de borrar?',
        text: "¡No podras revertir esta acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: '¡Si, borrar!',
        customClass: {
          confirmButton: 'btn btn-primary me-3',
          cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
      }).then(function (confirmacion) {
        if(confirmacion.isConfirmed){
          fetch(ruta, {
            method: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': token
            }
          })
          .then(response => {
            if(response){
              localStorage.setItem('borrado', 'true');
              location.reload();
            }else{
              Swal.fire({
              title: '¡Ups!',
              text: ' Algo salió mal en el proceso',
              icon: 'question',
              customClass: {
                confirmButton: 'btn btn-primary'
              },
            buttonsStyling: false
            });
            }
          })
          .catch(error => {
            Swal.fire({
            title: '¡Ups!',
            text: ' Algo salió mal en el proceso',
            icon: 'question',
            customClass: {
              confirmButton: 'btn btn-primary'
            },
            buttonsStyling: false
            });
          });
        }else{
          Swal.fire({
            title: '¡Cancelado!',
            text: 'El rol esta a salvo :)',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      })
    });
  });
  const borradoexitoso = localStorage.getItem('borrado');
  if (borradoexitoso === 'true') {
    Swal.fire({
      title: '¡Borrado exitoso!',
      text: 'El rol se borró correctamente.',
      icon: 'success',
      customClass: {
        confirmButton: 'btn btn-success'
      }
    });
    localStorage.removeItem('borrado');
  }
});
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
  const guardadoexitoso = localStorage.getItem('guardado');
  if (guardadoexitoso === 'true') {
    Swal.fire({
      title: '¡Guardado exitoso!',
      text: 'El rol se guardó correctamente.',
      icon: 'success',
      customClass: {
        confirmButton: 'btn btn-success'
      }
    });
    localStorage.removeItem('guardado');
  }
});
</script>
<!-- / Add Role Modal -->
@endsection
