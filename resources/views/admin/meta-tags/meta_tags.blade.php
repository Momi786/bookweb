@php
    if(Session::has('onlineuser')):
        $value = Session::get('onlineuser');
    endif;
@endphp
@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="#">Meta Tags</a></li>
@endsection
@section("content")
    <div class="row p-3" style="background-color:white">
        <!-- Start Panel -->
            <div class="col-md-12">
                @if(Session::has('danger'))
                    @php $message = Session::get('danger'); @endphp
                        <div class="alert alert-danger">{{$message}}</div>
                    @php Session::pull('danger'); @endphp
                @endif
                @if(Session::has('success'))
                    @php $message = Session::get('success'); @endphp
                    <div class="alert alert-success">{{$message}}</div>
                    @php Session::pull('success'); @endphp
                @endif
                <div class="d-flex justify-content-between">
                    <h4>Meta Tags</h4>
                </div><br>
				<table id="myTable" class="table table-striped table-bordered nowrap" style="width:100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Page</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($totalData as $data)
							<tr>
								<td>{{$data->id}}</td>
								<td>{{$data->title}}</td>
								<td>{{$data->name_page}}</td>
								<td>
									<a href="{{URL::to('admin/meta-tags/edit')}}/{{$data->id}}" class="btn btn-primary btn-sm">Update</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
            </div>
    </div>

@endsection
