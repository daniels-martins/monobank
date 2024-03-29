<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto">
                    <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                            class="ft-menu font-large-1"></i></a>
                </li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                        data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <!-- <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li> -->
                    <li class="nav-item d-none d-lg-block">
                        <a class="d-block block ml-_3" href="/">
                            <x-application-logo />
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="user-name text-bold-700">Hi, {{ auth()->user()->profile->fname }}</span>

                            <span class="avatar avatar-sm avatar-online">
                                @if (Storage::exists(auth()->user()->dp ?? ''))
                                    <img src='{{ auth()->user()->presentPhoto() }}' />
                                @else
                                    <img src="/admin_assets/app-assets/images/icons/user_icon.png" alt="avatar">
                                @endif
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="ft-user"></i> Edit
                                Profile</a>

                            {{-- <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                            <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                            <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a> --}}
                            <div class="dropdown-divider"></div>
                            <form class='' action="{{ route('logout') }}" method="post" id="logout_form">
                                @csrf
                            </form>
                            <button class="dropdown-item btn-danger" href="" type="submit" form="logout_form"><i
                                    class="ft-power"></i>Logout</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
