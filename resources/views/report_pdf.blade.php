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
                                {{-- <div class="col-xl-8 col-md-7 col-sm-7">
                                <h1>Absent List</h1>
                                 <p>Date: {{$data}}</p>
                                </div> --}}
                            </div>
                            <div class="row my-2 justify-content-center">
                                <div class="table-responsive">
                                    <table class="table table-hover table-borderd" id="example">
                                        <thead>
                                            <tr>
                                                <th>SI</th>
                                                <th>Student</th>
                                                <th>Course</th>
                                                <th width="90px">Paid</th>
                                                <th width="90px">Unpaid</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1 @endphp
                                            @foreach($coursePayResults as $item)
                                            <tr>
                                                <td>{{$item->user->serial_number ?? ''}}</td>
                                                <td>{{$item->user->name ?? ''}}</td>
                                                <td>{{Str::limit($item->course->title,20)}}</td>
                                                @if ($item->paid_amount > 0)
                                                <td style="color:green">{{$item->paid_amount}}</td>
                                                @else
                                                <td style="color:red">{{$item->paid_amount}}</td>
                                                @endif
                                                @if ($item->cost > $item->due_amount)
                                                @if ($item->due_amount > 0)
                                                    <td style="color:red">{{ $item->due_amount }}</td>
                                                @else
                                                    <td style="color:green">{{ $item->due_amount }}</td>
                                                @endif
                                                @else
                                                    <td style="color: red">{{ $item->due_amount }}</td>
                                                @endif

                                                <td class="action">
                                                    {{-- <a href="{{ route('course_edit',$item->id) }}" title="Edit" class="btn btn-primary" id="Edit"><i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('coursePay_delete',$item->id) }}" title="Delete" class="btn btn-danger" id="delete" onclick="return confirm('Are You Sure!!')"><i class="fa-solid fa-trash"></i>
                                                    </a> --}}
                                                    <a href="{{ route('course_print',$item->id) }}" title="Delete" class="btn btn-info" id="delete" ><i class="fa-solid fa-print"></i>
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
                                                <td style="color:green">Total = {{ $coursePayResults->sum('paid_amount') }}Tk</td>
                                                <td style="color:red">Total = {{ $coursePayResults->sum('due_amount') }}Tk</td>
                                                <td class="action"></td>
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
