<?php

namespace App\Http\Controllers;

use App\Option;
use App\Page;

class PageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  string $slug
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Throwable
     */
    public function show(string $slug)
    {

        if ( $slug == 'privacy' || $slug == 'terms' ){
            
            $page = Page::whereSlug($slug)->first();

            if (!$page) {
                abort(404);
            }
    
            if ($page->status !== 1) {
                abort(404);
            }
    
            if ($slug != $page->slug) {
                return redirect($page->permalink(), 301);
            }
    
            return view('public.pages.show', [
                'page' => $page,
            ]);

        }else{
            abort(404);
        }


    }
}
