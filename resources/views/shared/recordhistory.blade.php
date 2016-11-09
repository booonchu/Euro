<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">{{trans('view.changehistory')}}</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
        <tr>
          <th>User</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($record->getSystemAuditHistory() as $key=>$history)
             <tr>
               <td>{{$history->user}}</td>
               <td>{{$history->date}}</td>
               <td>
                @if($history->action === 'Insert')
                  <span class="label label-success">{{$history->action}}</span>
                @else
                  <span class="label label-warning">{{$history->action}}</span>
                @endif
                </td>
             </tr>
             @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix">
  </div>
  <!-- /.box-footer -->
</div>