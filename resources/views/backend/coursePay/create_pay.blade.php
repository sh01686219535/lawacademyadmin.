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
                            <h5 class="card-title text-primary" style="text-transform: uppercase">Course Pay Create</h5>

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
                                                <label class="form-label" for="student_id">Student</label>
                                                <select name="student_id" id="student_id" class="form-control">
                                                    <option value="">Select Student</option>
                                                    @foreach ($user  as $item )
                                                    <option value="{{ $item->id }}">{{ $item->serial_number }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label" for="course_title">Course</label>
                                                <select name="course_id" id="course_title" class="form-control ">
                                                    <option value="">Select Course</option>
                                                    @foreach ($course  as $item )
                                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label class="form-label" for="batch_id">Batch</label>
                                                <select name="batch_id" id="batch_id" class="form-control ">
                                                    <option value="">Select Batch</option>
                                                    @foreach ($batch  as $item )
                                                    <option value="{{ $item->id }}">{{ $item->batch_name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label class="form-label" for="month">Month</label>
                                                <input type="date"  name="month" id="month" class="form-control">
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label class="form-label" for="Cost">Course Cost(Monthly)</label>
                                                <input type="text" value="" name="cost" id="cost" class="form-control">
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label class="form-label" for="admissionCost">Admission Cost(Optional)</label>
                                                <input type="text" value="" name="admissionCost" id="admissionCost" class="form-control">
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label class="form-label" for="paid_amount">Paid Amount</label>
                                                <input type="text" class="form-control" name="paid_amount" id="paid_amount" placeholder="Enter Paid Amount" />
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label class="form-label" for="due_amount">Due Amount</label>
                                                <input type="text" class="form-control" name="due_amount" id="due_amount" placeholder="Enter Due Amount" />
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

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
{{-- for due amount --}}
<script>
    $(document).ready(function () {
        // Add change event listeners to Cost and Paid Amount fields
      
        $('#cost, #admissionCost, #paid_amount').on('input', function() {
            var cost = parseFloat($('#cost').val()) || 0;
            var admissionCost = parseFloat($('#admissionCost').val()) || 0;
            var paidAmount = cost + admissionCost;
            if (!$('#paid_amount').is(':focus')) {
                $('#paid_amount').val(paidAmount.toFixed(2));
            }
        });
        $('#cost, #admissionCost, #paid_amount,#due_amount').on('input', function() {
            var cost = parseFloat($('#cost').val()) || 0;
            var admissionCost = parseFloat($('#admissionCost').val()) || 0;
            var paid_amount = parseFloat($('#paid_amount').val()) || 0;
            var paidAmount = cost + admissionCost;
            var Amount = paidAmount - paid_amount;
            if (!$('#due_amount').is(':focus')) {
                $('#due_amount').val(Amount.toFixed(2));
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#student_id').select2();
    });
    $(document).ready(function() {
        $('#course_title').select2();
    });
</script>

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
{{-- course to cost call ajax --}}
<script>
    $(document).ready(function(){
        $('#course_title').on('change',function(){
            var course_id = $(this).val();
            var student_id = $('#student_id').val();
            // var month = $('#month').val();
            $.ajax({
                url : '/getCost',
                type : 'get',
                data : {student_id:student_id,course_id:course_id},
                dataType : 'json',
                success : function (data) {
                    $('#cost').val(data);
                },
                error:function(error,xhr,status){
                    return error(xhr.responseTest);
                }
            });
        });
    });
</script>



@endpush
