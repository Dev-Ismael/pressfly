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
        return redirect('/'); 
    }
}
