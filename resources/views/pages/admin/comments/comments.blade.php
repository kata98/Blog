@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Comments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Text</th>
                                    <th>User</th>
                                    <th>Post title</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $c)
                                        <tr>
                                            <td>{{$c->id}}</td>
                                            <td>{{$c->comment}}</td>
                                            <td>{{$c->firstName.' '.$c->lastName}}</td>
                                            <td>{{$c->postTitle}}</td>
                                            <td>
                                                <form action="{{ route('comments.destroy', $c->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-default"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$comments->links('vendor.pagination.bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
