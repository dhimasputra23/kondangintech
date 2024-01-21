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
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
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
                        <h3 class="card-title mt-1">{{ __('Portfolio Content') }}</h3>
                        <div class="card-tools">
                            <div class="d-inline-block mr-4">
                        <select class="form-control lang languageSelect" data="{{url()->current() . '?language='}}">
                            @foreach($langs as $lang)
                                <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}} >{{$lang->name}}</option>
                            @endforeach
                        </select>
                    </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.portfoliocontent.update',  $saectiontitle->language_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Portfolio Title') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="portfolio_title" placeholder="{{ __('Portfolio Title') }}" value="{{ $saectiontitle->portfolio_title }}">
                                    @if ($errors->has('portfolio_title'))
                                        <p class="text-danger"> {{ $errors->first('portfolio_title') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 control-label">{{ __('Portfolio Sub-title') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="portfolio_subtitle" placeholder="{{ __('Portfolio Sub-Title') }}" value="{{ $saectiontitle->portfolio_subtitle }}">
                                    @if ($errors->has('portfolio_subtitle'))
                                        <p class="text-danger"> {{ $errors->first('portfolio_subtitle') }} </p>
                                    @endif
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
                    <h3 class="card-title">{{ __('Portfolio List:') }}</h3>
                    <div class="card-tools d-flex">
                        <div class="d-inline-block mr-4">
                            <select class="form-control lang" id="languageSelect" data="{{url()->current() . '?language='}}">
                                @foreach($langs as $lang)
                                    <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}} >{{$lang->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <a href="{{ route('admin.portfolio.add'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> {{ __('Add') }}
                        </a>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="idtable" class="table table-bordered table-striped data_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Client') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($portfolios as $id=>$portfolio)
                            <tr>
                                <td>{{ ++$id }}</td>

                                <td>
                                    {{ $portfolio->title }}
                                </td> 
                                <td>
                                    {{ $portfolio->client->name }}
                                </td>
                                <td>
                                    {{ $portfolio->portfoliocategory->name }}
                                </td> 
                                <td>
                                        @if($portfolio->status == 1)
                                            <span class="badge badge-success">{{ __('Publish') }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ __('Unpublish') }}</span>
                                        @endif
                                        
                                    </td>
                                <td>
                                    <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>
                                    <form  id="deleteform" class="d-inline-block" action="{{ route('admin.portfolio.delete', $portfolio->id ) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $portfolio->id }}">
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
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection

