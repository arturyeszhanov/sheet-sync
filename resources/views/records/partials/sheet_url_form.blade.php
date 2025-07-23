<form action="{{ route('setSheetUrl') }}" method="POST" class="mb-4 d-flex gap-2 align-items-center">
        @csrf
        <input type="url" name="google_sheet_url" class="form-control" placeholder="Ссылка на Google Таблицу" required
               value="{{ $sheetUrl ?? '' }}">
        <button class="btn btn-outline-primary">Сохранить</button>
    </form>