<?php







Auth::routes();
Route::group(['middleware' => ['auth']],function(){
    Route::get('/','Timelinecontroller@index');
    Route::post('/posts','PostController@create');
    Route::get('/posts','PostController@index');
    Route::get('/users/{user}','UserController@index')->name('users');
    Route::get('/users/{user}/follow','UserController@follow')->name("users.follow");
    Route::get('/users/{user}/Unfollow','UserController@Unfollow')->name("users.Unfollow");
});
