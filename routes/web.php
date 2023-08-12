<?php

use App\Http\Controllers\ProfileController;
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

Route::view('/', 'dashboard')->middleware(['auth'])->name('home');

Route::get('/github/login', function () {
    return Socialite::driver('github')->redirect();
})->name('github.login');

Route::get('/github/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    /** @var User $user */
    $user = User::query()
        ->updateOrCreate([
            'github_user' => $githubUser->getNickname()
        ],[
            'name' => $githubUser->getName(),
            'email' => $githubUser->getEmail(),
        ]);

    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
});

Route::view('sorteio', 'sorteio')
    ->middleware(['auth', \App\Http\Middleware\JustMeMiddleware::class])
    ->name('sorteio');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
