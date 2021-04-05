<div class="sidebar-heading">
    <h2>Create your blog here!</h2>
</div>
<div class="content">
    <form action="@if($action == "update") {{ route($action, $post->id) }} @else {{ route($action) }} @endif"
          method="POST" enctype="multipart/form-data">
        @csrf
        @if($action == "update")
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <fieldset>
                    <input name="title" type="text" id="title"
                           placeholder="Blog title" required="" value="{{ $post->title ?? old('title') }}">
                </fieldset>
            </div>
            <div class="col-md-6 col-sm-12">
                <fieldset>
                    <input type="file" name="img" id="image"/>
                </fieldset>
            </div>
            <div class="col-md-6 col-sm-12">
                <fieldset>
                    <textarea rows="3" class="description" name="description">{{ $post->description ?? old('description') }}</textarea>
                </fieldset>
            </div>
            <div class="col-lg-12">
                <fieldset>
                    <button type="submit" id="submit" class="main-button">Save
                    </button>
                </fieldset>
            </div>
        </div>
    </form>
</div>

