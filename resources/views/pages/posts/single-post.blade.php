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
                                    <h4>{{ $post->title }}</h4>
                                    <p>{{ $post->description }}</p>
                                    <ul class="post-info">
                                        <li>{{$post->firstName.' '.$post->lastName}}</li>
                                    </ul>
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
