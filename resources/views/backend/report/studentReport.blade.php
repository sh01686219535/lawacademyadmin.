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
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12">

            <div class="card">
                <div class="card-body">
                    <div class="customer-card mb-3" style="margin-top:-10px;">
                        <div class="area-h3">
                            <h2>Report Table</h2>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-12 col-md-12 col-sm-12 col-12 mb-3 menu">

                        <form action="" method="get" class="d-flex">
                            <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-3">
                                <select name="batch_id" id="batch_id" class="form-select">
                                    <option value="">Select Batch</option>
                                    @foreach($batch as $value)
                                    <option value="{{ $value->id }}">{{ $value->batch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3" style="padding: 0 0px 0 5px">
                                <input class="form-control" type="date" name="from_date">
                            </div>
                            <div class="col-md-3" style="padding: 0 0px 0 5px">
                                <input class="form-control" type="date" name="end_date">
                            </div>
                            <div class="col-lg-2 mx-2 mt-2">
                                <input type="checkbox" id="vehicle1" name="generate_pdf" value="1">
                                <label for="vehicle1">Generate PDF</label><br>
                            </div>
                            <input class="btn btn-secondary" type="submit" value="Search">
                            <button class="btn btn-info mx-2" onclick="window.print()">Print</button>
                        </form>


                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-borderd" id="example">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Student</th>
                                    <th>batch</th>
                                    <th>Course</th>
                                    <th>phone</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($users as $item)
                                <tr>
                                    <td>{{$item->serial_number}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->batch->batch_name ?? ''}}</td>
                                    <td>{{$item->course->title ?? ''}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->email}}</td>
                                    <!-- <td class="action">
                                        {{-- <a href="{{ route('course_edit',$item->id) }}" title="Edit" class="btn btn-primary" id="Edit"><i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('coursePay_delete',$item->id) }}" title="Delete" class="btn btn-danger" id="delete" onclick="return confirm('Are You Sure!!')"><i class="fa-solid fa-trash"></i>
                                        </a> --}}
                                        <a href="{{ route('course_print',$item->id) }}" title="Delete" class="btn btn-info" id="delete"><i class="fa-solid fa-print"></i>
                                        </a>
                                    </td> -->

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="color:green">Total = {{ $users->sum('paid_amount') }}Tk</td>
                                    <td style="color:red">Total = {{ $users->sum('due_amount') }}Tk</td>
                                    <td class="action"></td>
                                </tr>
                            </tfoot>
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