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
</style>
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush
<!-- Hoverable Table rows -->
<div class="container customer-container">
	<div class="row">
		<div class="col-lg-12">

			<div class="card">
				<div class="card-body">
					<div class="customer-card mb-3" style="margin-top:-10px;">
						<div class="area-h3">
							<h2>Course Pay Table</h2> </div>

                    </div>
						<div class="table-responsive">
							<table class="table table-hover table-borderd" id="example">
								<thead>
									<tr width="100%">
										
										<th width="2%">Student</th>
										<th width="2%">Course</th>
										<th width="8%">Batch</th>
										<th width="5%">Admission Fee</th>
										<th>Paid</th>
										<th width="5%">Unpaid</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									
									@foreach($coursePay as $item)
									<tr>
										
										<td>{{$item->user->serial_number ?? ''}}</td>
										<td>{{Str::limit($item->course->title,20)}}</td>
										<td>{{$item->batch->batch_name ?? ''}}</td>
										<td>{{$item->admissionCost ?? ''}}</td>
										<td>{{$item->paid_amount ?? ''}}</td>
										<td>{{$item->due_amount ?? ''}}</td>
										<td>
											<a href="{{ route('course_edit',$item->id) }}" title="Edit" class="btn btn-primary" id="Edit"><i class="fa-solid fa-eye"></i>
											</a>
											<a href="{{ route('coursePay_delete',$item->id) }}" title="Delete" class="btn btn-danger" id="delete" onclick="return confirm('Are You Sure!!')"><i class="fa-solid fa-trash"></i>
											</a>
											<a href="{{ route('course_print',$item->id) }}" title="Delete" class="btn btn-info" id="delete" ><i class="fa-solid fa-print"></i>
											</a>
										</td>
	
									</tr>
									@endforeach
								</tbody>
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
@endpush
