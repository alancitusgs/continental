@extends('layouts/layoutMaster')

@section('title', 'Cupos - Sponsors')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/autosize/autosize.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/js/forms-selects.js')}}"></script>
@endsection



@section('content')

<div class="row">
  <!-- Input Mask -->
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-body">
      <form class="row g-3" method="post" action="{{ route('produccion.store') }}">
      @csrf
          <div id="datos_prospecto" class="row">
            <h2>Datos del curso</h2>

            <div class="col-xl-4 col-md-4 col-sm-12 mb-4">
              <label class="form-label" for="nombres">Código (*):</label>
              <input type="text" id="codigo_asignatura" name="codigo_asignatura" class="form-control" placeholder="Codigo" required/>
            </div>

            <div class="col-xl-4 col-md-4 col-sm-12 mb-4">
              <label class="form-label" for="nombres">Asignatura (*):</label>
              <input type="text" id="nombre_curso" name="nombre_curso" class="form-control" placeholder="Nombre del curso" required/>
            </div>

            <div class="col-xl-4 col-md-4 col-sm-12 mb-4">
              <label class="form-label" for="nivel_ingles">EAP:</label>
              <select id="eap" name="eap" class="select2 form-select" data-allow-clear="true" required>
                <option value="">Selecccione</option>
                <option value="Transversal ING">Transversal ING</option>  
                <option value="Enfermería">Enfermería</option>
              </select>
            </div>

            <div class="col-xl-4 col-md-4 col-sm-12 mb-4">
              <label class="form-label" for="nivel_ingles">Facultad:</label>
              <select id="tipo_diseno" name="tipo_diseno" class="select2 form-select" data-allow-clear="true" required>
                <option value="">Seleccione</option>
                <option value="Evaluados (IA)"> Evaluados (IA)</option>
               </select>
            </div>
        
  
            <div class="col-xl-4 col-md-4 col-sm-12 mb-4">
              <label class="form-label" for="nivel_ingles">Plan(*):</label>
              <select id="plan" name="plan" class="select2 form-select" data-allow-clear="true" required>
                <option value="">Selecccione</option>
                <option value="2023">2023</option>  
                <option value="2024">2024</option>
              </select>
            </div>


            <div class="col-xl-4 col-md-4 col-sm-12 mb-4">
              <label class="form-label" for="nivel_ingles">Tipo Asignatura</label>
              <select id="tipo_asignatura" name="tipo_asignatura" class="select2 form-select" data-allow-clear="true" required>
                <option value="">Selecccione</option>
                <option value="E">E</option> 
                <option value="T">T</option>  
                <option value="G">G</option>  
              </select>
            </div>

    
            <div class="col-xl-4 col-md-4 col-sm-12 mb-4">
                <label for="select2Primary" class="form-label">Ciclo:</label>
            <div class="select2-primary">
              <select id="ciclo" name="ciclo" class="select2 form-select" multiple>
                <option value="">Selecccione</option>
                <option value="1">1</option>  
                <option value="2">2</option> 
                <option value="3">3</option> 
                <option value="4">4</option> 
                <option value="5">5</option> 
                <option value="6">6</option> 
                <option value="7">7</option> 
                <option value="8">8</option> 
                <option value="9">9</option> 
                <option value="10">10</option> 
                <option value="11">11</option> 
                <option value="12">12</option> 
              </select>
            </div>
            </div>

            <div class="col-xl-4 col-md-4 col-sm-12 mb-4">
              <label class="form-label" for="nivel_ingles">Modalidad:</label>
              <select id="modalidad" name="modalidad" class="select2 form-select" data-allow-clear="true" required>
                <option value="">Selecccione</option>
                <option value="1">Presencial</option>
                <option value="2">Semipresencial</option>
                <option value="3">A distancia</option>    
                <option value="4">Presencial y A distancia</option>
                <option value="5">Semipresencial y A distancia</option>
                <option value="6">Presencial y semipresencial</option>
                <option value="7">Presencial, semipresencial y A distancia</option>
              </select>
            </div>
        
 
             
            <div class="col-xl-4 col-md-4 col-sm-12 mb-4">
              <label class="form-label" for="nivel_ingles">Formato P:</label>
              <select id="formato_p" name="formato_p" class="select2 form-select" data-allow-clear="true" required>
                <option value="">Selecccione</option>
                <option value="Presencial">Presencial</option>
                <option value="No aplica">No aplica</option>
               </select>
            </div>

            
            <div class="col-xl-4 col-md-4 col-sm-12 mb-4">
              <label class="form-label" for="nivel_ingles">Formato SP:</label>
              <select id="formato_sp" name="formato_sp" class="select2 form-select" data-allow-clear="true" required>
                <option value="">Selecccione</option>
                <option value="Virtual">Virtual</option>
                <option value="Blended">Blended</option>
                <option value="No aplica">No aplica</option>
               </select>
            </div>

            <div class="col-xl-4 col-md-4 col-sm-12 mb-4">
              <label class="form-label" for="nivel_ingles">Formato D:</label>
              <select id="formato_sp" name="formato_sp" class="select2 form-select" data-allow-clear="true" required>
                <option value="">Selecccione</option>
                <option value="Virtual">Virtual</option>
                <option value="No aplica">No aplica</option>
               </select>
            </div>

            <div class="col-xl-4 col-md-4 col-sm-12 mb-4">
              <label class="form-label" for="duracion_p">Duración semana P:</label>
              <input type="text" id="duracion_p" name="duracion_p" class="form-control"/>
            </div>

            
            <div class="col-xl-4 col-md-4 col-sm-12 mb-4">
              <label class="form-label" for="duracion_sp">Duración semana SP:</label>
              <input type="text" id="duracion_sp" name="duracion_sp" class="form-control" />
            </div>

            <div class="col-xl-4 col-md-4 col-sm-12 mb-4">
              <label class="form-label" for="nivel_ingles">Duración semana D:</label>
              <input type="text" id="duracion_d" name="duracion_d" class="form-control" />
            </div>
         
          <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
        
          </div>
        </form>
        
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#codigo_asignatura').on('input', function () {
            var codigoAsignatura = $(this).val();

            // Realizar la solicitud AJAX
            $.ajax({
                type: 'GET',
                url: '/app/buscar-curso',
                data: { codigo_asignatura: codigoAsignatura },
                success: function (response) {
                    $('#nombre_curso').val(response.nombre_curso);
                },
                error: function () {
                    $('#nombre_curso').val('Error al buscar el curso');
                }
            });
        });
    });
</script>
@endsection
