@extends('frontEnd.master')

@section('title')
    Contact
@endsection

@section('content')

    <section id="contact" class="contact mb-2">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-6 text-center mb-2 offset-md-3">
                    <h1 class="page-title">Register</h1>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form mt-2 offset-md-3 col-md-6">
                <form action="{{route('user.register')}}" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-12">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name"
                               required>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email"
                               required>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your phone number"
                               required>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password"
                               required>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Image</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>

                    <div class="text-center">
                        <button type="submit">Register</button>
                    </div>
                </form>
            </div><!-- End Contact Form -->

        </div>
    </section>

@endsection
