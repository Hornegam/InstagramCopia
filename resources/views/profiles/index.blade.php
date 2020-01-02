@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 p-4 mx-auto">
            <img src="/svg/menia.jpg" style="max-height: 200px" class="rounded-circle pr-10 mx-auto">
        </div>
        <div class="col-md-9 pt-5 pl-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user ->username}}</h1>
                <a href="/p/create">Nova Postagem</a>
            <a href="{{$user->id}}/edit">Editar Perfil</a>
            </div>
            <div class="d-flex">
                <div class="pr-3"><strong>{{ $user ->posts->count()}}</strong> posts</div>
                <div class="pr-3"><strong>23k</strong> seguidores</div>
                <div class="pr-3"><strong>212</strong> seguindo</div>
            </div>
            <div class="pt-3 font-weight-bold">
                {{ $user-> profile-> title}}
            </div>
            <div>{{ $user -> profile -> description}}</div>
            <div><a href="#"><strong>{{$user -> profile -> url}}</strong></div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}">
                    <img src="/storage/{{$post ->image}}" class="w-100 h-100">
                </a>
            </div>
        @endforeach

        
        
    </div>
    <div class="row"></div>
</div>
@endsection
