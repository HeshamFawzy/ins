@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-3 p-5">
                 @if($profile ?? '')
                    <img class="rounded-circle" src="{{url('uploads/'.$profile->filename)}}" alt="{{$profile->filename}}" height="200" width="200">
                @endif
                <br>
                <a class="text-center" href="{{route('profile.create')}}">Add Profile</a>
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-baseline">
                    <h1>{{ $user->username }}</h1>
                    <a href="{{ route('post.create')}}">Add New Post</a>
                </div>
                <div class="d-flex">
                    <div class="pr-5"><strong>0</strong> Posts</div>
                    <div class="pr-5"><strong>0</strong> Followers</div>
                    <div class="pr-5"><strong>0</strong> Following</div>
                </div>
                <div class="pt-4 font-weight-bold">{{ $user->profile->title ?? 'N/A' }}</div>
                <div>{{ $user->profile->description ?? 'N/A' }}</div>
                <div><a href="#">{{ $user->profile->url ?? 'N/A' }}</a></div>
            </div>
            <div class="row">
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <div class="card m-4" style="width: 18rem;">
                          <img class="card-img-top" src="{{url('uploads/'.$post->filename)}}" alt="{{$post->filename}}">
                          <div class="card-body">
                            <h5 class="card-title">{{$post->caption}}</h5>
                            <p class="card-text">{{$post->created_at}}</p>
                            <a href="{{ route('post.destroy', $post->id) }}" class="btn btn-primary float-right">Delete</a>
                          </div>
                        </div>
                    @endforeach
                @endif
            </div>
    </div>
</div>
@endsection
