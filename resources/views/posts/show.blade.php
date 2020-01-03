@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100 h-100" style="max-height: 70%">
        </div>
        <div class="col-4">
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
                        <a href="#">Follow</a>
                    </div>
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
        </div>
    </div>
    
</div>
@endsection
