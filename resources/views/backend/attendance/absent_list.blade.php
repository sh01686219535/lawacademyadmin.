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
							<h2>Absent List</h2> </div>
                    </div>
                    <div class="col-md-12 mb-3 menu">

                        <form action="" method="get" class="d-flex">
                            <div class="col-lg-2">
                                <select name="batch_id" id="batch_id" class="form-select">
                                    <option value="">Select Batch</option>
                                    @foreach($batch as $value)
                                        <option value="{{ $value->id }}">{{ $value->batch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-3" style="padding: 0 0px 0 5px">
                                <input class="form-control" type="date" name="from_date">
                            </div>
                            <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-3" style="padding: 0 0px 0 5px">
                                <input class="form-control" type="date" name="to_date">
                            </div>
                            <div class="col-lg-2 mx-2 mt-2">
                                <input type="checkbox" id="vehicle1" name="generate_pdf" value="1">
                                <label for="vehicle1">Generate PDF</label><br>
                            </div>
                            <input class="btn btn-secondary mx-1" type="submit" value="Search">
                            <button class="btn btn-info mx-1" onclick="window.print()">Print</button>
                            
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-borderd" id="example">
                            <thead>
                                <tr>
                                    <th>Student Id</th>
                                   <th>Student Name</th>
                                   <th>Batch Name</th>
                                    <th>Total Class</th>
                                    <th>Total Absent</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($getAttendance)
                                @php $i = 1;
                                if($batch_id){
                                $batch=\App\Models\Batch::where('id',$batch_id)->first();
                                $batchday=explode(',',$batch->batch_day);
                                // Assuming you have the start and end dates
                                    $start_date = \Carbon\Carbon::parse($fromDate);
                                    $end_date = \Carbon\Carbon::parse($toDate);
                                    $datecount=0;

                                    // Loop through the date range
                                    while ($start_date <= $end_date) {
                                        // Get the day name for the current date
                                        $day_name = $start_date->format('l'); // 'l' format gives the full day name

                                        // Output or use the day name as needed
                                        // $day_name . PHP_EOL;
                                    foreach($batchday as $day){
                                    
                                    if($day_name === $day)
                                    $datecount++;
                                    }

                                        // Move to the next day
                                        $start_date->addDay();
                                        
                                    }
                                    }

                                @endphp
                                @foreach($getAttendance as $item)
                                @php
                                
                                $att=\App\Models\Attendance::where('serial_id',$item->users->serial_number)->whereDate('created_at', '>=', date('Y-m-d', strtotime($fromDate)))->whereDate('created_at', '<=', date('Y-m-d', strtotime($toDate)))->where('batch_id',$batch_id)->count();
                                @endphp
                                <tr>
                                    <td>{{$item->users->serial_number}}</td>
                                     <td>{{$item->users->name}}</td>
                                     <td>{{$item->batch->batch_name}}</td>
                                    <td class="text-info">{{$datecount}}</td>
                                    <td class="text-danger">{{$datecount - $att }}</td>
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
