@extends('layouts.app')

@section('content')
    <h1>登録ユーザ一覧</h1>
        @if (count($users) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Eメール</th>
                        <th>ユーザ名</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($users as $users)
                    <tr>
                        <td>{{ $users->id }}</td>
                        <td>{{ $users->email }}</td>
                        <td>{{ $users->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
@endsection