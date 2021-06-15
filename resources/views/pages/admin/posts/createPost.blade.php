@extends('layouts.admin')

@section('content')
    @include('pages.admin.posts.postForm', ["action" => "admin.store"])
@endsection
