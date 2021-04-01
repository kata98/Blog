@extends('layouts.layout')
@section('index')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="register">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="sidebar-left register-form">
                                <div class="sidebar-heading">
                                    <h2>Register here</h2>
                                </div>
                                <div class="content">
                                    <form id="register" action="{{ url('/register') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <fieldset>
                                                    <input name="first_name" type="text" id="first_name"
                                                           placeholder="Your first name" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <fieldset>
                                                    <input name="last_name" type="text" id="last_name"
                                                           placeholder="Your last name" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <fieldset>
                                                    <input name="email" type="text" id="email"
                                                           placeholder="Your email address" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <fieldset>
                                                    <input name="password" type="password" id="password"
                                                           placeholder="Your password">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <button type="submit" id="submit" class="main-button">Register
                                                    </button>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sidebar-right contact-information">
                                <div class="sidebar-heading">
                                    <h2>contact information</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>
                                            <h5>064-820-9991</h5>
                                            <span>PHONE NUMBER</span>
                                        </li>
                                        <li>
                                            <h5>katarinaraic98@gmail.com</h5>
                                            <span>EMAIL ADDRESS</span>
                                        </li>
                                        <li>
                                            <h5>Krajiska 22,
                                                <br>26000 Pancevo</h5>
                                            <span>STREET ADDRESS</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

