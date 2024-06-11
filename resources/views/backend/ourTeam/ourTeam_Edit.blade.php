@extends('backend.partials.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title text-primary" style="text-transform: uppercase">Our Team Create</h5>

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
                                            <div class="col-md-6">
                                                <label class="form-label" for="course">Name</label>
                                                <input type="text" value="{{ $ourTeam->name }}" name="name" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="course">Image</label>
                                                <input class="form-control" value="{{ $ourTeam->image }}" type="file" name="image">
                                                <img height="80px" width="80px" src="{{ asset($ourTeam->image) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="course">Designation</label>
                                                <input value="{{ $ourTeam->designation }}" type="text" name="designation" class="form-control">
                                            </div>
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
<!-- lower_course -->
<script>
    $(document).ready(function(){
        $('#lower_course').on('change',function (){
            var lower_id = $(this).val();
            $.ajax({
                url:'/getlowerCource',
                data:{lower_id:lower_id},
                type:'post',
                dataType:'json',
                success:function(data){
                    $('#course').html(data);
                },
                eror:function(xhr,status,error){
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
<!-- high_course -->
<script>
    $(document).ready(function(){
        $('#high_course').on('change',function (){
            var high_id = $(this).val();
            $.ajax({
                url:'/getHighCource',
                data:{high_id:high_id},
                type:'post',
                dataType:'json',
                success:function(data){
                    $('#course').html(data);
                },
                eror:function(xhr,status,error){
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

@endpush
