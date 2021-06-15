<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Post</h4>
                    </div>
                    <div class="card-body">
                        <form action="@if($action == "admin.update") {{ route($action, $post->id) }} @else {{ route($action) }} @endif" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if($action == "admin.update")
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Title</label>
                                        <input type="text" class="form-control" value="{{ $post->title ?? old('title') }}" name="title"/>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Text</label>
                                            <textarea rows="3" class="form-control" name="description">{{ $post->description ?? old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div><br/>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="bmd-label">Select an image</label><br/>
                                    <img src="{{ asset('assets/images/' . $post->img) }}" style="width: 150px; height: 100px;"/>
                                    <input type="file" name="image" id="image" class="form-control"/>
                                </div>
                            </div><br/>
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="bmd-label">Category</label>--}}
{{--                                        <select name="category_id" class="form-control">--}}
{{--                                            @foreach($categories as $c)--}}
{{--                                                <option value="{{ $c->id }}">{{ $c->name }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <button type="submit" class="btn btn-primary pull-right">Submit changes</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

