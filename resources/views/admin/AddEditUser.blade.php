@extends('admin.welcome')
@section('title','|  بيانات الألبوم')
@section('header')

@endsection
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row ar" runat="server" id="pnlTable">
        <div class="col-sm-12">
            <!-- start: TEXT FIELDS PANEL -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>
                    إضافة / تعديل مستخدم
                </div>
                <div class="panel-body">
                    @if(isset($user))
                        {!! Form::model($user, [
                               'id'=>'myFom',
                              'method' => 'PATCH',
                              'route' => ['register.update', $user->id]
                          ])
                          !!}
                    @else
                        {!! Form::open(['id'=>'myFom','url' => '/register']) !!}

                    @endif


                    <div class="form-group">
                        <label  class="col-sm-2 control-label">
                            اسم المستخدم
                        </label>
                        <div class="col-sm-9">
                            {!! Form::text('first_name',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtFullName" class="col-sm-2 control-label">
                            الاسم كاملاً
                        </label>
                        <div class="col-sm-9">
                            {!! Form::text('last_name',null,['class'=>'form-control']) !!}  </div>
                    </div>
                        @if(!isset($user))
                    <div class="form-group">
                        <label for="txtPassword" class="col-sm-2 control-label">
                            كلمة المرور
                        </label>
                        <div class="col-sm-9">
                           {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                        @endif
                        <div class="form-group ">
                            <label for="ddlUserType" class="col-sm-2 control-label">
                                تصنيف المستخدم
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control" >
                                    @if(isset($roles))
                                        @foreach($roles as $role)
                                            <option <?php if(isset($myrole)&& $role->id==$myrole){ ?>selected<?php } ?> value="{{$role->id}}">{{$role->slug}}</option>
                                        @endforeach
                                        @endif
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtEmail" class="col-sm-2 control-label">
                                بريد إلكتروني
                            </label>
                            <div class="col-sm-9">
                                {!! Form::email('email',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtEmail" class="col-sm-2 control-label">
                              فعال
                            </label>
                            <div class="col-sm-9">
                                @if(isset($active))
                               {!! Form::checkbox('active',null,$active)   !!}
                                  @else
                                    {!! Form::checkbox('active',null)   !!}
                                    @endif
                            </div>
                        </div>


                <div class="form-group">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-9">
                        <button type="submit"  class="btn btn-md blue">حفظ</button>
                        <a  href="../" class="btn yellow">رجوع</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- end: TEXT FIELDS PANEL -->
    </div>
@endsection
@section('footer')
@endsection