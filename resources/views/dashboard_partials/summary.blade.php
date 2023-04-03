<div class="row mb-0">
    <div class="col-lg-12 card p-4 bg-primary text-white shadow">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class=" text-white nav-item font-weight-semibold welcome-text">
                <b> Bluebird Summary</b>
            </h4>
        </div>
        <div class="list-wrapper"></div>
    </div>
    <h6 class='mt-3'><b> BANKING</b></h6>
</div>

<div class="statistics-details d-flex align-items-center justify-content-between">
    <div class="col-12">
        <div class="mb-4 card p-4 my-2">
            <p class="statistics-title mt-1 mb-1 text-primary"><b> Savings</b></p>
            <p class="statistics-title mb-4" style="font-weight:700">
                {{ auth()->user()->azas->first()->maskedNum() ?? 'N/A' }} </p>
            <h3 class="rate-percentage">USD $ {{ auth()->user()->azaBal() }}</h3>
            <small class="text-gray">Available Now</small>
            <div class="mt-4 text-success"><small>Status:
                    {{ ucfirst(auth()->user()->azas->first()->status) ?? 'N/A' }}</small> </div>
            <!-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p> -->
        </div>
        <div class="mb-4 card p-4">
            <p class="statistics-title mt-1 mb-1 text-primary"><b> Checking</b></p>
            <p class="statistics-title mb-4" style="font-weight:700">
                {{ auth()->user()->azas->where('aza_type_id', 2)->first()?->maskedNum() ?? 'N/A' }}</p>
            <h3 class="rate-percentage">USD ${{ auth()->user()->azaBal('checking') }}</h3>
            <small class="text-gray">Available Now</small>
            <div class="mt-4 text-success"><small>Status:
                    {{ ucfirst(auth()->user()->azas->where('aza_type_id', 2)->first()?->status) ?? 'N/A' }}</small>
            </div>
            <!-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p> -->
        </div>
        {{-- {{ dd(auth()->user()->azas->where('aza_type_id', 2)->first()->masked) }} --}}
        {{-- <div class="mb-4 card p-4">
            <p class="statistics-title mt-1 mb-1 text-primary"><b>Loan</b></p>
            <p class="statistics-title mb-4" style="font-weight:700">
               {{ auth()->user()->azas->where('aza_type_id', 3)->first()?->maskedNum() ?? 'N/A' }}</p>
               <h3 class="rate-percentage">USD $ {{ auth()->user()->azaBal('loan') ?: 'N/A'}}</h3>
               <small class="text-gray"> {{ auth()->user()->azaBal('loan') ?'Available Now': 'N/A'}}</small>
            <div class="mt-4 text-success"><small>Status:
                    {{ ucfirst(auth()->user()->azas->first()->status) ?? 'N/A' }}</small> </div>
            <!-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p> -->
        </div> --}}

         <div class="mb-4 card p-4">
            <h4 class="p-3  mt-1 mb-1 text-primary"><b>Save Money on Purchases </b></h3>
            <h5 class="p-2 text-gray mb-1">Get Discounts when you use your Bluebird Credit or Debit Card to order at online stores and market places </h5>
           
            <div class="mt-4"><small><a class="link text-success" href="{{ route('cards.index') }}"> Click to Apply for a Card </a></small> </div>
            <!-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p> -->
        </div>
    </div>
</div>
