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

        .menu-main,
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
                            <h2>Due Report Table</h2>
                        </div>
                    </div>
                    <div class="menu-main">

                        <form action="" method="get" class="d-flex">

                            <div class="col-lg-2 col-xl-2 col-md-2 col-sm-2 col-2 menu mb-3">
                                <select name="batch_id" id="batch_id" class="form-select">
                                    <option value="">Select Batch</option>
                                    @foreach($batch as $value)
                                    <option value="{{ $value->id }}">{{ $value->batch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-3" style="padding: 0 0px 0 5px">
                                <input class="form-control" type="date" name="from_date">
                            </div>
                            <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-3" style="padding: 0 0px 0 5px">
                                <input class="form-control" type="date" name="to_date">
                            </div>
                            <div class="col-lg-2 mx-1 mt-2">
                                <input type="checkbox" id="vehicle1" name="generate_pdf" value="1">
                                <label for="vehicle1">Generate PDF</label><br>
                            </div>
                            <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-3">
                                <input class="btn btn-secondary mx-2" type="submit" value="Search">
                                <button class="btn btn-info mx-2" onclick="window.print()">Print</button>
                            </div>
                        </form>


                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-borderd" id="example">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Student</th>
                                    <th>Course</th>

                                    <th width="90px">Unpaid</th>
                                    <th class="action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($coursePayResults as $item)
                                <tr>
                                    <td>{{$item->user->serial_number ?? ''}}</td>
                                    <td>{{$item->user->name ?? ''}}</td>
                                    <td>{{Str::limit($item->course->title,20)}}</td>

                                    @if ($item->due_amount > 1)
                                    <td style="color:red">{{ $item->due_amount }}</td>
                                    @else
                                    <td style="color:green"></td>
                                    @endif

                                    <td class="action">

                                        <a href="{{ route('course_print',$item->id) }}" title="Delete" class="btn btn-info" id="delete"><i class="fa-solid fa-print"></i>
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>

                                    <td></td>
                                    <td style="color:red">Total = {{ $coursePayResults->sum('due_amount') }}Tk</td>
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
                url: '/getCourses'
                , data: {
                    course_id: course_id
                }
                , type: 'post'
                , dataType: 'json'
                , success: function(data) {
                    $('#batch_id').html(data);
                }
                , eror: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

</script>
@endpush
