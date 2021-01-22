@extends('layouts.member')

@section('title', e(__('Add Article')))

@section('content')



    <div class="row bg-success p-2 mb-3 text-white member-rules">

        <div class="col-md-6 english">
            <p class="rule-title"> Site Terms and Conditions : </p>
            <ul>
                <li> No illegal means to get visits to your articles </li>
                <li> The visit is not counted if the visitor stays for less than 30 seconds </li>
                <li> Articles are not accepted if they violate the conditions </li>
                <li> Article review within 24 hours  </li>
                <li> The essay must be at least 400 words </li>
                <li> Use an attractive and organized title for article </li>
                <li> Your account will be banned if you violate the conditions above </li>
            </ul>
        </div>

        <div class="col-md-6 arabic">
            <p class="rule-title"> : قوانين وشروط الموقع </p>
            <ul>
                <li> ممنوع استخدام وسائل غير شرعية للحصول علي زيارات لمقالاتك  </li>
                <li> لا يتم احتساب الزيارة اذا بقي الزائر مدة اقل من من 30 ثانية  </li>
                <li> لا يتم قبول المقالات اذا خالفت الشروط </li>
                <li>  يتم مراجعة المقال في خلال 24 ساعة  </li>
                <li>  يجب ان لا يقل المقال عن 400 كلمة </li>
                <li> استخدم عنوان منظم و جذاب للمقالة </li>
                <li> يتم حظر حسابك اذا خالفت الشروط بالاعلي </li>
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
                    @error('title')
                        <p class="alert alert-danger mt-2">{{$message }}</p> 
                    @enderror
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
                    @error('lang')
                        <p class="alert alert-danger mt-2">{{$message }}</p> 
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('category', __('Category')) }}
                    {{ Form::select('category', $categories, old('category'),
                        ['class' => 'form-control select2', 'required' => true]) }}
                    @error('category')
                        <p class="alert alert-danger mt-2">{{$message }}</p> 
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('summary', __('Summary')) }}
                    {{ Form::textarea('summary', old('summary'), ['class' => 'form-control', 'rows' => 3, 'required' => true  , 'minlength' => 40  ]) }}
                    @error('summary')
                        <p class="alert alert-danger mt-2">{{$message }}</p> 
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('content', __('Content')) }}
                    {{ Form::textarea('content', old('content'), ['class' => 'form-control text-editor' ]) }}
                    @error('content')
                        <p class="alert alert-danger mt-2">{{$message }}</p> 
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::file('upload_featured_image', ['accept' => '.jpg,.jpeg,.png,.gif' , 'class' => 'form-control', 'required' => true]) }}
                    @error('upload_featured_image')
                        <p class="alert alert-danger mt-2">{{$message }}</p> 
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('reason', __('Message to the Reviewer')) }}
                    {{ Form::textarea('reason', old('reason'), ['class' => 'form-control', 'rows' => 5, 'required' => true]) }}
                    <small class="form-text text-muted"><?= __('You must give a brief description of any changes you have made.') ?></small>
                    @error('reason')
                        <p class="alert alert-danger mt-2">{{$message }}</p> 
                    @enderror
                </div>

                
                
                <div class="card card-primary card-outline">
                    <div class="card-header"><?= __('SEO ') ?></div>
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('seo[title]', __('SEO Title')) }}
                            {{ Form::text('seo[title]', old('seo[title]'), ['class' => 'form-control' , 'required' => true , 'minlength' => 18 ]) }}
                            <small class="form-text text-muted"><?= __('SEO title ex: Corona virus statistics .') ?></small>
                        </div>

                        <div class="form-group">
                            {{ Form::label('seo[keywords]', __('SEO Keywords')) }}
                            {{ Form::text('seo[keywords]', old('seo[keywords]'), ['class' => 'form-control' , 'required' => true  , 'minlength' => 50  ]) }}
                            <small class="form-text text-muted"><?= __('SEO Keywords ex: Corona , Corona virus statistics , Corona virus .') ?></small>
                        </div>

                        <div class="form-group">
                            {{ Form::label('seo[description]', __('SEO Description')) }}
                            {{ Form::textarea('seo[description]', old('seo[description]'), ['class' => 'form-control', 'rows' => 3 , 'required' => true  , 'minlength' => 50   ]) }}
                            <small class="form-text text-muted"><?= __('SEO Description is like article summary .') ?></small>
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
