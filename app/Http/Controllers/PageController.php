<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function __invoke(?Page $page)
    {
        if ($page?->name == null) {
            $page = Page::where('template', 'home')->firstOrFail();
        }
        $template = "templates.{$page->template}";
        if (!view()->exists($template)) {
            abort(404);
        }
        $view = view($template);

        return $view;
    }
}
