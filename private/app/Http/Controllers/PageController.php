<?php

namespace App\Http\Controllers;

use App\Option;
use App\Page;

class PageController extends Controller
{
   
    public function terms(){
        return view("public.pages.terms");
    }

    public function privacy(){
        return view("public.pages.privacy");
    }

}
