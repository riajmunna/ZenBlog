@extends('admin.master')

@section('content')

    <div class="container mt-lg-5">
        <div class="row">
            <div class="col-md-9 offset-md-2 mt-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Update Category Info.</h5>
                            </div>
                            <hr/>
                            <form action="{{route('category.update.form')}}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Enter Category</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" class="form-control" name="c_id" value="{{$categories->id}}">
                                        <input type="text" class="form-control" name="category_name" value="{{$categories->category_name}}">
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary px-5">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

