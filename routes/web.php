<?php
Auth::routes();

Route::get('/', 'BlogsController@index')->name('home');

Route::get('/blogs/create', 'BlogsController@create');

Route::post('/blogs', 'BlogsController@store');

Route::get('/blogs/{blog}', 'BlogsController@show');

Route::get('/blogs/authors/{user}', 'AuthorsController@index');

Route::post('/blogs/{blog}/comments', 'CommentsController@store');

Route::get('/blogs/categories/{category}', 'CategoryController@index');

Route::post('/categories', 'CategoryController@store');

Route::get('/categories/create', 'CategoryController@create');



//Route::get('/blogs/{id}/edit', 'BlogsController@edit') --> would generate a Route::patch/blogs/{id} || Er is ook een DELETE functie net als PATCH en GET en POST
// register and

// verification routes
Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::post('/login', 'SessionsController@create');
Route::get('login',array('as'=>'login',function(){
   return view('login');
   }));

Route::get('/logout', 'SessionsController@destroy');
