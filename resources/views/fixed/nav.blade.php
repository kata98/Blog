<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ url("/") }}"><h2>Blog<em>.</em></h2></a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url("/") }}">Home</a>
                </li>
                @if(!(session()->has("user")))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("/loginUser") }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("/registerUser") }}">Register</a>
                    </li>
                @endif
                @if(session()->has("user"))
                    @if(!session()->get('user')->IsAdmin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("user-page", session()->get('user')->id) }}">My blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.create') }}">Create a blog</a>
                        </li>
                    @endif
                    @if(session()->get('user')->IsAdmin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("/users") }}">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("/blogs") }}">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Pending blogs</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("/logout") }}">Log out</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
