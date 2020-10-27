<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Gate;

// Route::get('/', function () {

//     // dump(Gate::check('delete', App\UserPost::class));
//     return view('welcome');
// });

Route::redirect('/', '/pages/accueil');

// Route::view('/Admin', 'Admin.index');

Route::prefix('pages')->group(function()
{
    Route::get('/accueil', 'AccueilController@index')->name('accueil');

    Route::get('projets/list', 'ProjetsController@list')->name('projects');

    Route::get('annonces/list', 'AnnoncesController@list')->name('annonces');

    Route::get('annonces/details/{id}', 'AnnoncesController@details')->name('announce_details');

    Route::get('articles/list', 'ArticlesController@list')->name('articles');

    Route::get('emplois/list', 'EmploisController@list')->name('offers');

    Route::get('emplois/details/{id}', 'EmploisController@details')->name('details_emplois');

    Route::get('articles/details/{id}', 'ArticlesController@details')->name('article_details');

    Route::get('projets/details/{id}', 'ProjetsController@details')->name('show');

    Route::post('projets/comment', 'ProjetsController@comment')->name('comment');

    Route::get('blogs/home/{id}', 'BlogsController@home')->name('home_blog');

    Route::get('blogs/articles/{id}', 'BlogsController@articles')->name('articles_blog');

    Route::get('blogs/articles/detailarticle/{id}', 'BlogsController@detailarticle')->name('detailarticle_blog');

    Route::get('blogs/offers/{id}', 'BlogsController@offers')->name('offers_blog');

    Route::get('blogs/annonces/{id}', 'BlogsController@annonces')->name('annonces_blog');

    Route::get('blogs/projects/{id}', 'BlogsController@projects')->name('projects_blog');

    Route::get('blogs/contact/{id}', 'BlogsController@contact')->name('contact_blog');

    Route::resource('forum', 'ForumController');

    Route::get('tutorials/tutoriel', 'TutorialsController@tutoriel')->name('tutoriel');

    Route::get('tutorials/details', 'TutorialsController@details')->name('details');

    Route::get('/apropos', 'HomeController@apropos')->name('apropos');

    Route::post('articles/findArticle', 'ArticlesController@findArticle')->name('findArticle');

    Route::post('emplois/findOffre', 'EmploisController@findOffre')->name('findOffre');

    Route::post('annonces/findAnnonce', 'AnnoncesController@findAnnonce')->name('findAnnonce');

    Route::post('blogs/findBlog', 'BlogsController@findBlog')->name('findBlog');

    Route::post('projets/findProjet', 'ProjetsController@findProjet')->name('findProjet');

});

Route::get('Admin', 'AdminController@index')->name('index');

Route::resource('articles', 'ArticlesController');

Route::resource('annonces', 'AnnoncesController');

Route::resource('projets', 'ProjetsController');

Route::resource('projet.fichiers', 'FichiersController');

Route::resource('emplois', 'EmploisController');

Route::resource('blogs', 'BlogsController');

Auth::routes();

Route::resource('inscription','UsersController');

Route::resource('profile','ProfilesController');

Route::resource('users','ManagerController');

// Route::resource('list','BlogsController');

Route::resource('pwdedit','PwdupdateController');

Route::resource('blogsmanage','BlogsmanageController');

Route::resource('forum_manage','ForummanageController');

Route::resource('tutorials','TutorialsController');

// Route::get('/admin', 'AdminController@index')->name('index');
