<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontenhomeController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ServiceController;

use App\Models\Contact; // Import model Contact jika belum diimpor
use App\Models\AboutUs;
use App\Models\kontenhome;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

require __DIR__.'/auth.php';



Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products', [ProductController::class, 'save'])->name('product.save');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});

// Route::get('/dashboard/product', [ProductController::class, 'index'])->name('product.index');

// Route::get('/dashboard/product/create', [ProductController::class, 'create'])->name('product.create');
// // Route::post('/dashboard/product-create', [ProductController::class, 'save'])->name('product.save');
// Route::post('/dashboard/product-save', 'ProductController@save')->name('product.save');

// // Route::get('/dashboard/product/{id}', [ProductController::class, 'show'])->name('product.show');
// Route::get('/dashboard/product/{id}', 'ProductController@show')->name('product.show');

// Route::get('/dashboard/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
// Route::put('/dashboard/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
// Route::delete('/dashboard/product/{id}/delete', [ProductController::class, 'delete'])->name('product.delete');
// // routes/web.php
// Route::delete('/dashboard/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');



// Route::get('/',[PublicController::class,'index']);
// Route::get('/news',[PublicController::class,'news']);
// Route::get('/product',[PublicController::class,'product']);
// Route::get('/aboutus',[PublicController::class,'aboutus']);
// Route::get('/contact',[PublicController::class,'contact']);


// Route::group(['prefix' => 'dashboard'], function () {
//     Route::get('/news', [NewsController::class, 'index'])->name('news.index');
//     Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
//     Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
//     Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
//     Route::get('/news/{slug}/edit', [NewsController::class, 'edit'])->name('news.edit');
//     Route::put('/news/{slug}/update', [NewsController::class, 'update'])->name('news.update');
//     Route::delete('/news/{slug}/delete', [NewsController::class, 'destroy'])->name('news.destroy');
// });


Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
    // Route::get('/berita/{slug}', [BeritaController::class, 'detail'])->name('berita.detail');
    Route::get('/berita/{slug}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{slug}/update', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{slug}/delete', [BeritaController::class, 'destroy'])->name('berita.destroy');
});


// Route::group(['prefix' => 'dashboard'], function () {
    //     Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus.index');
    //     Route::get('/aboutus/create', [AboutUsController::class, 'create'])->name('aboutus.create');
    //     Route::post('/aboutus', [AboutUsController::class, 'store'])->name('aboutus.store');
    //     Route::get('/aboutus/{id}', [AboutUsController::class, 'show'])->name('aboutus.show');
    //     Route::get('/aboutus/{id}/edit', [AboutUsController::class, 'edit'])->name('aboutus.edit');
    //     Route::put('/aboutus/{id}', [AboutUsController::class, 'update'])->name('aboutus.update');
    //     Route::delete('/aboutus/{id}', [AboutUsController::class, 'destroy'])->name('aboutus.destroy');
    // });
    
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/team', [TeamController::class, 'index'])->name('team.index');
        Route::get('/team/create', [TeamController::class, 'create'])->name('team.create');
        Route::post('/team', [TeamController::class, 'store'])->name('team.store');
        Route::get('/team/{id}', [TeamController::class, 'show'])->name('team.show');
        Route::get('/team/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
        Route::put('/team/{id}', [TeamController::class, 'update'])->name('team.update');
        Route::delete('/team/{id}', [TeamController::class, 'destroy'])->name('team.destroy');
    });
    
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
        Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
        Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
        Route::get('/contact/{id}', [ContactController::class, 'show'])->name('contact.show');
        Route::get('/contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
        // Route::get('/contact/{id}/edit', [ContactController::class, 'edit'])->name('dashboard.contact.edit');
        Route::put('/contact/{id}', [ContactController::class, 'update'])->name('contact.update');
        Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
    });
    

    Route::group(['prefix' => 'dashboard'], function () {
    
            Route::get('/home/card', [CardController::class, 'index'])->name('home.card.index');
            Route::get('/home/card/create', [CardController::class, 'create'])->name('home.card.create');
            Route::post('/home/card', [CardController::class, 'store'])->name('home.card.store');
            // Route::get('/home/card/{id}', [CardController::class, 'show'])->name('home.card.show');
            Route::get('/home/card/{id}/edit', [CardController::class, 'edit'])->name('home.card.edit');
            Route::put('/home/card/{id}', [CardController::class, 'update'])->name('home.card.update');
            Route::delete('/home/card/{id}', [CardController::class, 'destroy'])->name('home.card.destroy');
       
});

Route::group(['prefix' => 'dashboard'], function () {
    
    Route::get('/home/kontenhome', [KontenhomeController::class, 'index'])->name('home.kontenhome.index');
    Route::get('/home/kontenhome/create', [KontenhomeController::class, 'create'])->name('home.kontenhome.create');
    Route::post('/home/kontenhome', [KontenhomeController::class, 'store'])->name('home.kontenhome.store');
    // Route::get('/home/card/{id}', [CardController::class, 'show'])->name('home.card.show');
    Route::get('/home/kontenhome/{id}/edit', [KontenhomeController::class, 'edit'])->name('home.kontenhome.edit');
    Route::put('/home/kontenhome/{id}', [KontenhomeController::class, 'update'])->name('home.kontenhome.update');
    Route::delete('/home/kontenhome/{id}', [KontenhomeController::class, 'destroy'])->name('home.kontenhome.destroy');

});
Route::group(['prefix' => 'dashboard'], function () {
    
    Route::delete('/home/service/{id}', [ServiceController::class, 'destroy'])->name('home.service.destroy');

});
    
    
    
    
    
Route::get('/', function () {
    return view('homepage');
});

// Route::get('/news', function () {
//     return view('news');
// });

