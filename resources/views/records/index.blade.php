@extends('layouts.app')

@section('content')
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

@endsection

{{-- JS для обработки кнопки Edit --}}
@push('scripts')
    @include('records.partials.scripts.edit_modal')
@endpush


