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
                                    <img src="{{ asset('assets/images/admin.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="sidebar-right">
                                <div class="content">
                                    <div class="upper-content">
                                        <h4>Katarina Raic</h4>
                                            <ul class="post-info">
                                                <li>Web Developer</li>
                                            </ul>
                                    </div>
                                    <p>Age: 22</p>
                                    <p>Occupation: Student</p>
                                    <p>Education: ICT College of Vocational Studies, Belgrade</p>
                                    <p>Email: katarina.raic.130.17@ict.edu.rs</p>
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
