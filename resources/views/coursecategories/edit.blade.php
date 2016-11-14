@extends('backpack::layout')
@section('header')
    <section class="content-header">
      <h1>
        {{ trans('view.course_category') }}<small>{{ trans('view.course_category_detail') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li><a href="{{ route('coursecategories.index') }}">{{trans('view.course_category')}}</a></li>
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
              	@if ($mode === 'U') {{trans('view.course_category_edit') }}
                @else {{trans('view.course_category_create') }}
                @endif
              </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if ($mode === 'U') {!! Form::open(['route' => ['coursecategories.update',$record,$record->id],'method'=>'PUT'] ) !!} 
            @else {!! Form::open(['route' => ['coursecategories.store',$record,$record->id],'method'=>'POST'] ) !!}
            @endif
              <input name="id" type="hidden" value="{{$record->id}}">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='name'> {{trans('view.name') }}</label>
                  <div class="col-sm-10">
                    {{ Form::text('name',$record->name, ['class' => 'form-control']) }} </br>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='description'> {{trans('view.description') }}</label>
                  <div class="col-sm-10">
                    {{ Form::text('description',$record->description, ['class' => 'form-control']) }} </br>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='listorder'> {{trans('view.listorder') }}</label>
                  <div class="col-sm-10">
                    {{ Form::number('listorder',$record->listorder, ['class' => 'form-control']) }} </br>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              	<button type="submit" class="btn btn-info pull-right">{{trans('view.save') }}</button>
			 	         <a class="btn btn-default" href="{{ route('coursecategories.index') }}">{{trans('view.cancel')}}</a>
              </div>
              <!-- /.box-footer -->
            {!! Form::close()!!}
		</div>
    @if ($mode === 'U') @include('shared.recordhistory', [])
    @endif
    
@endsection