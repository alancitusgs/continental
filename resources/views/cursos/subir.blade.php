
@extends('layouts/layoutMaster')

@section('title', 'File upload - Forms')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/dropzone/dropzone.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/dropzone/dropzone.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/forms-file-upload.js')}}"></script>
@endsection



@section('content')

<div class="row g-4">

<div class="col-12">
    <div class="card">
      <h5 class="card-header">Subir archivos</h5>
      <div class="card-body">
        <form action="/upload" class="dropzone needsclick" id="dropzone-multi">
          <div class="dz-message needsclick">
          Suelte los archivos aquí o haga clic para cargarlos
          </div>
          <div class="fallback">
            <input name="file" type="file" />
          </div>
        </form>
      </div>
    </div>
  </div>


</div>

@endsection



