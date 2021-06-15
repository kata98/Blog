@extends('layouts.admin')

@section('content')
    @include('pages.admin.users.userForm', ["action" => "users.update"])
@endsection
