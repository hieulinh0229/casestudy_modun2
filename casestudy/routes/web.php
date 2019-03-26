<?php

Route::get('/',[
    'uses'=>'GuestController@index',
    'as'=>'guest.index'
]);

Route::get('show/{post}', 'GuestController@show')->name('guest.showpost');

Route::group(['prefix' => 'post'], function ()
{

    Route::get('/', [
        'uses' => 'PostController@getIndex',
        'as' => 'Post.list'
    ]);

    Route::get('/show/{id}', [
        'uses' => 'PostController@show',
        'as' => 'Post.show'
    ]);


    Route::group(['middleware' => 'auth'], function() {

        Route::get('/showAdd', [
            'uses' => 'PostController@showAdd',
            'as' => 'Post.showAdd'
        ]);
        Route::post('/like/{post}', [
            'uses' => 'PostController@like',
            'as' => 'Post.like'
        ]);
        Route::post('/update', [
            'uses' => 'PostController@update',
            'as' => 'Post.update'
        ]);

        Route::group(['middleware' => 'can:update,post'],function (){

            Route::delete('/delete/{post}', [
                'uses' => 'PostController@destroy',
                'as' => 'Post.destroy'
            ]);
            Route::get('/editsShow/{post}', [
                'uses' => 'PostController@editShow',
                'as' => 'Post.editShow'
            ]);
            Route::post('/editsShow/{post}', [
                'uses' => 'PostController@edit',
                'as' => 'Post.edit'
            ]);
        });
    });

    Route::get('/seach', [
        'uses' => 'PostController@search',
        'as' => 'Post.search'
    ]);
    Route::get('/fiter', [
        'uses' => 'PostController@filterByTags',
        'as' => 'Post.filterByTags'
    ]);

    Route::post('comment/{postid}','PostController@comment')->name('post.comment');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'middleware' => 'checkadmin'], function(){

    Route::get('/quanly', [
        'uses' => 'UserController@showUser',
        'as' => 'admin.quanly'
    ]);
    Route::get('/editrole/{user}',[
        'uses'=>'UserController@editUserRole',
        'as'=>'admin.editrole'
    ]);
    Route::post('/editrole/{user}',[
        'uses'=>'UserController@updateUserRole',
        'as'=>'admin.updaterole'
    ]);

    Route::group(['prefix' => 'tag','middleware'=>'checkadmin'], function () {
        Route::get('/', [
            'uses' => 'TagController@getIndex',
            'as' => 'Tag.list'
        ]);
        Route::get('/showAdd', [
            'uses' => 'TagController@showAdd',
            'as' => 'Tag.show'
        ]);
        Route::post('/update', [
            'uses' => 'TagController@update',
            'as' => 'Tag.update'
        ]);
        Route::get('/delete/{id}', [
            'uses' => 'TagController@destroy',
            'as' => 'Tag.destroy'
        ]);
        Route::get('/edit/{id}', [
            'uses' => 'TagController@editshow',
            'as' => 'Tag.editShow'
        ]);
        Route::post('/edit/{id}', [
            'uses' => 'TagController@edit',
            'as' => 'Tag.tagEdit'
        ]);
    });
});


