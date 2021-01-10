@extends('layouts.admin')

@section('title', e(__('Add Article')))

@section('content')

    <form action="{{ route('admin.articles.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-sm-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">{{ __('Add Article') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('title', __('Title')) }}
                            {{ Form::text('title', old('title'), ['class' => 'form-control', 'required' => true]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('slug', __('Slug(URL Key)')) }}
                            {{ Form::text('slug', old('slug'), ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('summary', __('Summary')) }}
                            {{ Form::textarea('summary', old('summary'), ['class' => 'form-control', 'rows' => 3, 'required' => true]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('content', __('Content')) }}
                            {{ Form::textarea('content', old('content'), ['class' => 'form-control text-editor']) }}
                        </div>
                    </div>
                </div>

                <div class="card card-primary card-outline">
                    <div class="card-header"><?= __('SEO ') ?></div>
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('seo[title]', __('SEO Title')) }}
                            {{ Form::text('seo[title]', old('seo[title]'), ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('seo[keywords]', __('SEO Keywords')) }}
                            {{ Form::text('seo[keywords]', old('seo[keywords]'), ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('seo[description]', __('SEO Description')) }}
                            {{ Form::textarea('seo[description]', old('seo[description]'), ['class' => 'form-control', 'rows' => 3]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::submit(__('Submit'), ['class' => 'btn btn-primary']) }}
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-3">
            
                <div class="card card-primary card-outline">
                    <div class="card-header"><?= __('Featured Image') ?></div>
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::file('upload_featured_image', ['accept' => '.jpg,.jpeg,.png,.gif']) }}
                        </div>
                    </div>
                </div>

                <div class="card card-primary card-outline">
                    <div class="card-header"><?= __('Categories') ?></div>
                    <div class="card-body">
                        <table class="table table-sm">
                            @foreach ($categories as $id => $name)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="categories[]" value="{{ $id }}"
                                                       @if(in_array($id, old('categories', []))) checked @endif
                                                       class="form-check-input"> {{ $name }}
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mb-0 text-muted">
                                            <label class="mb-0">
                                                <input class="form-check-input" type="radio" name="main_category"
                                                       @if((int)old('main_category') === $id) checked @endif
                                                       value="{{ $id }}" required> {{ __('Primary') }}
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="card card-primary card-outline">
                    <div class="card-header"><?= __('Tags') ?></div>
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::select('tags[]', $tags, old('tags[]'), ['class' => 'form-control select2',
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
