<!-- Add Role Modal -->
<div class="modal fade" id="EditarUsuario" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-editar-Usuario">
    <div class="modal-content p-3 p-md-5">
      <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body">
        <div class="text-center mb-4">
          <h3 class="role-title mb-2">Editar Usuario</h3>
          <!--<p class="text-muted">Set role permissions</p>-->
        </div>
        <!-- Add role form -->
        <form id="editarUsuario" class="row g-3"  method="post" action="{{ route('EditarUsuario') }}" data-token="{{ csrf_token() }}">
          @csrf
          <input type="hidden" id="id" name="id">
          <div class="col-12 col-md-6">
            <label class="form-label" for="editar_nombre">Nombre del Usuario (*):</label>
            <input type="text" id="editar_nombre" name="editar_nombre" class="form-control" placeholder="Ingrese el nombre" tabindex="-1" required/>
          </div>
  
          <div class="col-12 mb-4">
            <label class="form-label" for="visible">Visible :</label>
            <label class="switch switch-primary">
              <input type="checkbox" id="visible" name="visible" class="switch-input" checked />
              <span class="switch-toggle-slider"><span class="switch-on"><i class="ti ti-check"></i></span><span class="switch-off"><i class="ti ti-x"></i></span>
              </span>
            </label>
          </div>
          <div id="error" class="alert alert-danger text-danger"></div>
          <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
          </div>
        </form>
        <!--/ Add role form -->
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const editarUsuarioModal = document.getElementById("EditarUsuario");
  const formulario = editarUsuarioModal.querySelector("#editarUsuario");
  const mensajeerror = formulario.querySelector("#error");
  const token = formulario.getAttribute('data-token');
  formulario.addEventListener("submit", function(event) {
      event.preventDefault();
      const formData = {
        'id': formulario.querySelector("#id").value,
        'nombres': formulario.querySelector("#editar_nombre").value,
      
        'visible': formulario.querySelector("#visible").checked
      }
      $.ajax({
          url: formulario.getAttribute("action"),
          type: "post",
          data: formData,
          headers: {
              'X-CSRF-TOKEN': token
          },
          success: function (response) {
            if(response){
              localStorage.setItem('guardado', 'true');
              location.reload();
            }
          },
          error: function (jqXHR, status, error) {
            var errors='';
            $.each(jqXHR.responseJSON.errors, function(key,value) {
              errors += '* ' + value + '</br>';
            });
            mensajeerror.style.display="block";
            mensajeerror.innerHTML = errors;
          }
        });
    });
});
</script>
<!--/ Add Role Modal -->
