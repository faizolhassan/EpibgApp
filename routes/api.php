<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Dingo Api routing

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->group(['namespace'=>'App\Http\Controllers\Api\V1', 'prefix' => 'v1' ], function ($api) {

        //your API routes inside here

        $api->get('test', 'SampleApiController@index');

        //auth routes

        $api->post('login', 'AuthController@passwordGrantLogin');

        $api->group(['middleware' => 'auth:api'], function($api) {

            //refresh access token
            $api->post('refreshtoken', 'AuthController@refresh');

            //log out
            $api->post('logout', 'AuthController@logout');

            //get current logged in user info by token
            $api->get('me', 'AuthController@me');
        });

       // $api->group(['middleware' => 'auth:api'], function($api) {

            //users routes

            //$api->get('users', 'UserController@index');
            //$api->post('users', 'UserController@store');
            //$api->get('users/{user_id}', 'UserController@show');
            //$api->put('users/{user_id}', 'UserController@update');
            //$api->delete('users/{user_id}', 'UserController@destroy');

            //roles routes

            //$api->get('roles', 'RoleController@index');
            //$api->post('roles', 'RoleController@store');
            //$api->get('roles/{role_id}', 'RoleController@show');
            //$api->put('roles/{role_id}', 'RoleController@update');
            //$api->delete('roles/{role_id}', 'RoleController@destroy');

            //permissions routes

            //$api->get('permissions', 'PermissionController@index');
            //$api->post('permissions', 'PermissionController@store');
            //$api->get('permissions/{permission_id}', 'PermissionController@show');
            //$api->put('permissions/{permission_id}', 'PermissionController@update');
            //$api->delete('permissions/{permission_id}', 'PermissionController@destroy');

            //epibg meeting
            //$api->get('meeting', 'MeetingsController@index');
            //$api->post('meeting', 'MeetingsController@store');
            //$api->get('meeting/{id}', 'MeetingsController@show'); 
            //$api->put('meeting/{id}', 'MeetingsController@update'); 
            //$api->delete('meeting/{id}', 'MeetingsController@destroy'); //jadii dooooohhh

            //epibg feedback
            //$api->get('feedback', 'FeedbacksController@index');
            //$api->post('feedback', 'FeedbacksController@store');
            //$api->get('feedback/{id}', 'FeedbacksController@show');
            //$api->put('feedback/{id}', 'FeedbacksController@update'); 
            //$api->delete('feedback/{id}', 'FeedbacksController@destroy');

            //epibg download
            //$api->get('downloadfile', 'DownloadController@download'); //kepeningan...tggal luh meta
            //$api->get('indexfile', 'DownloadController@index');
        
            //epibg donation
            //$api->get('donation', 'DonationController@index'); //filter total category name
            //$api->post('donation', 'DonationController@store');
            //$api->get('donation/{id}', 'DonationController@show');
            //$api->put('donation/{id}', 'DonationController@update');
            //$api->delete('donation/{id}', 'DonationController@destroy');

            //epibg committee
            //$api->get('committee', 'EpibgCommitteeController@index');
            //$api->post('committee', 'EpibgCommitteeController@store'); 
            //$api->get('committee/{id}', 'EpibgCommitteeController@show');
            //$api->put('committee/{id}', 'EpibgCommitteeController@update'); //xjadi ag
            //$api->delete('committee/{id}', 'EpibgCommitteeController@destroy');
        //});

         //users routes

         $api->get('users', 'UserController@index');
         $api->post('users', 'UserController@store');
         $api->get('users/{user_id}', 'UserController@show');
         $api->put('users/{user_id}', 'UserController@update');
         $api->delete('users/{user_id}', 'UserController@destroy');

         //roles routes

         $api->get('roles', 'RoleController@index');
         $api->post('roles', 'RoleController@store');
         $api->get('roles/{role_id}', 'RoleController@show');
         $api->put('roles/{role_id}', 'RoleController@update');
         $api->delete('roles/{role_id}', 'RoleController@destroy');

         //permissions routes

         $api->get('permissions', 'PermissionController@index');
         $api->post('permissions', 'PermissionController@store');
         $api->get('permissions/{permission_id}', 'PermissionController@show');
         $api->put('permissions/{permission_id}', 'PermissionController@update');
         $api->delete('permissions/{permission_id}', 'PermissionController@destroy');

         //epibg meeting
         $api->get('meeting', 'MeetingsController@index');
         $api->post('meeting', 'MeetingsController@store', function() {
        })->middleware(\Spatie\HttpLogger\Middlewares\HttpLogger::class);
         $api->get('meeting/{id}', 'MeetingsController@show'); 
         $api->put('meeting/{id}', 'MeetingsController@update'); 
         $api->delete('meeting/{id}', 'MeetingsController@destroy'); //jadii dooooohhh

         //epibg feedback
         $api->get('feedback', 'FeedbacksController@index');
         $api->post('feedback', 'FeedbacksController@store');
         $api->get('feedback/{id}', 'FeedbacksController@show');
         $api->put('feedback/{id}', 'FeedbacksController@update'); 
         $api->delete('feedback/{id}', 'FeedbacksController@destroy');

         //epibg download
         $api->get('downloadfile', 'DownloadController@download'); //kepeningan...tggal luh meta
         $api->get('indexfile', 'DownloadController@index');
     
         //epibg donation
         $api->get('donation', 'DonationController@index'); //filter total category name
         $api->post('donation', 'DonationController@store');
         $api->get('donation/{id}', 'DonationController@show');
         $api->put('donation/{id}', 'DonationController@update');
         $api->delete('donation/{id}', 'DonationController@destroy');

         //epibg committee
         $api->get('committee', 'EpibgCommitteeController@index');
         $api->post('committee', 'EpibgCommitteeController@store'); 
         $api->get('committee/{id}', 'EpibgCommitteeController@show');
         $api->put('committee/{id}', 'EpibgCommitteeController@update');
         $api->delete('committee/{id}', 'EpibgCommitteeController@destroy');

        //Student 
        $api->get('student', 'StudentController@index');
        $api->post('student', 'StudentController@store');
        $api->get('student/{id}', 'StudentController@show');
        $api->put('student/{id}', 'StudentController@update');
        $api->delete('student/{id}', 'StudentController@destroy');

        //district
        $api->get('district', 'DistrictController@index');
        $api->post('district', 'DistrictController@store');
        
        //school
        $api->get('school', 'SchoolController@index');

        //state
        $api->get('state', 'StateController@index');
        $api->post('state', 'StateController@store');

        //activity
        $api->get('activity', 'ActivityController@index');
        $api->post('activity', 'ActivityController@create');
    });
});
