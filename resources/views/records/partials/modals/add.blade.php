<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('records.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Добавить запись</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="add-text" class="form-label">Текст</label>
                    <input type="text" class="form-control" name="text" id="add-text" required>
                </div>
                <div class="mb-3">
                    <label for="add-status" class="form-label">Статус</label>
                    <select class="form-select" name="status" id="add-status" required>
                        <option value="Allowed">Allowed</option>
                        <option value="Prohibited">Prohibited</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
</div>