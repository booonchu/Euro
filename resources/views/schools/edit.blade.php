@extends('backpack::layout')
@section('header')
    <section class="content-header">
      <h1>
        {{ trans('view.school') }}<small>{{ trans('view.school_detail') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li><a href="{{ route('schools.index') }}">{{trans('view.school')}}</a></li>
        <li class="active">
        	@if ($mode === 'U') {{trans('view.edit') }}
        	@else {{trans('view.create') }}
        	@endif
        </li>
      </ol>
    </section>
@endsection
@section('content')
<div class="container-fluid">
 	<div class="panel panel-default">
 		<div class="panel-heading">
 			<h3 class="panel-title">
 			@if ($mode === 'U') {{trans('view.school_edit') }}
        	@else {{trans('view.school_create') }}
        	@endif</h3>
 		</div>
 		<div class="panel-body">
 			@if ($mode === 'U') {!! Form::open(['route' => ['schools.update',$record,$record->id],'method'=>'PUT'] ) !!} 
        	@else {!! Form::open(['route' => ['schools.store',$record,$record->id],'method'=>'POST'] ) !!}
        	@endif
			 	<div class="form-group">
			 		<label class="col-md-3 control-label"> {{trans('view.usercode') }}</label>
			 		<div class="col-md-9">
			 			{{ Form::text('usercode',$record->usercode, ['class' => 'form-control']) }} </br>
					</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-md-3 control-label"> {{trans('view.school_name') }}</label>
			 		<div class="col-md-9">
			 			{{ Form::text('name',$record->name, ['class' => 'form-control']) }} </br>
					</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-md-3 control-label"> {{trans('view.contact_email') }}</label>
			 		<div class="col-md-9">
			 			{{ Form::text('contact_email',$record->contact_email, ['class' => 'form-control']) }} </br>
					</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-md-3 control-label"> {{trans('view.contact_phone') }}</label>
			 		<div class="col-md-9">
			 			{{ Form::text('contact_phone',$record->contact_phone, ['class' => 'form-control']) }} </br>
					</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-md-3 control-label"> {{trans('view.address') }}</label>
			 		<div class="col-md-9">
			 			{{ Form::text('address',$record->address, ['class' => 'form-control']) }} </br>
					</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-md-3 control-label"> {{trans('view.description') }}</label>
			 		<div class="col-md-9">
			 			{{ Form::text('description',$record->description, ['class' => 'form-control']) }} </br>
					</div>
			 	</div>
			 	<div class="form-group">
			 		<div class="col-md-6 col-md-offset-6">
			 			<button type="submit" class="btn btn-success btn-block">{{trans('view.save') }}</button>
			 			<a class="btn btn-success btn-block" href="{{ route('schools.index') }}">{{trans('view.cancel')}}</a>
			 		</div>
			 	</div>
			 <!--</form>-->
			 {!! Form::close() !!}
 		</div> 
 	</div>
 </div>
@endsection