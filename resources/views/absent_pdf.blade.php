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
                                <h1>Absent List</h1>
                                 <p>From Date: {{$fromDate}}</p>
                                 <p>To Date: {{$toDate}}</p>
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
                                                <th>Total Class</th>
                                                <th>Total Absent</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($getAttendance)
                                            @php $i = 1;
                                            if($batch_id){
                                            $batch=\App\Models\Batch::where('id',$batch_id)->first();
                                            $batchday=explode(',',$batch->batch_day);
                                            // Assuming you have the start and end dates
                                                $start_date = \Carbon\Carbon::parse($fromDate);
                                                $end_date = \Carbon\Carbon::parse($toDate);
                                                $datecount=0;
            
                                                // Loop through the date range
                                                while ($start_date <= $end_date) {
                                                    // Get the day name for the current date
                                                    $day_name = $start_date->format('l'); // 'l' format gives the full day name
            
                                                    // Output or use the day name as needed
                                                    // $day_name . PHP_EOL;
                                                foreach($batchday as $day){
                                                
                                                if($day_name === $day)
                                                $datecount++;
                                                }
            
                                                    // Move to the next day
                                                    $start_date->addDay();
                                                    
                                                }
                                                }
            
                                            @endphp
                                            @foreach($getAttendance as $item)
                                            @php
                                            
                                            $att=\App\Models\Attendance::where('serial_id',$item->users->serial_number)->whereDate('created_at', '>=', date('Y-m-d', strtotime($fromDate)))->whereDate('created_at', '<=', date('Y-m-d', strtotime($toDate)))->where('batch_id',$batch_id)->count();
                                            @endphp
                                            <tr>
                                                <td>{{$item->users->serial_number}}</td>
                                                 <td>{{$item->users->name}}</td>
                                                 <td>{{$item->batch->batch_name}}</td>
                                                <td class="text-info">{{$datecount}}</td>
                                                <td class="text-danger">{{$datecount - $att }}</td>
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
