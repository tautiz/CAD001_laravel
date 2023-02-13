<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        // Nustatom fallback locale
        app()->setFallbackLocale('en');

        // Paimam is seseijos lokale, o jei nera, tai is config/app.php
        $locale = $request->session()->get('lang', config('app.locale'));

        // Jei yra lang parametras, tai pakeiciam locale
        if ($request->has('lang')) {
            $locale = $request->get('lang');
            $request->session()->put('lang', $locale);
        }

        // Nustatom locale
        app()->setLocale($locale);

        return $next($request);
    }
}
