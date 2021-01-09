<?php

namespace App\Http\Controllers\Admin;

use App\Option;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends AdminController
{
    public function homepage()
    {
        $homepage = Option::where('name', 'homepage')->first();

        return view('admin.pages.homepage', [
            'homepage' => $homepage->value,
        ]);
    }

    public function homepageStore()
    {
        $homepage = Option::where('name', 'homepage')->first();

        $homepage->value = request()->post('homepage');

        $homepage->update();

        \Cache::forget('homepage');

        session()->flash('message', __('Homepage content has been saved.'));
        return redirect()->route('admin.pages.homepage');
    }
}
