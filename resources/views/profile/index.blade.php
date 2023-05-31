@extends('layouts.app')

@section('content')
<div class="container w-50 profile">
    <div class="row">
        <div class="col-3 p-5 profile-img">
            <img src="{{ $user->profiles->profileImage() }}" class="rounded-circle">
            {{-- Link for default user  --}}
        </div>
        <div class="col-9 pt-5 profile-h">
            <div class="prof-main">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h4">{{ $user->username }}</div>
                        <follow-button user-id=" $user->id" follows=" $follows"></follow-button>
                    </div>
                </div>

                <div>
                    {{-- @can('update', $user->profile) --}}
                        <a class="follow-btn" href="/profile/{{$user->id}}/edit">Edit Profile</a>
                    {{-- @endcan --}}
                    {{-- @can('update', $user->profile) --}}
                        <a href="/p/create" class="btn btn-primary">Add New Post</a>
                    {{-- @endcan --}}
                </div>
            </div>

            <div class="profile-stat d-flex">
                <div class="pl=3"><strong> {{ count($user->posts) }}</strong>
                    post{{ count($user->posts) > 1 ? 's' : '' }}
                </div>
                <div class="pl=3"><strong> 1200</strong> followers</div>
                <div class="pl=3"><strong> 12</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profiles->title }}</div>
            <div>{{ $user->profiles->description }}</div>
            <div><a href="{{ $user->profiles->url }}">{{ $user->profiles->url }}</a></div>
        </div>
    </div><hr>

    <div class="post-main row pt-1">
        @foreach ($user->posts as $post)
            <div class="img-container col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" alt="the post image" class="w-100" style="border-radius: 6px">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
