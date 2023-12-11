@extends('layouts/layoutMaster')

@section('title', 'Cursos')

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
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>@endsection

@section('page-script')
<script src="{{asset('assets/js/app-lista-cursos.js')}}"></script>
@if (session('swal'))
<script>
 Swal.fire(@json(session('swal')))
</script>
@endif
@endsection


@section('content')

<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Cursos Totales</span>
            <div class="d-flex align-items-center my-2">
              <h3 class="mb-0 me-2">{{$cursos->count()}}</h3>
              <p class="text-success mb-0">(+100%)</p>
            </div>
            <!--<p class="mb-0">Total cursos</p>-->
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
            <span>cursos Activos</span>
            <div class="d-flex align-items-center my-2">
              <h3 class="mb-0 me-2">{{$activos}}</h3>
              <p class="text-success mb-0">({{($activos*100)/$cursos->count()}}%)</p>
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
            <span>cursos Desactivos</span>
            <div class="d-flex align-items-center my-2">
              <h3 class="mb-0 me-2">{{$desactivos}}</h3>
              <p class="text-danger mb-0">({{($desactivos*100)/$cursos->count()}}%)</p>
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
    <table class="datatables-cursos table">
      <thead class="border-top">
        <tr>
          <th>#</th>
          <th>Nombre</th>
      
          <th>Codigo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cursos as $key => $data)
        <tr>
          <th>{{$key +1}}</th>
          <th>{{$data->nombre}}</th>
           <th>{{$data->codigo}}</th>
          <th><a href="javascript:;" class="text-body edit-record" data-bs-toggle="modal" data-bs-target="#EditarPrograma" data-ruta="{{ route('ObtenerPrograma', $data->id) }}"><i class="ti ti-edit ti-sm me-2"></i></a>
              <a href="javascript:;" class="text-body delete-record" data-ruta="{{ route('EliminarPrograma', $data->id) }}" data-token="{{ csrf_token() }}"><i class="ti ti-trash ti-sm mx-2"></i></a>
              <a href="{{ route('app-acceso-carpeta') }}" class="text-body"><i class="ti ti-archive ti-sm mx-2"></i></a>

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


@endsection
