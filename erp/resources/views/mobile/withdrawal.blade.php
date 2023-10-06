@extends('mobile/layouts.app')
@section('mobile/content')
    <div class="tabs tabs-links" id="tab-group-6">
        <div class="tab-controls bg-transparent mx-3 mb-3">
            <a class="font-13 rounded-s" data-bs-toggle="collapse" href="#tab-16" aria-expanded="true">Records</a>
            <a class="font-13 rounded-s" data-bs-toggle="collapse" href="#tab-17" aria-expanded="false">Withdrawal</a>
        </div>
        <div class="card card-style">
            <div class="content my-1">
                <div class="collapse show" id="tab-16" data-bs-parent="#tab-group-6">
                    <div class="list-group list-custom list-group-m list-group-flush rounded-xs">
                        @foreach($withdrawal as $with)
                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-request" class="list-group-item">
                            <div>
                                <h5 class="font-15 mb-0">{{ $with->amount }}</h5><span style="color: red">Requested {{ $with->req_time }}</span>
                            </div>
                            @if($with->status == 'Pending')
                            <span class="badge rounded-xl bg-red-dark">Pending</span>
                            @else
                            <span class="badge rounded-xl bg-green-dark">Completed</span>
                            @endif

                        </a>
                        @endforeach
                    </div>
                </div>
                <div class="collapse" id="tab-17" data-bs-parent="#tab-group-6">
                    <form action="{{ url('/applywithdrawal') }}" method="post">
                        {{ csrf_field() }}
                        <div class="pb-2"></div>
                        <div class="form-custom form-label form-icon">
                            <i> Z </i>
                            <input type="number" class="form-control rounded-xs" id="bal"
                                value="{{ Auth::user()->wallet }}" readonly/>
                            <label for="c32" class="color-highlight">Available Amount</label>
                            <span>(required)</span>
                        </div>
                        <div class="pb-2"></div>
                        <div class="form-custom form-label form-icon">
                            <i> Z </i>
                            <input type="text" name="withdraw_amount" class="form-control rounded-xs number" id="amt"
                                placeholder="Withdrawal Amount" required />
                            <label for="c32" class="color-highlight">Withdrawal Amount</label>
                            <span>(required)</span>
                        </div>

                        <div class="pb-2"></div>
                        <div class="form-custom form-label form-icon">
                            <i> Z </i>
                            <input type="number" class="form-control rounded-xs" id="balance"
                                placeholder="Balance" readonly />
                            <label for="c32" class="color-highlight">Withdrawal Amount</label>
                            
                        </div>
                        <div class="pb-2"></div>
                        <span id="warn" class="text-danger"></span>
                        @if($status == 'Completed' || $status == "")
                        <input type="submit" value="Withdraw" id="sub"
                            class="btn btn-full gradient-highlight rounded-s shadow-bg shadow-bg-xs mt-3 mb-3">
                            @else
                            <input type="button" value="Withdrawal Pending" 
                            class="btn btn-full gradient-highlight rounded-s shadow-bg shadow-bg-xs mt-3 mb-3">
                            @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    </div>
@endsection
@push('mobile/page-scripts')



@endpush
