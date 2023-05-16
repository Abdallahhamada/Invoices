@extends('layouts.master2')
@section('title')
{{__('login.login')}}
@endsection
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('assets/img/media/login.jpg')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Invo<span>ice</span></h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>{{__('login.welocome back')}} !</h2>
												<h5 class="font-weight-semibold mb-4">{{__('login.please sign in to continue')}}.</h5>
												<form method="POST" action="{{ route('login') }}">
                                                    @csrf
													<div class="form-group">
														<label>{{__('login.email')}}</label> <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('login.enter your email')}}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
													</div>
													<div class="form-group">
														<label>{{__('login.password')}}</label><input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{__('login.enter your password')}}" required autocomplete="current-password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
													</div><button type="submit" class="btn btn-primary">
                                                        {{ __('login.login') }}
                                                    </button>

												</form>

												<div class="main-signin-footer mt-5">
													<p><a href="">{{__('login.forgot password')}}</a></p>
													@if (is_NUll(App\Models\User::first()))
                                                        <p>{{__('login.don\'t have an account')}} <a href="{{ route('register') }}">{{__('login.create an Account')}}</a></p>
                                                    @endif
													<div class="dropdown  nav-itemd-none d-md-flex">
                                                        <a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown" aria-expanded="false">
                                                            <span class="mr-0 align-self-center">{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" x-placement="bottom-end">
                                                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                                        <a class="dropdown-item d-flex" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                                            {{ $properties['native'] }}
                                                                        </a>
                                                                @endforeach
                                                        </div>
                                                    </div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
@endsection
