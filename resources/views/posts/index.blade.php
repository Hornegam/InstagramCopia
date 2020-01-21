@extends('layouts.app')

@section('content')
<div class="container">
@foreach($posts as $post)
<div class="col-12">
    <div>
        <div class="d-flex align-items-center">
            <div class="pt-3">
                <img src="{{$post->user->profile->profileImage()}}" style="max-height: 60px" class="rounded-circle pr-10 mx-auto">
            </div>
            <div class="pl-3 pt-3">
                <h3 class="font-weight-bold">
                    <a href="/profile/{{ $post->user->id}}">
                        <span class="font-weight-bold text-dark">{{ $post->user->username}}</span>
                    </a>
                </h3>
                
            </div>
        </div>
    </div>
</div>
<hr>
    <div class="">
        <div class="col-md-12 text-center">
            <a href="/profile/{{$post->user->id}}"><img src="/storage/{{ $post->image }}" class="w-50 h-50" style="max-height: 70%"></a>
        </div>
        <hr>
        <div class="pr-5">
            <p>
                <a href="/profile/{{ $post->user->id}}">
                    <span class="font-weight-bold text-dark">{{ $post->user->username}}</span>
                </a> 
                {{ $post->caption}}
            </p>
        </div>
        
    </div>
    <hr>
@endforeach
    
</div>
@endsection
