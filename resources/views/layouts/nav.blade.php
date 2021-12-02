{{-- Star Navbar --}}
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <a href=" {{route('links.index')}} ">
                    <h4 class="page-title pull-left">Dashboard</h4>
                </a>
                <ul class="breadcrumbs pull-left">
                    <li><a href=" {{route('user.page', Auth::user()->username)}} " target="_blank"><span>Go to your
                                LinkTree</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src=" {{asset(Auth::user()->image)}} " alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> {{Auth::user()->username}} <i
                        class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a href=" {{route('user.edit')}} " class="dropdown-item settings-edit" data-toggle="modal"
                        data-target="#editSettings">
                        Settings
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();
                    ">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Star Navbar --}}
