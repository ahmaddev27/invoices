@extends('layouts.master',['title'=>'تعديل صلاحية '])
@push('css')

    <style>
        .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
        .toggle.ios .toggle-handle { border-radius: 20rem; }
        .slow  .toggle-group { transition: left 0.7s; -webkit-transition: left 0.7s; }
    </style>

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <!--- Internal Select2 css-->
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">

@endpush


@section('content')
    <br>
    @include('layouts.errors')


    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{route('roles.update',$role->id)}}" method="post">
                        @csrf

                        <div class="form-group col-4">
                            <label>اسم الصلاحية </label>
                            <input type="text" name="name" class="form-control" value="{{$role->name,old('name')}}">
                        </div>

                        <div class="form-group">

                            <table  class="table key-buttons text-md-nowrap " data-page-length='50'
                                   style="text-align: center">


                            <thead>

                                <tr>

                                    <th style="width: 25%">امكانية الوصول</th>
                                    <th> الصلاحيات</th>
                                </tr>
                                </thead>

                                <tbody>

                                @php
                                    $models=['invoices'=>'الفواتير','users'=>'المستخدمين'
                                    ,'roles'=>'الصلاحيات','sections'=>'الاقسام','products'=>'المنتجات'
                                    ,'Reports'=>'التقارير','settings'=>'الاعدادات'];
                                @endphp
                                <tr>
                                    @foreach ($models as $key => $model)
                                        <td>{{$model}}</td>
                                        <td>
                                            @php
                                                $Permissions_maps=['create'=>'اضافة','read'=>'قراءة','update'=>'تعديل',
                                                                                        'delete'=>'حذف'];
                                            @endphp

                                            @if($key=='settings')
                                                @php
                                                    $Permissions_maps=['read'=>'قراءة','update'=>'تعديل'];
                                                @endphp
                                            @endif

                                            @if($key=='invoices')
                                                @php

                                                    $Permissions_maps=['create'=>'اضافة','read'=>'قراءة','update'=>'تعديل','archive'=>'ارشفة','delete'=>'حذف'];                                                @endphp
                                            @endif

                                            <select name="permissions[]" class="form-control select2" multiple>

                                                @foreach($Permissions_maps as $value=> $Permission_map)
                                                    <option value="{{$value . '_' . $key}}"
                                                        {{ $role->hasPermission($value . '_' .  $key)? 'selected' :''}}>{{$Permission_map}}</option>
                                                @endforeach
                                            </select>

                                        </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>


                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success-gradient"><i class="fa fa-edit"> تعديل البيانات</i></button>
                        </div>


                    </form>

            </div>
        </div>
    </div>


@push('js')
    @include('roles._js')

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <!-- Internal Select2 js-->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <!--Internal  Form-elements js-->
    <script src="{{ asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Daepicker js -->
    <script src="{{ asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ asset('assets/js/form-elements.js') }}"></script>


@endpush

@endsection


