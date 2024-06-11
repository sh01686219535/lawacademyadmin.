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

                            <div class="row">
                                <!-- Basic Layout -->
                                <div class="col-xxl">
                                  <div class="card mb-4">

                                    <div class="card-body">
                                        @if (session('success'))
                                        <div class="alert slert-success timeout" style="color: green" >{{ session('success') }}</div>
                                        @elseif (session('error'))
                                        <div class="alert slert-danger timeout">{{ session('error') }}</div>

                                        @endif

                                      <form method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            @if($event->lowerCourt_id )
                                            <div class="col-md-6">
                                                <label class="form-label" for="basic-default-name">Lower Course</label>
                                                <select name="lowerCourt_id" id="basic-default-name" class="form-control">
                                                    <option value="">Select Lower Course</option>
                                                    @foreach($lowerCourt as $item)
                                                    <option value="{{$item->id}}" {{$item->id == $event->lowerCourt_id ? 'selected' : ''  }}>{{$item->court_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @elseif($event->highCourt_id)
                                            <div class="col-md-6">
                                                <label class="form-label" for="basic-default-name">High Course</label>
                                                <select name="highCourt_id" id="basic-default-name" class="form-control">
                                                    <option value="">Select High Course</option>
                                                    @foreach($highCourt as $item)
                                                    <option value="{{$item->id}}"{{$item->id == $event->highCourt_id ? 'selected' : ''  }}>{{$item->court_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="basic-default-name">Title</label>
                                                <input type="text" value="{{ $event->title }}" class="form-control" name="title" id="basic-default-name" placeholder="Enter Course Title" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="basic-default-name">Description</label>
                                                <input type="text" class="form-control" name="description" value="{{ $event->description }}" id="basic-default-name" placeholder="Enter Course Description" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="basic-default-name">Cost</label>
                                                <input type="text" class="form-control" name="cost" value="{{ $event->cost }}" id="basic-default-name" placeholder="Enter Course Cost" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="basic-default-name">Start Date</label>
                                                <input type="datetime-local" class="form-control" value="{{ $event->start_date }}" name="start_date" id="basic-default-name" placeholder="Enter Start Date" />
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="basic-default-name">Days</label>
                                                <input type="text" class="form-control" value="{{ $event->days }}" name="days" id="basic-default-name" placeholder="Enter End Date" />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label" for="basic-default-name">Course Image</label>
                                                <input type="file" class="form-control my-2" name="image" id="image"/>
                                                @if ($event->image)
                                                <img style="width:200px;height:200px" id="showImage" src="{{ asset($event->image) }}" alt="" class="image-style mb-3">
                                                @else
                                                <img style="width:200px;height:200px" id="showImage" src="{{ asset('backend/img/previewImage.png') }}" alt="" class="image-style mb-3">
                                                @endif

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
    $(document).ready(function(){
        $('#image').change('click',function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
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
