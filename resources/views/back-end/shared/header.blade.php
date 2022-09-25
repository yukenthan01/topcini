<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="{{ route('index') }}"><img src="/back-end/logo/logo.png" alt="logo"/></a>
    <a class="navbar-brand brand-logo-mini" href="{{ route('index') }}"><img src="/back-end/logo/icon.png" alt="logo"/></a>
</div>
<div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
    <span class="fas fa-bars"></span>
    </button>
    <ul class="navbar-nav">
    <li class="nav-item nav-search d-none d-md-flex">
        <div class="nav-link">
        <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="fas fa-search"></i> 
            </span>
            </div>
            <form action="{{ route('search') }}" method="get">
                <input type="text" class="form-control" placeholder="Search" aria-label="Search" name="search">
            </form>
        </div>
        </div>
    </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item d-none d-lg-flex">
            <a class="nav-link" href="{{ route('sendcurl') }}">
            <span class="btn btn-primary">+ TamilDhool</span>
            </a>
        </li>
    
        <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="fas fa-bell mx-0"></i>
            <span class="count">{{ $pendingcomments->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have  {{ $pendingcomments->count() }} new comments
                </p>
                
            </a>
            
            <div class="dropdown-divider"></div>
            @foreach ($pendingcomments as $pendingcomment)
                <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                        <i class="far fa-envelope mx-0"></i>
                    </div>
                    </div>
                    <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-medium">{{ $pendingcomment->comment }}</h6>
                    <p class="font-weight-light small-text">
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $pendingcomment->created_at)-> diffInDays(\Carbon\Carbon::Now())}} Days ago          
                    </p>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
            @endforeach
            
        </li>
        {{-- <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-envelope mx-0"></i>
            <span class="count">{{ $contacts->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
            <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have {{ $contacts->count() }} unread mails
                </p>
            </div>
            <div class="dropdown-divider"></div> --}}
            {{-- @foreach ($contacts as $contact)
                <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="/front-end/images/user.png" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-medium">{{ $contact->name }}
                        <span class="float-right font-weight-light small-text"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $contact->created_at)-> diffInDays(\Carbon\Carbon::Now())}}  Days ago</span>
                    </h6>
                    <p class="font-weight-light small-text">
                        {{$contact->message  }}
                    </p>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
            @endforeach --}}
            {{-- </div>
        </li> --}}
        <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="/front-end/images/user.png" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                {{-- <a class="dropdown-item">
                    <i class="fas fa-cog text-primary"></i>
                    Settings
                </a> --}}
            <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off text-primary"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>       
            </div>
        </li>
    
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="fas fa-bars"></span>
      </button>
</div>
