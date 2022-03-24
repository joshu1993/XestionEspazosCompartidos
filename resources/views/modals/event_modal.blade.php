<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Datos del evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="id" class="bmd-label-floating">ID</label>
            <input type="text" name="id" id="id" class="form-control">
        </div>
        <div class="form-group">
            <label for="sala_id" class="bmd-label-floating">Sala</label>
            <input type="text" name="sala_id" id="sala_id" class="form-control" >
        </div>
        <div class="form-group">
            <label for="sala_id" class="bmd-label-floating">Nombre Usuario</label>
            <input type="text" name="user_id" id="user_id" class="form-control">
        </div>
        <div class="form-group">
            <label for="fecha" class="bmd-label-floating">Fecha</label>
            <input type="text" name="fecha" id="fecha" class="form-control">
        </div>
        <div class="form-group">
            <label for="titulo" class="bmd-label-floating">Titulo</label>
            <input type="text" name="titulo" id="titulo" class="form-control">
        </div>
        <div class="form-group"> 
            <label for="Hora" class="bmd-label-floating">Hora</label>
            <input type="text" name="hora" id="hora" class="form-control">
        </div>
        <div class="form-group">
            <label for="descripcion" class="bmd-label-floating">Descripcion</label>
            <textarea name="descripcion" id="descripcion" class="form-control" cols="20" rows="10"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button id="btnAgregar" class="btn btn-succes" >Agregar</button>
        <button id="btnModificar" class="btn btn-warning" >Modificar</button>
       <!-- <button id="btnBorrar" class="btn btn-danger" >Borrar</button>-->
        <button id="btnCancelar" class="btn btn-default" >Cancelar</button>
       
      </div>
    </div>
  </div>
</div>