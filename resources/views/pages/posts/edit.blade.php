@extends('layouts.layout')

@section('index')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="register">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="sidebar-left register-form">
                                @include('pages.posts.form', ["action" => "update"])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


