<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow"
        role="navigation" data-menu="menu-wrapper">
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item active"><a class="nav-link" href="{{ route('dashboard') }}"><i
                            class="la la-bank"></i><span>Account Dashboard</span></a></li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                        data-toggle="dropdown"><i class="la la-edit"></i><span data-i18n="Accounts">Accounts</span><span
                            class="badge badge badge-pill badge-success float-right mt-0">9</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="{{ route('accounts.index') }}" data-toggle=""><span
                                    data-i18n="All Accounts">All Accounts</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{ route('accounts.create') }}" data-toggle=""><span
                                    data-i18n="Add New">Add New</span></a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                        data-toggle="dropdown"><i class="la la-credit-card"></i><span data-i18n="Cards">Cards</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="{{ route('cards.index') }}" data-toggle=""><span
                                    data-i18n="Cards">Cards</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{ route('cards.create') }}" data-toggle=""><span
                                    data-i18n="Add New">Add New</span></a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="dropdown nav-item" data-menu="dropdown">
                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-dollar"></i><span
                            data-i18n="Payments">Payments</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="{{ route('payments.index') }}" data-toggle=""><span
                                    data-i18n="Payments">Payments</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{ route('payments.create') }}" data-toggle=""><span
                                    data-i18n="Add New">Add New</span></a>
                        </li>
                    </ul>
                </li> --}}
                <li class="dropdown nav-item" data-menu="dropdown">
                  <a class="dropdown-toggle nav-link" href="{{ route('transactions.index') }}">Transactions</a>
                </li>

                <li class="dropdown nav-item" data-menu="dropdown">
                  <a class="dropdown-toggle nav-link" href="{{ route('profile.index') }}">Profile</a>
                </li>

            </ul>
        </div>
    </div>