@extends('backend.partials.app')
@section('content')
@push('css')
<style>
    .customer-card {
        display: flex;
        justify-content: space-between;
    }

    .customer-container {
        margin: 0 0 310px 0;
    }

    @media print {

        .menu,
        .navbar,
        .action {
            display: none;
        }

        .customer-container {
            margin: 0 0 0 0 !important;
        }

        @media only screen and (max-width: 767px) {
            .customer-container {
                margin: 0 0 0 0 !important;
            }
        }
    }
</style>
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush
<!-- Hoverable Table rows -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="customer-card mb-3" style="margin-top:-10px;">
                        <div class="area-h3">
                            <h2>Batch Wise List</h2>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3 menu">

                        <div class="col-md-6">
                            <form action="" method="get" class="d-flex">
                                <div style="width: 100%">
                                    <select name="batch_id" id="batch_id" class="form-select">
                                        <option value="">Select Batch</option>
                                        @foreach($batch as $value)
                                        <option value="{{ $value->id }}">{{ $value->batch_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="" style="margin-left: 10px;">
                                    <input class="btn btn-secondary mx-1" type="submit" value="Search">
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="col-md-6 d-flex mb-3">
                        <div class="batch_student col-md-6">
                            <label for="" style="display:inline-block;"><b>Number Of Student : </b></label>
                            <input type="text" value="{{$batchCount}}" style="width:70px;" class="form-control text-white bg-info" readonly>
                        </div>
                        <div class="batch_student col-md-6">
                            <label for=""><b>Batch Name : </b></label>
                            <input type="text" value="{{$batchName->batch->batch_name ?? ''}}" style="width:200px;" class="form-control text-white bg-primary" readonly>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-borderd" id="example">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Student Id</th>
                                    <th>Student Name</th>
                                    <th>Phone Number</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                    <th>Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1
                                @endphp
                                @if($batchWiseStudent)
                                @php $i = 1;
                                if($batch_id){
                                $batch=\App\Models\Batch::where('id',$batch_id)->first();

                                }

                                @endphp
                                @foreach($batchWiseStudent as $item)

                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->serial_number}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>

                                        <img height="60px" width="60px" src="{{ asset($item->image) }}" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('user_edit',$item->id) }}" title="Edit" class="btn btn-primary" id="Edit"><i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('user_delete',$item->id) }}" title="Delete" class="btn btn-danger" id="delete"><i class="fa-solid fa-trash"></i>
                                        </a>
                                        <a href="{{ route('user_lower_print',$item->id) }}" title="Edit" class="btn btn-info" id="Edit"><i class="fa-solid fa-print"></i>
                                        </a>
                                    </td>
                                    <td>
                                    <a href="{{ route('user_payment',$item->id) }}" title="Edit" class="btn btn-primary" id="Edit"><i class="fa-solid fa-bangladeshi-taka-sign"></i></a>
                                        </a>
                                    </td>
                                </tr>

                                @endforeach

                                @endif

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Hoverable Table rows -->

@endsection
@push('js')
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
<script>
    new DataTable('#example', {
        select: true
    });
</script>

<script>
    $(document).ready(function() {
        $('#course_id').on('change', function() {
            var course_id = $(this).val();
            $.ajax({
                url: '/getCourses',
                data: {
                    course_id: course_id
                },
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#batch_id').html(data);
                },
                eror: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endpush