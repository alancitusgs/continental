@extends('layouts/layoutMaster')

@section('title', 'Programas')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-lista-programa.js')}}"></script>
@endsection

@section('content')

<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Programas Totales</span>
            <div class="d-flex align-items-center my-2">
              <h3 class="mb-0 me-2">{{$programas->count()}}</h3>
              <p class="text-success mb-0">(+100%)</p>
            </div>
            <!--<p class="mb-0">Total programas</p>-->
          </div>
          <div class="avatar">
            <span class="avatar-initial rounded bg-label-primary">
              <i class="ti ti-user ti-sm"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Programas Activos</span>
            <div class="d-flex align-items-center my-2">
              <h3 class="mb-0 me-2">{{$activos}}</h3>
              <p class="text-success mb-0">({{($activos*100)/$programas->count()}}%)</p>
            </div>
            <!--<p class="mb-0">Last week analytics </p>-->
          </div>
          <div class="avatar">
            <span class="avatar-initial rounded bg-label-danger">
              <i class="ti ti-user-plus ti-sm"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Programas Desactivos</span>
            <div class="d-flex align-items-center my-2">
              <h3 class="mb-0 me-2">{{$desactivos}}</h3>
              <p class="text-danger mb-0">({{($desactivos*100)/$programas->count()}}%)</p>
            </div>
            <!--<p class="mb-0">Last week analytics</p>-->
          </div>
          <div class="avatar">
            <span class="avatar-initial rounded bg-label-success">
              <i class="ti ti-user-check ti-sm"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-datatable table-responsive">
    <table class="datatables-programas table">
      <thead class="border-top">
        <tr>
          <th>#</th>
          <th>Nombre</th>
      
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($programas as $key => $data)
        <tr>
          <th>{{$key +1}}</th>
          <th>{{$data->nombre}}</th>
           <th><span class="badge {{$data->estado == 'Activo' ? 'bg-label-success' : ($data->estado == 'Desactivo' ? 'bg-label-danger' : '')}}">{{$data->estado}}</span></th>
          <th><a href="javascript:;" class="text-body edit-record" data-bs-toggle="modal" data-bs-target="#EditarPrograma" data-ruta="{{ route('ObtenerPrograma', $data->id) }}"><i class="ti ti-edit ti-sm me-2"></i></a>
              <a href="javascript:;" class="text-body delete-record" data-ruta="{{ route('EliminarPrograma', $data->id) }}" data-token="{{ csrf_token() }}"><i class="ti ti-trash ti-sm mx-2"></i></a>
          </th>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--<script>
//obtener iniciales
function ObtenerIniciales(palabra) {
  var $output=null;
  var stateNum = Math.floor(Math.random() * 6);
  var states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
  var $state = states[stateNum],
    $name = nombre,
    $initials = $name.match(/\b\w/g) || [];
    $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
    $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
  var $row_output ='<div class="d-flex justify-content-start align-items-center user-name">' +
    '<div class="avatar-wrapper">' +
    '<div class="avatar me-3">' +
      $output +
    '</div>' +
    '</div>'
    '</div>';
  return $row_output;
}

</script>-->
@include('_partials/_modals_programas/agregar')
@include('_partials/_modals_programas/editar')
<script>
  document.addEventListener("DOMContentLoaded", function () {
  const guardadoexitoso = localStorage.getItem('guardado');
  if (guardadoexitoso === 'true') {
    Swal.fire({
      title: '¡Guardado exitoso!',
      text: 'El programa se guardó correctamente.',
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
    const EditarPrograma = document.querySelectorAll(".edit-record");
    EditarPrograma.forEach(function (button) {
      button.addEventListener("click", function () {
        const ruta = button.getAttribute("data-ruta");
        const editarProgramaModal = document.getElementById("EditarPrograma");
        const error=editarProgramaModal.querySelector("#error");
        error.style.display = "none";
        $.ajax({
          url: ruta,
          method: "GET",
          success: function (response) {
            editarProgramaModal.querySelector("#id").value = response.data.id;
            editarProgramaModal.querySelector("#editar_nombre").value = response.data.nombre;
         //   editarProgramaModal.querySelector("#editar_id_temporada").value = response.data.id_temporada;
            editarProgramaModal.querySelector("#visible").checked = (response.data.visible==1) ? true:false;
          }
        });
      });
    });
  });
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const deleteButtons = document.querySelectorAll('.delete-record');

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
            text: 'El programa esta a salvo :)',
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
      text: 'El programa se borró correctamente.',
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