Route::get('/berita', function () {
    return view('berita');
});

Route::get('/berita', 'BeritaController@index')->name('berita.index');
Route::get('/berita', [BeritaController::class, 'indexDashboard'])->name('berita.index');
// Route::get('/berita/{slug}', 'BeritaController@detail')->name('berita.detail');

Route::get('/aboutus', 'AboutUsController@index')->name('aboutus.index');
Route::get('/aboutus', [AboutUsController::class, 'indexDashboard'])->name('aboutus.index');

Route::get('/contact', 'ContactController@index')->name('contact.index');
Route::get('/contact', [ContactController::class, 'indexDashboard'])->name('contact.index');




// Route::get('/product', function () {
//     return view('product');
// });
Route::get('/template', function () {
    return view('layouts.template');
});

// Routing untuk metode indexDashboard() dalam controller ProductController
Route::get('/product', [ProductController::class, 'indexDashboard'])->name('product.index');

// Route::get('/contact', function () {
//     return view('contact');
// });

Route::get('/contact', function () {
    // Ambil data kontak dari database
    $contact = Contact::find(1); // Misalnya, mengambil data kontak dengan ID 1

    // Periksa apakah data kontak berhasil ditemukan
    if ($contact) {
        // Jika ditemukan, kirimkan data kontak ke view 'contact'
        return view('contact', compact('contact'));
    } else {
        // Jika tidak ditemukan, mungkin Anda ingin menangani kasus ini sesuai kebutuhan Anda
        return "Data kontak tidak ditemukan";
    }
});

Route::get('/get-contact-info', [ContactController::class, 'getContactInfo'])->name('get.contact.info');


Route::get('/team', function () {
    return view('team');
});
Route::get('/team', 'TeamController@index')->name('team.index');
Route::get('/team', [TeamController::class, 'indexDashboard'])->name('team.index');


Route::get('/', [HomeController::class, 'homepage']);
Route::get('/home/card/{id}', [CardController::class, 'show'])->name('home.card.show');

Route::get('/home/service/{id}', [ServiceController::class, 'show'])->name('home.service.show');
// Route::get('/home', function () {
//     return view('home');
// })->name('home');

Route::group(['middleware'=>['auth'], 'prefix'=>'dashboard'], function(){
    Route::get('/', [DashboardController::class, 'index']);

    Route::controller(ProductController::class)->group(function(){
        Route::get('/product','index');
        Route::get('/product-create','create');
        Route::post('/product-create','save');
        Route::get('/product/{id}','show');
        Route::post('/product/{id}','update');
        Route::get('/product-delete/{id}','delete');
        Route::get('/product/{id}/edit', 'edit')->name('product.edit'); // Tambahkan rute edit produk
    });

    Route::controller(BeritaController::class)->group(function(){
        Route::get('/berita','index');
        Route::get('/berita-create','create');
        Route::post('/berita-create','save');
        Route::get('/berita/{id}','show');
        Route::post('/berita/{id}','update');
        Route::get('/berita-delete/{id}','delete');
        Route::get('/berita/{slug}/edit', 'edit')->name('berita.edit'); // Tambahkan rute edit berita
    });


    Route::controller(TeamController::class)->group(function () {
        Route::get('/team', 'index');
        Route::get('/team-create', 'create');
        Route::post('/team-create', 'save');
        Route::get('/team/{id}', 'show');
        Route::post('/team/{id}', 'update');
        Route::get('/team-delete/{id}', 'delete');
        Route::get('/team/{slug}/edit', 'edit')->name('team.edit'); // Tambahkan rute edit aboutus
    });
    Route::controller(ContactController::class)->group(function () {
        Route::get('/contact', 'index');
        Route::get('/contact-create', 'create');
        Route::post('/contact-create', 'save');
        Route::get('/contact/{id}', 'show');
        Route::post('/contact/{id}', 'update');
        Route::get('/contact-delete/{id}', 'delete');
        Route::get('/contact/{id}/edit', 'edit')->name('contact.edit'); // Tambahkan rute edit aboutus

        
    });

    Route::controller(CardController::class)->group(function () {
        Route::get('/home/card', 'index')->name('home.card.index');
        Route::get('/home/card-create', 'create');
        Route::post('/home/card-create', 'store');
        // Route::get('/home/card/{id}', 'show');
        Route::post('/home/card/{id}', 'update');
        Route::get('/home/card-delete/{id}', 'delete');
        Route::get('/home/card/{id}/edit', 'edit')->name('home.card.edit'); // Tambahkan rute edit aboutus
    });
    Route::controller(kontenhomeController::class)->group(function () {
        Route::get('/home/kontenhome', 'index')->name('home.kontenhome.index');
        Route::get('/home/kontenhome-create', 'create')->name('home.kontenhome.create');
        Route::post('/home/kontenhome-create', 'store')->name('home.kontenhome.store');
        // Route::get('/home/card/{id}', 'show');
        Route::post('/home/kontenhome/{id}', 'update')->name('home.kontenhome.update');
        Route::get('/home/kontenhome-delete/{id}', 'delete');
        Route::get('/home/kontenhome/{id}/edit', 'edit')->name('home.kontenhome.edit'); // Tambahkan rute edit aboutus
    });
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/home/service', 'index')->name('home.service.index');
        Route::get('/home/service-create', 'create')->name('home.service.create');
        Route::post('/home/service-create', 'store')->name('home.service.store');
        // Route::get('/home/service/{id}', 'show');
        Route::post('/home/service/{id}', 'update')->name('home.service.update');
        Route::get('/home/service-delete/{id}', 'delete');
        Route::get('/home/service/{id}/edit', 'edit')->name('home.service.edit'); // Tambahkan rute edit aboutus
    });
    

    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index');
    });

    
});






// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


