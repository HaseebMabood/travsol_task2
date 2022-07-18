<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AgentNewController;
use App\Http\Controllers\CreditReqController;
use App\Http\Controllers\SubAgencyController;
use App\Http\Controllers\BalanceReqController;
use App\Http\Controllers\ShowCreditReqController;
use App\Http\Controllers\SubAgencyListController;
use App\Http\Controllers\ShowBalanceReqController;
use App\Http\Controllers\SubAgencyUsersController;
use App\Http\Controllers\SuperAdmin\RoleController;
use App\Http\Controllers\SuperAdmin\PermissionController;

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

Route::get('/', function () {

    return view('auth.login');
});


// Route::get('/myProfile', function () {

//     return view('admin.profile');
// });

// Route::get('/table', function () {

//     return view('admin.users_table');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('reg_users', AdminController::class);


//Spatie Middleware for route protection
Route::group(['middleware' => ['role:admin']], function () {

            // Role controller
        Route::resource('/roles', RoleController::class);


        // Permission controller
        Route::resource('/permissions', PermissionController::class);

        //Assign permission to role

        Route::post('/roles/{id}/permission', [RoleController::class, 'givePermission'])->name('roles.permission');

        //revoke/delete permission that assigned to role
        Route::delete('/roles/{id}/permission/{id2}', [RoleController::class, 'revokePermission'])->name('permission.revoke');


        // Assign role to user
        Route::get('/assign_role_to_user/{id}', [RoleController::class, 'assign_role_to_user']);

        Route::post('/role_asssigned_to_user/{id}', [RoleController::class, 'role_asssigned_to_user']);


        //revoke/delete role that assigned to role
        Route::delete('/user/{id}/role/{id2}', [RoleController::class, 'revokeRole'])->name('role.revoke');


        // Agencies resource
        Route::resource('/agencies', AgencyController::class);

        // add or sub balance approval by admin
        Route::get('/add_balance/{id}', [AgencyController::class, 'add_balance']);

        // rejecting balance request
        Route::get('/reject_req/{id}', [AgencyController::class, 'reject_req']);


        //here is all agents created by managers, show to Admin
        Route::get('/agents_all', [AdminController::class, 'agents_all']);


        // Sub agencies list created by their respective admin
        Route::resource('/subagencies_list', SubAgencyListController::class);


        // show balance req
        Route::get('/index', [ShowBalanceReqController::class, 'index']);

        // show credit req
        Route::get('/credit_index', [ShowCreditReqController::class, 'credit_index']);


         // add or sub credit approval by admin
         Route::get('/add_credit/{id}', [CreditReqController::class, 'add_credit']);

         // rejecting credit request
         Route::get('/reject_credit_req/{id}', [CreditReqController::class, 'reject_credit_req']);
        

});




        // This route is accessable only to manager
    Route::group(['middleware' => ['role:agency admin']], function () {
                // Agent resource ....Agent Crud created by agency admin
                Route::resource('/agents_new', AgentNewController::class);


                 // Sub Agencies resource
        Route::resource('/subagency', SubAgencyController::class);

          // Users with their respective subagency
          Route::resource('/subagencyusers', SubAgencyUsersController::class);

        // its because in the same page we cannot go to other route when ,ie show user has own route and Edit has its own and hence we cannot differentiate them to go to different route at a same page..
        Route::get('/usershow/{id}', [SubAgencyController::class, 'userindex']);
        // Route::get('/usercreate/{id2}', [SubAgencyController::class, 'usercreate']);
        // after directing to this route then it will use the above one resource /subagencyusers for more methods i,e create,store,delete,update



        // Balance management system
        Route::get('/balance_req', [BalanceReqController::class, 'balance_req']);

        Route::post('/balance_req_sent', [BalanceReqController::class, 'balance_req_sent']);


         // Credit management system
         Route::get('/credit_req', [CreditReqController::class, 'credit_req']);

         Route::post('/credit_req_sent', [CreditReqController::class, 'credit_req_sent']);
    });

    //The following routes is accessable to everyone

    Route::get('/my-profile', [UserController::class, 'my_profile']);

    Route::put('/profile-update/{id}', [UserController::class, 'update_profile']);









    // Manager resource ....Here we will show the Agency related to corressponding manager../Specific agency accessable by their relavant manager
    Route::resource('/agency', ManagerController::class);