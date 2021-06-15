@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Posts</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Title</th>
{{--                                    <th>Category</th>--}}
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->title}}</td>
{{--                                            <td>{{$post->CatName}}</td>--}}
                                            <td><img src="{{ asset('assets/images/' . $post->img) }}" style="width: 150px; height: 100px;"/></td>
                                            <td>
                                                <a class="btn btn-default" href="{{ route("admin.edit", $post->id) }}">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.destroy', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-default"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$posts->links('vendor.pagination.bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                    <p><a href="{{ route('admin.create') }}" class="btn btn-primary">Insert a new post</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection

