<?php

use App\Http\Controllers\PosLoginController;
use App\Http\Controllers\SorteioController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function() {
//    $user = User::whereEmail('rafael@pinguim.academy')->first();
//    Auth::login($user);
//
//    return to_route('sorteio');
//})->name('home');

Route::get('/github/login', function () {
    return Socialite::driver('github')->redirect();
})->name('github.login');

Route::get('/github/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    /** @var User $user */
    $user = User::query()
        ->updateOrCreate([
            'github_user' => $githubUser->getNickname(),
        ], [
            'name' => $githubUser->getName() ?? $githubUser->getNickname(),
            'email' => $githubUser->getEmail(),
        ]);

    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
});

Route::get('/', PosLoginController::class)->middleware('auth')->name('home');
Route::get('/sorteio', SorteioController::class)->middleware('auth')->name('sorteio');


Route::get('/logout', fn() => Auth::logout())
    ->name('logout');


require_once __DIR__ . '/auth.php';
