@extends('admin.master')

@section('content')

    <div class="container mt-lg-5">
        <div class="row">
            <div class="col-md-9 offset-md-2 mt-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Update Blog Info..</h5>
                            </div>
                            <hr/>
                            <form action="{{route('blog.update.form')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Category ID</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="blog_id" value="{{$blogs->id}}">
                                        <select name="category_id" class="form-control">
                                            <option value="{{$blogs->category_id}}">{{$blogs->category_name}}</option>
                                            @foreach($categoryAuthorNames as $categoryAuthorName)
                                                @if($categoryAuthorName->category_name == $blogs->category_name)

                                                @else
                                                    <option
                                                        value="{{$categoryAuthorName->category_id}}">{{$categoryAuthorName->category_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Author ID</label>
                                    <div class="col-sm-9">
                                        <select name="author_id" id="" class="form-control">
                                            <option value="{{$blogs->author_id}}">{{$blogs->author_name}}</option>
                                            @foreach($categoryAuthorNames as $categoryAuthorName)
                                                @if($categoryAuthorName->author_name == $blogs->author_name)

                                                @else
                                                    <option
                                                        value="{{$categoryAuthorName->author_id}}">{{$categoryAuthorName->author_name}}</option>
                                                @endif
                                                    @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" value="{{$blogs->title}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="slug" value="{{$blogs->slug}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" value="{{$blogs->date}}" name="date">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="description" id=""
                                                  class="form-control">{{$blogs->description}}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <input name="image" type="file" class="form-control">
                                        <img src="{{asset($blogs->image)}}" alt="Image" width="75px" height="75px">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Blog Type</label>
                                    <div class="col-sm-9">
                                        <select name="blog_type" id="" class="form-control">
                                            <option value="{{$blogs->blog_type}}">{{$blogs->blog_type}}</option>
                                            @foreach($categoryAuthorNames as $categoryAuthorName)
                                                @if($categoryAuthorName->blog_type == $blogs->blog_type)

                                                @else
                                                    <option
                                                        value="{{$categoryAuthorName->blog_type}}">{{$categoryAuthorName->blog_type}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-9">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Status</label>
                                        @if($blogs->status == 1)
                                            <input type="radio" name="status" value="1" checked> Published
                                            &nbsp;</input>
                                            <input type="radio" name="status" value="0"> Unpublished
                                            &nbsp;</input>
                                        @else
                                            <input type="radio" name="status" value="1"> Published
                                            &nbsp;</input>
                                            <input type="radio" name="status" value="0" checked> Unpublished
                                            &nbsp;</input>
                                        @endif
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

