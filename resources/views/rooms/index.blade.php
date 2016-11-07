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
<div class="row">
        <div class="col-xs-12">
          <div class="box">
           <div class="box-header">
              <h3 class="box-title">Search</h3>
           </div>
           <!-- /.box-header -->
           {!! Form::open(['route' => ['rooms.index'],'method'=>'GET','class' => 'form-horizontal'] ) !!}
           <div class="box-body">
           		<div class="form-group">
                  <label for="name" class='col-sm-2 control-label'>{{trans('view.roomname')}}</label>
                  <div class="col-sm-10">
                    	{{ Form::text('name',$search['name'], ['class' => 'form-control','placeholder'=> trans('view.roomname')]) }}
                  </div>
                  
                  <!--<input id="name" class="form-control" placeholder="{{trans('view.roomname')}}">-->
			 	</div>
			 	<div class="box-footer">
                	<button class="btn btn-info pull-right" type="submit">{{trans('view.search')}}</button>
                	<a class="btn btn-info pull-right" href="{{ route('rooms.create')}}">{{trans('view.create')}}</a>
              	</div>
           </div>
           {!! Form::close()!!}
          <!-- /.box -->
        </div>
      </div>
</div>
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Result</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <div class="input-group-btn">
                 
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              	<table class="table table-hover">
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
            <!-- /.box-body -->
            {{ $records->links('vendor.pagination.basepagination') }}
          </div>
          <!-- /.box -->
        </div>
      </div>
</div>
@endsection
