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

    <div class="container">
        <div class="row">
            <div id="comments">
                <h3>Comment section</h3>
                <fieldset class="col-lg-12">
                    @if($comments)
                        @foreach($comments as $comment)
                            <ul class="children">
                                <li class="comment">
                                    <div class="comment-body">
                                        <h4>{{$comment->firstName.' '.$comment->lastName}}</h4>
                                        <div class="meta">{{$comment->created_at}}</div>
                                        <p>{{$comment->comment}}</p>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    @endif
                    @if(!session()->has("user"))
                        <h3 class="h4">Log in <a href="{{ url("/loginUser") }}"><span>here</span></a> to leave a comment
                        </h3>
                    @endif
                    @if(session()->has("user"))
                        <fieldset class="content">
                            <h3>Leave a comment</h3>
                            <form action="{{ route("postComment", ['postId' => $post->id]) }}" method="POST"
                                  id="comment">
                                @csrf
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea rows="3" class="comment" name="comment">

                                        </textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="submit" class="comment-button">Comment
                                        </button>
                                    </fieldset>
                                </div>
                            </form>
                @endif
            </div>
        </div>
    </div>
    </div>

@endsection
