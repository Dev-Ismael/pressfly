<?php
/**
 * @var \Illuminate\Database\Eloquent\Builder|\App\Option[] $options
 */
?>

@extends('layouts.admin')

@section('title', e(__('Settings')))

@section('content')

    <form action="{{ route('admin.options.index') }}" method="post" enctype="multipart/form-data" id="form-settings"
          onSubmit="save_settings.disabled=true; save_settings.value='{{ __('Saving ...') }}'; return true;">
        @csrf

        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link" href="#general" aria-controls="general" role="tab"
                                            data-toggle="tab"><?= __('General') ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#language" aria-controls="language" role="tab"
                                            data-toggle="tab"><?= __('Language') ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#users" aria-controls="users" role="tab"
                                            data-toggle="tab"><?= __('Users') ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#captcha" aria-controls="captcha" role="tab"
                                            data-toggle="tab"><?= __('Captcha') ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#integration" aria-controls="integration" role="tab"
                                            data-toggle="tab"><?= __('Code Integration') ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#social" aria-controls="Social Media" role="tab"
                                            data-toggle="tab"><?= __('Social Media Links') ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#email" aria-controls="email" role="tab"
                                            data-toggle="tab"><?= __('Email') ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#social_login" aria-controls="social_login"
                                            role="tab"
                                            data-toggle="tab"><?= __('Social Login') ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#cron" aria-controls="cron" role="tab"
                                            data-toggle="tab"><?= __('Cron') ?></a></li>
                </ul>
            </div>
            <div class="card-body">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" id="general" class="tab-pane fade show active">
                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Site Name') ?></div>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" name="Options[{{$settings['site_name']['id']}}][value]"
                                           value="{{ old("Options[{$settings['site_name']['id']}][value]", $settings['site_name']['value']) }}"
                                           class="form-control">
                                    <small class="form-text text-muted">{{ __('This is your site name.') }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('SEO Site Meta Title') ?></div>
                            <div class="col-sm-10">
                                {{ Form::text("Options[{$settings['site_meta_title']['id']}][value]",
                                    old("Options[{$settings['site_meta_title']['id']}][value]", $settings['site_meta_title']['value']),
                                    ['class' => 'form-control']) }}
                                <small
                                    class="form-text text-muted">{{ __('This is your site meta title. The recommended length is 50-60 characters.') }}</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Site Description') ?></div>
                            <div class="col-sm-10">
                                {{ Form::textarea("Options[{$settings['site_description']['id']}][value]",
                                    old("Options[{$settings['site_description']['id']}][value]", $settings['site_description']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('SEO Site Keywords') ?></div>
                            <div class="col-sm-10">
                                {{ Form::text("Options[{$settings['site_keywords']['id']}][value]",
                                    old("Options[{$settings['site_keywords']['id']}][value]", $settings['site_keywords']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Time Zone') ?></div>
                            <div class="col-sm-10">
                                @php $DateTimeZone = \DateTimeZone::listIdentifiers(DateTimeZone::ALL); @endphp
                                {{ Form::select("Options[{$settings['timezone']['id']}][value]", array_combine($DateTimeZone, $DateTimeZone),
                                    old("Options[{$settings['timezone']['id']}][value]", $settings['timezone']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Datetime Format') ?></div>
                            <div class="col-sm-10">
                                {{ Form::text("Options[{$settings['datetime_format']['id']}][value]",
                                    old("Options[{$settings['datetime_format']['id']}][value]", $settings['datetime_format']['value']),
                                    ['class' => 'form-control']) }}
                                <small class="form-text text-muted">
                                    <a href="http://userguide.icu-project.org/formatparse/datetime#TOC-Date-Time-Format-Syntax"
                                       target="_blank">
                                        {{ __('Documentation on date and time formatting') }}
                                    </a>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Enable SSL Integration') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['ssl_enable']['id']}][value]", [1 => __('Yes'), 0 => __('No')],
                                    old("Options[{$settings['ssl_enable']['id']}][value]", $settings['ssl_enable']['value']),
                                    ['class' => 'form-control']) }}
                                <small class="form-text text-muted">
                                    {{ __('You should install SSL into your website before enable SSL integration. For more information about SSL, please ask your hosting company.') }}
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Display Cookie Notification Bar') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['cookie_notification_bar']['id']}][value]", [1 => __('Yes'), 0 => __('No')],
                                    old("Options[{$settings['cookie_notification_bar']['id']}][value]", $settings['cookie_notification_bar']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Allowed Upload file types') ?></div>
                            <div class="col-sm-10">
                                {{ Form::text("Options[{$settings['upload_filetypes']['id']}][value]",
                                    old("Options[{$settings['upload_filetypes']['id']}][value]", $settings['upload_filetypes']['value']),
                                    ['class' => 'form-control']) }}
                                <small
                                    class="form-text text-muted">{{ __('Allowed file types. Separate types by comma.') }}</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Max upload file size') ?></div>
                            <div class="col-sm-10">
                                {{ Form::number("Options[{$settings['fileupload_max']['id']}][value]",
                                    old("Options[{$settings['fileupload_max']['id']}][value]", $settings['fileupload_max']['value']),
                                    ['class' => 'form-control', 'min' => 0]) }}
                                <small
                                    class="form-text text-muted">{{ __('Size in KB. Note 1MB equal to 1024KB') }}</small>
                            </div>
                        </div>

                    

                        <div class="form-group row">
                            <div class="col-sm-2">{{ __('Privacy Page') }}</div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['privacy_page']['id']}][value]", $pages,
                                    old("Options[{$settings['privacy_page']['id']}][value]", $settings['privacy_page']['value']),
                                    ['placeholder' => '', 'class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">{{ __('Terms of Use Page') }}</div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['terms_page']['id']}][value]", $pages,
                                    old("Options[{$settings['terms_page']['id']}][value]", $settings['terms_page']['value']),
                                    ['placeholder' => '', 'class' => 'form-control']) }}
                            </div>
                        </div>

                        <h3>{{ __('Mailchimp Newsletter') }}</h3>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Mailchimp API Key') ?></div>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" name="Options[{{$settings['mailchimp_api_key']['id']}}][value]"
                                           value="{{ old("Options[{$settings['mailchimp_api_key']['id']}][value]", $settings['mailchimp_api_key']['value']) }}"
                                           class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Mailchimp List Id') ?></div>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" name="Options[{{$settings['mailchimp_list_id']['id']}}][value]"
                                           value="{{ old("Options[{$settings['mailchimp_list_id']['id']}][value]", $settings['mailchimp_list_id']['value']) }}"
                                           class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div role="tabpanel" id="language" class="tab-pane fade">

                        <div class="form-group row">
                            <div class="col-sm-2">{{ __('Language') }}</div>
                            <div class="col-sm-10">
                                <?php
                                $files = \File::glob(resource_path('lang') . "/*.json");
                                $langs = [];
                                foreach ($files as $file) {
                                    $name = pathinfo($file, PATHINFO_FILENAME);
                                    $langs[$name] = $name;
                                }
                                ?>
                                {{ Form::select("Options[{$settings['language']['id']}][value]", $langs,
                                    old("Options[{$settings['language']['id']}][value]", $settings['language']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Language Direction') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['language_direction']['id']}][value]", ['ltr' => __('LTR'), 'rtl' => __('RTL')],
                                    old("Options[{$settings['language_direction']['id']}][value]", $settings['language_direction']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                    </div>

                    

                    <div role="tabpanel" id="users" class="tab-pane fade">

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Close Registration') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['close_registration']['id']}][value]", [1 => __('Yes'), 0 => __('No')],
                                    old("Options[{$settings['close_registration']['id']}][value]", $settings['close_registration']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Enable Account Activation by Email') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['account_activate_email']['id']}][value]", [1 => __('Yes'), 0 => __('No')],
                                    old("Options[{$settings['account_activate_email']['id']}][value]", $settings['account_activate_email']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Reserved Usernames') ?></div>
                            <div class="col-sm-10">
                                {{ Form::textarea("Options[{$settings['reserved_usernames']['id']}][value]",
                                    old("Options[{$settings['reserved_usernames']['id']}][value]", $settings['reserved_usernames']['value']),
                                    ['class' => 'form-control']) }}
                                <small class="form-text text-muted">
                                    {{ __('Separate by comma, no spaces.') }}
                                </small>
                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" id="captcha" class="tab-pane fade">

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Enable Captcha') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['captcha']['id']}][value]", [1 => __('Yes'), 0 => __('No')],
                                    old("Options[{$settings['captcha']['id']}][value]", $settings['captcha']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="conditional"
                             data-condition="Options[<?= $settings['captcha']['id'] ?>][value] === '1'">

                            <div class="form-group row">
                                <div class="col-sm-2"><?= __('Captcha Type') ?></div>
                                <div class="col-sm-10">
                                    {{ Form::select("Options[{$settings['captcha_type']['id']}][value]",
                                        [
                                            'recaptcha_v2_checkbox' => __('reCAPTCHA v2 Checkbox'),
                                            'recaptcha_v2_invisible' => __('reCAPTCHA v2 Invisible'),
                                            'solvemedia' => __('Solve Media'),
                                        ],
                                        old("Options[{$settings['captcha_type']['id']}][value]", $settings['captcha_type']['value']),
                                        ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="conditional"
                                 data-condition="Options[<?= $settings['captcha_type']['id'] ?>][value] === 'recaptcha_v2_checkbox'">

                                <legend><?= __('reCAPTCHA v2 Checkbox Settings') ?></legend>

                                <div class="form-group row">
                                    <div class="col-sm-2"><?= __('reCAPTCHA v2 Checkbox Site key') ?></div>
                                    <div class="col-sm-10">
                                        {{ Form::text("Options[{$settings['recaptcha_v2_checkbox_site_key']['id']}][value]",
                                            old("Options[{$settings['recaptcha_v2_checkbox_site_key']['id']}][value]", $settings['recaptcha_v2_checkbox_site_key']['value']),
                                            ['class' => 'form-control']) }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2"><?= __('reCAPTCHA v2 Checkbox Secret key') ?></div>
                                    <div class="col-sm-10">
                                        {{ Form::text("Options[{$settings['recaptcha_v2_checkbox_secret_key']['id']}][value]",
                                            old("Options[{$settings['recaptcha_v2_checkbox_secret_key']['id']}][value]", $settings['recaptcha_v2_checkbox_secret_key']['value']),
                                            ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>

                            <div class="conditional"
                                 data-condition="Options[<?= $settings['captcha_type']['id'] ?>][value] === 'recaptcha_v2_invisible'">

                                <legend><?= __('reCAPTCHA v2 Invisible Settings') ?></legend>

                                <div class="form-group row">
                                    <div class="col-sm-2"><?= __('reCAPTCHA v2 Invisible Site key') ?></div>
                                    <div class="col-sm-10">
                                        {{ Form::text("Options[{$settings['recaptcha_v2_invisible_site_key']['id']}][value]",
                                            old("Options[{$settings['recaptcha_v2_invisible_site_key']['id']}][value]", $settings['recaptcha_v2_invisible_site_key']['value']),
                                            ['class' => 'form-control']) }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2"><?= __('reCAPTCHA v2 Invisible Secret key') ?></div>
                                    <div class="col-sm-10">
                                        {{ Form::text("Options[{$settings['recaptcha_v2_invisible_secret_key']['id']}][value]",
                                            old("Options[{$settings['recaptcha_v2_invisible_secret_key']['id']}][value]", $settings['recaptcha_v2_invisible_secret_key']['value']),
                                            ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>

                            <div class="conditional"
                                 data-condition="Options[<?= $settings['captcha_type']['id'] ?>][value] === 'solvemedia'">

                                <legend><?= __('Solve Media Settings') ?></legend>

                                <div class="form-group row">
                                    <div class="col-sm-2"><?= __('Solve Media Challenge Key') ?></div>
                                    <div class="col-sm-10">
                                        {{ Form::text("Options[{$settings['solvemedia_challenge_key']['id']}][value]",
                                            old("Options[{$settings['solvemedia_challenge_key']['id']}][value]", $settings['solvemedia_challenge_key']['value']),
                                            ['class' => 'form-control']) }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2"><?= __('Solve Media Verification Key') ?></div>
                                    <div class="col-sm-10">
                                        {{ Form::text("Options[{$settings['solvemedia_verification_key']['id']}][value]",
                                            old("Options[{$settings['solvemedia_verification_key']['id']}][value]", $settings['solvemedia_verification_key']['value']),
                                            ['class' => 'form-control']) }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2"><?= __('Solve Media Authentication Hash Key') ?></div>
                                    <div class="col-sm-10">
                                        {{ Form::text("Options[{$settings['solvemedia_authentication_key']['id']}][value]",
                                            old("Options[{$settings['solvemedia_authentication_key']['id']}][value]", $settings['solvemedia_authentication_key']['value']),
                                            ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <div class="col-sm-2"><?= __('Enable on Login Form') ?></div>
                                <div class="col-sm-10">
                                    {{ Form::select("Options[{$settings['captcha_login']['id']}][value]", [1 => __('Yes'), 0 => __('No')],
                                        old("Options[{$settings['captcha_login']['id']}][value]", $settings['captcha_login']['value']),
                                        ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2"><?= __('Enable on Register Form') ?></div>
                                <div class="col-sm-10">
                                    {{ Form::select("Options[{$settings['captcha_register']['id']}][value]", [1 => __('Yes'), 0 => __('No')],
                                        old("Options[{$settings['captcha_register']['id']}][value]", $settings['captcha_register']['value']),
                                        ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2"><?= __('Enable on Forgot Password Form') ?></div>
                                <div class="col-sm-10">
                                    {{ Form::select("Options[{$settings['captcha_forgot_password']['id']}][value]", [1 => __('Yes'), 0 => __('No')],
                                        old("Options[{$settings['captcha_forgot_password']['id']}][value]", $settings['captcha_forgot_password']['value']),
                                        ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2"><?= __('Enable on Contact Form') ?></div>
                                <div class="col-sm-10">
                                    {{ Form::select("Options[{$settings['captcha_contact']['id']}][value]", [1 => __('Yes'), 0 => __('No')],
                                        old("Options[{$settings['captcha_contact']['id']}][value]", $settings['captcha_contact']['value']),
                                        ['class' => 'form-control']) }}
                                </div>
                            </div>

                        </div>

                    </div>

                    <div role="tabpanel" id="integration" class="tab-pane fade">

                        <div class="form-group row">
                            <div class="col-sm-2">{{ __('Add code between <head> & </head> of the frontend') }}</div>
                            <div class="col-sm-10">
                                {{ Form::textarea("Options[{$settings['frontend_head_code']['id']}][value]",
                                    old("Options[{$settings['frontend_head_code']['id']}][value]", $settings['frontend_head_code']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">{{ __('Add code before </body> of the frontend') }}</div>
                            <div class="col-sm-10">
                                {{ Form::textarea("Options[{$settings['frontend_footer_code']['id']}][value]",
                                    old("Options[{$settings['frontend_footer_code']['id']}][value]", $settings['frontend_footer_code']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                    </div>

                    <div role="tabpanel" id="social" class="tab-pane fade">

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Facebook Page URL') ?></div>
                            <div class="col-sm-10">
                                {{ Form::url("Options[{$settings['facebook_url']['id']}][value]",
                                    old("Options[{$settings['facebook_url']['id']}][value]", $settings['facebook_url']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Twitter Profile URL') ?></div>
                            <div class="col-sm-10">
                                {{ Form::url("Options[{$settings['twitter_url']['id']}][value]",
                                    old("Options[{$settings['twitter_url']['id']}][value]", $settings['twitter_url']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Google Plus URL') ?></div>
                            <div class="col-sm-10">
                                {{ Form::url("Options[{$settings['google_plus_url']['id']}][value]",
                                    old("Options[{$settings['google_plus_url']['id']}][value]", $settings['google_plus_url']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('YouTube URL') ?></div>
                            <div class="col-sm-10">
                                {{ Form::url("Options[{$settings['youtube_url']['id']}][value]",
                                    old("Options[{$settings['youtube_url']['id']}][value]", $settings['youtube_url']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Pinterest URL') ?></div>
                            <div class="col-sm-10">
                                {{ Form::url("Options[{$settings['pinterest_url']['id']}][value]",
                                    old("Options[{$settings['pinterest_url']['id']}][value]", $settings['pinterest_url']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Instagram URL') ?></div>
                            <div class="col-sm-10">
                                {{ Form::url("Options[{$settings['instagram_url']['id']}][value]",
                                    old("Options[{$settings['instagram_url']['id']}][value]", $settings['instagram_url']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('VK URL') ?></div>
                            <div class="col-sm-10">
                                {{ Form::url("Options[{$settings['vk_url']['id']}][value]",
                                    old("Options[{$settings['vk_url']['id']}][value]", $settings['vk_url']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                    </div>

                    <div role="tabpanel" id="email" class="tab-pane fade">

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Admin Email') ?></div>
                            <div class="col-sm-10">
                                {{ Form::email("Options[{$settings['admin_email']['id']}][value]",
                                    old("Options[{$settings['admin_email']['id']}][value]", $settings['admin_email']['value']),
                                    ['class' => 'form-control']) }}
                                <small
                                    class="form-text text-muted">{{ __('The recipient email for the contact form and admin notifications.') }}</small>
                            </div>
                        </div>

                        <h3>{{ __('Admin Notifications') }}</h3>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('New Article Added') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['alert_admin_new_article']['id']}][value]", [0 => __('No'), 1 => __('Yes')],
                                    old("Options[{$settings['alert_admin_new_article']['id']}][value]", $settings['alert_admin_new_article']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('New Article Update Added') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['alert_admin_update_article']['id']}][value]", [0 => __('No'), 1 => __('Yes')],
                                    old("Options[{$settings['alert_admin_update_article']['id']}][value]", $settings['alert_admin_update_article']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('New User Registration') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['alert_admin_new_user_register']['id']}][value]", [0 => __('No'), 1 => __('Yes')],
                                    old("Options[{$settings['alert_admin_new_user_register']['id']}][value]", $settings['alert_admin_new_user_register']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('New Withdrawal Request') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['alert_admin_new_withdrawal']['id']}][value]", [0 => __('No'), 1 => __('Yes')],
                                    old("Options[{$settings['alert_admin_new_withdrawal']['id']}][value]", $settings['alert_admin_new_withdrawal']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <h3>{{ __('Member Notifications') }}</h3>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('New Article Approved') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['alert_member_approved_new_article']['id']}][value]", [0 => __('No'), 1 => __('Yes')],
                                    old("Options[{$settings['alert_member_approved_new_article']['id']}][value]", $settings['alert_member_approved_new_article']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Article Update Approved') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['alert_member_approved_update_article']['id']}][value]", [0 => __('No'), 1 => __('Yes')],
                                    old("Options[{$settings['alert_member_approved_update_article']['id']}][value]", $settings['alert_member_approved_update_article']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Approved Withdrawal Request') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['alert_member_approved_withdraw']['id']}][value]", [0 => __('No'), 1 => __('Yes')],
                                    old("Options[{$settings['alert_member_approved_withdraw']['id']}][value]", $settings['alert_member_approved_withdraw']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Completed Withdrawal Request') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['alert_member_completed_withdraw']['id']}][value]", [0 => __('No'), 1 => __('Yes')],
                                    old("Options[{$settings['alert_member_completed_withdraw']['id']}][value]", $settings['alert_member_completed_withdraw']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Canceled Withdrawal Request') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['alert_member_canceled_withdraw']['id']}][value]", [0 => __('No'), 1 => __('Yes')],
                                    old("Options[{$settings['alert_member_canceled_withdraw']['id']}][value]", $settings['alert_member_canceled_withdraw']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <h3>{{ __('Sending Email Settings') }}</h3>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('From Email') ?></div>
                            <div class="col-sm-10">
                                {{ Form::email("Options[{$settings['email_from']['id']}][value]",
                                    old("Options[{$settings['email_from']['id']}][value]", $settings['email_from']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Email Method') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['email_method']['id']}][value]", ['sendmail' => __('Sendmail'), 'smtp' => __('SMTP')],
                                    old("Options[{$settings['email_method']['id']}][value]", $settings['email_method']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="conditional"
                             data-condition="Options[<?= $settings['email_method']['id'] ?>][value] === 'smtp'">
                            <div class="form-group row">
                                <div class="col-sm-2"><?= __('SMTP Connection Security') ?></div>
                                <div class="col-sm-10">
                                    {{ Form::select("Options[{$settings['email_smtp_security']['id']}][value]", ['' => __('None'), 'ssl' => __('SSL'), 'tls' => __('TLS')],
                                        old("Options[{$settings['email_smtp_security']['id']}][value]", $settings['email_smtp_security']['value']),
                                        ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2"><?= __('SMTP Outgoing Host') ?></div>
                                <div class="col-sm-10">
                                    {{ Form::text("Options[{$settings['email_smtp_host']['id']}][value]",
                                        old("Options[{$settings['email_smtp_host']['id']}][value]", $settings['email_smtp_host']['value']),
                                        ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2"><?= __('SMTP Outgoing Port') ?></div>
                                <div class="col-sm-10">
                                    {{ Form::number("Options[{$settings['email_smtp_port']['id']}][value]",
                                        old("Options[{$settings['email_smtp_port']['id']}][value]", $settings['email_smtp_port']['value']),
                                        ['class' => 'form-control']) }}
                                    <small
                                        class="form-text text-muted">{{ __('Port value depends on the Connection Security type you set above None - port 25, SSL - port 465, TLS - port 587. these values maybe different between email providers.') }}</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2"><?= __('SMTP Username') ?></div>
                                <div class="col-sm-10">
                                    {{ Form::text("Options[{$settings['email_smtp_username']['id']}][value]",
                                        old("Options[{$settings['email_smtp_username']['id']}][value]", $settings['email_smtp_username']['value']),
                                        ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2"><?= __('SMTP Password') ?></div>
                                <div class="col-sm-10">
                                    <input type="password"
                                           name="Options[{{$settings['email_smtp_password']['id']}}][value]"
                                           class="form-control"
                                           value="{{ old("Options[{$settings['email_smtp_password']['id']}][value]", $settings['email_smtp_password']['value']) }}">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div role="tabpanel" id="social_login" class="tab-pane fade">

                        <h3>{{ __('Facebook Settings') }}</h3>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Enable Facebook') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['social_login_facebook']['id']}][value]", [0 => __('No'), 1 => __('Yes')],
                                    old("Options[{$settings['social_login_facebook']['id']}][value]", $settings['social_login_facebook']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('App Id') ?></div>
                            <div class="col-sm-10">
                                {{ Form::text("Options[{$settings['social_login_facebook_app_id']['id']}][value]",
                                    old("Options[{$settings['social_login_facebook_app_id']['id']}][value]", $settings['social_login_facebook_app_id']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('App Secret') ?></div>
                            <div class="col-sm-10">
                                {{ Form::text("Options[{$settings['social_login_facebook_app_secret']['id']}][value]",
                                    old("Options[{$settings['social_login_facebook_app_secret']['id']}][value]", $settings['social_login_facebook_app_secret']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <h3>{{ __('Twitter Settings') }}</h3>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Enable Twitter') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['social_login_twitter']['id']}][value]", [0 => __('No'), 1 => __('Yes')],
                                    old("Options[{$settings['social_login_twitter']['id']}][value]", $settings['social_login_twitter']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Consumer Key (API Key)') ?></div>
                            <div class="col-sm-10">
                                {{ Form::text("Options[{$settings['social_login_twitter_api_key']['id']}][value]",
                                    old("Options[{$settings['social_login_twitter_api_key']['id']}][value]", $settings['social_login_twitter_api_key']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Consumer Secret (API Secret)') ?></div>
                            <div class="col-sm-10">
                                {{ Form::text("Options[{$settings['social_login_twitter_api_secret']['id']}][value]",
                                    old("Options[{$settings['social_login_twitter_api_secret']['id']}][value]", $settings['social_login_twitter_api_secret']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <h3>{{ __('Google Settings') }}</h3>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Enable Google') ?></div>
                            <div class="col-sm-10">
                                {{ Form::select("Options[{$settings['social_login_google']['id']}][value]", [0 => __('No'), 1 => __('Yes')],
                                    old("Options[{$settings['social_login_google']['id']}][value]", $settings['social_login_google']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Client ID') ?></div>
                            <div class="col-sm-10">
                                {{ Form::text("Options[{$settings['social_login_google_client_id']['id']}][value]",
                                    old("Options[{$settings['social_login_google_client_id']['id']}][value]", $settings['social_login_google_client_id']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"><?= __('Client Secret') ?></div>
                            <div class="col-sm-10">
                                {{ Form::text("Options[{$settings['social_login_google_client_secret']['id']}][value]",
                                    old("Options[{$settings['social_login_google_client_secret']['id']}][value]", $settings['social_login_google_client_secret']['value']),
                                    ['class' => 'form-control']) }}
                            </div>
                        </div>

                    </div>

                    <div role="tabpanel" id="cron" class="tab-pane fade">

                        <?php
                        // http://php.net/manual/en/features.commandline.options.php
                        ?>
                        <div class="mb-1">{{ __('Cron Job Command') }}</div>
                        <code class="d-block mb-3" style="font-size: 75%;">
                            * * * * * php -d 'register_argc_argv=on;' -d 'apc.enabled=0;' {{ base_path('artisan') }}
                            schedule:run >> /dev/null 2>&1
                        </code>

                    </div>

                </div>

                <div class="form-group">
                    <input type="submit" name="save_settings" class="btn btn-primary" value="{{ __('Save') }}">
                </div>
            </div>
        </div>

    </form>

@endsection

@push('footer')
    <script>
        /**
         * Bootstrap 4: Keep selected tab on page refresh
         */
        // store the currently selected tab in the localStorage
        $('#form-settings a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var id = $(e.target).attr('href').substr(1);
            localStorage.setItem('settings_selectedTab', id);
        });

        // on load of the page: switch to the currently selected tab
        var selectedTab = localStorage.getItem('settings_selectedTab');

        if ($('#form-settings').length && selectedTab !== null) {
            $('#form-settings a[data-toggle="tab"][href="#' + selectedTab + '"]').tab('show');
        } else {
            $('#form-settings a[data-toggle="tab"]:first').tab('show');
        }

    </script>
@endpush
