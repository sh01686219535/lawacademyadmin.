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
							<h2>Our Team Table</h2> </div>

                    </div>
						<table class="table table-hover table-borderd" id="example">
							<thead>
								<tr>
									<th>SI</th>
									<th>Name</th>
									<th>Image</th>
									<th>Designation</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php $i = 1 @endphp
								@foreach($ourTeam as $item)
								<tr>
									<td>{{$i++}}</td>
									<td>{{$item->name}}</td>

									<td>
                                        <img height="80px" width="80px" src="{{ asset($item->image) }}" alt="">
                                    </td>
                                    <td>{{ $item->designation }}</td>
                                    <td>
                                        <a href="{{ route('admin.ourTeamEdit',$item->id) }}" title="Edit" class="btn btn-primary" id="Edit"><i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.ourTeamDelete',$item->id) }}" title="Delete" class="btn btn-danger" id="delete" onclick="return confirm('Are You Sure!!')"><i class="fa-solid fa-trash"></i>
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
