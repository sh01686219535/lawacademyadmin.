@extends('backend.partials.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 order-1">
            <div class="row">


                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span> Monthly Payable</span>
                            <h3 class="card-title text-nowrap mb-1">{{ $monthlyPayable }} Tk.</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span>Monthly Income</span>
                            <h3 class="card-title text-nowrap mb-1">{{ $monthlyIncome }} Tk.</h3>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span>Monthly Unpaid</span>
                            <h3 class="card-title text-nowrap mb-1">{{ $monthlyUnPaid }} Tk.</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span> Total Student</span>
                            <h3 class="card-title text-nowrap mb-1">{{ $totalStudent }}</h3>
                        </div>
                    </div>
                </div>

                @foreach($coursePay as $value)
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span>{{ $value->batch->batch_name ?? ''}}</span>
                            <h3 class="card-title text-nowrap mb-1">{{ $value->count }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach



                {{-- @foreach ($batch as $item)
                @dd($item);
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="card-title text-nowrap mb-1">{{ $item->batch->batch_name }}</span>
                            {{-- @foreach($totalHighStd as $value) --}}
                            {{-- <span class="card-title text-nowrap mb-1"></span>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach --}}

            </div>
        </div>
        <!-- Total Revenue -->
    </div>

</div>
<!-- / Content -->
@endsection
