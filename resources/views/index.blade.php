<!DOCTYPE html>
<html>
<head>
    <title>Записи</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Записи</h2>

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
        @endpush

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>







