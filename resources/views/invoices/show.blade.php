@extends('layouts.master',['title'=>'  تفاصيل الفاتورة '. $invoice->invoice_number])



@push('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endpush

@section('content')
<br>


<!-- row opened -->
<div class="row row-sm">

    <div class="col-xl-12">
        <!-- div -->
        <div class="card mg-b-20" id="tabs-style2">
            <div class="card-body">

                <div class="card-header pb-0">
                    <br>

                    <a href="{{route('invoices.index')}}" class="modal-effect btn btn-outline-primary btn-block col-2">
                        <i class="typcn typcn-book"></i>قائمة الفواتير</a>
                </div>
                <br>

                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">تفاصيل الفاتورة</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <div class="text-wrap">
                    <div class="example">
                        <div class="panel panel-primary tabs-style-2">
                            <div class=" tab-menu-heading">
                                <div class="tabs-menu1">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs main-nav-line">
                                        <li><a href="#tab4" class="nav-link active" data-toggle="tab">معلومات
                                                الفاتورة</a></li>
                                        <li><a href="#tab5" class="nav-link" data-toggle="tab">حالات الدفع</a></li>
                                        <li><a href="#tab6" class="nav-link" data-toggle="tab">المرفقات</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body main-content-body-right border">
                                <div class="tab-content">


                                    <div class="tab-pane active" id="tab4">
                                        <div class="table-responsive mt-15">

                                            <table class="table table-striped" style="text-align:center">
                                                <tbody>
                                                <tr>
                                                    <th scope="row">رقم الفاتورة</th>
                                                    <td>{{ $invoice->invoiceDetials->invoice_number }}</td>
                                                    <th scope="row">تاريخ الاصدار</th>
                                                    <td>{{ $invoice->invoice_Date }}</td>
                                                    <th scope="row">تاريخ الاستحقاق</th>
                                                    <td>{{ $invoice->Due_date }}</td>
                                                    <th scope="row">القسم</th>
                                                    <td>{{ $invoice->Section->section_name }}</td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">المنتج</th>
                                                    <td>{{ $invoice->product }}</td>
                                                    <th scope="row">مبلغ التحصيل</th>
                                                    <td>{{ $invoice->Amount_collection }}</td>
                                                    <th scope="row">مبلغ العمولة</th>
                                                    <td>{{ $invoice->Amount_Commission }}</td>
                                                    <th scope="row">الخصم</th>
                                                    <td>{{ $invoice->Discount }}</td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">نسبة الضريبة</th>
                                                    <td>{{ $invoice->Rate_VAT }}</td>
                                                    <th scope="row">قيمة الضريبة</th>
                                                    <td>{{ $invoice->Value_VAT }}</td>
                                                    <th scope="row">الاجمالي مع الضريبة</th>
                                                    <td>{{ $invoice->Total }}</td>
                                                    <th scope="row">الحالة الحالية</th>

                                                    @if ($invoice->Value_Status == 1)
                                                        <td><span
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
                                                </tr>

                                                <tr>
                                                    <th scope="row">ملاحظات</th>
                                                    <td>{{ $invoice->invoiceDetials->note }}</td>
                                                </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab5">
                                        <div class="table-responsive mt-15">
                                            <table class="table center-aligned-table mb-0 table-hover"
                                                   style="text-align:center">
                                                <thead>
                                                <tr class="text-dark">

                                                    <th>رقم الفاتورة</th>
                                                    <th>نوع المنتج</th>
                                                    <th>القسم</th>
                                                    <th>حالة الدفع</th>
                                                    <th>تاريخ الدفع </th>
                                                    <th>ملاحظات</th>
                                                    <th>تاريخ الاضافة </th>
                                                    <th>المستخدم</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $invoice->invoice_number }}</td>
                                                        <td>{{ $invoice->product }}</td>
                                                        <td>{{ $invoice->Section->section_name }}</td>
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
                                                        <td>{{ $invoice->Payment_Date}}</td>
                                                        <td>{{ $invoice->invoiceDetials->note }}</td>
                                                        <td>{{ $invoice->created_at->diffForHumans() }}</td>
                                                        <td>{{ $invoice->invoiceDetials->user}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab6">
                                        <!--المرفقات-->

                                        @if ($invoice->attachment)
                                        <div class="card card-statistics">



                                            <br>

                                            <div class="table-responsive mt-15">



                                                <table class="table center-aligned-table mb-0 table table-hover"
                                                       style="text-align:center">
                                                    <thead>
                                                    <tr class="text-dark">
                                                        <th scope="col">اسم الملف</th>
                                                        <th scope="col">قام بالاضافة</th>
                                                        <th scope="col">تاريخ الاضافة</th>
                                                        <th scope="col">العمليات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>

                                                                <td>{{ $invoice->attachment->file_name }}</td>
                                                                <td>{{ $invoice->attachment->Created_by }}</td>
                                                            <td>{{ $invoice->created_at->diffForHumans() }}</td>

                                                                <td><a href="{{asset('files/'.$invoice->invoice_number.'/'.
                                                                                 $invoice->attachment->file_name)}}" target="_blank"
                                                                       class="btn btn-info btn-icon d-inline-flex"
                                                                       data-effect="effect-scale"
                                                                       title="معاينة">
                                                                        <i  class="typcn typcn-eye"></i></a>
                                                                </td>


                                                        </tr>

                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                        @else


                                                <div class="d-flex justify-content-center">
                                                    <p class="mt-1 font-weight-light"> لا يوجد مرفقات .</p>
                                                </div>




                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /div -->
    </div>

</div>
<!-- /row -->

<!-- delete -->


@endsection
