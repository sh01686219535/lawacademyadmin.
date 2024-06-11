<html>

<head>
    <title>Invoice Print</title>
    <style>
        @page {
            sheet-size: A4;
            background-color: azure;
            vertical-align: top;
            margin-top: 0cm;
            /* <any of the usual CSS values for margins> */
            margin-bottom: 0cm;
            /* <any of the usual CSS values for margins> */
            margin-left: 0cm;
            /* <any of the usual CSS values for margins> */
            margin-right: 0cm;
            /* <any of the usual CSS values for margins> */

            margin-header: 0;
            /* <any of the usual CSS values for margins> */
            margin-footer: 0;
            /* <any of the usual CSS values for margins> */
            marks: none;
            /crop | cross | none/
            /*https://mpdf.github.io/css-stylesheets/supported-css.html*/
            /*https://mpdf.github.io/paging/different-page-sizes.html*/
        }

        /* pdf  */
    </style>
    </style>
</head>

<body style="font-family: Open Sans, sans-serif; font-size: 12px; font-weight: 400; line-height: 1.4; color: #000;">
    <div style="width: 800px;
                margin:5px auto;">
        <div style="height: 130px;">
            <div style="display:inline-block;width:170px;">
                <img height="120px" width="150" src="{{ asset('backend/img/logo.png') }}" alt="" />

            </div>
            <div style="display:inline-block;width:450px;text-align:center;margin-top:50px;">
                <h2 style="text-transform: uppercase;font-size: 20px;color: #3ea0cf;margin: 0 0 10px 0 ;">feroz law academy</h2>
                <p style="color: #3ea0cf;margin-top: 0;">A Pathway to become an Advocate</p>
                <h2 style="text-transform: uppercase;font-size: 18px;color: #3ea0cf ;">Admission Form</h2>
            </div>
            <div style="display:inline-block;width:170px;">
                <div style="height:20px;"></div>
                <img height="120px" width="120" src="{{ asset($user->image) }}" alt="" />
            </div>
        </div>
        <div style="width:95%;margin:15px auto -25px auto;">
            <h3 style="display:inline-block;width:48%;">Personal Data</h3>
            <p style="display:inline-block;width:48%;text-align:right;">
                <b>Admission Data :</b> {{ \Carbon\Carbon::parse($user->admission_date)->format('d-M-Y') }}
            </p>
        </div>
        <hr style="margin-left:20px;" />


        <div style="width: 95%;margin:12px; height:600px;padding-left:30px;">
            <div style="width:35%;margin:8px 0;display:inline-block;">
                <div style="width:51%;display:inline-block;">
                    <b>Student Number :</b>
                </div>
                <div style="width:40%;display:inline-block;">
                    <input type="text" value="{{$user->serial_number}}" style="padding: 10px;width: 100px;background: #b7c3d9;border-radius: 10px;border: none;margin-top:15px;" readonly>
                </div>
            </div>
            <div style="width:64%;margin:8px 0;display:inline-block;">
                <div style="width:26%;display:inline-block;">
                    <b>Batch Name :</b>
                </div>
                <div style="width:41%;display:inline-block;">
                    <input type="text" value="{{ $user->batch->batch_name}}" style="margin-top:15px;padding: 10px;width: 138px;background: #b7c3d9;border-radius: 10px;border: none;" readonly>
                </div>
            </div>
            <div style="width:90%;margin:8px 0;">
                <div style="width:20%;display:inline-block;">
                    <b>Student Name :</b>
                </div>
                <div style="width:78%;display:inline-block;">
                    <input type="text" value="{{$user->name}}" style="padding: 10px;width: 400px;background: #b7c3d9;border-radius: 10px;border: none;" readonly>
                </div>
            </div>
            <div style="width:90%;margin:8px 0;">
                <div style="width:20%;display:inline-block;">
                    <b>Father Name :</b>
                </div>
                <div style="width:78%;display:inline-block;">
                    <input type="text" value="{{$user->fathers_name}}" style="padding: 10px;width: 400px;background: #b7c3d9;border-radius: 10px;border: none;" readonly>
                </div>
            </div>
            <div style="width:90%;margin:8px 0; ">
                <div style="width:20%;display:inline-block;">
                    <b>Mother Name :</b>
                </div>
                <div style="width:78%;display:inline-block;">
                    <input type="text" value="{{$user->mothers_name}}" style="padding: 10px;width: 400px;background: #b7c3d9;border-radius: 10px;border: none;" readonly>
                </div>
            </div>
            <div style="width:100%;margin:8px 0; ">
                <h3 style="margin-bottom:  2px !important;">Applicant Personal Details:</h3>
                <hr>
            </div>
            <div style="width:90%;margin:8px 0; ">
                <div style="width:20%;display:inline-block;">
                    <b>Present Address:</b>
                </div>
                <div style="width:78%;display:inline-block;">
                    <input type="text" value="{{$user->address}}" style="padding: 10px;width: 476px;background: #b7c3d9;border-radius: 10px;border: none;" readonly>
                </div>
            </div>
            <div style="width:40%;margin:8px 0;display:inline-block; ">
                <div style="width:46%;display:inline-block;">
                    <b>Phone Number:</b>
                </div>
                <div style="width:42%;display:inline-block;">
                    <input type="text" value="{{$user->phone}}" style="padding: 10px;width: 150px;background: #b7c3d9;border-radius: 10px;border: none;" readonly>
                </div>
            </div>
            <div style="width:45%;margin:8px 0;display:inline-block; ">
                <div style="width:46%;display:inline-block;margin-left:20px;">
                    <b>Emergency No.:</b>
                </div>
                <div style="width:42%;display:inline-block;">
                    <input type="text" value="{{$user->emergency_phone}}" style="padding: 10px;width: 150px;background: #b7c3d9;border-radius: 10px;border: none;margin-left:-20px;" readonly>
                </div>
            </div>
            <div style="width:40%;margin:8px 0;display:inline-block; ">
                <div style="width:46%;display:inline-block;">
                    <b>Emg. Relation :</b>
                </div>
                <div style="width:42%;display:inline-block;">
                    <input type="text" value="{{$user->relation}}" style="padding: 10px;width: 150px;background: #b7c3d9;border-radius: 10px;border: none;" readonly>
                </div>
            </div>
            <div style="width:45%;margin:8px 0;display:inline-block; ">
                <div style="width:46%;display:inline-block;margin-left:20px;">
                    <b>Date of Birth:</b>
                </div>
                <div style="width:42%;display:inline-block;">
                    <input type="text" value="{{$user->birth_date}}" style="padding: 10px;width: 150px;background: #b7c3d9;border-radius: 10px;border: none;margin-left:-20px;" readonly>
                </div>
            </div>
            <div style="width:40%;margin:8px 0;display:inline-block; ">
                <div style="width:46%;display:inline-block;">
                    <b>Referred By :</b>
                </div>
                <div style="width:42%;display:inline-block;">
                    <input type="text" value="{{$user->referred_by}}" style="padding: 10px;width: 150px;background: #b7c3d9;border-radius: 10px;border: none;" readonly>
                </div>
            </div>
            <div style="width:45%;margin:8px 0;display:inline-block; ">
                <div style="width:46%;display:inline-block;margin-left:20px;">
                    <b>Gender :</b>
                </div>
                <div style="width:42%;display:inline-block;">
                    <input type="text" value="{{$user->gender}}" style="padding: 10px;width: 150px;background: #b7c3d9;border-radius: 10px;border: none;margin-left:-20px;" readonly>
                </div>
            </div>

            <div style="width:34%;margin:8px 0;display:inline-block; ">
                <div style="width:55%;display:inline-block;">
                    <b>Court Practice :</b>
                </div>
                <div style="width:36%;display:inline-block;">
                    <input type="text" value="{{$user->court_practice}}" style="padding: 10px;width: 90px;background: #b7c3d9;border-radius: 10px;border: none;" readonly>
                </div>
            </div>
            <div style="width:65%;margin:8px 0;display:inline-block; ">
                <div style="width:26%;display:inline-block;">
                    <b>Email Address :</b>
                </div>
                <div style="width:42%;display:inline-block;">
                    <input type="text" value="{{$user->email}}" style="padding: 10px;width: 220px;background: #b7c3d9;border-radius: 10px;border: none;" readonly>
                </div>
            </div>

            <div style="width:100%;margin:8px 0; ">
                <h3 style="margin-bottom:  2px !important;">Academic History:</h3>
                <hr>
            </div>
            <div style="width:90%;margin:8px 0; ">
                <table style="width: 100%; border-collapse: collapse; margin-top: 15px;border:2px solid #ddd;">
                    <thead>
                        <tr style="background-color: #f2f2f2; padding: 10px;border:2px solid #ddd;">
                            <th style="padding: 10px;border:2px solid #ddd;">Name of Institution (LLM/LLB)</th>
                            <th style="padding: 10px;border:2px solid #ddd;">Passing Year</th>
                            <th style="padding: 10px;border:2px solid #ddd;">GPA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid #ddd;border:1px solid #ddd;">
                            <td style="padding: 10px;border:2px solid #ddd;">{{$user->university_llm }}</td>
                            <td style="padding: 10px;border:2px solid #ddd;">{{$user->qualified_year_llm }}</td>
                            <td style="padding: 10px;border:2px solid #ddd;">{{$user->gpa_llm }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #ddd;border:2px solid #ddd;">
                            <td style="padding: 10px;border:2px solid #ddd;">{{$user->university }}</td>
                            <td style="padding: 10px;border:2px solid #ddd;">{{$user->qualified_year }}</td>
                            <td style="padding: 10px;border:2px solid #ddd;">{{$user->gpa }}</td>
                        </tr>

                    </tbody>

                </table>

            </div>
            <div style="width: 700px;margin:-40px 0 0 0;overflow:hidden;">
                <div class="text" style="margin-top:80px;">
                    <div style="float:left;width:200px;text-align:center;">
                        <hr style="font-size:12px;">
                        <h5 style="font-size:12px;">Applicant Signature</h5>
                    </div>
                    <div class=" " style="float:right;width:170px;text-align:center;">
                        <hr style="font-size:12px;">
                        <h5 style="font-size:12px; text-align:center">Authorised Signature</h5>
                    </div>
                </div>
                <div class="footer text-align:center " style="margin-top:50px;">
                    <div style="text-align: center">
                        <div colspan="2" style="font-size:11px;padding:50px 15px 0 15px;">
                            <strong style="display:block;margin:0 0 10px 0;"></strong> Anam Rangs Plaza, Satmasjid Road, Dhaka 1209, Bangladesh
                            <b>Phone:</b> +880 1799-457351
                            <b>Email:</b>ferozsarkar60@gmail.com
                        </div>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>