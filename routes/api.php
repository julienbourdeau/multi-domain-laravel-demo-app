<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// TODO: protect endpoint
Route::any('/allowed-domain', function (Request $request) {
    $domain = $request->get('domain');
    $publicSubdomain = '.'.config('app.public_domain');

    if (str_contains($domain, $publicSubdomain)) {
        $subdomain = str_before($domain, $publicSubdomain);
        $exists = \App\Blog::where('subdomain', $subdomain)->exists();
    } else {
        $exists = \App\Blog::where('domain', $domain)->exists();
    }

    return $exists ? response('', 204) : response('', 418);
});
