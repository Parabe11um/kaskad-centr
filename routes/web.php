<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PartnerController;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;


Route::get('/sitemap.xml', function () {
    // Создаём объект Sitemap
    $sitemap = Sitemap::create();

    // Добавляем статические страницы
    $sitemap
        ->add(Url::create('/'))
        ->add(Url::create('/about'))
        ->add(Url::create('/contacts'))
        ->add(Url::create('/news'));


    // Добавляем URL всех статей
    Post::all()->each(function (Post $post) use ($sitemap) {
        $sitemap->add(
            Url::create("/{$post->slug}")
                ->setLastModificationDate($post->updated_at) // Указываем дату обновления поста
        );
    });

    // Добавляем URL всех партнеров
    Partner::all()->each(function (Partner $partner) use ($sitemap) {
        $sitemap->add(
            Url::create("/{$partner->slug}")
                ->setLastModificationDate($partner->updated_at) // Указываем дату обновления партнера
        );
    });

    // Возвращаем ответ в формате XML
    return $sitemap->toResponse(request());
});

Route::get('/', HomeController::class)->name('home');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/contacts', [SiteController::class, 'contacts'])->name('contacts');
Route::get('/news', [PostController::class, 'index'])->name('posts.index');
Route::get('/news/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/partners/{partner:slug}', [PartnerController::class, 'show'])->name('partners.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
});
