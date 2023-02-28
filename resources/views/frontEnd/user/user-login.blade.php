@extends('frontEnd.master')

@section('title')
    Contact
@endsection

@section('content')

    <section id="contact" class="contact mb-2">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-6 text-center mb-2 offset-md-3">
                    <h1 class="page-title">Login</h1>
                </div>
                <h2 class="mb-4" style="text-align: center">{{Session::get('message')}}</h2>
            </div>

            <div class="form mt-2 offset-md-3 col-md-6">
                <form action="{{route('user.login')}}" method="post" role="form" class="php-email-form">
                    @csrf
                    <div class="form-group col-md-12">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Email/Phone</label>
                        <input type="text" name="user_name" class="form-control" id="name" placeholder="Enter your valid email or phone number"
                               required>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your valid password"
                               required>
                    </div>

                    <div class="text-center">
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div><!-- End Contact Form -->

        </div>
    </section>

@endsection
