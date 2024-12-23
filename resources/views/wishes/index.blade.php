@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Мои желания</h1>
        
        <a href="{{ route('wishes.create') }}" class="btn btn-primary">Создать желание</a>
        
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wishes as $wish)
                    <tr>
                        <td>{{ $wish->title }}</td>
                        <td>
                            <a href="{{ route('wishes.edit', $wish) }}" class="btn btn-warning">Редактировать</a>
                            <form action="{{ route('wishes.destroy', $wish) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
