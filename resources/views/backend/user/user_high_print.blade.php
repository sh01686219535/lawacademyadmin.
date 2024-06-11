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
            .btn-print {
                display: none;
            }
            .left-side{
                display:grid;
                grid-template-columns:1fr 1fr;
            }
            .right-side{
                display:grid;
                grid-template-columns:1fr 1fr;
            }
            .design-grid{
                display: grid !important;
                grid-template-columns: 1fr 1fr;
            }
            .img-display{
                display:flex;
            }
            .footer-p{
                margin-left:0 !important;
            }

        }
        .design-grid{
            display: grid !important;
            grid-template-columns: 1fr 1fr;
        }
    </style>


</head>
<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">

  <div class="container">
    <div class="card" >
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline col-md-12 col-sm-12 img-display">
                    <div class="col-xl-10 col-md-10 col-sm-8">
                        <img src="{{ asset('backend/img/logo.png') }}" alt="">
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <img height="100px" width="100" src="{{ asset($user->image) }}" alt="">
                    </div>
                    <hr>
                </div>
                <div class="container">

                    <table style="width:86%;margin:0 auto;">
                        <tbody>
                          <tr class="design-grid">
                            <td style="padding:20px;vertical-align:top" class="design-grid">
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="font-weight:bold;font-size:13px">Student ID :</span></p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->serial_number }}</p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Father's Name :</span></p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->fathers_name }}</p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Phone Number :</span></p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->phone }}</p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Emg. Relation :</span></p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->relation }}</p>

                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Referred By :</span> </p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->referred_by }}</p>


                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email Address :</span></p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->email }}</p>

                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">University(LLB) :</span> </p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->university }}</p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Passing Year(LLB) :</span> </p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->qualified_year }}</p>

                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">GPA(LLB) :</span> </p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->gpa }}</p>

                             
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->nid_number }}</p>

                            </td>
                            <td style="padding:20px;vertical-align:top" class="design-grid">
                                <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Student Name :</span></p>
                                <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->name }}</p>
                                <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Mother's Name :</span></p>
                                <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->mothers_name }}</p>
                                <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Emergency Number :</span></p>
                                <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->emergency_phone }}</p>
                                <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Date of Birth:</span></p>
                                <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->birth_date }}</p>
                                <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Gender :</span> </p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->gender }}</p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Address :</span></p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->address }}</p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">University(LLM) :</span> </p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->university_llm }}</p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Passing Year(LLM) :</span> </p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->qualified_year_llm }}</p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">GPA(LLM) :</span> </p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->gpa_llm }}</p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Court Practice :</span> </p>
                              <p style="margin:0 0 10px 0;padding:0;font-size:14px;">{{ $user->court_practice }}</p>

                            </td>
                          </tr>
                          <tr>
                          </tr>
                          <tr>

                        </tbody>

                      </table>
                     <div class="row">
                        <div class="text col-md-12 col-lg-12 col-sm-12 " style="margin-top:30px;overflow:hidden">
                            <div class=" " style="float:left;width:200px;text-align:center;">
                                <hr style="font-size:14px;">
                                <h5 style="font-size:14px;">Applicant Signature</h5>
                            </div>
                            <div class=" " style="float:right;width:170px;text-align:center;">
                                <hr style="font-size:14px;">
                                <h5 style="font-size:14px; text-center" >Authorised Signature</h5>
                            </div>
                     </div>
                    </div>
                    <div class="footer text-center " style="margin-top:50px;">
                        <tr class="text-center">
                            <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                              <strong  style="display:block;margin:0 0 10px 0;"></strong>  Anam Rangs Plaza, Satmasjid Road, Dhaka 1209, Bangladesh
                              <b>Phone:</b> +880 1799-457351
                              <b>Email:</b>ferozlaw@gmail.com
                            </td>
                          </tr>
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
