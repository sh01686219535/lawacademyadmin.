@extends('backend.partials.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title text-primary" style="text-transform: uppercase">Batch Update</h5>

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
                                                <div class="row mb-3">
                                                    @if ($batch->lowerCourt_id)
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="lower_course">Lower Course</label>
                                                        <select name="lowerCourt_id" id="lower_course" class="form-control">
                                                            <option value="">Select Lower Course</option>
                                                            @foreach($lowerCourt as $item)
                                                            <option value="{{$item->id}}" {{  $item->id == $batch->lowerCourt_id ? 'selected' : '' }}>{{$item->court_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @elseif($batch->highCourt_id)
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="high_course">High Course</label>
                                                        <select name="highCourt_id" id="high_course" class="form-control">
                                                            <option value="">Select High Course</option>
                                                            @foreach($highCourt as $item)
                                                            <option value="{{$item->id}}" {{  $item->id == $batch->highCourt_id ? 'selected' : '' }}>{{$item->court_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @endif
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="course">Course</label>
                                                        <select name="course_id" id="course" class="form-control">
                                                            <option value="">Select Course</option>
                                                            @foreach($event as $item)
                                                            <option value="{{$item->id}}" {{  $item->id == $batch->course_id ? 'selected' : '' }}>{{$item->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="basic-default-name">Batch Name</label>
                                                        <input type="text" class="form-control" value="{{$batch->batch_name}}" name="batch_name" id="basic-default-name" placeholder="Enter Batch Name" />
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <input type="text" class="form-control" value="{{$batch->batch_day}}" name="batch_day" id="basic-default-name" placeholder="Enter Batch Day" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="basic-default-name">Time</label>
                                                        <input type="text" class="form-control" value="{{$batch->time}}" name="time" id="basic-default-name" placeholder="8 am to 10 am" />
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

@endpush
