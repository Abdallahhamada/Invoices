@extends('layouts.master')
@section('title')
{{ __('invoices.show invoice') }}
@endsection
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ __('invoices.invoices') }}</h4>
                            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('invoices.show invoice') }}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
                                <div class="panel panel-primary tabs-style-2">
                                    <div class=" tab-menu-heading">
                                        <div class="tabs-menu1">
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs main-nav-line">
                                                <li><a href="#tab1" class="nav-link active" data-toggle="tab">{{ __('invoices.invoice information') }}</a></li>
                                                <li><a href="#tab2" class="nav-link" data-toggle="tab">{{ __('invoices.invoice details') }}</a></li>
                                                <li><a href="#tab3" class="nav-link" data-toggle="tab">{{ __('invoices.invoice attachments') }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body main-content-body-right border">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab1">
                                                <!--div-->
                                                <div class="table-responsive">
                                                    <table class="table table-striped mg-b-0 text-md-nowrap">
                                                        <tbody>
                                                            <tr>
                                                                <th class="wd-15p border-bottom-0">{{ __('invoices.invoice number') }} :</th>
                                                                <td>{{$invoice->invoice_number}}</td>
                                                                <th class="wd-15p border-bottom-0">{{ __('invoices.invoice date') }} :</th>
                                                                <td>{{$invoice->invoice_date}}</td>
                                                                <th class="wd-15p border-bottom-0">{{ __('invoices.due date') }} :</th>
                                                                <td>{{$invoice->due_date}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="wd-15p border-bottom-0">{{ __('invoices.product') }} :</th>
                                                                <td>{{$invoice->product}}</td>
                                                                <th class="wd-15p border-bottom-0">{{ __('invoices.section') }} :</th>
                                                                <td>{{$invoice->section->section_name}}</td>
                                                                <th class="wd-15p border-bottom-0">{{ __('invoices.discount') }} :</th>
                                                                <td>{{$invoice->discount}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="wd-15p border-bottom-0">{{ __('invoices.rate vat') }} :</th>
                                                                <td>{{$invoice->rate_vat}}</td>
                                                                <th class="wd-15p border-bottom-0">{{ __('invoices.value vat') }} :</th>
                                                                <td>{{$invoice->value_vat}}</td>
                                                                <th class="wd-15p border-bottom-0">{{ __('invoices.total') }} :</th>
                                                                <td>{{$invoice->total}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="wd-15p border-bottom-0">{{ __('invoices.status') }} :</th>
                                                                <td>{{$invoice->status}}</td>
                                                                <th class="wd-15p border-bottom-0">{{ __('invoices.note') }} :</th>
                                                                <td>{{$invoice->note}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div><!-- bd -->
                                            </div>
                                                <div class="tab-pane" id="tab2">
                                                    <div class="table-responsive">
                                                        <table class="table mg-b-0 text-md-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th class="wd-10p border-bottom-0">{{ __('invoices.invoice number') }}</th>
                                                                    <th class="wd-15p border-bottom-0">{{ __('invoices.product') }}</th>
                                                                    <th class="wd-15p border-bottom-0">{{ __('invoices.section') }}</th>
                                                                    <th class="wd-10p border-bottom-0">{{ __('invoices.status') }}</th>
                                                                    <th class="wd-15p border-bottom-0">{{ __('invoices.note') }}</th>
                                                                    <th class="wd-15p border-bottom-0">{{ __('invoices.created at') }}</th>
                                                                    <th class="wd-20p border-bottom-0">{{ __('invoices.user') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    @isset($invoiceDetails)
                                                                        <td scope="row">{{$invoiceDetails->invoice_number}}</td>
                                                                        <td>{{$invoiceDetails->product}}</td>
                                                                        <td>{{$invoiceDetails->section->section_name}}</td>
                                                                        <td>{{$invoiceDetails->status}}</td>
                                                                        <td>{{$invoiceDetails->note}}</td>
                                                                        <td>{{$invoiceDetails->created_at}}</td>
                                                                        <td>{{$invoiceDetails->user}}</td>
                                                                    @endisset
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <div class="tab-pane" id="tab3" >
                                                <div class="table-responsive">
                                                    <table class="table mg-b-0 text-md-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th class="wd-10p border-bottom-0">{{ __('invoices.invoice number') }}</th>
                                                                <th class="wd-20p border-bottom-0">{{ __('invoices.file name') }}</th>
                                                                <th class="wd-20p border-bottom-0">{{ __('invoices.user') }}</th>
                                                                <th class="wd-20p border-bottom-0">{{ __('invoices.operation') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @isset($invoiceAttachments)
                                                                <tr>
                                                                    <td scope="row">{{$invoiceAttachments->invoice_number}}</td>
                                                                    <td>{{$invoiceAttachments->file_name}}</td>
                                                                    <td>{{$invoiceAttachments->user}}</td>
                                                                    <td class="d-flex justify-content-around ">
                                                                        <a href={{asset('storage/'.$invoiceAttachments->file_name)}} class="btn btn-outline-primary "><i class="fa-regular fa-eye"></i> {{ __('invoices.show') }}</a>
                                                                        <a href={{asset('storage/'.$invoiceAttachments->file_name)}} class="btn btn-outline-success " download><i class="fa fa-arrow-down"></i> {{ __('invoices.download') }}</a>
                                                                        <form action={{route('invoice-attachment.destroy',$invoice->invoice_number)}} method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="_method" value="delete">
                                                                            <button type="submit" class="btn btn-outline-danger "><i class="fa-regular fa-trash"></i> {{ __('invoices.delete') }}</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endisset
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                    </div>
                                    </div>
                                </div>

							</div>
						</div>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection
