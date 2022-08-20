@extends('layouts.member')

@section('title', e(__('Edit Article')))

@section('content')

{{-- @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif --}}
    <div class="article-status-alert">

        @if ( $article->status == 1 )
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check"></i>
                &nbsp;
                Your article is Approved & published... if You Edit it & save article will review again.
            </div>
        @elseif( $article->status == 3 )
            <div class="alert alert-warning status-box pendding" role="alert">
                <i class="fas fa-spinner fa-spin"></i>
                &nbsp;
                Your article is Still Pending... You can edit it before final review.
            </div>
        @elseif( $article->status == 4 )
            <div class="alert alert-warning status-box pendding" role="alert">
                <i class="fas fa-spinner fa-spin"></i>
                &nbsp;
                Your article will review again before published... You can edit it before final review.
            </div>
        @elseif( $article->status == 5 )
            <div class="alert alert-warning status-box danger" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                &nbsp;
                Your article Need improvements at
                {{ Str::ucfirst($article->review_messege) }}
                ... Please edit it and click save to review again.
            </div>
        @elseif( $article->status == 6 )
            <div class="alert alert-warning status-box pendding" role="alert">
                <i class="fas fa-spinner fa-spin"></i>
                &nbsp;
                Your New Update is Still Pending... You can Edit it before final review.
            </div>
        @endif
        
    </div>



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
                        <option value="english"  {{ $article_update->lang == 'english' ? 'selected' : '' }}  >English</option>
                        <option value="arabic"  {{ $article_update->lang == 'arabic' ? 'selected' : '' }}  >العربية</option>
                    </select>
                    @error('lang')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">{{ __('Category') }}</label>
                    <select class="form-control" id="category" name="category" required/>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $article_update->category == $category->id ? 'selected' : '' }} >{{ $category->name }}</option>
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
                


                <div class="img-field">
                    @if( $article->review_messege == "image" )
                        <!------------- If isset need improvement ==> Show Image Input -------------->
                        <div class="form-group">
                            {{ Form::label('upload_featured_image', __('Change Article Image')) }}
                            <?php
                                $image = \App\File::find($article_update->featured_image_id)->file;
                            ?>
                            <a href="{{ url($image) }}" target="_blank">
                                <img src="{{ url($image) }}" alt="article-img"
                                style="width:80px;border-radius:5px;margin:5px">
                            </a>
                            {{ Form::file('upload_featured_image', ['class' => 'form-control' , 'required' => true ]) }}
                            @error('upload_featured_image')
                                <p class="alert alert-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    @elseif( $article->status == 3 )
                        <!------------- If Article Still New Pending ==> Show Image Input -------------->
                        <div class="form-group">
                            {{ Form::label('upload_featured_image', __('Change Article Image')) }}
                            <?php
                                $image = \App\File::find($article_update->featured_image_id)->file;
                            ?>
                            <a href="{{ url($image) }}" target="_blank">
                                <img src="{{ url($image) }}" alt="article-img"
                                style="width:80px;border-radius:5px;margin:5px">
                            </a>
                            {{ Form::file('upload_featured_image', ['class' => 'form-control' ]) }}
                            @error('upload_featured_image')
                                <p class="alert alert-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    @else
                    <!------ Show saved file ------->
                        <div class="form-group row d-flex align-items-center">
                            <label for="upload_featured_image" class="col-12 col-form-label text-center">
                                @if($articleFile)
                                    <img src="{{ asset($articleFile->file) }}" alt="article-img"
                                    style="max-width: 100%;">
                                @endif
                            </label>
                        </div>
                    @endif
                </div>
                
                
                <div class="content-field">
                    <!------------- If isset need improvement ==> Content -------------->
                    @if( $article->review_messege == "content"  || $article->status == 3 )
                        <div class="form-group">
                            <label for="content">{{ __('Content') }}</label>
                            <textarea name="content" class="form-control text-editor" id="content" cols="30" rows="10"
                            onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off>
                                {{ old('content', $article_update->content) }}
                            </textarea>
                        </div>
                        @error('content')
                            <p class="alert alert-danger mt-2">{{ $message }}</p>
                        @enderror
                    @else
                        <!------ Show saved Content ------->
                        <div class="form-group">
                            <div class="container">
                                <h3>Article Content</h3>
                                <div class="article-content">
                                {!! $article_update->content !!}
                                </div>
                            </div>
                        </div>
                        <!--------------- hidden content input ------------------>
                        <div class="form-group d-none">
                            <label for="content">{{ __('Content') }}</label>
                            <textarea id="content" name="content" class="form-control text-editor">{{ old('content', $article_update->content) }}</textarea>
                        </div>
                    @endif
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
                    <div class="card card-primary card-outline">
                        <div class="card-header"><?= __('SEO Tools') ?></div>
                        <div class="card-body">
                            <div class="form-group">
                                {{ Form::label('seo[keywords]', __('SEO Keywords')) }}
                                @if(empty($article->tmp_content))
                                    {{ Form::textarea('seo[keywords]', $article_update->seo['keywords'] , ['class' => 'form-control' , 'placeholder' => 'Ex: Corona , Corona virus statistics , Corona virus , Covid , Covid-19...' , 'required' => true , 'minlength' => 250 , 'maxlength' => 1000  ]) }}
                                @else
                                    {{ Form::textarea('seo[keywords]', $article_update->seo->keywords , ['class' => 'form-control' , 'placeholder' => 'Ex: Corona , Corona virus statistics , Corona virus , Covid , Covid-19...' , 'required' => true , 'minlength' => 250 , 'maxlength' => 1000  ]) }}
                                @endif
                                <small class="form-text text-muted"> You can use <a href="https://keywordtool.io" target="_blank" style="text-decoration:underline"> https://keywordtool.io </a> for SEO keywords for get more views </small>
                                @error('seo.keywords')
                                    <p class="alert alert-danger mt-2">{{$message }}</p> 
                                @enderror
                            </div>
    
                        </div>
                    </div>
                </div>


                <div class="form-group pl-3">
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>

            </div>
        </div>

    </form>

@endsection

@include('_partials.editor')
