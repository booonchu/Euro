@extends('backpack::layout')
@section('header')
    <section class="content-header">
      <h1>
        {{ trans('view.room') }}<small>{{ trans('view.room_detail') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li><a href="{{ route('rooms.index') }}">{{trans('view.room')}}</a></li>
        <li class="active">
        	@if ($mode === 'U') {{trans('view.edit') }}
        	@else {{trans('view.create') }}
        	@endif
        </li>
      </ol>
    </section>
@endsection
@section('content')
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">
              	@if ($mode === 'U') {{trans('view.room_edit') }}
        		@else {{trans('view.room_create') }}
        		@endif
              </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if ($mode === 'U') {!! Form::open(['route' => ['rooms.update',$record,$record->id],'method'=>'PUT','class' =>'form-horizontal'] ) !!}
        	@else {!! Form::open(['route' => ['rooms.store',$record,$record->id],'method'=>'POST','class' =>'form-horizontal'] ) !!} 
        	@endif
              <div class="box-body">
                <div class="form-group">
			 		<label class="col-sm-2 control-label" for='branch_id'>Branch:</label>
			 		<div class="col-sm-10">
			 			{{ Form::select('branch_id', $branch_lists, $record->branch_id, ['class' => 'form-control']) }} </br>
					</div>
			 	</div>
				 <div class="form-group">
					 <label class="col-sm-2 control-label" for='name'>Name:</label>
					 <div class="col-sm-10">
					 	{{ Form::text('name',$record->name, ['class' => 'form-control']) }} </br>
					 </div>
				 </div>
				 <div class="form-group">
					 <label class="col-sm-2 control-label" for='capacity'>Capacity:</label>
					 <div class="col-sm-10">
					 	{{ Form::selectRange('capacity', 1, 20,$record->capacity, ['class' => 'form-control']) }} </br>
					 </div>
				 </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              	<button type="submit" class="btn btn-info pull-right">{{trans('view.save') }}</button>
			 	<a class="btn btn-default" href="{{ route('rooms.index') }}">{{trans('view.cancel')}}</a>
              </div>
              <!-- /.box-footer -->
            {!! Form::close()!!}
		</div>
@endsection