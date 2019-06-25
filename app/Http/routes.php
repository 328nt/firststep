<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Post;


Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
//Insert
Route::get('/insert', function () {
    DB::insert('INSERT INTO posts(id, title, content) VALUE(?, ?, ?)', [ '4', 'Post title 03', 'Post desc 03' ]);
    return 'Insert Querry !';
});
//Read
Route::get('/read', function () {
    $posts = Post::all();
    // echo "<pre>";
    // var_dump($posts);
    // echo "</pre>";
    
    foreach($posts as $post){
        return $post->title;
    }


    // foreach ($result as $key) {
    //     return $key->title;
    // }
});
//Update
Route::get('/update', function () {
    $result = DB::update('UPDATE posts set title = "Post tilte delete" WHERE id=?', [2]);
    return $result;
});
//Delete
Route::get('/delete', function () {
    $result = DB::delete('DELETE FROM posts WHERE id=?', [4]);
    if ($result) {
        echo 'DELETE success !';
    }
});

//find with id
Route::get('/find', function () {
    $post = Post::find(3);
    return $post;
});

//find by anything
Route::get('/findwhere', function () {
    $post = Post::where('id', 5) ->orderBy('id', 'desc') ->take(1)->get();
    return $post;
});
Route::resource('posts', 'PostController@index');
Route::get('/contact/{nameR}/{email}/{phone}', 'TestController@contact');

