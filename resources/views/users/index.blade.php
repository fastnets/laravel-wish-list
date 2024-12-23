@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Список пользователей</h1>

        @foreach($users as $user)
            <div class="user-card">
                <h3>{{ $user->name }}</h3>
                <h4>Желания пользователя:</h4>
                <ul>
                    @forelse($user->wishes as $wish)
                        <li>{{ $wish->title }}</li>
                    @empty
                        <li>У пользователя нет желаний.</li>
                    @endforelse
                </ul>
            </div>
        @endforeach
    </div>
@endsection
