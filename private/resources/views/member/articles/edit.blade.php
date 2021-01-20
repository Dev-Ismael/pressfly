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
                    <input type="text" name="title" id="title" class="form-control" required
                           value="{{ old('title', $article_update->title) }}">
                </div>

                <div class="form-group d-none invisible">
                    <label for="slug">{{ __('Slug(URL Key)') }}</label>
                    <input type="text" name="slug" id="slug" class="form-control"
                           value="{{ old('slug', $article_update->slug) }}">
                </div>

                <div class="form-group">
                    <label for="summary">{{ __('Summary') }}</label>
                    <textarea id="summary" name="summary" class="form-control" rows="3"
                              required>{{ old('summary', $article_update->summary) }}</textarea>
                </div>

                <div class="form-group d-none ">
                    <label for="content">{{ __('Content') }}</label>
                    <textarea id="content" name="content" class="form-control text-editor"
                            >{{ old('content', $article_update->content) }}</textarea>
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


                <div class="form-group">
                    <h3>Article Content</h3>
                    <div class="article-content">
                    {!! $article->getFinalContent() !!}
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="reason">{{ __('Message to the Reviewer') }}</label>
                    <textarea id="reason" name="reason" class="form-control" rows="5"
                              required>{{ old('reason') }}</textarea>
                    <small class="form-text text-muted">
                        <?= __('You must give a brief description of any changes you have made.') ?>
                    </small>
                </div>


                <div class="card card-primary card-outline">
                    <div class="card-header"><?= __('SEO ') ?></div>
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('seo[title]', __('SEO Title')) }}
                            {{ Form::text('seo[title]', old('seo[title]' , $article->seo['title'] ), ['class' => 'form-control' , 'required' => true , 'minlength' => 18 ]) }}
                            <small class="form-text text-muted"><?= __('SEO title ex: Corona virus statistics .') ?></small>
                        </div>
    
                        <div class="form-group">
                            {{ Form::label('seo[keywords]', __('SEO Keywords')) }}
                            {{ Form::text('seo[keywords]', old('seo[keywords]' , $article->seo['keywords'] ), ['class' => 'form-control' , 'required' => true  , 'minlength' => 50  ]) }}
                            <small class="form-text text-muted"><?= __('SEO Keywords ex: Corona , Corona virus statistics , Corona virus .') ?></small>
                        </div>
    
                        <div class="form-group">
                            {{ Form::label('seo[description]', __('SEO Description')) }}
                            {{ Form::textarea('seo[description]', old('seo[description]' , $article->seo['description'] ), ['class' => 'form-control', 'rows' => 3 , 'required' => true  , 'minlength' => 50   ]) }}
                            <small class="form-text text-muted"><?= __('SEO Description is like article summary .') ?></small>
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
