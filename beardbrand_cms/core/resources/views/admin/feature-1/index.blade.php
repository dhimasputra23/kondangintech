@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Feature-1') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Feature-1') }}</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Feature-1 Content') }}</h3>
                        <div class="card-tools">
                            <div class="d-inline-block mr-4">
                        <select class="form-control lang languageSelect"  data="{{url()->current() . '?language='}}">
                            @foreach($langs as $lang)
                                <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}} >{{$lang->name}}</option>
                            @endforeach
                        </select>
                    </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.feature1content.update',  $saectiontitle->language_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Feature-1 Title') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="feature_first_title" placeholder="{{ __('Feature-1 Title') }}" value="{{ $saectiontitle->feature_first_title }}">
                                    @if ($errors->has('feature_first_title'))
                                        <p class="text-danger"> {{ $errors->first('feature_first_title') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 control-label">{{ __('Feature-1 Description') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input name="feature_first_subtitle" class="form-control" data-role="tagsinput" placeholder="{{ __('Feature-1 Description') }}" value="{{ $saectiontitle->feature_first_subtitle }}" >
                                    @if ($errors->has('feature_first_subtitle'))
                                        <p class="text-danger"> {{ $errors->first('feature_first_subtitle') }} </p>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Feature-1 Image') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="w-100 mb-3 show-img img-demo" src="
                                    @if($saectiontitle->feature_first_image)
                                    {{ asset('assets/kondangintech-landing/img/'.$saectiontitle->feature_first_image) }}
                                    @else
                                    {{ asset('assets/admin/img/img-demo.jpg') }}
                                    @endif" alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="feature_first_image">Choose New Image</label>
                                        <input type="file" class="custom-file-input up-img" name="feature_first_image" id="feature_first_image">
                                    </div>
                                    <p class="help-block text-info">{{ __('Upload 550X550 (Pixel) Size image for best quality.
                                        Only jpg, jpeg, png image is allowed.') }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
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
