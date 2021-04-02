@extends('layouts.layout')
@section('index')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-blog">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="sidebar-left">
                                <div class="blog-thumb">
                                    <img src="{{ asset('assets/images/'.$post->img)}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="sidebar-right">
                                <div class="content">
                                    <div class="upper-content">
                                        <h4>{{ $post->title }}</h4>
                                        @foreach($users as $user)
                                            <ul class="post-info">
                                                <li>{{$user->firstName.' '.$user->lastName}}</li>
                                            </ul>
                                        @endforeach
                                    </div>
                                    <p>{{ $post->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
