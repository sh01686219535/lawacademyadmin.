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
                            <hr>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-xl-8 col-md-7 col-sm-7">
                                <h1>Present List</h1>
                                <p>Date: {{ $fromDate }}</p>
                                </div>
                            </div>
                            <div class="row my-2 justify-content-center">
                                <div class="table-responsive">
                                    <table class="table table-hover table-borderd" id="example">
                                        <thead>
                                            <tr>
                                                <th>Student Id</th>
                                               <th>Student Name</th>
                                               <th>Batch Name</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($getAttendance)
                                            @php $i = 1

                                            @endphp
                                            @foreach($getAttendance as $item)
                                            @php
                                            $att=\App\Models\Attendance::where('serial_id',$item->users->serial_number)->whereDate('created_at', '=', $fromDate)->where('batch_id',$batch_id)->first();
                                            @endphp
                                            <tr>
                                                <td>{{$item->users->serial_number}}</td>
                                                 <td>{{$item->users->name}}</td>
                                                 <td>{{$item->batch->batch_name}}</td>
                                                <td>{{$att->status ?? 'absent'}}</td>
                                            </tr>

                                            @endforeach
                                            @else
                                            @endif

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
