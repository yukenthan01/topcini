<ul class="nav">
    <li class="nav-item nav-profile">
    <div class="nav-link">
        <div class="profile-image">
        <img src="/front-end/images/user.png" alt="image"/>
        </div>
        <div class="profile-name">
        <p class="name">
            Welcome {{ !empty(Auth::user())?Auth::user()->name:'' }}
        </p>
        <p class="designation">
            {{-- Super Admin --}}
            {{ !empty(Auth::user())? Auth::user()->roles[0]->name:'' }}
        </p>
        </div>
    </div>
    </li>
   
    @can('view_category')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
                <i class="fab fa-bandcamp menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    @can('add_category')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('category.create') }}">New Category</a></li>
                    @endcan
                    @can('view_category')
                        <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('category.index') }}">View Category</a></li>
                    @endcan


                </ul>
            </div>
        </li>

    @endcan

    <li class="nav-item">
        <a class="nav-link" href="{{ route('urlpost') }}">
            <i class="fa fa-home menu-icon"></i>
            <span class="menu-title">TamilDhool</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('youtube') }}">
            <i class="fa fa-home menu-icon"></i>
            <span class="menu-title">Youtube</span>
        </a>
    </li>
    @can('view_post')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#post-control" aria-expanded="false" aria-controls="post-control">
                <i class="fab fa-telegram menu-icon"></i>
                <span class="menu-title">Post</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="post-control">
                <ul class="nav flex-column sub-menu">
                    @can('add_post')
                        <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('post.create') }}">New Post</a></li>
                        {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('urlpost') }}">URL Post</a></li> --}}
                    @endcan
                    @can('view_post')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('post.index') }}">View Post</a></li>
                        
                    @endcan

                </ul>
            </div>
        </li>
     @endcan
     @can('view_comments')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#comments-control" aria-expanded="false" aria-controls="post-control">
                <i class="far fa-comment menu-icon"></i>
                <span class="menu-title">Comments</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="comments-control">
                <ul class="nav flex-column sub-menu">

                    @can('view_post')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('comments.index') }}">View Comments</a></li>
                    @endcan

                </ul>
            </div>
        </li>

    @endcan
    @can('view_subscribers')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#subscribers-control" aria-expanded="false" aria-controls="post-control">
                <i class="far fa-address-card menu-icon"></i>
                <span class="menu-title">Subscribers</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="subscribers-control">
                <ul class="nav flex-column sub-menu">

                    @can('view_subscribers')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('subscribers.index') }}">View Subscribers</a></li>
                    @endcan

                </ul>
            </div>
        </li>

    @endcan
    @can('view_permission')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user-control" aria-expanded="false" aria-controls="user-control">
                <i class="far fa-user-circle menu-icon"></i>
                <span class="menu-title">User Control</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user-control">
                <ul class="nav flex-column sub-menu">
                    @can('view_user')
                        <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('user.index') }}">User</a></li>
                    @endcan
                    @can('view_role')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('role.index') }}">Role</a></li>
                    @endcan
                    @can('view_permission')
                        <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('permission.index') }}">Permission</a></li>
                    @endcan
                </ul>
            </div>
        </li>

    @endcan

    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

            <i class="fas fa-power-off menu-icon"></i>
            <span class="menu-title">Logout</span>

        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>

</ul>
