@extends('backpack::layout')
@section('header')
    <section class="content-header">
      <h1>
        {{ trans('view.course') }}<small>{{ trans('view.course_detail') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{trans('view.course')}}</li>
      </ol>
    </section>
@endsection
@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a class="btn btn-info" href="{{ route('courses.create')}}">{{trans('view.create')}}</a>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <div class="input-group-btn">
                 
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <table class="table table-bordered table-hover" id="myTable">
                 <thead>
                 <tr>
                    <th>{{trans('view.usercode')}}</th>
                    <th>{{trans('view.name')}}</th>
                    <th>{{trans('view.course_category')}}</th>
                    <th>{{trans('view.total_classes')}}</th>
                    <th>{{trans('view.class_hours')}}</th>
                    <th>{{trans('view.standard_cost')}}</th>
                    <th>{{trans('view.standard_saleprice')}}</th>
                    <th>{{trans('view.category')}}</th>
                    <th>{{trans('view.listorder')}}</th>
                    <th>{{trans('view.status')}}</th>
                    <th></th>
                 </tr>
                 </thead>
                   <tbody>
                   @foreach($records as $key=>$record)
                   <tr>
                      <td>{{$record->usercode}}</td>
                      <td>{{$record->name}}</td>
                      <td>{{$record->getCourseCategory->name}}</td>
                      <td>{{$record->total_classes}}</td>
                      <td>{{$record->class_hours}}</td>
                      <td>{{$record->standard_cost}}</td>
                      <td>{{$record->standard_saleprice}}</td>
                      <td>{{$record->getCourseType()}}</td>
                      <td>{{$record->listorder}}</td>
                      <td>{{trans('view.'.$record->status)}}</td>
                      <td>
                       {!! Form::open(['route' => ['courses.destroy',$record->id],'method'=>'DELETE'] ) !!}
                       <a class="btn btn-large btn-success" href="{{ route('courses.edit',$record->id) }}">{{trans('view.edit')}}</a>
                       <button type="submit" class="btn btn-large btn-success">{{trans('view.delete') }}</button>
                       {!! Form::close()!!}
                     </td>
                   </tr>
                   @endforeach

                   </tbody>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</div>
@endsection
