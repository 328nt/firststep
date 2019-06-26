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
use App\User;
use App\Product;
use App\Category;


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
//add data with eloquent.
Route::get('insertel', function () {

    //create post variables.
    $post= new Post;

    //getdata
    $post->title = 'title 04';
    $post->content = 'content 04';

    //save data
    $post->save();
});

Route::get('insertuser', function () {

    //create post variables.
    $user= new User;

    //getdata
    $user->name = 'KFC1';
    $user->email = str_random(5).'@gmail.com';
    $user->password = bcrypt('dat');

    //save data
    $user->save();
});

Route::get('insertproduct/{name}/{cat}', function ($name, $cat) {
    $product = new Product;
    $product->name = $name;
    $product->amout = "60";
    $product->id_category = $cat;
    $product->save();
    echo 'added ' .$name;
});

Route::get('product/all', function () {
    $product = Product::all()->toArray();
    var_dump($product);

});
//add data with id
Route::get('insertelo', function () {

    //create post variables.
    $post= POST::find(5);

    //getdata
    $post->title = 'title replaced';
    $post->content = 'content replaced';
    
    //save data
    $post->save();
});
//update data with eloquent
Route::get('updateelo', function () {
    Post::where('id', 4)->update([
        'title' => 'title afer update',
        'content' => 'content after update'
    ]);
});
//delete data with eloquent 1
Route::get('deleteelo', function () {
    $post = Post::find(7);
    $post->delete();
});
//delete data with eloquent destroy
Route::get('destroyelo', function () {
    Post::destroy([5, 6, 8]);
});
//delete data with eloquent destroy
Route::get('destroyuser', function () {
    User::destroy([7]);
    echo "delele complete !";
});
//create data with mass
Route::get('createmass', function () {
    Post::create([
        'title' => 'title mass assignment',
        'content' => 'contetn mass assignment'
    ]);
});

Route::get('connect', function () {
    $data = Product::find(3)->category->toArray();
    var_dump($data);
});

Route::get('connectcat', function () {
    $data = Category::find(2)->Product->toArray();
    var_dump($data);
});


Route::resource('posts', 'PostController@index');
Route::get('/contact/{nameR}/{email}/{phone}', 'TestController@contact');

//LOGIN
Route::get('login', function () {
    return view('users.login');
});
Route::get('login1', function () {
    return view('users.complete');
});
Route::post('login', 'AuthController@login')->name('login');
Route::get('logout', 'AuthController@logout');


//SESSION
Route::group(['middleware' => ['web']], function () {
    Route::get('Session', function () {
        Session::put('kfc','CGV');
        echo "SET SESSION";
        echo "<br>";
        echo Session::Get('kfc');
        if(session::has('kfc'))
        echo "have session";
        else {
            echo "not have session";
        }
    });
});