@extends('layouts.app')

@section('content')
<div class="container single-post" style="margin-top: 8%">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-5" style="background-color: white; padding: 10px">
            <img src="/storage/{{ $post->image }}" class="w-80" style="width: 90%">
        </div>
        <div class="col-3 right-block" style="background-color: white; padding: 10px">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-5" style="padding-right: 10px">
                        <a href="/profile/{{ $post->user->id }}">
                            <img src="{{ $post->user->profiles->profileImage() }}" alt="Profile image" class="rounded-circle w-100" style="max-width: 45px;height: 40px">
                        </a>
                    </div>
                    <div class="post-userDetails">
                        <div class="font-weight-bold userDetails">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                            <a href="#" class="pl-3 btn btn-primary">Follow</a>
                        </div>
                    </div>
                </div>

                <hr>

                <p>
                    </span> {{ $post->caption }}
                </p>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection
