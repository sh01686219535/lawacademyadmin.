@extends('backend.partials.app')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title text-primary" style="text-transform: uppercase"><strong>Viva</strong>Exam Preparation</h5>
                            <div class="row">
                                <!-- Basic Layout -->
                                <div class="col-xxl">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            @if (session('success'))
                                            <div class="alert slert-success timeout" style="color: green">{{ session('success') }}</div>
                                            @elseif (session('error'))
                                            <div class="alert slert-danger timeout">{{ session('error') }}</div>
                                            @endif
                                            <form method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="col-md-3 d-none">
                                                    <label class="form-label my-2" for="course_id">Course</label>
                                                    <select class="form-control" id="course_id" name="course_id">
                                                        @foreach($course as $item)
                                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="serial_number">Serial Number</label>
                                                        <input type="text" class="form-control" id="serial_number" name="serial_number" value="{{$lastSerialNumber}}" readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="batch_id">Batch</label>
                                                        <select name="batch_id" id="batch_id" class="form-control">
                                                            <option value="">Select Batch</option>
                                                            @foreach($batch as $item)
                                                            <option value="{{$item->id}}">{{ $item->batch_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3  d-none">
                                                        <label class="form-label my-2" for="basic-default-name">Lower Court</label>
                                                        @foreach ($lowerCourt as $lows)
                                                        <select class="form-control" name="lower_court" id="basic-default-name">
                                                            <option value="{{ $lows->id }}">{{ $lows->court_name }}</option>
                                                        </select>

                                                        @endforeach
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="admission_date">Admission Date</label>
                                                        <input type="date" class="form-control" placeholder="Enter Date of Birth" name="admission_date" id="admission_date" value="{{ date('Y-m-d') }}" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Referred By</label>
                                                        <input type="text" class="form-control" name="referred_by" id="basic-default-name" placeholder="Enter Referred By" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Name</label>
                                                        <input type="text" class="form-control" name="name" id="basic-default-name" placeholder="Enter Student Name" />
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Father's Name</label>
                                                        <input type="text" class="form-control" name="fathers_name" id="basic-default-name" placeholder="Enter Father's Name" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Mother's Name</label>
                                                        <input type="text" class="form-control" name="mothers_name" id="basic-default-name" placeholder="Enter Mother's Name" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="phone">Personal Contact Number</label>
                                                        <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Personal Contact Number" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="emergency_phone">Emergency Contact Number</label>
                                                        <input type="number" class="form-control" placeholder="Enter Emergency Contact Number" name="emergency_phone" id="emergency_phone" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="relation">Relation to Emergency Contact</label>
                                                        <input type="text" class="form-control" placeholder="Enter Relation to Emergency Contact" name="relation" id="relation" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="email">Email</label>
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="birth_date">Date of Birth</label>
                                                        <input type="date" class="form-control" placeholder="Enter Date of Birth" name="birth_date" id="birth_date" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="gender">Gender</label>
                                                        <select class="form-control" name="gender" id="gender">
                                                            <option value="">Select Gender</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">University(LLB)</label>
                                                        <input type="text" class="form-control" name="university" id="basic-default-name" placeholder="Enter Your University" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Passing Year(LLB)</label>
                                                        <input type="text" class="form-control" name="qualified_year" id="basic-default-name" placeholder="Enter Pssing Year" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">GPA(LLB)</label>
                                                        <input type="text" class="form-control" name="gpa" id="basic-default-name" placeholder="Enter GPA" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">University(LLM)</label>
                                                        <input type="text" class="form-control" name="university_llm" id="basic-default-name" placeholder="Enter Your University" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Passing Year(LLM)</label>
                                                        <input type="text" class="form-control" name="qualified_year_llm" id="basic-default-name" placeholder="Enter Pssing Year" />
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">GPA(LLM)</label>
                                                        <input type="text" class="form-control" name="gpa_llm" id="basic-default-name" placeholder="Enter GPA" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Court Practice</label>
                                                        <input type="text" class="form-control" name="court_practice" id="basic-default-name" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Address</label>
                                                        <input type="text" class="form-control" name="address" id="basic-default-name" placeholder="Enter Address" />
                                                    </div>


                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="password">Password(Login)</label>
                                                        <input type="password" class="form-control" name="password" placeholder="Enter  Password" id="password" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="confirm_password">Confirm Password</label>
                                                        <input type="password" class="form-control" placeholder="Enter Confirm Password" name="confirm_password" id="confirm_password" />
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">USER Image</label>
                                                        <input type="file" class="form-control my-2" name="image" id="image" />
                                                        <img style="width:200px;height:200px" id="showImage" src="{{ asset('backend/img/previewImage.png') }}" alt="" class="image-style mb-3">
                                                    </div>

                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <button type="submit" class="btn btn-primary">Send</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@push('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#image').change('click', function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<script>
    setTimeout(() => {
        $('.timeout').fadeOut('slow')
    }, 3000);
</script>
<script>
    $(document).ready(function() {
        $('#batch_id').select2();
    });
</script>
@endpush