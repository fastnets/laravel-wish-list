@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $wish->title }}</h1>
    <p>{{ $wish->description }}</p>
    <a href="{{ route('wishes.index') }}" class="btn btn-secondary">Назад</a>
    <a href="{{ route('wishes.edit', $wish->id) }}" class="btn btn-warning">Редактировать</a>
    <form action="{{ route('wishes.destroy', $wish->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
</div>
@endsection
