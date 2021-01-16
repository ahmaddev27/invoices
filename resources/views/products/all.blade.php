@extends('layouts.master',['title'=>'المنتجات'])
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

                            <th class="border-bottom-0">اسم المنتج</th>
                            <th class="border-bottom-0">الوصف</th>
                            <th class="border-bottom-0">القسم</th>
                            <th class="border-bottom-0">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{$product->Product_name}}</td>
                                <td>{{str_limit($product->description,20 )}}</td>
                                <td><a href="{{route('sections.index')}}">{{$product->section->section_name}}</a></td>
                                <td>

                                    <a class="btn btn-warning btn-icon d-inline-flex" data-effect="effect-scale"
                                       data-id="{{ $product->id }}" data-name="{{ $product->Product_name}}"
                                       data-description="{{ $product->description }}" data-toggle="modal"
                                       href="#exampleModal2" title="تعديل"><i  class="typcn typcn-edit"></i></a>

                                    <button id="delete"  data-id="{{$product->id}}" data-route="{{route('products.delete')}}" title=" حذف" class="btn btn-danger btn-icon d-inline-flex "><i class="typcn typcn-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!-- Add -->
 @include('products._add')

<!-- edit -->
@include('products._edit')


@push('js')

   @include('products._js')

@endpush


@endsection


