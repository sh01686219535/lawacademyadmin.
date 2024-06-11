@extends('backend.partials.app')
@section('content')
@push('css')
<style>
    .customer-card{
        display: flex;
        justify-content: space-between;
    }
    .customer-container{
        margin: 0 0 310px 0 ;
    }
    @media print {
    .menu,.navbar,.action{
        display: none;
    }
    .customer-container {
        margin: 0 0 0 0 !important;
    }
    @media only screen and (max-width: 767px) {
        .customer-container {
        margin: 0 0 0 0 !important;
    } 
   }
}
</style>
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush
<!-- Hoverable Table rows -->
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">

			<div class="card">
				<div class="card-body">
					<div class="customer-card mb-3" style="margin-top:-10px;">
						<div class="area-h3">
							<h2>Attendance Table</h2> </div>
                    </div>
                    <div class="col-md-12 mb-3 menu">

                        <form action="" method="get" class="d-flex">
                            <div class="col-lg-4">
                                <select name="batch_id" id="batch_id" class="form-select">
                                    <option value="">Select Batch</option>
                                    @foreach($batch as $value)
                                        <option value="{{ $value->id }}">{{ $value->batch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4" style="padding: 0 0px 0 5px">
                                <input class="form-control" type="date" name="from_date">
                            </div>
                            <div class="col-lg-2 mx-2 mt-2">
                                <input type="checkbox" id="vehicle1" name="generate_pdf" value="1">
                                <label for="vehicle1">Generate PDF</label><br>
                            </div>
                            <input class="btn btn-secondary mx-2" type="submit" value="Search">
                            <button class="btn btn-info mx-2" onclick="window.print()">Print</button>

                        </form>


                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-borderd" id="example">
                            <thead>
                                <tr>
                                    <th>Student Id</th>
                                   <th>Student Name</th>
                                   <th>Batch Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($getAttendance)
                                @php $i = 1
                                
                                @endphp
                                @foreach($getAttendance as $item)
                                @php
                                $att=\App\Models\Attendance::where('serial_id',$item->users->serial_number)->whereDate('created_at', '=', $fromDate)->where('batch_id',$batch_id)->first();
                                @endphp
                                <tr>
                                    <td>{{$item->users->serial_number}}</td>
                                     <td>{{$item->users->name}}</td>
                                     <td>{{$item->batch->batch_name}}</td>
                                    <td>{{$att->status ?? 'absent'}}</td>
                                </tr>
                              
                                @endforeach
                                @else
                                @endif

                        </table>
                    </div>

				</div>
			</div>
		</div>
	</div>
</div>
<!--/ Hoverable Table rows -->

@endsection
@push('js')
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
<script>
new DataTable('#example', {
	select: true
});
</script>

<script>
    $(document).ready(function(){
        $('#course_id').on('change',function (){
            var course_id = $(this).val();
            $.ajax({
                url:'/getCourses',
                data:{course_id:course_id},
                type:'post',
                dataType:'json',
                success:function(data){
                    $('#batch_id').html(data);
                },
                eror:function(xhr,status,error){
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endpush
