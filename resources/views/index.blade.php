<!DOCTYPE html>
<html>
<head>
    <title>Записи</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <div class="text-center p-4 bg-light">
            <h1 class="mb-4">Синхронизация с Google Таблицей</h1>
            <p class="mb-4 text-muted">Запустите команду fetch и выберите количество строк.</p>

            <div class="d-flex justify-content-center align-items-center gap-3">
                <div class="me-4">
                    <a href="{{ url('/fetch') }}" target="_blank" class="btn btn-primary">
                        Запустить fetch (все строки)
                    </a>
                </div>

                <div class="d-flex justify-content-center align-items-center gap-2">
                    <label for="fetch-count" class="form-label mb-0">Количество строк:</label>
                    <select id="fetch-count" class="form-select w-auto">
                        @foreach([20, 40, 60, 80, 100] as $count)
                            <option value="{{ $count }}">{{ $count }}</option>
                        @endforeach
                    </select>

                    <button onclick="openFetchTab()" class="btn btn-success">
                        Запустить fetch с лимитом
                    </button>
                </div>
            </div>
        </div>
        <hr class="my-4">

        <h3 class="mb-4">Записи</h3>

        {{-- Сообщения об успехе --}}
        @include('records.partials.success')
        
        {{-- Кнопки действий --}}
        @include('records.partials.actions')
        
        {{-- Форма ввода URL Google Sheets --}}
        @include('records.partials.sheet_url_form')

        {{-- Таблица записей --}}
        @include('records.partials.records_table')
    </div>

        {{-- Модальное окно: Добавить запись --}}
        @include('records.partials.modals.add')

        {{-- Модальное окно: Редактировать запись --}}
            @include('records.partials.modals.edit')

        {{-- JS для обработки кнопки Edit --}}
        @push('scripts')
            @include('records.partials.scripts.edit_modal')
            @include('records.partials.scripts.success_toast_animation')
            @include('records.partials.scripts.progressbar_animation')
        @endpush

    <script>
        function openFetchTab() {
            const count = document.getElementById('fetch-count').value;
            const url = `/fetch/${count}`;
            window.open(url, '_blank');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>







