<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <form action="@if($action == "users.update") {{ route($action, $user->id) }} @else {{ route($action) }} @endif" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if($action == "users.update")
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fist Name</label>
                                        <input type="text" class="form-control" value="{{ $user->first_name ?? old('first_name') }}" name="first_name"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Name</label>
                                        <input type="text" class="form-control" value="{{ $user->last_name  ?? old('last_name') }}" name="last_name"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email address</label>
                                        <input type="text" class="form-control" value="{{ $user->email  ?? old('email') }}" name="email"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Password</label>
                                        <input type="password" class="form-control" value="{{ $user->password  ?? old('password') }}" name="password"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label">Role</label>
                                        <select name="role_id" class="form-control">
                                            @foreach($roles as $r)
                                                <option value="{{ $r->id }}">{{ $r->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Submit changes</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
