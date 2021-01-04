<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/ajax-element', function () {
    $element = (string)request()->query('element');

    $elements = [
        'block1',
        'block2',
        'block3',
        'block4',
        'block5',
        'block6',
        'block7',
        'block8',
        'block9',
        'block10',
        'grid1',
        'grid2',
        'grid3',
        'grid4',
        'grid5',
    ];

    if (!in_array($element, $elements)) {
        return null;
    }

    $attributes = array(
        'cats' => (string)request()->query('cats', ''),
        'per_page' => (int)request()->query('per_page', 6),
        'order_by' => (string)request()->query('orderby', 'published_at'),
        'order' => (string)request()->query('order', 'desc'),
        'summary_length' => (int)request()->query('excerpt', null),
        'page' => (int)request()->query('page', 1),
        'pagination' => (string)request()->query('pagination', 'numeric'),
    );

    return call_user_func([\App\Helpers\Elements::class, $element], $attributes);
})->name('ajax.element');


// Authentication Routes...
Route::match(['get', 'post'], '/login', 'AuthController@login')->name('login');
Route::get('logout', 'AuthController@logout')->name('logout');

// Registration Routes...
Route::match(['get', 'post'], '/register', 'AuthController@register')->name('register');

Route::get('email-verify/{username}/{key}', 'AuthController@emailVerify')->name('email.verify');

Route::match(['get', 'post'], 'password/reset/{username?}/{key?}', 'AuthController@resetPassword')
    ->name('password.reset');

Route::get('/auth/{provider}', 'AuthController@redirectToSocialProvider')->name('social.login');
Route::get('/auth/{provider}/callback', 'AuthController@handleSocialProviderCallback')->name('social.callback');

Route::post('upload/editor', 'UploadController@editor')->name('upload.editor');


// Public Routes
Route::name('')->group(function () {
    Route::get('/', 'HomeController@index')->name('homepage');

    Route::post('/visitor-check', 'VisitorCheckController@index')->name('visitor-check');

    Route::get('/feed', 'HomeController@feed')->name('feed');

    Route::get('/ref/{username}', 'UserController@ref')->name('referral.url');

    Route::post('/article/go', 'ArticleController@go')->name('article-go');

    Route::get('/category/{slug}-{category}', 'CategoryController@show')
        ->where(['slug' => '(.+)', 'category' => '[0-9]+'])
        ->name('category.show');
    Route::get('/category/{slug}-{category}/feed', 'CategoryController@feed')
        ->where(['slug' => '(.+)', 'category' => '[0-9]+'])
        ->name('category.feed');

    Route::get('/tag/{slug}-{tag}', 'TagController@show')
        ->where(['slug' => '(.+)', 'tag' => '[0-9]+'])
        ->name('tag.show');
    Route::get('/tag/{slug}-{tag}/feed', 'TagController@feed')
        ->where(['slug' => '(.+)', 'tag' => '[0-9]+'])
        ->name('tag.feed');


    Route::post('/comment/store', 'CommentController@store')->name('comment.add');
    Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

    Route::get('/author/{username}', 'AuthorController@show')->name('author.show');
    Route::get('/author/{username}/feed', 'AuthorController@feed')->name('author.feed');
    Route::post('/author/{username}/follow', 'AuthorController@follow')->name('author.follow');
    Route::post('/author/{username}/unFollow', 'AuthorController@unFollow')->name('author.unfollow');

    Route::post('/newsletter/subscribe', 'NewsletterController@subscribe')->name('newsletter.subscribe');
    Route::match(['get', 'post'], '/search', 'SearchController@index')->name('search');

    Route::get('/contact', 'ContactController@show')->name('contact.show');
    Route::post('/contact/process', 'ContactController@process')->name('contact.process');

    Route::get('/sitemap', 'SitemapController@index')->name('sitemap');

    Route::get('/{slug}-{article}', 'ArticleController@show')->where(['slug' => '(.+)', 'article' => '[0-9]+'])
        ->name('article.show');
});