@extends('backend.partials.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title text-primary" style="text-transform: uppercase">USER Create</h5>

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

                                            <form action="{{ route('user_edit',$user->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mb-3">
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Serial Number</label>
                                                        <input type="text" class="form-control" value="{{$user->serial_number}}" id="basic-default-name" readonly />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Batch Name</label>
                                                        <input type="text" class="form-control" value="{{$user->batch->batch_name}}" name="batch_id" id="basic-default-name" placeholder="Enter Referred By" readonly />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Admission Date</label>
                                                        <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($user->admission_date)->format('d-M-Y') }}" name="name" id="basic-default-name" placeholder="Enter Student Name" readonly />
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Referred By</label>
                                                        <input type="text" class="form-control" value="{{$user->referred_by}}" name="referred_by" id="basic-default-name" placeholder="Enter Referred By" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Name</label>
                                                        <input type="text" class="form-control" value="{{$user->name}}" name="name" id="basic-default-name" placeholder="Enter Student Name" />
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Father's Name</label>
                                                        <input type="text" class="form-control" value="{{$user->fathers_name}}" name="fathers_name" id="basic-default-name" placeholder="Enter Father's Name" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Mother's Name</label>
                                                        <input type="text" class="form-control" value="{{$user->mothers_name}}" name="mothers_name" id="basic-default-name" placeholder="Enter Mother's Name" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="phone">Personal Contact Number</label>
                                                        <input type="number" class="form-control" value="{{$user->phone}}" name="phone" id="phone" placeholder="Enter Personal Contact Number" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="emergency_phone">Emergency Contact Number</label>
                                                        <input type="number" class="form-control" value="{{$user->emergency_phone}}" placeholder="Enter Emergency Contact Number" name="emergency_phone" id="emergency_phone" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="relation">Relation to Emergency Contact</label>
                                                        <input type="text" class="form-control" placeholder="Enter Relation to Emergency Contact" value="{{$user->relation}}" name="relation" id="relation" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="email">Email</label>
                                                        <input type="email" class="form-control" value="{{$user->email}}" name="email" id="email" placeholder="Enter Email" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="birth_date">Date of Birth</label>
                                                        <input type="date" class="form-control" placeholder="Enter Date of Birth" value="{{$user->birth_date}}" name="birth_date" id="birth_date" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="gender">Gender</label>
                                                        @if($user->gender)
                                                        <input type="text" class="form-control" value="{{$user->gender}}" name="gender" id="gender" />
                                                        @else
                                                        <select class="form-control" name="gender" id="gender">
                                                            <option value="">Select Gender</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">University(LLB)</label>
                                                        <input type="text" class="form-control" value="{{$user->university}}" name="university" id="basic-default-name" placeholder="Enter Your University" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Passing Year(LLB)</label>
                                                        <input type="number" class="form-control" value="{{$user->qualified_year}}" name="qualified_year" id="basic-default-name" placeholder="Enter Pssing Year" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">GPA(LLB)</label>
                                                        <input type="number" class="form-control" value="{{$user->gpa}}" name="gpa" id="basic-default-name" placeholder="Enter GPA" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">University(LLM)</label>
                                                        <input type="text" class="form-control" value="{{$user->university_llm}}" name="university_llm" id="basic-default-name" placeholder="Enter Your University" />
                                                    </div>


                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Passing Year(LLM)</label>
                                                        <input type="number" class="form-control" value="{{$user->qualified_year_llm}}" name="qualified_year_llm" id="basic-default-name" placeholder="Enter Pssing Year" />
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">GPA(LLM)</label>
                                                        <input type="number" class="form-control" value="{{$user->gpa_llm}}" name="gpa_llm" id="basic-default-name" placeholder="Enter GPA" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Court Practice</label>
                                                        <input type="text" class="form-control" value="{{$user->court_practice}}" placeholder="Yes/No" name="court_practice" id="basic-default-name" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label my-2" for="basic-default-name">Address</label>
                                                        <input type="text" class="form-control" value="{{$user->address}}" name="address" id="basic-default-name" placeholder="Enter Address" />
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
                                                        @if($user->image)
                                                        <img style="width:200px;height:200px" id="showImage" src="{{ asset($user->image) }}" alt="" class="image-style mb-3">
                                                        @else
                                                        <img style="width:200px;height:200px" id="showImage" src="{{ asset('backend/img/previewImage.png') }}" alt="" class="image-style mb-3">
                                                        @endif
                                                    </div>

                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <button type="submit" class="btn btn-primary">Update</button>
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

@endpush