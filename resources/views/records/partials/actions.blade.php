<div class="mb-3 d-flex gap-2">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Добавить запись</button>
        <form action="{{ route('records.generate') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-primary">Сгенерировать 1000 записей</button>
        </form>
        <form action="{{ route('records.clear') }}" method="POST" onsubmit="return confirm('Are you sure?');">
            @csrf
            <button class="btn btn-danger">Очистить таблицу</button>
        </form>
    </div>