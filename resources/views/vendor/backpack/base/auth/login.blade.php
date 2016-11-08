@extends('backpack::layout')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">เข้าสู่ระบบ</div>
                </div>
                <div class="box-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/login') }}">
                        {!! csrf_field() !!}

						<!-- username -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">ชื่อผู้ใช้</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" value="user1@gmail.com">
							
								@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
                            </div>
						</div>
						
						<!-- password -->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">รหัสผ่าน</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" value="Password.1">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<!-- school -->
                        <div class="form-group{{ $errors->has('school_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">โรงเรียน</label>

                            <div class="col-md-6">
								<select class="form-control">
								  <option></option>
								  <option>สาขาเซ็นทรัลเวิลด์</option>
								  <option>สาขาเซ็นทรัลลาดพร้าว</option>
								  <option>สาขาชิดลม</option>
								</select>
							
								@if ($errors->has('school_id'))
									<span class="help-block">
										<strong>{{ $errors->first('school_id') }}</strong>
									</span>
								@endif
                            </div>
						</div>
						
                        <!--div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> {{ trans('backpack::base.remember_me') }}
                                    </label>
                                </div>
                            </div>
                        </div-->

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    เข้าสู่ระบบ
                                </button>

                                <!--a class="btn btn-link" href="{{ url(config('backpack.base.route_prefix').'/password/reset') }}">{{ trans('backpack::base.forgot_your_password') }}</a-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
