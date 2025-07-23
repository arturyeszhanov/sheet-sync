<div class="mb-4 d-flex gap-2 align-items-center">
    <form action="{{ route('setSheetUrl') }}" method="POST" class="d-flex gap-2 flex-grow-1">
        @csrf
        <input type="url" name="google_sheet_url" class="form-control" placeholder="Ссылка на Google Таблицу" required
               value="{{ $sheetUrl ?? '' }}">
        <button type="submit" class="btn btn-outline-primary">Сохранить</button>
    </form>

    @if(!empty($sheetUrl))
        <form action="{{ route('deleteSheetUrl') }}" method="POST" onsubmit="return confirm('Удалить ссылку?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Удалить</button>
        </form>
    @endif
</div>
