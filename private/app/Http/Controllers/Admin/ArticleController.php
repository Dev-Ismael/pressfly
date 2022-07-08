<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\Mail\MemberApprovedNewArticle;
use App\Mail\MemberApprovedUpdateArticle;
use App\Mail\MemberUpdateArticle;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ArticleController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conditions = [];

        if (request()->input('Filter')) {
            $filter_fields = [
                'title',
                'user_id',
                'slug',
                'status',
            ];

            foreach (request()->input('Filter') as $param_name => $param_value) {
                if (!$param_value) {
                    continue;
                }
                //$value = urldecode($value);
                if (in_array($param_name, $filter_fields)) {
                    $like_params = ['title', 'slug'];

                    if (in_array($param_name, $like_params)) {
                        $conditions[] = [$param_name, 'like', '%' . $param_value . '%'];
                    } else {
                        $conditions[] = [$param_name, '=', $param_value];
                    }
                }
            }
        }

        $orderBy = [
            'col' => request()->input('order', 'id'),
            'dir' => request()->input('dir', 'desc'),
        ];

        $articles = Article::with('user')
            ->where($conditions)
            ->whereIn('status', [1, 2, 7])
            ->where('lang' , 'arabic')
            ->orderBy($orderBy['col'], $orderBy['dir'])
            ->paginate();

        $orderBy['dir'] = ($orderBy['dir'] === 'asc') ? 'desc' : 'asc';

        return view('admin.articles.index', [
            'articles' => $articles,
            'orderBy' => $orderBy,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('username', 'id');

        $categories = Category::where('status', 1)->orderBy('name')->pluck('name', 'id');

        $tags = Tag::where('status', 1)->orderBy('name')->pluck('name', 'id');

        return view('admin.articles.create', [
            'users' => $users,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'slug',
            'summary',
            'content',
            'upload_featured_image',
            'main_category',
            'categories',
            'tags',
        ]);

        /**
         * @var \App\File|null $featured_image
         */
        $featured_image = \App\Helpers\Upload::process('upload_featured_image');

        if ($featured_image) {
            $data['featured_image_id'] = $featured_image->id;
        }

        $tags = $data['tags'] ?? [];
        $categories = $data['categories'];

        $data['user_id'] = 1 ;
        $data['status'] = 1 ;
        $status = (int)$data['status'];

        if ($status === 1) {
            // Article New Approved
            $data['published_at'] = now();
        }

        $data['pay_type'] = 1;

        $main_category = $data['main_category'];

        unset( $data['upload_featured_image'] , $data['main_category'] , $data['categories'] , $data['tags'] );

        $article = Article::create($data);

        if ($article->id) {
            $article->tags()->sync($tags);

            $sycCategories = [];
            foreach ($categories as $category) {
                $category = (int)$category;
                $main_category = (int)$main_category;

                $sycCategories[$category] = ['main' => 0];
                if ($category === $main_category) {
                    $sycCategories[$category] = ['main' => 1];
                }
            }

            $article->categories()->sync($sycCategories);

            \Cache::forget('homepage');

            session()->flash('message', __('Article added.'));
        }

        return redirect()->route('admin.articles.edit', [$article->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        if (!in_array($article->status, [1, 2, 7])) {
            abort(404);
        }

        $users = User::pluck('username', 'id');

        $categories = Category::where('status', 1)->orderBy('name')->pluck('name', 'id');

        $tags = Tag::where('status', 1)->orderBy('name')->pluck('name', 'id');

        return view('admin.articles.edit', [
            'article' => $article,
            'users' => $users,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ArticleRequest $request
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        if (!in_array($article->status, [1, 2, 7])) {
            abort(404);
        }

        $data = $request->only([
            'title',
            'slug',
            'summary',
            'content',
            'upload_featured_image',
            'main_category',
            'categories',
            'tags',
            'seo',
        ]);

        /**
         * @var \App\File|null $featured_image
         */
        $featured_image = \App\Helpers\Upload::process('upload_featured_image');

        if ($featured_image) {
            $data['featured_image_id'] = $featured_image->id;
        }

        $tags = $data['tags'] ?? [];
        $categories = $data['categories'];


        $data['pay_type'] = 1;

        $main_category = $data['main_category'];

        unset( $data['upload_featured_image'] , $data['categories'] , $data['main_category'] , $data['tags']  );

        if ($article->update($data)) {
            $article->tags()->sync($tags);

            $sycCategories = [];
            foreach ($categories as $category) {
                $category = (int)$category;
                $main_category = (int)$main_category;

                $sycCategories[$category] = ['main' => (int)($category === $main_category)];
            }

            $article->categories()->sync($sycCategories);

            \Cache::forget('homepage');

            session()->flash('message', __('Article updated.'));
        }

        return redirect()->route('admin.articles.edit', [$article->id]);
    }

    /**
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function pay(Article $article)
    {
        if ((int)$article->pay_type === 2 && (bool)$article->paid) {
            abort(404);
        }

        if (request()->isMethod('post')) {
            $user = User::find($article->user_id);

            $user->timestamps = false;

            $userData = ['author_earnings' => price_database_format($user->author_earnings + $article->price)];

            if ($user->update($userData)) {
                $article->timestamps = false;

                $articleData = ['paid' => 1];

                $article->update($articleData);
            }

            return redirect()->route('admin.articles.index');
        }

        return view('admin.articles.pay', [
            'article' => $article,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        if ($article->delete()) {
            $article->tags()->detach();
            $article->categories()->detach();
            \DB::table('comments')->where('article_id', $article->id)->delete();
            $article->statistics()->delete();

            \App\Helpers\Image::deleteImage($article->featured_image);
        } else {
            session()->flash('message', 'Unable to delete this article.');
        }

        return redirect(route('admin.articles.index'));
    }


    

}
