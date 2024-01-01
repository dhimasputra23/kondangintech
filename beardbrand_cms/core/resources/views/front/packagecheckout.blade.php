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
					{{ __('Buy Package') }}
				</h1>
				<ul class="pages">
					<li>
						<a href="{{ route('front.index') }}">
							{{ __('Home') }}
						</a>
					</li>
					<li class="active">
						<a href="#">
							{{ __('Buy Package') }}
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Main Breadcrumb Area End -->

<!-- Package Checkout Area Start -->
<form class="needs-validation" action="javascript:;" id="plan_order_submit" method="POST">
	@csrf
<section class="pricingPlan-section packag-page orderpage">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<h4 class="mb-4">
					<strong>
						@if($already_purchased)
							{{ __('You already purchased a package, now update your package :') }}
						@else
							{{ __('Buy this package :') }}
						@endif
					</strong>
				</h4>
				<table class="table border table-striped">
					<tbody>
						<tr>
							<th scope="row">{{ __('Name') }}</th>
							<td>{{ Auth::user()->name }}</td>
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
							<th scope="row">{{ __('Address') }}</th>
							<td>{{ Auth::user()->address }}</td>
						</tr>
					</tbody>
				</table>
				<div class="patment-area">
					<h4 class="mb-3 g-title"> {{ __('Select Payment Gateway :') }} </h4>
					<div class="d-block my-3">
						<div class="payment-gateway">
							<ul class="select-payment">
								@foreach (DB::table('payment_gateweys')->where('status',1)->get() as $gateway)
								<li class="plan_payment_gateway_check" data-href="{{ $gateway->id }}" id="{{ $gateway->type == 'automatic' ? $gateway->name : $gateway->title }}">
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
					<input type="hidden" name="packageid"  value="{{ $packagedetails->id }}">
					<hr class="mb-4">
					<button type="submit" class="mybtn1 submitbtn">{{ __('Submit') }}</button>
				</div>
			</div>
			<div class="col-lg-4">
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
		</div>
	</div>
</section>
</form>


<input type="hidden" id="plan_paypal" value="{{route('package.paypal.submit')}}">
<input type="hidden" id="plan_stripe" value="{{route('package.stripe.submit')}}">
<!-- Package Checkout Area End-->

@endsection