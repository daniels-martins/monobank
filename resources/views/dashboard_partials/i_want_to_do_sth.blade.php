<div class="card card-rounded my-5">
    <div class="">
        <h4 class="m-4">
            <b> I want to...</b>
        </h4>
    </div>
    <div class="card-body">
        <div class="d-sm-flex justify-content-between align-items-start">
            <a class="link" href="{{ route('payments.create') }}"><small class="card-title-dash px-5 py-2">
                    <i class="typcn typcn-5x text-primary typcn-arrow-up-thick"></i>
                    <b class="text-primary"> Transfer Money</b>
                </small>
            </a>
            <a href="{{ route('accounts.create') }}" class="link">
                <small class="card-title-dash px-5 py-2">
                    <i class="typcn typcn-5x text-primary typcn-plus"></i>
                    <b class="text-primary"> Add a new Account</b>
                </small>
            </a>
        </div>

        <div class="d-sm-flex justify-content-between align-items-start my-4">
            <a href="{{ route('cards.index') }}" class="link">
                <small class="card-title-dash px-5 py-2">
                    <i class="typcn typcn-5x text-primary typcn-credit-card"></i>
                    <i class="typcn  text-primary typcn-plus"></i>
                    <b class="text-primary"> Add a New Card</b>
                </small>
            </a>

            <a href="{{ route('password.edit') }}" class="link">
                <small class="card-title-dash px-5 py-2">
                    <i class="typcn typcn-5x text-primary typcn-lock-closed"></i>
                    <b class="text-primary"> Change Password</b>
                </small>
            </a>
        </div>

        <div class="d-sm-flex justify-content-between align-items-start my-4">
         <a href="{{ route('accounts.index') }}" class="link">
            <small class="card-title-dash px-5 py-2">
               <i class="typcn  typcn-5x  text-primary typcn-eye"></i>
                {{-- <i class="typcn typcn-5x text-primary typcn-document"></i> --}}
                <b class="text-primary"> View All My accounts</b>
            </small>
        </a>

        <a href="{{ route('photo.create') }}" class="link">
         <small class="card-title-dash px-5 py-2">
            <i class="typcn  typcn-5x  text-primary typcn-upload"></i>
             {{-- <i class="typcn typcn-5x text-primary typcn-document"></i> --}}
             <b class="text-primary"> Upload New Photo</b>
         </small>
     </a>

     </div>

    </div>
</div>
