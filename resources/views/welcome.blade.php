
@extends('layouts.app')
@section('content')
    <div class="center jumbotron jumbotron-extend bg-info" data-aos="zoom-out" data-aos-duration="1000">
        <div class="text-center text-white mt-2 pt-1">
            <h1 class="t-text" data-aos="zoom-out" data-aos-duration="3000"><i class="fas fa-baseball-ball fa-sm pr-3"></i>Base Talk</h1>
            @include('searchs.search')
        </div>
    </div>
    <h5 class="text-center mb-3" data-aos="zoom-out" data-aos-duration="1000">プロ野球チームについて140字以内で会話しよう！</h5> 
    <div class="w-75 m-auto">@include('commons.flash_message')</div>
    @if(Auth::check())
        @include('posts.new_post')
    @endif
    <ul class="list-unstyled">
        @include('posts.post')
    </ul>       
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>  
@endsection
