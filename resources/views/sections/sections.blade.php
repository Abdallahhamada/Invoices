@extends('layouts.master')
@section('title')
{{ __('sections.sections') }}
@endsection
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Internal Owl Carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<!---Internal  Multislider css-->
<link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<!--- Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ __('sections.settings') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('sections.sections') }}</span>
						</div>
					</div>
				</div>
                @include('layouts.messages')
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
                                @can('add sections')
                                    <div class="row row-xs wd-xl-80p">
                                        <div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
                                            <a class="btn btn-outline-success btn-block" data-target="#modaldemo1" data-toggle="modal" href=""><i class="fa-solid fa-plus"></i>  {{ __('sections.add section') }}</a>
                                        </div>
                                    </div>
                                @endcan
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-5p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">{{ __('sections.name') }}</th>
												<th class="wd-15p border-bottom-0">{{ __('sections.description') }}</th>
												<th class="wd-15p border-bottom-0">{{ __('sections.created by') }}</th>
												<th class="wd-15p border-bottom-0">{{ __('sections.operations') }}</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($data as $info)
                                                <tr>
                                                    <td>{{$info->id}}</td>
                                                    <td>{{$info->section_name}}</td>
                                                    <td>{{$info->description}}</td>
                                                    <td>{{$info->user->name}}</td>
                                                    <td class="d-flex justify-content-around">
                                                        @can('edit sections')
                                                            <a href={{route('sections.edit',$info->id)}} class="btn btn-outline-warning "><i class="fa-regular fa-pen-to-square"></i> {{ __('sections.edit') }}</a>
                                                        @endcan
                                                        @can('delete sections')
                                                            <form action={{route('sections.destroy',$info->id)}} method="post">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="delete">
                                                                <button type="submit" class="btn btn-outline-danger "><i class="fa-regular fa-trash"></i> {{ __('sections.delete') }}</button>
                                                            </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach

										</tbody>
									</table>
								</div>
							</div>
						</div>
                        @can('add sections')
                            <div class="modal" id="modaldemo1">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content tx-size-sm">
                                        <div class="modal-body tx-center  pd-y-20 pd-x-20">
                                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                                            <h1 class="tx-center">{{ __('sections.add section') }}</h1>
                                            <form class="form-horizontal" action={{route('sections.store')}} method="post">
                                                @csrf
                                                <div class="form-group">
                                                        <input type="text" class="form-control @error('section_name') is-invalid @enderror" name="section_name" value="{{old('section_name')}}" placeholder={{ __('sections.name') }}>
                                                        @error('section_name')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control @error('description') is-invalid @enderror"  name="description" placeholder="{{ __('sections.description') }}" value="{{old('description')}}">
                                                        @error('description')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name='created_by' value={{auth()->user()->id}}>
                                                </div>
                                                <div class="form-group mb-3 d-flex justify-content-around">
                                                    <button type="submit" class="btn ripple btn-success pd-x-25">{{ __('sections.add') }}</button>
                                                    <button type="button" aria-label="Close" data-dismiss="modal" class="btn btn-danger">{{ __('sections.cancel') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endcan
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
<script src="{{URL::asset('assets/js/table-data.js')}}"></script><!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
@endsection
