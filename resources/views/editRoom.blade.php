@extends('backpack::layout')
@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection
@section('content')
<div class="container-fluid">
	 	<div class="panel panel-default">
	 		<div class="panel-heading">
	 			<a class="btn btn-large btn-success" href="{{url('/editRoom/0')}}">New</a>
	 		</div>
	 		<div class="panel-body">
	 			<div class="table-responsive">
					 <table class="table table-striped" >  
					 <thead>
					 <tr>
						 <th><a herf="www.google.com" onClick="alert('recursiveEncoded');">Branch</a></th>
						 <th>{{trans('view.roomname')}}</th>
						 <th>{{trans('view.capacity')}}</th>
						 <th>{{trans('view.action')}}</th>
					 </tr>
					 </thead>
						 <tbody>
						 @foreach($records as $key=>$record)
						 <tr>
							 <td>{{$record->branch->name}}</td>
							 <td>{{$record->name}}</td>
							 <td>{{$record->capacity}}</td>
							 <td><a class="btn btn-large btn-success" href="{{ URL::to('editRoom/'.$record->id) }}">Edit</a>
							 <a class="btn btn-large btn-success" href="{{ URL::to('deleteRoom/'.$record->id) }}">Delete</a>
							 <a class="btn btn-large btn-success" href="{{ URL::to('reportRoom/'.$record->id) }}">Report</a></td>
						 </tr>
						 @endforeach
						 </tbody>
					 </table>
					 {{ $records->links('vendor.pagination.basepagination') }}
	 			</div>
	 		</div>
	 	</div>
</div>
@endsection