@extends('layouts.app')

@section('content')
<div class="container">
        <h1 class="mb-4">Все записи</h1>

        <a href="{{ route('records.create') }}" class="btn btn-primary mb-3">Добавить</a>

        @if($records->isEmpty())
            <div class="alert alert-warning">Нет записей.</div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Текст</th>
                        <th>Статус</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->text }}</td>
                            <td>{{ $record->status }}</td>
                            <td>
                                <a href="{{ route('records.edit', $record->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                                <form action="{{ route('records.destroy', $record->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Удалить?')">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
