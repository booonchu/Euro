@extends('backpack::layout')
@section('header')
    <section class="content-header">
      <h1>
        {{ trans('view.school_course') }}<small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li><a href="{{ route('schools.index') }}">{{trans('view.school')}}</a></li>
        <li class="active">{{trans('view.school_course')}}</li>
      </ol>
    </section>
@endsection
@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="callout callout-info">
                 <h4>{{trans('view.school').' '.$record->name}}</h4>
                        <p>
                          <b>{{trans('view.usercode').' '}} :</b>{{$record->usercode}}
                        </p>
                        <p>
                          <b>{{trans('view.currentloyalfee').' '}} :</b><span class="badge bg-green">{{number_format($record->getCurrentLoyaltyFee(),2)}}%</span>
                        </p>
              </div>
              {!! Form::open(['route' => ['schoolcourses.store',$record,$record->id],'method'=>'POST'] ) !!}
              {{ Form::hidden('school_id', $record->id) }}
              <div class="form-group">
                <label> {{trans('view.course') }}</label>
                {{ Form::select('course_id', $course_lists, '', ['class' => 'form-control']) }} </br>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label> {{trans('view.cost') }}</label>
                 {{ Form::text('cost','0', ['class' => 'form-control']) }} </br>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label> {{trans('view.saleprice') }}</label>
                 {{ Form::text('saleprice','0', ['class' => 'form-control']) }} </br>
                <!-- /.input group -->
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">{{trans('view.create') }}</button>                 
              </div>
              {!! Form::close()!!}

            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="box-body table-responsive no-padding">
                   <table class="table table-hover" id="myTable">
                   <thead>
                   <tr>
                     <th>{{trans('view.course')}}</th>
                     <th>{{trans('view.cost')}}</th>
                     <th>{{trans('view.saleprice')}}</th>
                     <th>{{trans('view.status')}}</th>
                     <th></th>
                   </tr>
                   </thead>
                     <tbody>
                      @foreach($record->SchoolCourses as $key=>$courserecord)
                       <tr>
                         <td>{{$courserecord->getCourse->name}}</td>
                         <td>{{trans('view.current')}}: {{number_format($courserecord->getCurrentCost(),2)}}
                            | <a href="{{ route('schoolcoursecosthistory.index',['id' => $courserecord->id,'schoolid'=> $record->id])  }}">{{trans('view.detail')}}</a>
                         </td>
                         <td>1000</td>
                         <td>{{$courserecord->status}}</td>
                         <td>
                             {!! Form::open(['route' => ['schoolcourses.destroy',$courserecord->id],'method'=>'DELETE'] ) !!}
                             <button type="submit" class="btn btn-large btn-success">{{trans('view.delete') }}</button>
                             {!! Form::close()!!}
                         </td>
                       </tr>
                       @endforeach
                     </tbody>
                    </table>
                </div>
             </div> 
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</div>
@endsection
@section('after_scripts')
<script type="text/javascript">
$(function () {
//Date picker
    $('#effective_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
});
</script>
@endsection