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
 		<div class="panel-heading">
 			<h3 class="panel-title">New Room </h3>
 		</div>
 		<div class="panel-body">

 			{!! Form::model($record,['route' => ['rooms.update',$record->id]] ) !!}
			 <!--<form role="form" method="PUT" action="{{ route('rooms.update',$record->id) }}">-->
			 	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			 	<div class="form-group">
			 		<label class="col-md-3 control-label">Branch:</label>
			 		<div class="col-md-9">
			 			{{ Form::select('branch_id', $branch_lists, $record->branch_id, ['class' => 'form-control']) }} </br>
					</div>
			 	</div>
				 <div class="form-group">
					 <label class="col-md-3 control-label">Name:</label>
					 <div class="col-md-9">
					 	{{ Form::text('name',$record->name, ['class' => 'form-control']) }} </br>
					 </div>
				 </div>
				 <div class="form-group">
					 <label class="col-md-3 control-label">Capacity:</label>
					 <div class="col-md-9">
					 	{{ Form::selectRange('capacity', 1, 20,$record->capacity, ['class' => 'form-control']) }} </br>
					 </div>
				 </div>

			 	<div class="form-group">
			 		<div class="col-md-6 col-md-offset-6">
			 			<button type="submit" class="btn btn-success btn-block"	value='Submit'>Submit</button>
			 		</div>
			 	</div>
			 <!--</form>-->
			 {!! Form::close() !!}
 		</div> 
 	</div>
 </div>
@endsection