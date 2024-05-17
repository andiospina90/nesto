<!-- resources/views/modals/nueva_tarea.blade.php -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="titulos" id="exampleModalLabel2">Nueva Tarea</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('tareas.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la Tarea</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="prioridad" class="form-label">Prioridad</label>
                        <select class="form-select" id="prioridad" name="prioridad" required>
                            <option value="1">Baja</option>
                            <option value="2" selected>Media</option>
                            <option value="3">Alta</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="prioridad" class="form-label">Colaborador</label>
                        <select class="form-select" id="id_colaborador" name="id_colaborador">
                            <option value="" disabled selected>Selecciona un colaborador</option>
                            @foreach ($colaboradores as $colaborador)
                                <option value="{{ $colaborador->id }}">{{ $colaborador->name }}
                                    {{ $colaborador->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="prioridad" class="form-label">Estado</label>
                        <select class="form-select" id="estado" name="estado" required>
                            <option value="0" selected>Pendiente</option>
                            <option value="1" >Activa</option>
                            <option value="2">Terminada</option>
                        </select>
                    </div>
                    <input type="hidden" name="id_proyecto" value="{{ $proyecto->id }}">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" id="button-login-register">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="button-login-register">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
