@extends('backpack::layout')
@section('header')
    <section class="content-header">
      <h1>
        {{ trans('view.schoolloyalfeehistory') }}<small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li><a href="{{ route('schools.index') }}">{{trans('view.school')}}</a></li>
        <li class="active">{{trans('view.loyalty_fee')}}</li>
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
              {!! Form::open(['route' => ['schoolloyaltyfeehistory.store',$record,$record->id],'method'=>'POST'] ) !!}
              {{ Form::hidden('school_id', $record->id) }}
              <label for='effective_date'> {{trans('view.effective_date') }}</label>
              {{ Form::date('effective_date','', ['class' => 'form-control']) }}
              <label for='loyalty_fee'> {{trans('view.loyalty_fee') }}</label>
              {{ Form::number('loyalty_fee','0', ['class' => 'form-control']) }}
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
                     <th>{{trans('view.loyalty_fee')}}</th>
                     <th>{{trans('view.effective_date')}}</th>
                     <th>{{trans('view.created_by')}}</th>
                   </tr>
                   </thead>
                     <tbody>
                      @foreach($record->SchoolLoyaltyFeeHistory as $key=>$feerecord)
                       <tr>
                         <td>{{$feerecord->effective_date}}</td>
                         <td>{{number_format($feerecord->loyalty_fee,2)}}%</td>
                         <th>{{ $feerecord->CreatedBy->name}}</th>
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