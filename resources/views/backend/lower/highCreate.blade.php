@extends('backend.partials.app')
@section('content')
<div class="container my-3" style="margin-bottom: 300px !important">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head m-2" style="display: flex;justify-content: space-between;">
                    <h2 class="m-2">High Court</h2>
                    <a class="btn btn-info m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Create</a>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">High Court</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form  method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                    <input type="text" name="court_name" id="lowerCourt" placeholder="Enter Lower Court" class="form-control">
                                    </div>
                                </div>

                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="card-body">
                    <table class="table table-hover table-borderd" id="example">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Title</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp @foreach( $data['high'] as $high)
                            <tr>
                                <td>{{$i++}}</td>

                                <td>{{$high->court_name}}</td>
                                <td>
                                    <a href="{{ route('event_edit',$high->id) }}" title="Edit" class="btn btn-primary" id="Edit"><i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('event_delete',$high->id) }}" title="Delete" class="btn btn-danger" id="delete" onclick="return confirm('Are You Sure!!')"><i class="fa-solid fa-trash"></i>
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
@endsection


<!-- Button trigger modal -->

  {{-- <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lower Court</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form  method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <input type="text" name="court_name" id="lowerCourt" placeholder="Enter Lower Court" class="form-control">
                </div>
              </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div> --}}
