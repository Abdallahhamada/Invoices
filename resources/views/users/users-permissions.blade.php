@extends('layouts.master')
@section('title')
{{ __('users.permissions') }}
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
							<h4 class="content-title mb-0 my-auto">{{ __('users.permissions') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('users.permissions') }}</span>
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
                                @can('add permissions')
                                    <div class="row row-xs wd-xl-80p">
                                        <div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
                                            <a class="btn btn-outline-success btn-block" data-target="#modaldemo1" data-toggle="modal" href=""><i class="fa-solid fa-plus"></i>  {{ __('users.add permissions') }}</a>
                                        </div>
                                    </div>
                                @endcan
							</div>
							<div class="card-body">
                                <div class="col-xl-12">
                                        <div class="row  d-flex align-items-center " style="height:100px">
                                            <img src="{{asset($user->photo)}}" style="height:100%;" class="col-2" alt="user photo" title="{{__('users.press to show photo')}}"/>
                                            <div class="details col-10" style="box-sizing: border-box">
                                                <p>{{__('users.name')}} : <span>{{$user->name}}</span></p>
                                                <p>{{__('users.email')}} : <span>{{$user->email}}</span></p>
                                            </div>
                                        </div>
                                </div><br/>
                                <h1 class=" text-center">{{__('users.user permissions')}}</h1><br/>
                                <form action="{{route('permissions.destroy',$user->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="table-responsive">
                                        <table class="table text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="wd-5p border-bottom-0">{{__('users.select')}}</th>
                                                    <th class="wd-15p border-bottom-0">{{ __('users.permission name') }}</th>
                                                    <th class="wd-5p border-bottom-0">{{__('users.select')}}</th>
                                                    <th class="wd-15p border-bottom-0">{{ __('users.permission name') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $index=>$info)
                                                    @if ($index % 2 == 0)
                                                        <tr>
                                                    @endif
                                                        <td>
                                                            <input type="checkbox" name="name[]" value="{{$info->name}}"/>
                                                        </td>
                                                        <td>{{$info->name}}</td>
                                                    @if ($index%2!=0)
                                                        </tr>
                                                    @endif
                                                @endforeach

                                            </tbody>
                                        </table>
								    </div>
                                    @csrf
                                    @method('delete')
                                    <div class="form-group mb-3 d-flex justify-content-center">
                                        <button type="submit" name="delete_user_permission" class="btn btn-danger">{{ __('users.delete') }}</button>
                                    </div>
                                </form>
							</div>
						</div>
                        @can('add permissions')
                            <div class="modal" id="modaldemo1">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content tx-size-sm">
                                        <div class="modal-body tx-center  pd-y-20 pd-x-20">
                                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                                            <h1 class="tx-center">{{ __('users.add permissions') }}</h1>
                                            <form class="form-horizontal" action={{route('permissions.store')}} method="post">
                                                @csrf
                                                <div class="table-responsive">
                                                    <table class="table text-md-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th class="wd-5p border-bottom-0">{{__('users.select')}}</th>
                                                                <th class="wd-15p border-bottom-0">{{ __('users.permission name') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @isset($rmPermission)
                                                                @foreach ($rmPermission as $info)
                                                                    <tr>
                                                                        <td>
                                                                            <input type="hidden" name="id" value="{{$user->id}}"/>
                                                                            <input type="checkbox" name="name[]" value="{{$info}}"/>
                                                                        </td>
                                                                        <td>{{$info}}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endisset

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="form-group mb-3 justify-content-around">
                                                    <button type="submit" class="btn ripple btn-success pd-x-25">{{ __('permissions.add') }}</button>
                                                    <button type="button" aria-label="Close" data-dismiss="modal" class="btn btn-danger">{{ __('permissions.cancel') }}</button>
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
