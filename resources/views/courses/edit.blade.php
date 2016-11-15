@extends('backpack::layout')
@section('header')
    <section class="content-header">
      <h1>
        {{ trans('view.course') }}<small>{{ trans('view.course_detail') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li><a href="{{ route('courses.index') }}">{{trans('view.course')}}</a></li>
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
              	@if ($mode === 'U') {{trans('view.course_edit') }}
                @else {{trans('view.course_create') }}
                @endif
              </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if ($mode === 'U') 
             {!!Form::open(['route' => ['courses.update',$record,$record->id],'method'=>'PUT'] )  !!}
            <!--Form::model($record, array('route' => array('courses.update', $record->id),'method'=>'PUT'))-->
            @else {!! Form::open(['route' => ['courses.store',$record,$record->id],'method'=>'POST'] ) !!}
            @endif
              <input name="id" type="hidden" value="{{$record->id}}">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='usercode'> {{trans('view.usercode') }}</label>
                  <div class="col-sm-10">
                    {{ Form::text('usercode',$record->usercode, ['class' => 'form-control']) }} </br>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='name'> {{trans('view.name') }}</label>
                  <div class="col-sm-10">
                    {{ Form::text('name',$record->name, ['class' => 'form-control']) }} </br>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='course_category_id'> {{trans('view.course_category') }}</label>
                  <div class="col-sm-10">
                    {{ Form::select('course_category_id', $course_category_lists, $record->course_category_id, ['class' => 'form-control']) }} </br>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='total_classes'> {{trans('view.total_classes') }}</label>
                  <div class="col-sm-10">
                    {{ Form::number('total_classes',$record->total_classes, ['class' => 'form-control']) }} </br>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='class_hours'> {{trans('view.class_hours') }}</label>
                  <div class="col-sm-10">
                    {{ Form::number('class_hours',$record->class_hours, ['class' => 'form-control']) }} </br>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='standard_cost'> {{trans('view.standard_cost') }}</label>
                  <div class="col-sm-10">
                    {{ Form::number('standard_cost',$record->standard_cost, ['class' => 'form-control']) }} </br>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='standard_saleprice'> {{trans('view.standard_saleprice') }}</label>
                  <div class="col-sm-10">
                    {{ Form::number('standard_saleprice',$record->standard_saleprice, ['class' => 'form-control']) }} </br>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label"> {{trans('view.category') }}</label>
                  <div class="col-sm-10">
                      <div class="radio">
                          <label>
                            @if($record->is_non_kawai === 1) 
                              <input type="radio" name="is_non_kawai" id="is_non_kawai" value="0">
                            @else
                              <input type="radio" name="is_non_kawai" id="is_non_kawai" value="0" checked=''>
                            @endif
                              {{trans('view.KAWAI') }}
                            </label>
                          <label> 
                            @if($record->is_non_kawai === 1) 
                              <input type="radio" name="is_non_kawai" id="is_non_kawai" value="1" checked=''>
                            @else
                              <input type="radio" name="is_non_kawai" id="is_non_kawai" value="1" >
                            @endif
                              {{trans('view.NONKAWAI') }}
                          </label>
                      </div> 
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for='description'> {{trans('view.description') }}</label>
                  <div class="col-sm-10">
                    {{ Form::textarea('description',$record->description, ['class' => 'form-control','rows' => '3']) }} </br>
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
			 	         <a class="btn btn-default" href="{{ route('courses.index') }}">{{trans('view.cancel')}}</a>
              </div>
              <!-- /.box-footer -->
            {!! Form::close()!!}
		</div>
    @if ($mode === 'U') @include('shared.recordhistory', [])
    @endif
    
@endsection