@extends('admin.layout')

@section('content')

<section class="content-header">
    <h1>
       {{ __('Clients') }}
    </h1>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                            <div class="card-header  with-border">
                                <h3 class="card-title mt-1">{{ __('Edit Client') }}</h3>
                                <div class="card-tools">
                                <a href="{{ route('admin.clients'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                    <form class="form-horizontal" action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label">{{ __('Language') }}<span class="text-danger">*</span></label>
            
                                            <div class="col-sm-10">
                                                <select class="form-control lang" name="language_id">
                                                    @foreach($langs as $lang)
                                                        <option value="{{$lang->id}}" {{ $client->language_id == $lang->id ? 'selected' : '' }} >{{$lang->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('language_id'))
                                                    <p class="text-danger"> {{ $errors->first('language_id') }} </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label">{{ __('Logo') }}<span class="text-danger">*</span></label>
            
                                            <div class="col-sm-10">
                                                <img class="mw-400 mb-3 show-img img-demo" src="{{ asset('assets/kondangintech-landing/img/'.$client->logo) }}" alt="">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="logo">{{ __('Choose Image') }}</label>
                                                    <input type="file" class="custom-file-input up-img" name="logo" id="logo">
                                                </div>
                                                @if ($errors->has('logo'))
                                                    <p class="text-danger"> {{ $errors->first('logo') }} </p>
                                                @endif
                                                <p class="help-block text-info">{{ __('Upload 65X65 (Pixel) Size image for best quality.
                                                    Only jpg, jpeg, png image is allowed.') }}
                                                </p>
                                            </div>
                                        </div>
                                        
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 control-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name" placeholder="{{ __('Enter Client Name') }}" value="{{ $client->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                                </div>
                                            </div>
                
                                        </form>
                                
                            </div>
                            <!-- /.card-body -->
                        </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection
