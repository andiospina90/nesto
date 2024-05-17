<div class="modal fade" id="confirmModal{{ $proyecto->id }}" tabindex="-1"
    aria-labelledby="confirmModalLabel{{ $proyecto->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="titulos" id="confirmModalLabel{{ $proyecto->id }}">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este proyecto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="button-login-register"
                    style="justify-content:center;" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('proyecto.destroy', $proyecto->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-secondary" id="button-login-register"
                        style="justify-content:center;">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
