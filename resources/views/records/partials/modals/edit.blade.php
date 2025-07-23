<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="edit-form" method="POST" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Редактировать запись</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="edit-id">
                <div class="mb-3">
                    <label for="edit-text" class="form-label">Текст</label>
                    <input type="text" class="form-control" name="text" id="edit-text" required>
                </div>
                <div class="mb-3">
                    <label for="edit-status" class="form-label">Статус</label>
                    <select class="form-select" name="status" id="edit-status" required>
                        <option value="Allowed">Allowed</option>
                        <option value="Prohibited">Prohibited</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            </div>
        </form>
    </div>
</div>