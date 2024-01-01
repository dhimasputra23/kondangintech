@extends('admin.layout')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        {{ __('Customer Details') }}
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item">
                            {{ __('Customer Details') }}
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Customer Details') }}</h3>
                        </div>

                        <div class="card-body">
                            <table class="table  table-bordered">
                                <tr>
                                    <th>{{ __('Name') }} </th>
                                    <td> {{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Username') }} </th>
                                    <td> {{$user->username}}</td>
                                </tr>
                                <tr>
                                    <th>{{__('Email:')}} </th>
                                    <td> {{$user->email}} </td>
                                </tr>
                                <tr>
                                    <th>{{__('Number:')}} </th>
                                    <td>  {{$user->phone}}</td>
                                </tr>
                                <tr>
                                    <th> {{__('Country:')}}</th>
                                    <td>  {{$user->country}}</td>
                                </tr>
                                <tr>
                                    <th>{{__('City:')}}</th>
                                    <td>  {{$user->city}}</td>
                                </tr>
                                <tr>
                                    <th>{{__('Zip Code:')}} </th>
                                    <td>{{$user->zipcode}} </td>
                                </tr>
                                <tr>
                                    <th> {{__('Address:')}}</th>
                                    <td> {{$user->address}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @if($package)
                <div class="col-md-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Active Package') }}</h3>
                        </div>

                        <div class="card-body">
                            <table class="table  table-bordered">
                                <tr>
                                    <th>{{ __('Package Name') }} </th>
                                    <td> {{ $package->name }}</td>
                                </tr>
                                <tr>
                                    <th>{{__('Speed Limit')}}</th>
                                    <td>{{ $package->speed }}</td>
                                </tr>
                                <tr>
                                    <th>{{__('Package Price')}}</th>
                                    <td>{{ Helper::showCurrency() }}{{ $package->price }} / {{ $package->time }}</td>
                                </tr>
                                <tr>
                                    <th>{{__('Package Feature')}}</th>
                                    <td>{{ $package->feature }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @if($bills->count() > 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="card  card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Bill Pay') }}</h3>
                        </div>
                        <div class="card-body">
                            <table  class="table table-bordered table-striped data_table">
                                <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Package Name') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Method') }}</th>
                                    <th>{{ __('Bill Paid') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($bills as $id=>$bill)
                                    <tr>
                                        <td>{{ $id }}</td>
                                        <td>
                                            {{ $bill->package->name }}
                                        </td>
                                        <td>
                                            <strong>{{ $bill->currency_sign }}{{ $bill->package_cost }}</strong> / {{ $bill->package->time }}
                                        </td>
                                        <td>
                                            {{ $bill->method }}
                                        </td>
                                        <td>
                                            {{ $bill->fulldate }}
                                        </td>
                                  
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- /.row -->
    </section>



@endsection
