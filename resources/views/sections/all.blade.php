@extends('layouts.master',['title'=>'الاقسام'])
@push('css')

    <!-- Internal Data table css -->
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">


@endpush


@section('content')
<br>
@include('layouts.errors')


<div class="mt-3 col-xl-12">
        <div class="card mg-b-20">

            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                        <a class="modal-effect btn btn-outline-primary btn-block col-2" data-effect="effect-scale"
                           data-toggle="modal" href="#modaldemo8"><i class="typcn typcn-plus"></i>اضافة</a>

                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th class="border-bottom-0">#</th>

                            <th class="border-bottom-0">اسم القسم</th>
                            <th class="border-bottom-0">الوصف</th>
                            <th class="border-bottom-0">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sections as $section)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{$section->section_name}}</td>
                                <td>{{str_limit( $section->description ,50)}}</td>
                                <td>

                                    <a class="btn btn-warning btn-icon d-inline-flex" data-effect="effect-scale"
                                       data-id="{{ $section->id }}" data-section_name="{{ $section->section_name }}"
                                       data-description="{{ $section->description}}" data-toggle="modal"
                                       href="#exampleModal2" title="تعديل"><i  class="typcn typcn-edit"></i></a>

                                    <button id="delete"  data-id="{{$section->id}}" data-route="{{route('sections.delete')}}" title=" حذف" class="btn btn-danger btn-icon d-inline-flex "><i class="typcn typcn-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

{{--Add--}}
@include('sections._add')


<!-- edit -->

@include('sections._edit')


@push('js')

   @include('sections._js')

@endpush


@endsection


