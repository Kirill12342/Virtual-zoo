<!-- resources/views/cages/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Клетки</h1>
        @auth
            <a href="{{ route('cages.create') }}" class="btn btn-primary">Добавить клетку</a>
        @endauth
    </div>
    <p class="text-center">В зоопарке на данный момент проживают {{ $animalCount }} животных.</p>
    <div class="row">
        @foreach($cages as $cage)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cage->name }}</h5>
                        <p class="card-text">Вместимость: {{ $cage->capacity }}</p>
                        <a href="{{ route('cages.show', $cage->id) }}" class="btn btn-info">Просмотр</a>
                        @auth
                            <a href="{{ route('cages.edit', $cage->id) }}" class="btn btn-warning">Редактировать</a>
                            <form action="{{ route('cages.destroy', $cage->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить эту клетку?')">Удалить</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Модальное окно для подтверждения удаления -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Подтверждение удаления</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Вы уверены, что хотите удалить эту клетку?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <form id="deleteForm" action="" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var action = "{{ route('cages.destroy', '') }}/" + id;
            $('#deleteForm').attr('action', action);
        });
    </script>
@endsection