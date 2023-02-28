@extends('admin.master')

@section('content')

    <div class="container mt-lg-5">
        <div class="row">
            <div class="col-md-9 offset-md-2 mt-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Add Blog</h5>
                            </div>
                            <hr/>
                            <form action="{{route('save.blog')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Category ID</label>
                                    <div class="col-sm-9">
                                        <select name="category_id" id="" class="form-control">
                                            @foreach($categories as $item)
                                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Author ID</label>
                                    <div class="col-sm-9">
                                        <select name="author_id" id="" class="form-control">
                                            @foreach($authors as $item)
                                            <option value="{{$item->id}}">{{$item->author_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" placeholder="Enter Title">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="slug" placeholder="Enter Slug">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="description" id="" class="form-control" placeholder="Enter Description"> </textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Blog Type</label>
                                    <div class="col-sm-9">
                                        <select name="blog_type" id="" class="form-control">
                                            <option value="Popular">Popular</option>
                                            <option value="Latest">Latest</option>
                                            <option value="Trending">Trending</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-9">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Status</label>
                                        <input type="radio" name="status" value="1"> Published &nbsp;</input>
                                        <input type="radio" name="status" value="0"> Unpublished &nbsp;</input>
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
