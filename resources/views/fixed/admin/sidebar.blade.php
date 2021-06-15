<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">

        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Admin Panel
            </a></div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("users.index") }}">
                        <i class="material-icons">person</i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route("admin.index") }}">
                        <i class="material-icons">content_paste</i>
                        <p>Posts</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route("comments.index") }}">
                        <i class="material-icons">library_books</i>
                        <p>Comments</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('logs')  }}">
                        <i class="material-icons">books</i>
                        <p>Logs</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

