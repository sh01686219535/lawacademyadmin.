@extends('backend.partials.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title text-primary" style="text-transform: uppercase">Course Create</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <button class="btn btn-primary mx-2" id="lowerCourtClick">Entry Level Course</button>
                                <button class="btn btn-primary" id="highCourtClick">HCD Written Permission Course</button>
                            </div>
                            <div class="row lowerCourt" style="display: none">
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
                                                        <label class="form-label" for="basic-default-name">Entry Level Course</label>
                                                        <select name="lowerCourt_id" id="basic-default-name" class="form-control">
                                                            <option value="">Select Entry Level Course</option>
                                                            @foreach($lowerCourt as $item)
                                                            <option value="{{$item->id}}">{{$item->court_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    {{-- <div class="col-md-6">
                                                        <label class="form-label" for="basic-default-name">High Course</label>
                                                        <select name="highCourt_id" id="basic-default-name" class="form-control">
                                                            <option value="">Select High Course</option>
                                                            @foreach($highCourt as $item)
                                                            <option value="{{$item->id}}">{{$item->court_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div> --}}
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="basic-default-name">Course Title</label>
                                                        <input type="text" class="form-control" name="title" id="basic-default-name" placeholder="Enter Course Title" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="basic-default-name">Description</label>
                                                        <input type="text" class="form-control" name="description" id="basic-default-name" placeholder="Enter Course Description" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="basic-default-name">Monthly Amount</label>
                                                        <input type="text" class="form-control" name="cost" id="basic-default-name" placeholder="Enter  Monthly Amount" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="basic-default-name">Start Date</label>
                                                        <input type="date" class="form-control" name="start_date" id="basic-default-name" placeholder="Enter Start Date" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="basic-default-name">Days</label>
                                                        <input type="text" class="form-control" name="days" id="basic-default-name" placeholder="Enter End Date" />
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label" for="basic-default-name">Course Image</label>
                                                        <input type="file" class="form-control my-2" name="image" id="image" />
                                                        <img style="width:200px;height:200px" id="showImage" src="{{ asset('backend/img/previewImage.png') }}" alt="" class="image-style mb-3">
                                                    </div>
                                                </div>


                                                <div class="row justify-content-end">
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary">Send</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row highCourt" style="display: none">
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
                                                        <label class="form-label" for="basic-default-name">HCD Written Permission Course</label>
                                                        <select name="highCourt_id" id="basic-default-name" class="form-control">
                                                            <option value="">Select HCD Written Permission Course</option>
                                                            @foreach($highCourt as $item)
                                                            <option value="{{$item->id}}">{{$item->court_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="basic-default-name">Course Title</label>
                                                        <input type="text" class="form-control" name="title" id="basic-default-name" placeholder="Enter Course Title" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="basic-default-name">Description</label>
                                                        <input type="text" class="form-control" name="description" id="basic-default-name" placeholder="Enter Course Description" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="basic-default-name">Monthly Amount</label>
                                                        <input type="text" class="form-control" name="cost" id="basic-default-name" placeholder="Enter  Monthly Amount" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="basic-default-name">Start Date</label>
                                                        <input type="date" class="form-control" name="start_date" id="basic-default-name" placeholder="Enter Start Date" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="basic-default-name">Days</label>
                                                        <input type="text" class="form-control" name="days" id="basic-default-name" placeholder="Enter End Date" />
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label" for="basic-default-name">Course Image</label>
                                                        <input type="file" class="form-control my-2" name="image" id="image" />
                                                        <img style="width:200px;height:200px" id="showImage" src="{{ asset('backend/img/previewImage.png') }}" alt="" class="image-style mb-3">
                                                    </div>
                                                </div>


                                                <div class="row justify-content-end">
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary">Send</button>
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
<script>
    $(document).ready(function() {
        $('#lowerCourtClick').click(function() {
            $('.lowerCourt').css('display', 'block');
            $('.highCourt').css('display', 'none');

        });
    });
    $(document).ready(function() {
        $('#highCourtClick').click(function() {
            $('.highCourt').css('display', 'block');
            $('.lowerCourt').css('display', 'none');

        });
    });

</script>
@endpush
