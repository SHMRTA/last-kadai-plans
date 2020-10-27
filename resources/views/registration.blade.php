@extends('layouts.app')


@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
        <div class="center jumborton">
            <div class="text-center">
                <h1>トップページ</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get','ユーザ登録',[],['class => btn btn-lg btn-primary']) !!}
            </div>
        </div>
    
    @endif
@endsection