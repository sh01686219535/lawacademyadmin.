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
							<h2>Notice Table</h2> </div>

                    </div>
						<table class="table table-hover table-borderd" id="example">
							<thead>
								<tr>
									<th>SI</th>
									<th>Title</th>
									<th>Details</th>
									<th>Image</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php $i = 1 @endphp
								@foreach($notice as $item)
								<tr>
									<td>{{$i++}}</td>
									<td>{{$item->title}}</td>
									<td>{{Str::limit($item->details,20)}}</td>

									<td>
                                        <img height="80px" width="80px" src="{{ asset($item->image) }}" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('noticeEdit',$item->id) }}" title="Edit" class="btn btn-primary" id="Edit"><i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('noticeDelete',$item->id) }}" title="Delete" class="btn btn-danger" id="delete" onclick="return confirm('Are You Sure!!')"><i class="fa-solid fa-trash"></i>
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
