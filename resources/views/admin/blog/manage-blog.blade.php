@extends('admin.master')

@section('content')
    <div class="container mt-lg-5">
        <div class="row">
            <div class="col-md-12 mt-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <h6 class="mb-0 text-uppercase">Blog Details</h6>
                            <hr/>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-bordered table-striped" id="example">
                                            <thead>
                                            <tr style="text-align: center">
                                                <th scope="col">sl</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">Author Name</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Slug</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Blog Type</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $i=1 @endphp
                                            @foreach($blogs as $blog)
                                                <tr style="text-align: center">
                                                    <td>{{$i++}}</td>
                                                    <td>{{$blog->category_name}}</td>
                                                    <td>{{$blog->author_name}}</td>
                                                    <td>{{$blog->title}}</td>
                                                    <td>{{$blog->slug}}</td>
                                                    <td>{{$blog->date}}</td>
                                                    <td>{{substr($blog->description,0,50)}}</td>
                                                    <td>
                                                        <img src="{{$blog->image}}" alt="" height="50px" width="50px">
                                                    </td>
                                                    <td>{{$blog->blog_type}}</td>
                                                    <td>{{$blog->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                                    <td>
                                                        <a href="{{route('blog.update',['id'=>$blog->id])}}" class="btn btn-primary btn-sm">Update</a>
                                                        @if($blog->status == 0)
                                                            <a href="{{route('status',['id' => $blog->id])}}" class="btn btn-success btn-sm">Published</a>
                                                        @else
                                                            <a href="{{route('status',['id' => $blog->id])}}" class="btn btn-warning btn-sm">Unpublished</a>
                                                        @endif
                                                        <form action="{{route('delete.blog')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{$blog->id}}" name="blog_id">
                                                            <br>
                                                            <button type="submit" onclick="return confirm('Are you sure??')" class="btn btn-danger btn-sm">Delete</button>
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
    </div>
@endsection
