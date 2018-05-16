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
use Illuminate\Http\Request;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/lol', function(){
    header('Access-Control-Allow-Origin:*');
    $res=App\Item::all();
    return $res;
    
});
Route::get('/find', function(){
     header('Access-Control-Allow-Origin:*');
    $posts=App\Item::where('status',1)->get();
    return $posts;
    
});
Route::get('/lost', function(){
     header('Access-Control-Allow-Origin:*');
   $posts=App\Item::where('status',0)->get();
   return $posts;
    
});
Route::get('/search', function(Request $req){
    header('Access-Control-Allow-Origin:*');
    $res=App\Item::where('title', 'LIKE', '%'.$req->test.'%')->orWhere('description', "LIKE", '%'.$req->test.'%')->get();
    return $res;
        
    
});
Route::get('/add', function(Request $req){
     header('Access-Control-Allow-Origin:*');
    App\Item::create([
        'title'=>$req->title,
        'description'=>$req->description,
        'contact'=>$req->contact,
        'status'=>0,
        'done'=>0
    ]);
});

