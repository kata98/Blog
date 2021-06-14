@extends('layouts.layout')
@section('index')

    <div class="container">

            <div class="all-blog-posts">
                <div class="row">
                    <div class="col-md-12">
                        <form method="GET" action="{{ route("home") }}">
                            <div class="form-group" >
                                <input type="text" name="keyword" class="searchText" placeholder="Type to search...">
                                <input type="submit" class="search-button" value="Search"/>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    @foreach($posts as $item)
                        <div class="col-lg-4">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="{{ asset('assets/images/'.$item->img)}}" alt="">
                                </div>
                                <div class="down-content">
                                    <a href="{{ route('post', ["post" => $item->id]) }}"><h4>{{ $item->title }}</h4></a>
                                    <ul class="post-info">
                                        <li>{{$item->firstName.' '.$item->lastName}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        <div class="row">
            <div class="pagination">
                {{$posts->links('vendor.pagination.bootstrap-4')}}
            </div>
        </div>
    </div>

@endsection

