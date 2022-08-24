@extends('layouts.member')

@section('title', e(__('Add Article')))

@section('content')



    <div class="row bg-success p-2 mb-3 text-white member-rules">

        <div class="col-md-6 english">
            <p class="rule-title"> Site Terms and Conditions : </p>
            <ul>
                <li> No illegal means to get visits to your articles </li>
                <li> The paid visit is not counted if the visitor stays for less than <span style="font-weight: bolder">20
                        seconds</span> </li>
                <li> Articles are not accepted if they violate the conditions </li>
                <li> Article review within 24 hours </li>
                <li> The essay must be at least 400 words </li>
                <li> Use an attractive and organized title for article </li>
                <li> Articles are not accepted containing violence, blood, pornography, and politics... </li>
                <li> Your account will be banned if you violate the conditions above </li>
            </ul>
        </div>

        <div class="col-md-6 arabic">
            <p class="rule-title"> : قوانين وشروط الموقع </p>
            <ul>
                <li> ممنوع استخدام وسائل غير شرعية للحصول علي زيارات لمقالاتك </li>
                <li> لا يتم احتساب الزيارة المدفوعة اذا بقي الزائر مدة اقل من من <span style="font-weight:bolder">20
                        ثانية</span> </li>
                <li> لا يتم قبول المقالات اذا خالفت الشروط </li>
                <li> يتم مراجعة المقال في خلال 24 ساعة </li>
                <li> يجب ان لا يقل المقال عن 400 كلمة </li>
                <li> استخدم عنوان منظم و جذاب للمقالة </li>
                <li> لا يتم قبول المقالات التي محتواها به العنف , الدم , الاباحي , السياسي .... </li>
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
                    {{ Form::text('title', old('title'), ['class' => 'form-control' , 'required' => true , 'minlength' => 18 , 'maxlength' => 100 ]) }}
                    @error('title')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lang">{{ __('Language') }}</label>
                    <select class="form-control" id="lang" name="lang" required />
                    <option class="d-none" disabled selected value="">Choose Language...</option>
                    <option value="english"  {{ old('lang') == 'english' ? 'selected' : '' }}  >English</option>
                    <option value="arabic"  {{ old('lang') == 'arabic' ? 'selected' : '' }}  >العربية</option>
                    </select>
                    @error('lang')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">{{ __('Category') }}</label>
                    <select class="form-control" id="category" name="category" required />
                        <option class="d-none" disabled selected value="">Choose Category...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }} >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('summary', __('Summary')) }}
                    {{ Form::textarea('summary', old('summary'), ['class' => 'form-control', 'rows' => 3 , 'required' => true , 'minlength' => 100 , 'maxlength' => 255  ]) }}
                    @error('summary')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('content', __('Content')) }}
                    {{-- {{ Form::textarea('content', old('content'), ['class' => 'form-control text-editor' ]) }} --}}
                    <textarea name="content" class="form-control text-editor" id="content" cols="30" rows="10"
                    onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off>
                        {{ old('content') }}
                    </textarea>
                    @error('content')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('upload_featured_image', __('Article Image')) }}
                    {{ Form::file('upload_featured_image', ['class' => 'form-control' , 'required' => true ]) }}
                    @error('upload_featured_image')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group d-none">
                    {{ Form::label('reason', __('Message to the Reviewer')) }}
                    {{ Form::textarea('reason', old('reason'), ['class' => 'form-control', 'rows' => 5]) }}
                    <small
                        class="form-text text-muted"><?= __('You must give a brief description of any changes you have made.') ?></small>
                    @error('reason')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>



                <div class="card card-primary card-outline">
                    <div class="card-header"><?= __('SEO Tools') ?></div>
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('seo[keywords]', __('SEO Keywords')) }}
                            <span class="seo-example d-inline"> 
                                {{-- <i class="fa-solid fa-file-circle-check fa-fade"></i> --}}
                                <i class="fa-solid fa-file-circle-check"></i>
                                <u> <span class="link"> Click to see example </span> </u>
                            </span>
                            {{ Form::textarea('seo[keywords]', old('seo[keywords]'), ['class' => 'form-control', 'placeholder' => 'Ex: Corona , Corona virus statistics , Corona virus , Covid , Covid-19...' , 'required' => true , 'minlength' => 250 , 'maxlength' => 1000]) }}
                            <small class="form-text text-muted"> You can use <a href="https://keywordtool.io"
                                    target="_blank" style="text-decoration:underline"> https://keywordtool.io </a> for SEO
                                keywords for get more views </small>
                            @error('seo.keywords')
                                <p class="alert alert-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group pl-3">
                    {{ Form::submit(__('Submit'), ['class' => 'btn btn-primary']) }}
                </div>

            </div>
        </div>

    </form>

@endsection

@include('_partials.editor')
