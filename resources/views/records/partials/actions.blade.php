<div class="mb-3 d-flex gap-2">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Добавить запись</button>
        <form action="{{ route('generate') }}" method="POST" class="d-inline" id="generateForm">
            @csrf
            <button type="submit" class="btn btn-primary">Сгенерировать 1000 записей</button>
        </form>
        <form action="{{ route('clear') }}" method="POST" onsubmit="return confirm('Are you sure?');">
            @csrf
            <button class="btn btn-danger">Очистить таблицу</button>
        </form>
    </div>
    <div id="generateProgressWrapper" class="mt-3 mb-3" style="display: none;">
        <div class="progress" style="height: 8px;">
            <div id="generateProgressBar" class="progress-bar bg-primary" role="progressbar" style="width: 0%"></div>
        </div>
    </div>

