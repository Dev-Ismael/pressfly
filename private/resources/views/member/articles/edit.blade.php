@extends('layouts.member')

@section('title', e(__('Edit Article')))

@section('content')

    <form method="post" action="{{ route('member.articles.update', $article->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="card bg-light">
            <div class="card-header">{{ __('Edit Article') }}</div>
            <div class="card-body">

                <div class="form-group">
                    <label for="title">{{ __('Title') }}</label>
                    <input type="text" name="title" id="title" class="form-control" minlength="18" maxlength="100"
                           value="{{ old('title', $article_update->title) }}" required/>
                    @error('title')
                        <p class="alert alert-danger mt-2">{{$message }}</p> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lang">{{ __('Language') }}</label>
                    <select class="form-control" id="lang" name="lang" required/>
                        <option value="english"  {{ $article->lang == 'english' ? 'selected' : '' }}  >English</option>
                        <option value="arabic"  {{ $article->lang == 'arabic' ? 'selected' : '' }}  >العربية</option>
                    </select>
                    @error('lang')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">{{ __('Category') }}</label>
                    <select class="form-control" id="category" name="category" required/>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $article->categories[0]->id == $category->id ? 'selected' : '' }} >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="summary">{{ __('Summary') }}</label>
                    <textarea id="summary" name="summary" class="form-control" rows="3" minlength="100" maxlength="255"
                              required>{{ old('summary', $article_update->summary) }}</textarea>
                    @error('summary')
                        <p class="alert alert-danger mt-2">{{$message }}</p> 
                    @enderror
                </div>
                </div>

                <!------ Show saved file ------->
                <div class="form-group row d-flex align-items-center">
                    <label for="upload_featured_image" class="col-12 col-form-label">
                        @if($articleFile)
                            <img src="{{ asset($articleFile->file) }}"
                            style="max-width: 100%;">
                        @endif
                    </label>
                </div>


                <div class="form-group d-none">
                    <label for="content">{{ __('Content') }}</label>
                    <textarea id="content" name="content" class="form-control text-editor"
                            >{{ old('content', $article_update->content) }}</textarea>
                </div>
                         
                <div class="form-group d-none">
                    <label for="reason">{{ __('Message to the Reviewer') }}</label>
                    <textarea id="reason" name="reason" class="form-control" rows="5"
                            >{{ old('reason') }}</textarea>
                    <small class="form-text text-muted">
                        {{ __('You must give a brief description of any changes you have made.') }}
                    </small>
                </div>
                


                <div class="form-group">
                    <div class="container">
                        <h3>Article Content</h3>
                        <div class="article-content">
                        {!! $article->getFinalContent() !!}
                        </div>
                    </div>
                </div>

                <div class="form-group container">
                    <div class="card card-primary card-outline">
                        <div class="card-header"><?= __('SEO Tools') ?></div>
                        <div class="card-body">
                            <div class="form-group">
                                {{ Form::label('seo[keywords]', __('SEO Keywords')) }}
                                {{ Form::textarea('seo[keywords]', $article->seo['keywords'] , ['class' => 'form-control' , 'placeholder' => 'Ex: Corona , Corona virus statistics , Corona virus , Covid , Covid-19...' , 'required' => true , 'minlength' => 250 , 'maxlength' => 1000  ]) }}
                                <small class="form-text text-muted"> You can use <a href="https://keywordtool.io" target="_blank" style="text-decoration:underline"> https://keywordtool.io </a> for SEO keywords for get more views </small>
                                @error('seo.keywords')
                                    <p class="alert alert-danger mt-2">{{$message }}</p> 
                                @enderror
                            </div>
    
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>

            </div>
        </div>

    </form>

@endsection

@include('_partials.editor')
