<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Invoice Print</title>
    <style>
        @media print {
            .btn-print,
            .btn-pdf{
                display: none;
            }
            .signature-section {
                display: block;
            }
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row d-flex align-items-baseline col-md-12 col-sm-12">
                            <div class="col-xl-9 col-md-9 col-sm-9">
                                <img src="{{ asset('backend/img/logo.png') }}" alt="">
                            </div>
                            <div class="col-xl-3 col-md-3 col-sm-3 float-end">
                                <a class="btn btn-primary text-capitalize btn-print" onclick="window.print()" style="background-color:#60bdf3 ;" data-mdb-ripple-color="dark"><i class="fas fa-print text-secondary"></i> Print</a>
                                <a href="{{ route('coursePdf',$coursePay->id) }}" title="Edit" class="btn btn-primary btn-pdf" id="Edit"><i class="fa-solid fa-print"></i>
                                    PDF</a>
                            </div>
                            <hr>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-xl-8 col-md-7 col-sm-7">
                                    <ul class="list-unstyled">
                                        <li class="text-muted">Name: <span style="color:#5d9fc5 ;">{{ $coursePay->user->name }}</span></li>
                                        <li class="text-muted">Phone:&nbsp;{{ $coursePay->user->phone }}</li>
                                         <li class="text-muted">Batch:&nbsp;{{ $coursePay->batch->batch_name }}</li>
                                        <li class="text-muted">Address:&nbsp;{{ $coursePay->user->address }}</li>
                                        <li class="text-muted">Email:<i class="fas fa-phone">{{ $coursePay->user->email }}</i></li>
                                        @if ($coursePay->admissionCost)
                                        <li class="text-muted">Admission Fee (Paid):<i class="fas fa-phone">{{ $coursePay->admissionCost }} ৳</i></li>
                                        @else

                                        @endif

                                    </ul>
                                </div>
                            </div>
                            <div class="row my-2 justify-content-center">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-sm">
                                        <thead style="background-color:#84B0CA ;" class="text-white">
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Course</th>
                                                {{-- <th width="20" scope="col">Batch</th> --}}
                                                <th scope="col">Date</th>
                                                {{-- <th width="20" scope="col">Admission</th> --}}
                                                <th scope="col">Paid</th>
                                                <th scope="col">Unpaid</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($studentCourses as $data)
                                            <tr>
                                                <th scope="row">{{ $data->user->serial_number}}</th>
                                                <td>{{ $data->user->name }}</td>
                                                <td>{{ $data->course->title }}</td>
                                                {{-- <td>{{ $data->batch->batch_name}}</td>  --}}
                                                <td>{{ $data->created_at->format('Y-m-d') }}</td>
                                                {{-- <td>{{ $data->admissionCost }}৳</td> --}}
                                                <td>{{ $data->paid_amount }}৳</td>
                                                <td>{{ $data->due_amount }}৳</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Total= {{ $studentCourses->sum('paid_amount') }}৳</td>
                                                <td>Total= {{ $studentCourses->sum('due_amount') }}৳</td>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                            <div class="row mt-5 signature-section">
                                <div class="text col-md-12 col-lg-12 col-sm-12 " style="margin-top:30px;overflow:hidden">
                                    <div class=" " style="float:left;width:200px;text-align:center;">
                                        <hr style="font-size:14px;">
                                        <h5 style="font-size:14px;">Applicant Signature</h5>
                                    </div>
                                    <div class=" " style="float:right;width:170px;text-align:center;">
                                        <hr style="font-size:14px;">
                                        <h5 style="font-size:14px; text-center">Authorised Signature</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="footer text-center " style="margin-top:50px;">
                                <div class="text-center">
                                    <div colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                                        <strong style="display:block;margin:0 0 10px 0;"></strong> Anam Rangs Plaza, Satmasjid Road, Dhaka 1209, Bangladesh
                                        <b>Phone:</b> +880 1799-457351
                                        <b>Email:</b>ferozlaw@gmail.com
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

    </script>
</body>
</html>
