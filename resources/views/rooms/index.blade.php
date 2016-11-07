@extends('backpack::layout')
@section('header')
    <section class="content-header">
      <h1>
        {{ trans('view.room') }}<small>{{ trans('view.room_detail') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{trans('view.room')}}</li>
      </ol>
    </section>
@endsection
@section('content')
<div class="container-fluid">
	 	<div class="panel panel-default">
	 		<div class="panel-body">
	 			{!! Form::open(['route' => ['rooms.index'],'method'=>'GET'] ) !!}
	 			<div class="form-group">
			 		<label class="col-md-3 control-label">{{trans('view.roomname')}}:</label>
			 		<div class="col-md-9">
			 			{{ Form::text('name',$search['name'], ['class' => 'form-control']) }} </br>
					</div>
			 	</div>
			 	<div class="form-group">
			 		<div class="col-md-6 col-md-offset-6">
			 			<button type="submit" class="btn btn-success btn-block">{{trans('view.search') }}</button>
			 		</div>
			 	</div>
			 	{!! Form::close()!!}
	 			<div class="table-responsive">
	 				 <div>
	 				 	<a class="btn btn-large btn-success" href="{{ route('rooms.create')}}">{{trans('view.create')}}</a>
	 				 </div>
					 <table class="table table-striped table-bordered">
					 <thead>
					 <tr>
					 	 <th>Branch</th>
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
							 <td>
								 {!! Form::open(['route' => ['rooms.destroy',$record->id],'method'=>'DELETE'] ) !!}
								 <a class="btn btn-large btn-success" href="{{ route('rooms.edit',$record->id) }}">{{trans('view.edit')}}</a>
								 <button type="submit" class="btn btn-large btn-success">{{trans('view.delete') }}</button>
								  <a class="btn btn-large btn-success" href="{{ URL::to('reportRoom/'.$record->id) }}">{{trans('view.report')}}</a></td>
								 {!! Form::close()!!}
						 </tr>
						 @endforeach

						 </tbody>
					 </table>
	 			</div>
	 			<div>
					{{ $records->links('vendor.pagination.basepagination') }}
				</div>
	 		</div>
	 	</div>
</div>
@endsection