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
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">
              	@if ($mode === 'U') {{trans('view.school_edit') }}
                @else {{trans('view.school_create') }}
                @endif
              </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if ($mode === 'U') {!! Form::open(['route' => ['schools.update',$record,$record->id],'method'=>'PUT'] ) !!} 
            @else {!! Form::open(['route' => ['schools.store',$record,$record->id],'method'=>'POST'] ) !!}
            @endif
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='usercode'> {{trans('view.usercode') }}</label>
                  <div class="col-sm-10">
                    {{ Form::text('usercode',$record->usercode, ['class' => 'form-control']) }} </br>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='name'> {{trans('view.school_name') }}</label>
                  <div class="col-sm-10">
                    {{ Form::text('name',$record->name, ['class' => 'form-control']) }} </br>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='contact_email'> {{trans('view.contact_email') }}</label>
                  <div class="col-sm-10">
                    {{ Form::email('contact_email',$record->contact_email, ['class' => 'form-control']) }} </br>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='contact_phone'> {{trans('view.contact_phone') }}</label>
                  <div class="col-sm-10">
                    {{ Form::text('contact_phone',$record->contact_phone, ['class' => 'form-control']) }} </br>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='address'> {{trans('view.address') }}</label>
                  <div class="col-sm-10">
                    {{ Form::textarea('address',$record->address, ['class' => 'form-control','rows' => '3', 'placeholder'=>trans('view.address')]) }} </br>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='usercode'> {{trans('view.description') }}</label>
                  <div class="col-sm-10">
                    {{ Form::textarea('description',$record->description, ['class' => 'form-control','rows' => '3', 'placeholder'=>trans('view.description')]) }} </br>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              	<button type="submit" class="btn btn-info pull-right">{{trans('view.save') }}</button>
			 	         <a class="btn btn-default" href="{{ route('schools.index') }}">{{trans('view.cancel')}}</a>
              </div>
              <!-- /.box-footer -->
            {!! Form::close()!!}
		</div>
    @if ($mode === 'U') @include('shared.recordhistory', [])
    @endif
    
@endsection