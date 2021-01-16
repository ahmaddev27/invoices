@extends('layouts.master',['title'=>'تعديل مستخدم'])
@push('css')
    <!-- Internal Nice-select css  -->
    <link href="{{asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />

@endpush
@section('content')
    <!-- row -->
    <br>
    @include('layouts.errors')

    <div class="row">


        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <form class="parsley-style-2" id="selectForm2" autocomplete="off" name="selectForm2"
                          action="{{route('users.update',[$user->id])}}" method="post">
                      @csrf

                        <div class="">

                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label>اسم المستخدم: <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20" value="{{$user->name,old('name')}}"
                                           data-parsley-class-handler="#lnWrapper" name="name" required="" type="text">
                                </div>

                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20" value="{{$user->email,old('email')}}"
                                           data-parsley-class-handler="#lnWrapper" name="email" required="" type="email">
                                </div>
                            </div>

                        </div>

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>كلمة المرور: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="password"  type="password">
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="password_confirmation" id="password-confirm"  type="password">
                            </div>
                        </div>

                        <div class="row mg-b-20">
                            <div class="col-xs-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label"> صلاحية المستخدم</label>
                                        <select name="role" id="select-beast" class="form-control  nice-select  custom-select">

                                        <option value="" disabled selected>اختار نوع الصلاحيات</option>

                                        @foreach($roles as $role)

                                                <option value="{{$role->id}}" {{ $user->hasRole($role->name)? 'selected':'' }}>{{$role->name}}</option>

                                        @endforeach


                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')



    <!-- Internal Nice-select js-->
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

    <!--Internal  Parsley.min js -->
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
@endpush
