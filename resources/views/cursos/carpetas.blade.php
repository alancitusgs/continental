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

  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
              <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">

        </div>
        <div class="d-flex justify-content-between align-items-end mt-1">
          <div class="role-heading">
            <h4 class="mb-1">ENTREGABLES DI</h4>
            <div class="d-flex align-items-center">
              
              <a  href="#" type="button" class="delete-button" ><i class="ti ti-file-arrow-right ti-sm mx-2"></i></a>
          
            </div>
          </div>
       
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
              <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">

        </div>
        <div class="d-flex justify-content-between align-items-end mt-1">
          <div class="role-heading">
            <h4 class="mb-1">VALIDADOS</h4>
            <div class="d-flex align-items-center">
              
              <a  href="#" type="button" class="delete-button" ><i class="ti ti-file-arrow-right ti-sm mx-2"></i></a>
          
            </div>
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



@endsection
