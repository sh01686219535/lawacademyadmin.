@extends('backend.partials.app')
@section('content')
<div class="container my-3" style="margin-bottom: 300px !important">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head m-2" style="display: flex;justify-content: space-between;">
                    <h2 class="m-2">Qrcode Create</h2>
                    <a class="btn btn-info m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Create</a>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Qrcode</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form  method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                    <input type="text" name="qrcode" id="qrcode" placeholder="Enter Qrcode Name" class="form-control">
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
                 <table class="table table-hover table-borderd" id="example">
                    <thead>
                        <tr>
                            <th>Qrcode</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($qrcode as $item)
                        <tr>
                            <td>
                                {!! DNS2D::getBarCodeHTML("$item->qrcode",'QRCODE',10, 10) !!}
                                {{$item->qrcode}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
