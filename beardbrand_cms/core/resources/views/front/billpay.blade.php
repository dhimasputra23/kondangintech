@extends('front.layout')

@section('meta-keywords', "$setting->meta_keywords")
@section('meta-description', "$setting->meta_description")
@section('content')

	<!--Main Breadcrumb Area Start -->
	<div class="main-breadcrumb-area" style="background-image : url('{{ asset('assets/front/img/' . $commonsetting->breadcrumb_image) }}');">
        <div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="pagetitle">
						{{ __('Pay Bill') }}
					</h1>
					<ul class="pages">
						<li>
							<a href="{{ route('front.index') }}">
								{{ __('Home') }}
							</a>
						</li>
						<li class="active">
							<a href="#">
								{{ __('Pay Bill') }}
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--Main Breadcrumb Area End -->

	<!-- PayBill Area Start -->
	<form class="needs-validation" action="javascript:;" id="payment_gateway_check" method="POST">
		@csrf
	<section class="pricingPlan-section packag-page">
		<div class="container">
			<div class="row">
				@if(Auth::user()->activepackage !== null)
					@if($billpayed !== null)
						<div class="col-lg-8">
							<h4 class="mb-4"><strong>{{ __('This month bill is paid :') }}</strong></h4>
							<table class="table border table-striped">
								<tbody>
									<tr>
										<th scope="row">{{ __('Username') }}</th>
										<td>{{ Auth::user()->username }}</td>
									</tr>
									<tr>
										<th scope="row">{{ __('Email') }}</th>
										<td>{{ Auth::user()->email }}</td>
									</tr>
									<tr>
										<th scope="row">{{ __('Phone') }}</th>
										<td>{{ Auth::user()->phone }}</td>
									</tr>
									<tr>
										<th scope="row">{{ __('Current Date') }}</th>
										<td>{{ \Carbon\Carbon::now()->format('M d, Y') }}</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-lg-4">
							<h4 class="mb-4"><strong>{{ __('Active Package :') }}</strong></h4>
							<div class="single-price">
								<h4 class="name">
									{{ $packagedetails->name }}
								</h4>
								<div class="mbps">
									{{ $packagedetails->speed }} <span>{{ __('Mbps') }}</span>
								</div>


								<div class="list">
									@php
									$feature = explode( ',', $packagedetails->feature );
									for ($i=0; $i < count($feature); $i++) { 
										echo '<li><p href="mailto:'.$feature[$i].'">'.$feature[$i].'</p></li>';
									}
								@endphp
								</div>

								<div class="bottom-area">
									<div class="price-area">
										<div class="price-top-area">
											@if($packagedetails->discount_price == null)
												<p class="price showprice">{{ Helper::showCurrency() }}{{ $packagedetails->price }}</p>
											@else
												<p class="discount_price showprice">{{ Helper::showCurrency() }}{{ $packagedetails->discount_price }}</p>
												<p class="price discounted"><del>{{ Helper::showCurrency() }}{{ $packagedetails->price }}</del></p>
											@endif
										</div>
										<p class="time">
											{{ $packagedetails->time }}
										</p>
									</div>
								</div>
							</div>
						</div>
					@else
						<div class="col-lg-8">
							<h4 class="mb-4"><strong>{{ __('Pay bill for this month :') }}</strong></h4>
							<table class="table border table-striped">
								<tbody>
									<tr>
										<th scope="row">{{ __('Username') }}</th>
										<td>{{ Auth::user()->username }}</td>
									</tr>
									<tr>
										<th scope="row">{{ __('Email') }}</th>
										<td>{{ Auth::user()->email }}</td>
									</tr>
									<tr>
										<th scope="row">{{ __('Phone') }}</th>
										<td>{{ Auth::user()->phone }}</td>
									</tr>
									<tr>
										<th scope="row">{{ __('Current Date') }}</th>
										<td>{{ \Carbon\Carbon::now()->format('M d, Y') }}</td>
									</tr>
								</tbody>
							</table>

							<div class="patment-area">
								<h4 class="mb-3 g-title"> {{ __('Select Payment Gateway :') }} </h4>
								<div class="d-block my-3">
									<div class="payment-gateway">
										<ul class="select-payment">
											@foreach (DB::table('payment_gateweys')->where('status',1)->get() as $gateway)
											<li class="product_payment_gateway_check" data-href="{{ $gateway->id }}" id="{{ $gateway->type == 'automatic' ? $gateway->name : $gateway->title }}">
											  <p class="mybtn2">{{ $gateway->name }}</p>
											</li>
											@endforeach
										  </ul>
										@if ($errors->has('gateway'))
											<p class="text-danger"> {{ $errors->first('gateway') }} </p>
										@endif
									</div>
								</div>
								<input type="hidden" value="" id="payment_gateway" name="payment_gateway" value="payment_gateway">
								<hr class="mb-4">
								<button type="submit" class="mybtn1 submitbtn">{{ __('Submit') }}</button>
							</div>
						</div>
						<div class="col-lg-4">
							<h4 class="mb-4"><strong>{{ __('Active Package :') }}</strong></h4>
							<div class="single-price">
								<h4 class="name">
									{{ $packagedetails->name }}
								</h4>
								<div class="mbps">
									{{ $packagedetails->speed }} <span>{{ __('Mbps') }}</span>
								</div>


								<div class="list">
									@php
									$feature = explode( ',', $packagedetails->feature );
									for ($i=0; $i < count($feature); $i++) { 
										echo '<li><p href="mailto:'.$feature[$i].'">'.$feature[$i].'</p></li>';
									}
								@endphp
								</div>
								<div class="bottom-area">
									<div class="price-area">
										<div class="price-top-area">
											@if($packagedetails->discount_price == null)
												<p class="price showprice">{{ Helper::showCurrency() }}{{ $packagedetails->price }}</p>
											@else
												<p class="discount_price showprice">{{ Helper::showCurrency() }}{{ $packagedetails->discount_price }}</p>
												<p class="price discounted"><del>{{ Helper::showCurrency() }}{{ $packagedetails->price }}</del></p>
											@endif
										</div>
										<p class="time">
											{{ $packagedetails->time }}
										</p>
									</div>
								</div>
							</div>
						</div>
					@endif
				@else
					<div class="col-lg-12 text-center">
						<h3>{{ __("You don't purchase any package. First buy a package.") }}</h3>
					</div>
				@endif
			</div>
		</div>
	</section>
</form>
<input type="hidden" id="product_paypal" value="{{route('paybill.paypal.submit')}}">
<input type="hidden" id="product_stripe" value="{{route('paybill.stripe.submit')}}">
	<!-- PayBill Area End -->

@endsection
