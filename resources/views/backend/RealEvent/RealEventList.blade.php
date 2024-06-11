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
							<h2>Event Table</h2> </div>
						{{-- <div class="print">
                            <a href="" class="btn btn-primary pdf">CSV</a>
                            <a href="" class="btn btn-primary pdf">Excel</a>
                             <a class="btn btn-primary pdf" href="">PDF</a>
                             <a class="btn btn-primary pdf btnprn" href="" onclick="print()">Print</a>
                            </div> --}}
                    </div>
						<div class="table-responsive">
                        <table class="table table-hover table-borderd" id="example">
							<thead>
								<tr>
									<th>SI</th>
									<th>Title</th>
									<th>Description</th>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Venue</th>
									<th>Type</th>
									<th>Image</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @php $i = 1 @endphp
                                @foreach($realEvent as $events)
								<tr>
									<td>{{$i++}}</td>
									<td>{{Str::limit($events->title,30)}}</td>
									<td>{{Str::limit($events->description,30)}}</td>
									<td>{{$events->start_date}}</td>
									<td>{{$events->end_date}}</td>
									<td>{{Str::limit($events->venue,30)}}</td>
									<td>{{$events->type}}</td>
									<td>
                                        <img height="100px" width="100px" src="{{ $events->image }}" alt="">
                                    </td>
                                    
									<td>
                                        @if($events->status == 'active')
                                            <form action="{{ route('disableStatus',$events->id) }}" method="post">
                                                @csrf
                                                <input type="submit" value="Enable" class="btn btn-secondary">
                                            </form>
                                        @elseif($events->status == 'inactive')
                                        <form action="{{ route('enableStatus',$events->id) }}" method="post">
                                                @csrf
                                                <input type="submit" value="Disable" class="btn btn-danger">
                                            </form>
                                        @endif
                        
                                    </td>
                                    <td>
                                        <a href="{{ route('relevent_edit',$events->id) }}" title="Edit" class="btn btn-primary" id="Edit"><i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('realEvent_delete',$events->id) }}" title="Delete" class="btn btn-danger" id="delete" onclick="return confirm('Are You Sure!!')"><i class="fa-solid fa-trash"></i>
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
