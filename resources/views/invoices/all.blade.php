@extends('layouts.master',['title'=>'قائمة الفواتير'])
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

    <div class="mt-3 col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">قائمة الفواتير</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <a href="{{route('invoices.create')}}" class="modal-effect btn btn-outline-primary btn-block col-2">
                    <i class="typcn typcn-plus"></i>اضافة</a>
                <br>
                <a class="modal-effect btn  btn-primary" href="{{ route('invoices.excel') }}"
                   style="color:white"><i class="fas fa-file-excel"></i>&nbsp;تصدير اكسيل</a>

            </div>






            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
                        <thead>
                        <tr>
                            <th class=" wd-10p border-bottom-0 sorting">رقم الفاتورة</th>
                            <th class="wd-15p border-bottom-0 sorting">تاريخ الاستحقاق</th>
                            <th class="wd-15p border-bottom-0 sorting">المنتج</th>
                            <th class=" border-bottom-0 sorting">الاجمالي</th>
                            <th class="wd-15p border-bottom-0 sorting">الحالة</th>
                            <th class="wd-35p border-bottom-0 sorting">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
                        <tr>

                            <td>{{$invoice->invoice_number}}</td>
                            <td>{{$invoice->Due_date}}</td>
                            <td>{{$invoice->product}}</td>

                            <td>{{$invoice->Total}}</td>

                            @if ($invoice->Value_Status == 1)
                                <td>
                                    <span
                                        class="badge badge-pill badge-success">{{ $invoice->Status }}</span>
                                </td>
                            @elseif($invoice->Value_Status ==2)
                                <td><span
                                        class="badge badge-pill badge-danger">{{ $invoice->Status }}</span>
                                </td>
                            @else
                                <td><span
                                        class="badge badge-pill badge-warning">{{ $invoice->Status }}</span>
                                </td>
                            @endif


                            <td>
                                <a class="btn btn-info-gradient btn-icon d-inline-flex" data-effect="effect-scale"
                                   href="{{route('invoices.show',$invoice->id)}}" title="التفاصيل"><i  class="typcn typcn-eye"></i></a>

                                <a class="btn btn-warning-gradient btn-icon d-inline-flex" data-effect="effect-scale"
                                   href="{{route('invoices.edit',$invoice->id)}}" title="تعديل"><i  class="typcn typcn-edit"></i></a>

                                <button id="delete"  data-route="{{route('invoices.delete')}}"
                                        title="حذف"data-id="{{$invoice->id}}"class="btn btn-danger-gradient btn-icon d-inline-flex ">
                                    <i class="typcn typcn-trash"></i></button>



                                <button id="status" data-route="{{route('invoices.status')}}"
                                        title="تغير حالة الدفع"data-id="{{$invoice->id}}"class="btn btn-success-gradient btn-icon d-inline-flex ">
                                    <i class="fa fa-money-check"></i></button>

                                <a class="btn btn-primary-gradient btn-icon d-inline-flex" data-effect="effect-scale"
                                   href="{{route('invoices.print',$invoice->id)}}" title="طباعة"><i  class="typcn typcn-printer"></i></a>


                                <button id="archive"  data-route="{{route('invoices.archive')}}"
                                        title="نقل الى الارشيف"data-id="{{$invoice->id}}"class="btn btn-secondary-gradient btn-icon d-inline-flex ">
                                    <i class="typcn typcn-archive"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@push('js')

    @include('invoices._js')

@endpush

@endsection


