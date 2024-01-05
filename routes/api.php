<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TweetsController;
use App\Http\Controllers\OrganizersController;
use App\Http\Controllers\SponsorsController;
use App\Http\Controllers\KeynoteSpeakersController;
use App\Http\Controllers\SpecialSessionsController;



Route::prefix('links')->group(function () {
    Route::post('/add', [LinksController::class, 'add']);
    Route::put('/update/{id}', [LinksController::class, 'update']);
    Route::delete('/delete/{id}', [LinksController::class, 'delete']);
    Route::get('/get/{id}', [LinksController::class, 'getById']);
    Route::get('/get-all', [LinksController::class, 'getAll']);
    Route::get('/get-by-attribute', [LinksController::class, 'getByAttribute']);
});
Route::prefix('pages')->group(function () {
    Route::post('/add', [PagesController::class, 'add']);
    Route::put('/update/{id}', [PagesController::class, 'update']);
    Route::delete('/delete/{id}', [PagesController::class, 'delete']);
    Route::get('/get/{id}', [PagesController::class, 'getById']);
    Route::get('/get-all', [PagesController::class, 'getAll']);
});
Route::prefix('tweets')->group(function () {
    Route::post('/add', [TweetsController::class, 'add']);
    Route::put('/update/{id}', [TweetsController::class, 'update']);
    Route::delete('/delete/{id}', [TweetsController::class, 'delete']);
    Route::get('/get/{id}', [TweetsController::class, 'getById']);
    Route::get('/get-all', [TweetsController::class, 'getAll']);
    Route::put('/disactivate/{id}', [TweetsController::class, 'disactivate']);
});
Route::prefix('organizers')->group(function () {
    Route::post('/add', [OrganizersController::class, 'add']);
    Route::put('/update/{id}', [OrganizersController::class, 'update']);
    Route::delete('/delete/{id}', [OrganizersController::class, 'delete']);
    Route::get('/order', [OrganizersController::class, 'order']);
    Route::get('/get-by-name/{name}', [OrganizersController::class, 'getByName']);
    Route::get('/get/{id}', [OrganizersController::class, 'getById']);
    Route::get('/get-all', [OrganizersController::class, 'getAll']);
});
Route::prefix('sponsors')->group(function () {
    Route::post('/add', [SponsorsController::class, 'add']);
    Route::put('/update/{id}', [SponsorsController::class, 'update']);
    Route::delete('/delete/{id}', [SponsorsController::class, 'delete']);
    Route::get('/order', [SponsorsController::class, 'order']);
    Route::get('/get-by-name/{name}', [SponsorsController::class, 'getByName']);
    Route::get('/get/{id}', [SponsorsController::class, 'getById']);
    Route::get('/get-all', [SponsorsController::class, 'getAll']);
});
Route::prefix('keynote-speakers')->group(function () {
    Route::post('/add', [KeynoteSpeakersController::class, 'add']);
    Route::put('/update/{id}', [KeynoteSpeakersController::class, 'update']);
    Route::delete('/delete/{id}', [KeynoteSpeakersController::class, 'delete']);
    Route::post('/order', [KeynoteSpeakersController::class, 'order']);
    Route::get('/get/{id}', [KeynoteSpeakersController::class, 'getById']);
    Route::get('/get-all', [KeynoteSpeakersController::class, 'getAll']);
});
Route::prefix('special-sessions')->group(function () {
    Route::post('/add', [SpecialSessionsController::class, 'add']);
    Route::put('/update/{id}', [SpecialSessionsController::class, 'update']);
    Route::delete('/delete/{id}', [SpecialSessionsController::class, 'delete']);
    Route::post('/order', [SpecialSessionsController::class, 'order']);
    Route::get('/get-by-name', [SpecialSessionsController::class, 'getByName']);
    Route::get('/get-all', [SpecialSessionsController::class, 'getAll']);
});
use App\Http\Controllers\AuthorsController;
Route::prefix('authors')->group(function () {
    Route::post('add', [AuthorsController::class, 'add']);
    Route::put('update/{id}', [AuthorsController::class, 'update']);
    Route::delete('delete/{id}', [AuthorsController::class, 'delete']);
    Route::get('get-all', [AuthorsController::class, 'getAll']);
    Route::get('get-by-name/{name}', [AuthorsController::class, 'getByName']);
    Route::get('get-by-id/{id}', [AuthorsController::class, 'getById']);
});
use App\Http\Controllers\CountriesController;
Route::prefix('countries')->group(function () {
    Route::post('/add', [CountriesController::class, 'add']);
    Route::put('/update/{id}', [CountriesController::class, 'update']);
    Route::delete('/delete/{id}', [CountriesController::class, 'delete']);
    Route::get('/get-all', [CountriesController::class, 'getAll']);
    Route::get('/get-by-name/{name}', [CountriesController::class, 'getByName']);
    Route::get('/get-by-id/{id}', [CountriesController::class, 'getById']);
});
use App\Http\Controllers\VideoController;

// Videos Routes
Route::prefix('videos')->group(function () {
    Route::post('/add', [VideoController::class, 'add']);
    Route::put('/update/{id}', [VideoController::class, 'update']);
    Route::delete('/delete/{id}', [VideoController::class, 'delete']);
    Route::get('/get-all', [VideoController::class, 'getAll']);
    Route::get('/order', [VideoController::class, 'order']);
    Route::get('/get-by-id/{id}', [VideoController::class, 'getById']);
});
// routes/api.php

use App\Http\Controllers\PhotoController;

// Photos Routes
Route::prefix('photos')->group(function () {
    Route::post('/add', [PhotoController::class, 'add']);
    Route::put('/update/{id}', [PhotoController::class, 'update']);
    Route::delete('/delete/{id}', [PhotoController::class, 'delete']);
    Route::get('/get-all', [PhotoController::class, 'getAll']);
    Route::get('/order', [PhotoController::class, 'order']);
    Route::get('/get-by-id/{id}', [PhotoController::class, 'getById']);
});
use App\Http\Controllers\UtilisateurController;

// Utilisateur Routes
Route::prefix('utilisateurs')->group(function () {
    Route::post('/add', [UtilisateurController::class, 'add']);
    Route::put('/update/{id}', [UtilisateurController::class, 'update']);
    Route::delete('/delete/{id}', [UtilisateurController::class, 'delete']);
    Route::put('/activate/{id}', [UtilisateurController::class, 'activate']);
    Route::put('/deactivate/{id}', [UtilisateurController::class, 'deactivate']);
    Route::post('/login', [UtilisateurController::class, 'login']);
    Route::post('/logout', [UtilisateurController::class, 'logout']);
});
