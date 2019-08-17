<?php 

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Auth;

class NavigationComposer
{
    public function compose(View $view)
    {
        (!Auth::check()) ? null : $view->with('channel', Auth::user()->channel()->first());
    }
}
