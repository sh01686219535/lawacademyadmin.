@extends('backend.partials.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title text-primary" style="text-transform: uppercase">Create Student</h5>
                            <div class="row">
                                <!-- Basic Layout -->
                                <div class="col-xxl">
                                  <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="user ">
                                            <div class="lower-court text-center">
                                                <h2>Entry Level Course</h2>
                                                <div class="button-course ">
                                                    <a href="{{ route('userCreate') }}" class="btn btn-primary m-1">MCQ</a>
                                                    <a href="{{ route('userWritten') }}" class="btn btn-primary m-1">Written</a>
                                                    <a href="{{ route('userViva') }}" class="btn btn-primary m-1">VIVA</a>
                                                </div>
                                            </div>
                                            <div class="high-court text-center mt-3">
                                                <h2>HCD Written Permission Course</h2>
                                                <div class="button-course">
                                                    <a href="{{ route('userHighWritten') }}" class="btn btn-primary m-1">Written</a>
                                                    <a href="{{ route('userHighViva') }}" class="btn btn-primary m-1">VIVA</a>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="d-flex align-items-center justify-content-center">
                                            <a class="btn btn-primary mx-2" href="{{ route('userCreate') }}">Lower Court</a>
                                            <a class="btn btn-primary" href="{{ route('userHighCreate') }}">High Court</a>
                                        </div> --}}
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
