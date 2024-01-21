@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Portfolios') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Portfolios') }}</li>
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
                                <h3 class="card-title mt-1">{{ __('Edit Portfolio Category') }}</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.portfolio'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Language') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control lang" name="language_id" id="portfolio_lan">
                                                <option value="" selected disabled>Select a Language</option>
                                                @foreach($langs as $lang)
                                                    <option value="{{$lang->id}}" {{ $portfolio->language_id == $lang->id ? 'selected' : '' }} >{{$lang->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('language_id'))
                                                <p class="text-danger"> {{ $errors->first('language_id') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Images') }}<span class="text-danger">*</span></label>
                                    
                                        <div class="col-sm-10">
                                            @foreach ($images as $image)
                                            <img class="mw-400 mb-3 show-img img-demo" src="{{ asset('assets/kondangintech-landing/img/'.$image->image_path) }}" alt="">
                                            @endforeach
                                            
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="images">{{ __('Choose Images') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="images[]" id="images" multiple>
                                            </div>
                                            @if ($errors->has('images'))
                                                <p class="text-danger"> {{ $errors->first('images') }} </p>
                                            @endif
                                            <p class="help-block text-info">{{ __('Upload images for best quality. Only jpg, jpeg, png images are allowed.') }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 control-label">{{ __('Title') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" placeholder="{{ __('Title') }}" value="{{ $portfolio->title }}">
                                            @if ($errors->has('title'))
                                                <p class="text-danger"> {{ $errors->first('title') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="portfoliocategory_id" class="col-sm-2 control-label">{{ __('Category') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="portfoliocategory_id" id="portfoliocategory_id">
                                                @foreach ($portfoliocategories as $portfoliocategory)
                                                    <option value="{{ $portfoliocategory->id }}" {{ $portfoliocategory->id == $portfolio->portfoliocategory_id ? 'selected' : '' }} >{{ $portfoliocategory->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('portfoliocategory_id'))
                                                <p class="text-danger"> {{ $errors->first('portfoliocategory_id') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="client_id" class="col-sm-2 control-label">{{ __('Client') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="client_id" id="client_id">
                                                @foreach($clients as $client)
                                                    <option value="{{ $client->id }}" {{ $client->id == $portfolio->client_id ? 'selected' : '' }}>{{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('client_id'))
                                                <p class="text-danger"> {{ $errors->first('client_id') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 control-label">{{ __('Content') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                                <textarea name="content" class="form-control  summernote" rows="6" placeholder="{{ __('Content') }}">{{ $portfolio->content }}</textarea>
                                            @if ($errors->has('content'))
                                                <p class="text-danger"> {{ $errors->first('content') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="project_url" class="col-sm-2 control-label">{{ __('Project URL') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="project_url" placeholder="{{ __('Project URL') }}" value="{{ $portfolio->project_url }}">
                                            @if ($errors->has('project_url'))
                                                <p class="text-danger"> {{ $errors->first('project_url') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="project_date" class="col-sm-2 control-label">{{ __('Project Date') }}<span class="text-danger">*</span></label>
                                        
                                        <div class="col-sm-10">
                                            <div class="input-group date" id="datepicker">
                                                <input type="date" class="form-control" name="project_date" placeholder="{{ __('Project Date') }}" value="{{ $portfolio->project_date }}">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                            @if ($errors->has('project_date'))
                                                <p class="text-danger"> {{ $errors->first('project_date') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 control-label">Status<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="status">
                                                    <option value="0" {{ $portfolio->status == '0' ? 'selected' : '' }}>{{ __('Unpublish') }}</option>
                                                    <option value="1" {{ $portfolio->status == '1' ? 'selected' : '' }}>{{ __('Publish') }}</option>
                                            </select>
                                            @if ($errors->has('status'))
                                                <p class="text-danger"> {{ $errors->first('status') }} </p>
                                            @endif
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
