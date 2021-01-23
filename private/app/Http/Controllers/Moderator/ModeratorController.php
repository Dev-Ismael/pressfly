<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;

class ModeratorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return redirect()->route('moderator.articles.indexNewPending');
    }

}
