@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Temporadas')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<!--<script src="{{asset('assets/js/app-access-roles.js')}}"></script>-->
<!--<script src="{{asset('assets/js/modal-add-role.js')}}"></script>-->
<script src="{{asset('assets/js/modal-temporada.js')}}"></script>
@endsection

@section('content')
<h4 class="mb-4">Listado de periodos</h4>

<!--<p class="mb-4">A role provided access to predefined menus and features so that depending on <br> assigned role an administrator can have access to what user needs.</p>-->
<!-- Role cards -->
<div class="row g-4">
  @foreach($temporadas as $data)
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
              <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">

        </div>
        <div class="d-flex justify-content-between align-items-end mt-1">
          <div class="role-heading">
            <h4 class="mb-1">Periodo {{$data->nombre}}</h4>
            <div class="d-flex align-items-center">
              <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#EditarTemporada" data-ruta="{{ route('ObtenerTemporada', $data->id) }}" class="temporada_editar_modal"><i class="ti ti-edit ti-sm me-2"></i></a>
              
              <a  href="#" type="button" class="delete-button" data-ruta="{{ route('EliminarTemporada', $data->id) }}" data-token="{{ csrf_token() }}"><i class="ti ti-trash ti-sm mx-2"></i></a>
          
            </div>
          </div>
          <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <!--<div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h6 class="fw-normal mb-2">Total 7 users</h6>
          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Jimmy Ressula" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kristi Lawker" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kaith D'souza" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Danny Paul" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar">
            </li>
          </ul>
        </div>
        <div class="d-flex justify-content-between align-items-end mt-1">
          <div class="role-heading">
            <h4 class="mb-1">Manager</h4>
            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><span>Edit Role</span></a>
          </div>
          <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h6 class="fw-normal mb-2">Total 5 users</h6>
          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Andrew Tye" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Rishi Swaat" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/9.png') }}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Rossie Kim" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/12.png') }}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kim Merchent" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/10.png') }}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Sam D'souza" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/13.png') }}" alt="Avatar">
            </li>
          </ul>
        </div>
        <div class="d-flex justify-content-between align-items-end mt-1">
          <div class="role-heading">
            <h4 class="mb-1">Users</h4>
            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><span>Edit Role</span></a>
          </div>
          <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h6 class="fw-normal mb-2">Total 3 users</h6>
          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kim Karlos" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Katy Turner" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/9.png') }}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Peter Adward" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kaith D'souza" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/10.png') }}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Parker" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/11.png') }}" alt="Avatar">
            </li>
          </ul>
        </div>
        <div class="d-flex justify-content-between align-items-end mt-1">
          <div class="role-heading">
            <h4 class="mb-1">Support</h4>
            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><span>Edit Role</span></a>
          </div>
          <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h6 class="fw-normal mb-2">Total 2 users</h6>
          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kim Merchent" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/10.png') }}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Sam D'souza" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/13.png') }}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Nurvi Karlos" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Andrew Tye" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/8.png') }}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Rossie Kim" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{ asset('assets/img/avatars/9.png') }}" alt="Avatar">
            </li>
          </ul>
        </div>
        <div class="d-flex justify-content-between align-items-end mt-1">
          <div class="role-heading">
            <h4 class="mb-1">Restricted User</h4>
            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><span>Edit Role</span></a>
          </div>
          <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
        </div>
      </div>
    </div>
  </div>-->
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
            <button data-bs-target="#AgregarTemporada" data-bs-toggle="modal" class="btn btn-primary mb-2 text-nowrap add-nueva-temporada">Nuevo Periodo</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--<div class="col-12">
    Role Table
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="datatables-users table border-top">
          <thead>
            <tr>
              <th></th>
              <th>User</th>
              <th>Role</th>
              <th>Plan</th>
              <th>Billing</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
    Role Table
  </div>-->
</div>
<!--/ Role cards -->

<!-- Add Role Modal -->
@include('_partials/_modals_temporadas/agregar')
@include('_partials/_modals_temporadas/editar')
<!-- / Add Role Modal -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const NUevaTemporada = document.querySelector(".add-nueva-temporada");
    NUevaTemporada.addEventListener("click", function () {
        const agregarTemporadaModal = document.getElementById("AgregarTemporada");
        const error=agregarTemporadaModal.querySelector("#error");
        error.style.display = "none";
      });
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
  const guardadoexitoso = localStorage.getItem('guardado');
  if (guardadoexitoso === 'true') {
    Swal.fire({
      title: '¡Guardado exitoso!',
      text: 'La temporada se guardó correctamente.',
      icon: 'success',
      customClass: {
        confirmButton: 'btn btn-success'
      }
    });
    localStorage.removeItem('guardado');
  }
});
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const EditarTemporada = document.querySelectorAll(".temporada_editar_modal");
    EditarTemporada.forEach(function (button) {
      button.addEventListener("click", function () {
        const ruta = button.getAttribute("data-ruta");
        const editarTemporadaModal = document.getElementById("EditarTemporada");
        const error=editarTemporadaModal.querySelector("#error");
        error.style.display = "none";
        $.ajax({
          url: ruta,
          method: "GET",
          success: function (response) {
            editarTemporadaModal.querySelector("#id").value = response.data.id;
            editarTemporadaModal.querySelector("#editar_anio_inicio").value = response.data.anio_inicio;
            editarTemporadaModal.querySelector("#editar_anio_fin").value = response.data.anio_fin;
            editarTemporadaModal.querySelector("#visible").checked = (response.data.visible==1) ? true:false;
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
            text: 'La temporada esta a salvo :)',
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
      text: 'La temporada se borró correctamente.',
      icon: 'success',
      customClass: {
        confirmButton: 'btn btn-success'
      }
    });
    localStorage.removeItem('borrado');
  }
});
</script>
@endsection
