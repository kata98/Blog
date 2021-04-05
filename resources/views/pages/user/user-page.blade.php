@extends('layouts.layout')
@section('index')

    <div class="container">
        <div class="row">
            <div class="all-blog-posts">
                <div class="row">
                    @if($posts)
                        @foreach($posts as $p)
                            <div class="col-lg-4">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="{{ asset('assets/images/'.$p->img)}}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <h4>{{ $p->title }}</h4></a>
                                    </div>
                                    <p>{{ $p->description }}</p>
                                </div>
                                <form action="{{ route('posts.edit', $p->id) }}" method="GET">
                                    @csrf
                                    <div class="edit">
                                        <button type="submit" class="edit-button">Edit blog</button>
                                    </div>
                                </form>
                                <form action="{{ route('posts.destroy', $p->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="delete">
                                        <button type="submit" class="delete-button">Delete blog</button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        {{--        <div class="row">--}}
        {{--            <div class="pagination">--}}
        {{--                {{$posts->links('vendor.pagination.bootstrap-4')}}--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>

@endsection


