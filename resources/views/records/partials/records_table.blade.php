<table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Текст</th>
                <th>Статус</th>
                <th style="width: 150px;">Операции</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($records as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->text }}</td>
                    <td>
                        <span class="badge {{ $record->status === 'Allowed' ? 'bg-success' : 'bg-danger' }}">
                            {{ $record->status }}
                        </span>
                    </td>
                    <td>
                        <button
                            type="button"
                            class="btn btn-sm btn-primary edit-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal"
                            data-id="{{ $record->id }}"
                            data-text="{{ $record->text }}"
                            data-status="{{ $record->status }}"
                        >
                            Edit
                        </button>

                        <form action="{{ route('records.destroy', $record->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Delete this record?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-muted">Записей не найдено.</td></tr>
            @endforelse
        </tbody>
    </table>