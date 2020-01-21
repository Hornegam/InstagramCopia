@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 p-4 mx-auto">
        <img src="{{$user->profile->profileImage()}}" style="max-height: 200px" class="rounded-circle pr-10 mx-auto">
        </div>
        <div class="col-md-9 pt-5 pl-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center">
                    <h1>{{ $user ->username}}</h1>
                    <div>
                    <follow-button user-id='{{ $user->id }}' follows="{{ $follows }}"></follow-button>
                    </div>
                </div>
                

                @can('update', $user->profile)
                <a href="/p/create">Nova Postagem</a>
                @endcan
                
            </div>
            @can('update', $user->profile)
                <div><a href="{{$user->id}}/edit">Editar Perfil</a></div>
            @endcan
            <div class="d-flex">
                <div class="pr-3"><strong>{{ $user ->posts->count()}}</strong> posts</div>
                <div class="pr-3"><strong>{{$user->profile->followers->count()}}</strong> seguidores</div>
                <div class="pr-3"><strong>{{$user->following->count()}}</strong> seguindo</div>
            </div>
            <div class="pt-3 font-weight-bold">
                {{ $user-> profile-> title}}
            </div>
            <div>{{ $user -> profile -> description}}</div>
            <div><a href="{{$user -> profile -> url}}"><strong>{{$user -> profile -> url}}</strong></div>
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
