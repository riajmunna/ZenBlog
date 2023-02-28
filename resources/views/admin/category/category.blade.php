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
                            <form action="{{route('add.category')}}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Enter
                                        Category</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="category_name"
                                               placeholder="Enter Category Name">
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
                            <h6 class="mb-0 text-uppercase">Category Details</h6>
                            <hr/>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table mb-0 table-bordered table-striped" id="example">
                                        <thead>
                                        <tr style="text-align: center">
                                            <th scope="col">sl</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1 @endphp
                                        @foreach($categories as $category)
                                            <tr style="text-align: center">
                                                <td>{{$i++}}</td>
                                                <td>{{$category->category_name}}</td>
                                                <td>{{$category->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                                <td>
                                                    <a href="{{route('update.category',['id' => $category->id])}}"
                                                       class="btn btn-primary btn-sm">Update</a>
                                                    <form action="{{route('category.delete')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{$category->id}}"
                                                               name="category_id">
                                                        <br>
                                                        <button type="submit" onclick="return confirm('Are you sure??')"
                                                                class="btn btn-danger btn-sm">Delete
                                                        </button>
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
