<div class="card card-rounded">
    <div class="card-body">
        <div class="d-sm-flex justify-content-between align-items-start">
            <div>
                <h4 class="card-title card-title-dash">
                    Most Recent Transactions (All)
                </h4>
                <p class="card-subtitle card-subtitle-dash">
                    {{-- You have 3+ new transactions today --}}
                </p>
            </div>
            <div>
                <a href="{{ route('payments.index') }}">
                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button">
                        <i class="typcn text-white typcn-eye"></i>
                        View All
                    </button>
                </a>
            </div>
        </div>
        <div class="table-responsive mt-1">
            <table class="table select-table">
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Description</th>
                        {{-- <th>Receiver</th> --}}
                        <th>Status</th>
                        <th>Date/time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (auth()->user()->trx()->sortBy('created_at', SORT_REGULAR, true)->take(3) as $trx)
                        <tr>

                            <td class="text-truncate">
                                @unless($trx->receiver_id == auth()->user()->id)
                                    {{-- <i class="ft-arrow-down-right danger"></i> --}}
                                    <i class="ft-arrow-down-right danger"></i>
                                @else
                                    {{-- <i class="ft-arrow-up-right success"></i> --}}
                                    <i class="ft-arrow-up-right success"></i>
                                @endunless
                                <SPAN class="{{ $trx->receiver_id == auth()->user()->id ? 'text-success' : '' }}">
                                    <b>
                                        {{ $trx->receiver_id == auth()->user()->id ? '+' : '-' }}
                                        ${{ number_format($trx->amount, 2) }}
                                    </b>
                                </SPAN>
                                <div class="font-small-2 text-light">
                                    <i class="font-small-2 ft-map-pin"></i>
                                    {{ $trx->medium }}
                                </div>
                            </td>


                            <td>
                                <h6>{{ $trx->desc() ?: 'deposit' }}</h6>
                                {{-- <p>company type</p> --}}
                            </td>

                            <td class="text-truncate mt-1">
                                @if ($trx->status == 'successful')
                                    <div class="badge badge-opacity-success">{{ $trx->status }}</div>
                                @elseif ($trx->status == 'pending')
                                    <div class="badge badge-opacity-warning">{{ $trx->status }}</div>
                                @else
                                    <div class="badge badge-opacity-danger">{{ $trx->status }}</div>
                                @endif


                            </td>
                            <td>
                                <div class="">
                                    {{ $trx->mod_trx_date ?? $trx->created_at }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
