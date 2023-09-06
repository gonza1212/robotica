<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="confirmDeleteModalLabel">Confirmar Acción</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="fs-5">¿Confirma que desea eliminar el robot <span id="robot_name_confirm_delete" class="fw-bold"></span> perteneciente a <span id="robot_school_confirm_delete" class="fw-bold"></span>?</p>
        <p class="text-muted">Para eliminarlo definitivamente deberá también borrarlo de la lista de robots eliminados.</p>
      </div>
      <div class="modal-footer">
        <form action="#" method="post" id="robot_form_confirm_delete">
          @csrf
          @method('delete')
          <input type="hidden" id="robot_id_confirm_delete" />
          <button type="submit" id="confirm_delete_robot_button" class="btn btn-danger">Sí, quiero borrarlo</button>
        </form>
      </div>
    </div>
  </div>
</div>