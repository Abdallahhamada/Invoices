@extends('layouts.master')
@section('title')
{{ __('users.users') }}
@endsection
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
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
							<h4 class="content-title mb-0 my-auto">{{ __('sections.settings') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('users.users') }}</span>
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
                                @can('add users')
                                    <div class="row row-xs wd-xl-80p">
                                        <div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
                                            <a class="btn btn-outline-success btn-block" data-target="#modaldemo1" data-toggle="modal" href=""><i class="fa-solid fa-user-plus"></i>  {{ __('users.add users') }}</a>
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
												<th class="wd-15p border-bottom-0">{{ __('users.name') }}</th>
												<th class="wd-15p border-bottom-0">{{ __('users.email') }}</th>
												<th class="wd-10p border-bottom-0">{{ __('users.photo') }}</th>
												<th class="wd-15p border-bottom-0">{{ __('users.operations') }}</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($data as $info)
                                                <tr>
                                                    <td >{{$info->id}}</td>
                                                    <td>{{$info->name}}</td>
                                                    <td>{{$info->email}}</td>
                                                    <td>
                                                        <a href="{{asset($info->photo)}}" target="_blank">
                                                            <img src="{{asset($info->photo)}}"  style="height: 40px;width:40px;border-radius:50%" alt="user photo" title="{{__('users.press to show photo')}}"/>
                                                        </a>
                                                    </td>
                                                    <td class="d-flex justify-content-around">
                                                        @can('edit users')
                                                            <a href={{route('users.edit',$info->id)}} class="btn btn-outline-warning "><i class="fa-regular fa-pen-to-square"></i> {{ __('users.edit') }}</a>
                                                        @endcan
                                                        @can('show permissions')
                                                            <a href={{route('permissions.show',$info->id)}} class="btn btn-outline-success "><i class="fa-regular fa-eye"></i> {{ __('users.show permissions') }}</a>
                                                        @endcan
                                                        @can('delete users')
                                                            <form action={{route('users.destroy',$info->id)}} method="post">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="delete">
                                                                <button type="submit" class="btn btn-outline-danger "><i class="fa fa-trash"></i> {{ __('users.delete') }}</button>
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
                        @can('add users')
                            <div class="modal" id="modaldemo1">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content tx-size-sm">
                                        <div class="modal-body tx-center  pd-y-20 pd-x-20">
                                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                                            <h1 class="tx-center">{{ __('users.add users') }}</h1>
                                            <form class="form-horizontal" action={{route('users.store')}} method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
													<label>{{ __('register.name') }}</label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="{{ __('register.enter your name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
												</div>
												<div class="form-group">
													<label>{{ __('register.email') }}</label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('register.enter your email') }}" required autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
												</div>
												<div class="form-group">
													<label>{{ __('register.password') }}</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('register.enter your password') }}" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
												</div>
												<div class="form-group">
													<label>{{ __('register.confirm password') }}</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('register.confirm password') }}" required autocomplete="new-password">
												</div>
                                                <div class="form-group">
                                                    <p class="text-danger">* {{ __('invoices.attachment format') }} jpeg ,.jpg , png </p>
                                                    <h5 class="card-title">{{ __('invoices.attachments') }}</h5>
                                                    <input type="file" name="image" class="dropify" accept=".jpg, .png, image/jpeg, image/png" data-height="70" />
                                                </div>
                                                <div class="form-group">
                                                    @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3 d-flex justify-content-around">
                                                    <button type="submit" class="btn ripple btn-success pd-x-25">{{ __('users.add') }}</button>
                                                    <button type="button" aria-label="Close" data-dismiss="modal" class="btn btn-danger">{{ __('users.cancel') }}</button>
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
