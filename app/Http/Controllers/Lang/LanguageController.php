<?php

namespace App\Http\Controllers\Lang;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function __invoke(string $locale): RedirectResponse
    {
        if (!in_array($locale, ['en', 'vi'])) {
            abort(404);
        }

        Session::put('locale', $locale);

        return redirect()->back();
    }
}
