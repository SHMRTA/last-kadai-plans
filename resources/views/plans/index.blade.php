@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
            <div class="text-center">
                <h1>予定管理アプリ</h1>
                {{-- 予定一覧表示ページへのリンク --}}
                <button>予定一覧表示</button>
                
                {{-- ユーザ一覧表示ページへのリンク --}}
                 {!! link_to_route('user_list', 'ユーザ一覧表示', [], ['class' => 'btn btn-lg btn-primary']) !!} 
            </div>
        </div>
@endsection