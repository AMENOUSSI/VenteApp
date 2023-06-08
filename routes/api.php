<?php
use App\Http\Controllers\Api\AuteurController;
use App\Http\Controllers\Api\ConferenceController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Recuperer la liste des conferences

Route::get('conference',[ConferenceController::class, 'index']);

// Ajouter une conference
Route::post('conference/store',[ConferenceController::class, 'store']);
Route::put('conference/edit/{conference}',[ConferenceController::class, 'update']);
Route::delete('conference/{conference}',[ConferenceController::class, 'destroy']);

// Inscrire un nouvel utilisateur
Route::Post('/register',[UserController::class, 'register']);
Route::post('/login',[UserController::class,'login']);


// Ajouter un auteur

Route::post('/auteur/store',[AuteurController::class, 'store']);


//Route::post('article',[ArticleController::class,'store']);
//Route::post('/article/posterArticle',[ArticleController::class,'poster']);
#Route::post('/articles', [ArticleController::class,'store']);
#Route::get('/articles/{article}', 'ArticleController@show');

