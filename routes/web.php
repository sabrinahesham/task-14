<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
}); 

//Route::get('/home', function () {
    //return view('pages.home');
//}); 
 Route::get('/home',[HomeController::class,'index'])->name('home.index');

 Route::get('/contact',[HomeController::class,'contact'])->name('home.contact');
 Route::get('/about',AboutController::class )->name('home.about');
// Route::get('contact', function(){
 //return view('home.contact');
//})->name('home.contact');

 //Route::get('/products/{$id?}' ,function ($id =null){
   // return "this is $id ";
//});
Route::resource('products',ProductController::class);
Route::get('/products/{$id}' ,function ($id){
    $products=[
        1 =>['title' => 'product number 1' ,
        'description' => 'product number 1 desc',
          'is_new ' => true ,
          'has_reviews '=>'review1'],

        2 =>['title' => 'product number 2' ,
        'description' => 'product number 2 desc' ,
        'is_new ' => false ],

        3 =>['title' => 'product number 3' ,
        'description' => 'product number 3 desc',
        'is_new ' => true ]
    ];

    abort_if(!isset(products[$id]),404);
    $product = $products[$id];
    return view('products.show',compact('product'));
});





Route::prefix('demo')->group(function(){

    Route::get('responses',function(){
        $products=[
            1 =>['title' => 'product number 1' ,
            'description' => 'product number 1 desc',
              'is_new ' => true ,
              'has_reviews '=>'review1'],
    
            2 =>['title' => 'product number 2' ,
            'description' => 'product number 2 desc' ,
            'is_new ' => false ],
    
            3 =>['title' => 'product number 3' ,
            'description' => 'product number 3 desc',
            'is_new ' => true ]
        ];
        return response($products , 201)
        ->header('CONTENT_TYPE','APPLICATON_JSON')
        ->cookie('MY_COOKKIE','GROUP_318',3600);
    });
    Route::get('redirect',function(){
        return redirect('contact');
    });
    
    Route::get('back',function(){
        return redirect()->back();
    });
    
    Route::get('name_route',function(){
        return redirect()->route('home.contact');
    });
    
    Route::get('away',function(){
        return redirect()->away('http://www.google.com');
    });

    
    Route::get('json',function(){
        $products=[
            1 =>['title' => 'product number 1' ,
            'description' => 'product number 1 desc',
              'is_new ' => true ,
              'has_reviews '=>'review1'],
    
            2 =>['title' => 'product number 2' ,
            'description' => 'product number 2 desc' ,
            'is_new ' => false ],
    
            3 =>['title' => 'product number 3' ,
            'description' => 'product number 3 desc',
            'is_new ' => true ]
        ];
        return redirect()->json($products);
    });
    
    Route::get('download',function(){
        return response()->download(public_path(kkk.jpg));
    });
    Route::get('products',function(){
        dd( request()->query('limit'));
    });

});
