@extends('layouts.moderator')

@section('title', e(__('Edit Article')))

@section('content')


    <!------- Show Review Messege --------->
    <div class="alert alert-warning" role="alert"> 
        <i class="fa-solid fa-circle-exclamation"></i>
        Note...this Article was need improvement at 
        <span class="text-bold">{{ Str::ucfirst( $article->review_messege ) }}</span>
    </div>


    <form action="{{ route('moderator.articles.updateNeedImprovementProcess', $article->id) }}" method="post"
          enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row">
            <div class="col-sm-9">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#article-new"
                           role="tab">{{ __('New') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#article-diff" role="tab">{{ __('Diff') }}</a>
                    </li>
                </ul>
                <div class="tab-content mb-4">
                    <div class="tab-pane fade show active" id="article-new" role="tabpanel">
                        <div class="card card-primary card-outline">
                            <div class="card-header">{{ __('Edit Article') }}</div>
                            <div class="card-body">
                                <div class="form-group">
                                    {{ Form::label('title', __('Title')) }}
                                    {{ Form::text('title', old('title', $article_update->title), ['class' => 'form-control', 'required' => true]) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('lang', __('Language')) }}
                                    {{ Form::select('lang', ["english" => "English" , "arabic" => "العربية" ] , old('lang', $article_update->lang), ['class' => 'form-control', 'required' => true]) }}
                                </div>

                                <div class="form-group d-none">
                                    {{ Form::label('slug', __('Slug(URL Key)')) }}
                                    {{ Form::text('slug', old('slug', $article_update->slug), ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('summary', __('Summary')) }}
                                    {{ Form::textarea('summary', old('summary', $article_update->summary), ['class' => 'form-control', 'rows' => 3, 'required' => true]) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('content', __('Content')) }}
                                    <span class="clipboard-icon ml-2" style="cursor: pointer">
                                        <i class="fa-solid fa-clipboard fa-2x text-gray"></i>
                                        <i class="fa-solid fa-clipboard-check fa-2x text-success d-none"></i>
                                    </span>
                                    <div class="clipboard-content d-none">
                                        {!! $article_update->content !!}
                                    </div>
                                    {{ Form::textarea('content', old('content', $article_update->content), ['class' => 'form-control text-editor', 'required' => true]) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="article-diff" role="tabpanel">

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr class="w-100">
                                    <th class="col-2"></th>
                                    <th class="col-5">{{ __('Old') }}</th>
                                    <th class="col-5">{{ __('New') }}</th>
                                </tr>

                                <tr>
                                    <th>{{ __('Title') }}</th>
                                    <td>{{ $article->title }}</td>
                                    <td>
                                        @if($article->title != $article_update->title )
                                            {{ $article_update->title }}
                                        @else
                                            {{ __('No change') }}
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>{{ __('Language') }}</th>
                                    <td>{{ $article->lang }}</td>
                                    <td>
                                        @if($article->lang != $article_update->lang )
                                            {{ $article_update->lang }}
                                        @else
                                            {{ __('No change') }}
                                        @endif
                                    </td>
                                </tr>

                                <tr class="d-none">
                                    <th>{{ __('Slug') }}</th>
                                    <td>{{ $article->slug }}</td>
                                    <td>
                                        @if($article->slug != $article_update->slug )
                                            {{ $article_update->slug }}
                                        @else
                                            {{ __('No change') }}
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>{{ __('Image') }}</th>
                                    <td>
                                        @if($article->featuredImage->file)
                                            <div class="form-group">
                                                <img src="{{ url($article->featuredImage->file) }}"
                                                     style="max-width: 150px;">
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($article->featured_image_id != $article_update->featured_image_id)
                                            <?php
                                            $image = \App\File::find($article_update->featured_image_id)->file;
                                            ?>
                                            <div class="form-group">
                                                <img src="{{ url($image) }}" style="max-width: 150px;">
                                            </div>
                                        @else
                                            {{ __('No change') }}
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>{{ __('Summary') }}</th>
                                    <td>{{ $article->summary }}</td>
                                    <td>
                                        @if($article->summary != $article_update->summary )
                                            {{ $article_update->summary }}
                                        @else
                                            {{ __('No change') }}
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>{{ __('Content') }}</th>
                                    <td>{!! $article->content !!}</td>
                                    <td>
                                        @if($article->content != $article_update->content )
                                            {!! $article_update->content !!}
                                        @else
                                            {{ __('No change') }}
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="card card-primary card-outline">
                    <div class="card-header"><?= __('SEO ') ?></div>
                    <div class="card-body">
                        <div class="form-group  d-none">
                            {{ Form::label('seo[title]', __('SEO Title')) }}
                            {{ Form::text('seo[title]', old('seo[title]', $article_update->seo->title ), ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('seo[keywords]', __('SEO Keywords')) }}
                            {{ Form::textarea('seo[keywords]', old('seo[keywords]', $article_update->seo->keywords), ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group  d-none">
                            {{ Form::label('seo[description]', __('SEO Description')) }}
                            {{ Form::textarea('seo[description]', old('seo[description]', $article_update->seo->description ), ['class' => 'form-control', 'rows' => 3]) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card card-primary card-outline">
                    <div class="card-header"><?= __('Article Settings') ?></div>
                    <div class="card-body">
                        <div class="form-group  d-none">
                            {{ Form::label('message', __('Message to the Author')) }}
                            {{ Form::textarea('message', old('message'), ['class' => 'form-control', 'rows' => 5]) }}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" name="status"
                                    value="1">{{ __('Approve') }}</button>
                        </div>
                        <br>
                        
                        <div class="form-group">
                            {{ Form::label('review_messege', __('Review Messege')) }}
                            {{ Form::select('review_messege', 
                                [
                                    ''           => 'Choose review messege',
                                    'title'      => "Bad Title",
                                    'category'   => "Wrong Category",
                                    'summary'    => "Bad Summary",
                                    'content'    => "Bad Content",
                                    'image'      => 'Bad Image',
                                    'seo'        => 'SEO Issue',
                                ],
                                old('review_messege'), ['class' => 'form-control select2',
                                'placeholder' => null]) }}
                                <button type="submit" class="btn btn-info btn-block" name="status"
                                value="5">{{ __('Need Improvements') }}</button>                        
                        </div>

                        
                        <div class="form-group  d-none">
                            {{ Form::label('read_time', __('Recommended Read Time(in seconds)')) }}
                            {{ Form::number('read_time', old('read_time', $article->read_time), ['class' => 'form-control', 'min' => 0, 'step' => 1,]) }}
                        </div>


                        <?php
                        /*
                        <div class="form-group">
                            {{ Form::label('pay_type', 'Pay Type') }}
                            {{ Form::select('pay_type', get_allowed_types(), old('pay_type', $article->pay_type),
                                ['placeholder' => __('Pay Type'), 'class' => 'form-control', 'required' => true]) }}
                        </div>

                        <div class="form-group conditional" data-condition="pay_type === '2'">
                            {{ Form::label('price', __('Price')) }}
                            {{ Form::number('price', old('price', $article->price), ['class' => 'form-control',
                                'step' => 'any', 'min' => 0]) }}
                            <small class="form-text text-muted">{{ __('For Pay Per Article, you should add a price that you '.
                            'will pay to the author upon approving the article.') }}</small>
                        </div>
                        */
                        ?>

                        <div class="form-group  d-none">
                            {{ Form::label('disable_earnings', __('Disable Earnings')) }}
                            {{ Form::select('disable_earnings', [0 => __('No'), 1 => __('Yes')],
                                old('disable_earnings', $article->disable_earnings), ['class' => 'form-control select2',
                                'placeholder' => null]) }}
                        </div>

                    </div>
                </div>

                <div class="card card-primary card-outline">
                    <div class="card-header"><?= __('Featured Image') ?></div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <?php
                                    $image = \App\File::find($article_update->featured_image_id)->file;
                                ?>
                                <img src="{{ url($image) }}"
                                style="max-width: 100%;">
                            </div>
                            {{ Form::file('upload_featured_image', ['accept' => '.jpg,.jpeg,.png,.gif']) }}
                        </div>
                    </div>
                </div>

                <div class="card card-primary card-outline">
                    <div class="card-header"><?= __('Categories') ?></div>
                    <div class="card-body">
                        <?php
                        $article_categories = [];
                        $main_category = 0;
                        foreach ($article->categories as $category) {
                            $article_categories[$category->id] = $category->pivot->main;
                            if ($category->pivot->main) {
                                $main_category = $category->id;
                            }
                        }
                        ?>
                        <table class="table table-sm">
                            @foreach ($categories as $id => $name)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="categories[]" value="{{ $id }}"
                                                       @if(in_array($id, old('categories', array_keys($article_categories) ))) checked
                                                       @endif
                                                       class="form-check-input"> {{ $name }}
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mb-0 text-muted">
                                            <label class="mb-0">
                                                <input class="form-check-input" type="radio" name="main_category"
                                                       @if( (int)old('main_category', $main_category) === $id ) checked
                                                       @endif
                                                       value="{{ $id }}" required> {{ __(' Mark as Main') }}
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="card card-primary card-outline d-none">
                    <div class="card-header"><?= __('Tags') ?></div>
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::select('tags[]', $tags, old('tags[]', $article->tags), ['class' => 'form-control select2',
                            'multiple' => true, 'required' => false]) }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>

@endsection

@include('_partials.editor')

@push('footer')
    <script>
        $("input[name='main_category']").on('change', function () {
            var val = $(this).val();

            $("input[name='categories[]'][value='" + val + "']").prop('checked', true);
        });

        $("input[name='categories[]']").on('change', function () {
            if ($("input[name='main_category']").is(":checked")) {
                return;
            }

            var val = $(this).val();

            if ($(this).is(":checked")) {
                $("input[name='main_category'][value='" + val + "']").prop('checked', true);
            }
        });

        /*
        $(document).ready(function () {
            $("input[name='categories[]']").trigger('change');
        });

        $("input[name='categories[]']").on('change', function () {
            console.log(this);
            $(this).prop('required', false);
            if ($(this).is(":checked")) {
                $(this).prop('required', true);
            }

            if (!$("input[name='categories[]']:checked").length > 0) {
                $.each($("input[name='categories[]']"), function( key, value ) {
                    $(this).prop('required', true);
                });
            }
        });
        */
    </script>
@endpush
