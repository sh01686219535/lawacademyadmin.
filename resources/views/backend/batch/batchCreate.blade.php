@extends('backend.partials.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title text-primary" style="text-transform: uppercase">Batch Create</h5>

                            <div class="d-flex align-items-center justify-content-center">
                                <button class="btn btn-primary mx-2" id="lowerCourtClick">Entry Level Course</button>
                                <button class="btn btn-primary"  id="highCourtClick">HCD Written Permission Course</button>
                            </div>

                            <div class="row lowerCourt" style="display:none" >
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
                                                <div class="row mb-3">
                                                    <div class="col-md-6">

                                                        <select name="lowerCourt_id" id="lower_course" class="form-control">
                                                            <option value="">ENTRY LEVEL COURSE</option>
                                                            @foreach($lowerCourt as $item)
                                                            <option value="{{$item->id}}">{{$item->court_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    {{-- <div class="col-md-6">
                                                        <label class="form-label" for="high_course">High Course</label>
                                                        <select name="highCourt_id" id="high_course" class="form-control">
                                                            <option value="">Select High Course</option>
                                                            @foreach($highCourt as $item)
                                                            <option value="{{$item->id}}">{{$item->court_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div> --}}
                                                    <div class="col-md-6">
                                                        <select name="course_id" id="course" class="form-control">
                                                            <option value="">Select Course</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <input type="text" class="form-control" name="batch_name" id="basic-default-name" placeholder="Enter Batch Name" />
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <input type="text" class="form-control" name="batch_day" id="basic-default-name" placeholder="Enter Batch Day" required/>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <input type="text" class="form-control" name="time" id="time" placeholder="8 am to 10am" />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">

                                                </div>

                                                <div class="row justify-content-end">
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row highCourt" style="display:none">
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
                                                <div class="row mb-3">
                                                    {{-- <div class="col-md-6">
                                                        <label class="form-label" for="lower_course">Lower Course</label>
                                                        <select name="lowerCourt_id" id="lower_course" class="form-control">
                                                            <option value="">Select Lower Course</option>
                                                            @foreach($lowerCourt as $item)
                                                            <option value="{{$item->id}}">{{$item->court_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div> --}}
                                                    <div class="col-md-6">

                                                        <select name="highCourt_id" id="high_course" class="form-control">
                                                            <option value="">Select HCD WRITTEN PERMISSION COURSE</option>
                                                            @foreach($highCourt as $item)
                                                            <option value="{{$item->id}}">{{$item->court_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <select name="course_id" id="course_high" class="form-control">
                                                            <option value="">Select Course</option>
                                                        </select>
                                                    </div>


                                                    <div class="col-md-6 mt-3">
                                                        <input type="text" class="form-control" name="batch_name" id="basic-default-name" placeholder="Enter Batch Name" />
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <input type="text" class="form-control" name="batch_day" id="basic-default-name" placeholder="Enter Batch Day" required/>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <input type="text" class="form-control" name="time" id="time" placeholder="8 am to 10am" />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">

                                                </div>

                                                <div class="row justify-content-end">
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
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
<!-- lower_course -->
<script>
    $(document).ready(function() {
        $('#lower_course').on('change', function() {
            var lower_id = $(this).val();
            $.ajax({
                url: '/getlowerCource'
                , data: {
                    lower_id: lower_id
                }
                , type: 'post'
                , dataType: 'json'
                , success: function(data) {
                    $('#course').html(data);
                }
                , eror: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
    //highCourt
    $(document).ready(function() {
        $('#high_course').on('change', function() {
            var high_course = $(this).val();
            $.ajax({
                url: '/getlowerCource'
                , data: {
                    high_course: high_course
                }
                , type: 'post'
                , dataType: 'json'
                , success: function(data) {
                    $('#course_high').html(data);
                }
                , eror: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

</script>
<!-- high_course -->
<script>
    $(document).ready(function() {
        $('#high_course').on('change', function() {
            var high_id = $(this).val();
            $.ajax({
                url: '/getHighCource'
                , data: {
                    high_id: high_id
                }
                , type: 'post'
                , dataType: 'json'
                , success: function(data) {
                    $('#course').html(data);
                }
                , eror: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

</script>
<script>
    $(document).ready(function(){
        $('#lowerCourtClick').click( function(){
            $('.lowerCourt').css('display', 'block');
            $('.highCourt').css('display', 'none');

        });
    });
    $(document).ready(function(){
        $('#highCourtClick').click( function(){
            $('.highCourt').css('display', 'block');
            $('.lowerCourt').css('display', 'none');

        });
    });
</script>

@endpush
