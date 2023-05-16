@extends('layouts.master')
@section('title')
{{ __('invoices.unpaied invoices') }}
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
							<h4 class="content-title mb-0 my-auto">{{ __('invoices.invoices') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('invoices.unpaied invoices') }}</span>
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
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-5p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">{{ __('invoices.invoice number') }}</th>
												<th class="wd-15p border-bottom-0">{{ __('invoices.invoice date') }}</th>
												<th class="wd-15p border-bottom-0">{{ __('invoices.due date') }}</th>
												<th class="wd-15p border-bottom-0">{{ __('invoices.product') }}</th>
												<th class="wd-15p border-bottom-0">{{ __('invoices.section') }}</th>
												<th class="wd-5p border-bottom-0">{{ __('invoices.discount') }}</th>
												<th class="wd-15p border-bottom-0">{{ __('invoices.rate vat') }}</th>
												<th class="wd-15p border-bottom-0">{{ __('invoices.value vat') }}</th>
												<th class="wd-15p border-bottom-0">{{ __('invoices.total') }}</th>
												<th class="wd-15p border-bottom-0">{{ __('invoices.status') }}</th>
												<th class="wd-15p border-bottom-0">{{ __('invoices.note') }}</th>
												<th class="wd-25p border-bottom-0">{{ __('invoices.operation') }}</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($data as $info)
                                                <tr>
                                                    <td>{{$info->id}}</td>
                                                    <td>{{$info->invoice_number}}</td>
                                                    <td>{{$info->invoice_date}}</td>
                                                    <td>{{$info->due_date}}</td>
                                                    <td>{{$info->product}}</td>
                                                    <td>{{$info->section->section_name}}</td>
                                                    <td>{{$info->discount}}</td>
                                                    <td>{{$info->rate_vat}}</td>
                                                    <td>{{$info->value_vat}}</td>
                                                    <td>{{$info->total}}</td>
                                                    <td>{{$info->status}}</td>
                                                    <td>{{$info->note}}</td>
                                                    <td class="d-flex justify-content-center ">
                                                        <a href={{route('invoices.show',$info->id)}} class="btn btn-outline-primary "><i class="fa-regular fa-eye"></i> {{ __('invoices.show') }}</a>
                                                        <a href={{route('invoices.edit',$info->id)}} class="btn btn-outline-warning "><i class="fa-regular fa-pen-to-square"></i> {{ __('invoices.edit') }}</a>
                                                        <form action={{route('invoices.destroy',$info->id)}} method="post">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="delete">
                                                            <button type="submit" class="btn btn-outline-danger "><i class="fa-regular fa-trash"></i> {{ __('invoices.delete') }}</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

										</tbody>
									</table>
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
