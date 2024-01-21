@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Feature-3') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Feature-3') }}</li>
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
                        <h3 class="card-title mt-1">{{ __('Feature-3 Content') }}</h3>
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
                        <form class="form-horizontal" action="{{ route('admin.feature3content.update',  $saectiontitle->language_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Feature-3 Title') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="feature_third_title" placeholder="{{ __('Feature-3 Title') }}" value="{{ $saectiontitle->feature_third_title }}">
                                    @if ($errors->has('feature_third_title'))
                                        <p class="text-danger"> {{ $errors->first('feature_third_title') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 control-label">{{ __('Feature-3 Description') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <textarea name="feature_third_subtitle" class="form-control summernote" placeholder="{{ __('Feature-3 Description') }}" rows="5">{{ $saectiontitle->feature_third_subtitle }}</textarea>
                                    @if ($errors->has('feature_third_subtitle'))
                                        <p class="text-danger"> {{ $errors->first('feature_third_subtitle') }} </p>
                                    @endif
                                </div>
                            </div>
                                                        
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Feature-3 Image') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="w-100 mb-3 show-img img-demo" src="
                                    @if($saectiontitle->feature_third_image)
                                    {{ asset('assets/kondangintech-landing/img/'.$saectiontitle->feature_third_image) }}
                                    @else
                                    {{ asset('assets/admin/img/img-demo.jpg') }}
                                    @endif" alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="feature_third_image">Choose New Image</label>
                                        <input type="file" class="custom-file-input up-img" name="feature_third_image" id="feature_third_image">
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
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Feature-3 Features') }}</h3>
                        <div class="card-tools d-flex">
                            <div class="d-inline-block mr-4">
                                <select class="form-control lang" id="languageSelect" data="{{url()->current() . '?language='}}">
                                    @foreach($langs as $lang)
                                        <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}} >{{$lang->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a href="{{ route('admin.feature3.add'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> {{ __('Add Feature-3 Feature') }}
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-striped table-bordered data_table">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($featuresThird as $id=>$featureThird)
                            <tr>
                                <td>
                                    {{ $id }}
                                </td>
                                <td>
                                    {{ $featureThird->name }}
                                </td>
                                <td>
                                    {{ $featureThird->description }}
                                </td>
                                <td>
                                    <img src="{{ asset('assets/kondangintech-landing/img/'.$featureThird->image) }}"   alt="" width="60">
                                </td>
                                <td>
                                    @if($featureThird->status == 1)
                                        <span class="badge badge-success">{{ __('Publish') }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ __('Unpublish') }}</span>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route('admin.feature3.edit', $featureThird->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>
                                    <form  id="deleteform" class="d-inline-block" action="{{ route('admin.value.delete', $featureThird->id ) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $featureThird->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                        <i class="fas fa-trash"></i>{{ __('Delete') }}
                                        </button>
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
    </div>
    <!-- /.row -->

</section>
@endsection
