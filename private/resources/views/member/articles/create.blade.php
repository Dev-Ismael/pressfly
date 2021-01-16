@extends('layouts.member')

@section('title', e(__('Add Article')))

@section('content')






    <div class="row bg-success p-2 mb-3 text-white member-rules">
        <div class="col-md-6 english">
            <p class="rule-title"> Terms of writing the article  : </p>

            <ul class="list-unstyled">
                <li> - Article review within 24 hours  </li>
                <li> - The essay must be at least 400 words </li>
                <li> - The article must be exclusive and not copied </li>
                <li> - A non-copyrighted image of the article must be uploaded </li>
                <li> - SEO should be set in an organized way to accept the post  </li>
                <li> - Articles that contain violating links, referral links, or shorten links are not accepted </li>
                <li> -Articles with contrary content (pornography - violence - terrorist - bloody - drugs) are not accepted </li>
            </ul>
        </div>

        <div class="col-md-6 arabic">
            <p class="rule-title">  : شروط كتابة المقال </p>
            <ul class="list-unstyled">
                <li>  يتم مراجعة المقال في خلال 24 ساعة  - </li>
                <li>  يجب ان لا يقل المقال عن 400 كلمة - </li>
                <li> يجب ان يكون المقال حصري و غير منسوخ - </li>
                <li>  يجب رفع صورة ليس بها حقوق الطبع و النشر تعبر عن المقال -  </li>
                <li> يجب ضبط السيو بطريقة منظمة لقبول المقال - </li>
                <li>  لا يتم قبول المقالات التي تحتوي علي روابط مخالفة او روابط احالة او اختصار روابط - </li>
                <li> (لا يتم قبول المقالات ذات المحتوي المخالف ( الاباحي - العنف - الارهابي - الدموي - المخدرات - </li>
            </ul>
        </div>

    </div>



    <form method="post" action="{{ route('member.articles.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="card bg-light">
            <div class="card-header">{{ __('Add Article') }}</div>
            <div class="card-body">

                <div class="form-group">
                    {{ Form::label('title', __('Title')) }}
                    {{ Form::text('title', old('title'), ['class' => 'form-control', 'required' => true , 'minlength' => 18 ]) }}
                </div>

                <div class="form-group" style="display: none">
                    {{ Form::label('slug', __('Slug(URL Key)')) }}
                    {{ Form::text('slug', old('slug'), ['class' => 'form-control']) }}
                </div>

                <!---- Add Custom  ---->
                <div class="form-group">
                    {{ Form::label('lang', __('Language')) }}
                    {{ Form::select('lang', ["english" => "English" , "arabic" => "العربية" ], old('lang'),
                        ['class' => 'form-control ', 'required' => true]) }} 
                </div>

                <div class="form-group">
                    {{ Form::label('category', __('Category')) }}
                    {{ Form::select('category', $categories, old('category'),
                        ['class' => 'form-control select2', 'required' => true]) }}
                </div>

                <div class="form-group">
                    {{ Form::label('summary', __('Summary')) }}
                    {{ Form::textarea('summary', old('summary'), ['class' => 'form-control', 'rows' => 3, 'required' => true  , 'minlength' => 40  ]) }}
                </div>

                <div class="form-group">
                    {{ Form::label('content', __('Content')) }}
                    {{ Form::textarea('content', old('content'), ['class' => 'form-control text-editor' , 'minlength' => 1800  ]) }}
                </div>

                <div class="form-group">
                    {{ Form::file('upload_featured_image', ['accept' => '.jpg,.jpeg,.png,.gif' , 'class' => 'form-control', 'required' => true]) }}
                </div>

                <div class="form-group">
                    {{ Form::label('reason', __('Message to the Reviewer')) }}
                    {{ Form::textarea('reason', old('reason'), ['class' => 'form-control', 'rows' => 5, 'required' => true]) }}
                    <small class="form-text text-muted"><?= __('You must give a brief description of any changes you have made.') ?></small>
                </div>

                
                
                <div class="card card-primary card-outline">
                    <div class="card-header"><?= __('SEO ') ?></div>
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('seo[title]', __('SEO Title')) }}
                            {{ Form::text('seo[title]', old('seo[title]'), ['class' => 'form-control' , 'required' => true ]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('seo[keywords]', __('SEO Keywords')) }}
                            {{ Form::text('seo[keywords]', old('seo[keywords]'), ['class' => 'form-control' , 'required' => true ]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('seo[description]', __('SEO Description')) }}
                            {{ Form::textarea('seo[description]', old('seo[description]'), ['class' => 'form-control', 'rows' => 3 , 'required' => true ]) }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::submit(__('Submit'), ['class' => 'btn btn-primary']) }}
                </div>

            </div>
        </div>

    </form>

@endsection

@include('_partials.editor')
