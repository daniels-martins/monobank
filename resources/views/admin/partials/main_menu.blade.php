<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow"
    role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item ml-_1  bg-black"><a class="nav-link  @if (Route::currentRoutename() == 'dashboard') bg-danger @endif"
                    href="{{ route('dashboard') }}"><i class="la la-bank text-sm"></i><span>Account Dashboard</span></a>
            </li>
            {{-- <li class="dropdown nav-item mx-2 text-sm" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                    data-toggle="dropdown"><i class="la la-edit"></i><span data-i18n="Accounts">Accounts</span><span
                        class="badge badge badge-pill badge-success float-right mt-0">9</span></a>
                <ul class="dropdown-menu">
                    <li data-menu=""><a class="dropdown-item" href="{{ route('accounts.index') }}"
                            data-toggle=""><span data-i18n="All Accounts">All Accounts</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="{{ route('accounts.create') }}"
                            data-toggle=""><span data-i18n="Add New">Add New</span></a>
                    </li>
                </ul>
            </li> --}}

            <li class="nav-item mx-2  @if (Route::currentRoutename() == 'accounts.index') bg-danger @endif">
                <a class="nav-link  text-sm @if (Route::currentRoutename() == 'accounts.index') text-white @endif"
                    href="{{ route('accounts.index') }}">Account Information</a>
            </li>

            {{-- <li class="dropdown nav-item mx-2 text-sm" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                  data-toggle="dropdown"><i class="la la-credit-card"></i><span data-i18n="Cards">Cards</span></a>
              <ul class="dropdown-menu">
                  <li data-menu=""><a class="dropdown-item" href="{{ route('cards.index') }}" data-toggle=""><span
                              data-i18n="Cards">Cards</span></a>
                  </li>
                  <li data-menu=""><a class="dropdown-item" href="{{ route('cards.create') }}" data-toggle=""><span
                              data-i18n="Add New">Add New</span></a>
                  </li>
              </ul>
          </li> --}}


            <li class=" @if (Route::currentRoutename() == 'cards.index') bg-danger @endif nav-item mx-2 text-sm">
                <a class="text-sm nav-link @if (Route::currentRoutename() == 'cards.index') text-white @endif "
                    href="{{ route('cards.index') }}">Cards</a>
            </li>
            {{-- <li class="dropdown nav-item mx-2 text-sm" data-menu="dropdown">
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
            <li class="dropdown @if (Route::currentRoutename() == 'transactions.index') bg-danger @endif  nav-item mx-2">
                <a class="text-sm @if (Route::currentRoutename() == 'transactions.index') text-white @endif nav-link"
                    href="{{ route('transactions.index') }}">Transactions</a>
            </li>

            <li class="@if (Route::currentRoutename() == 'profile.edit') bg-danger @endif  nav-item mx-2 ">
                <a class="text-sm nav-link @if (Route::currentRoutename() == 'profile.edit') text-white @endif"
                    href="{{ route('profile.edit') }}">Profile</a>
            </li>

            <li class="@if (Route::currentRoutename() == 'payments.create') bg-danger @endif   nav-item mx-2">
                <a class="text-sm nav-link  @if (Route::currentRoutename() == 'payments.create') text-white @endif"
                    href="{{ route('payments.create') }}">Transfer</a>
            </li>

            <li class="nav-item mx-2 @if (Route::currentRoutename() == 'password.edit') bg-danger @endif">
               <a class="text-sm nav-link  @if (Route::currentRoutename() == 'password.edit') text-white @endif"
                   href="{{ route('password.edit') }}">
                   Change Password
               </a>
           </li>

           <li class="nav-item mx-2 @if (Route::currentRoutename() == 'photo.create')') bg-danger @endif">
            <a class="text-sm nav-link  @if (Route::currentRoutename() == 'photo.create')') text-white @endif"
                href="{{ route('photo.create') }}">
                Upload Photo
            </a>
        </li>


            <div class="show-sm">

                <li class="nav-item mx-2 d-block ">
                    <a class="d-block d-sm-none text-white nav-link m-1 bg-danger" id="logout_facade">
                        <i class="ft-power"> Logout </i>
                    </a>
                </li>

                <li class="nav-item mx-2 @if (Route::currentRoutename() == 'password.edit') bg-danger @endif">
                    <form class='' action="{{ route('logout') }}" method="post" id="logout_form">
                        @csrf
                    </form>
                    <button id="submitLogoutForm" class="btn-danger hidden" href="" type="submit"
                        form="logout_form"><i class="ft-power"></i>Logout</button>
                </li>
                <script>
                    document.querySelector('#logout_facade').addEventListener('click', function() {
                        alert('logout', 'submitLogoutForm')
                        document.querySelector('#submitLogoutForm').click();
                    });
                </script>

            </div>
        </ul>
    </div>
</div>
