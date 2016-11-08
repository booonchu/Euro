@extends('backpack::layout')
@section('header')
    <section class="content-header">
      <h1>
        {{ trans('view.school') }}<small>{{ trans('view.school_detail') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{trans('view.school')}}</li>
      </ol>
    </section>
@endsection
@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a class="btn btn-info pull-right" href="{{ route('schools.create')}}">{{trans('view.create')}}</a>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <div class="input-group-btn">
                 
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
           <table class="table table-hover" name="myTable">
					 <thead>
					 <tr>
					 	 <th>{{trans('view.usercode')}}</th>
						 <th>{{trans('view.school_name')}}</th>
						 <th>{{trans('view.contact_email')}}</th>
             <th>{{trans('view.contact_phone')}}</th>
             <th>{{trans('view.contact_email')}}</th>
             <th>{{trans('view.school_fee')}}</th>
						 <th>{{trans('view.school_course')}}</th>
             <th>{{trans('view.status')}}</th>
             <th></th>
					 </tr>
					 </thead>
						 <tbody>
						 @foreach($records as $key=>$record)
						 <tr>
							 <td>{{$record->usercode}}</td>
							 <td>{{$record->name}}</td>
							 <td>{{$record->contact_email}}</td>
               <td>{{$record->contact_phone}}</td>
               <td></td>
               <td></td>
							 <td>
								 {!! Form::open(['route' => ['schools.destroy',$record->id],'method'=>'DELETE'] ) !!}
								 <a class="btn btn-large btn-success" href="{{ route('schools.edit',$record->id) }}">{{trans('view.edit')}}</a>
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