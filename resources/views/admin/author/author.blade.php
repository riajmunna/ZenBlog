@extends('admin.master')

@section('content')

    <div class="container mt-lg-5">
        <div class="row">
            <div class="col-md-9 offset-md-2 mt-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Add Category</h5>
                            </div>
                            <hr/>
                            <form action="{{route('add.author')}}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Enter Author</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="author_name" placeholder="Enter Author Name">
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


        <div class="row">
            <div class="col-md-9 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <h6 class="mb-0 text-uppercase">Author Details</h6>
                            <hr/>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table mb-0 table-bordered table-striped" id="example">
                                        <thead>
                                        <tr style="text-align: center">
                                            <th scope="col">sl</th>
                                            <th scope="col">Author Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1 @endphp
                                        @foreach($authors as $author)
                                            <tr style="text-align: center">
                                                <td>{{$i++}}</td>
                                                <td>{{$author->author_name}}</td>
                                                <td>
                                                    <a href="{{route('author.update',['id'=> $author->id])}}" class="btn btn-primary btn-sm">Update</a>
                                                    <form action="{{route('delete.author')}}" method="post" id="delete">
                                                        @csrf
                                                        <input type="hidden" name="author_id" value="{{$author->id}}">
                                                        <br>
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure??')"> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
