@extends('layouts.layout')
@section('index')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>ID</th>
                                <th>Title</th>
                                <th>Decription</th>
                                <th>Approve</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->description}}</td>
                                        <td>
                                            <form action="{{ route('blogs.update', $post->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-default">APPROVE</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('blogs.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-default">DELETE</button>
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
            </div>
        </div>
    </div>

@endsection

