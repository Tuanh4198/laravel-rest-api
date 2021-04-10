<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });

});

Route::group([
    'namespace' => 'Api'
], function() {
    Route::get('/getState','StateController@getState');
    Route::get('/getCity/{id}','StateController@getCity');
    Route::get('/getCitybyid/{id}','StateController@getCitybyid');
    Route::get('/getstatebyid/{id}','StateController@getstatebyid');
    Route::get('/getcustomer','SaleComplianceController@getCustomer');
    Route::get('/getsale','SaleComplianceController@getSale');
    Route::get('/getsale/{sale}','SaleComplianceController@getSaleByID');
    Route::post('/addsale','SaleComplianceController@addSale');
    Route::post('/updatesale','SaleComplianceController@updateSale');
    Route::get('/deletesale/{sale}', 'SaleComplianceController@deleteSale');
    Route::get('/getinstaller','SaleComplianceController@getInstaller');
    Route::get('/getinstaller/{id}','SaleComplianceController@getInstallerByID');
    Route::post('/addinstaller','SaleComplianceController@addInstaller');
    Route::post('/updateins','SaleComplianceController@updateInstaller');
    Route::get('/deleteinstaller/{installer}','SaleComplianceController@deleteInstaller');
    Route::get('/getpotentials','PotentialsController@getPotentials');
    Route::get('/view-potential/{id}','PotentialsController@viewPotentials');
    Route::get('/potential-status','PotentialsController@getPotentialsStatus');
    Route::post('/createcontact','ContactController@createcontact');
    Route::post('/activeaccount/{id}/{rand_str}','ContactController@activeaccount');
    Route::get('/getcontact','ContactController@getcontact');
    Route::get('/getcontact-confirm','ContactController@getContactConFirm');
    Route::get('/getcontact/{id}','ContactController@getcontactByid');
    Route::post('/confirm-contact','ContactController@confirmContact'); 
    Route::get('/getbank','SiteInspections@getbank');
    Route::get('/getinspection','SiteInspections@getinspection');
    Route::get('/view-inspection/{id}','SiteInspections@view_inspection');
	Route::post('/update-inspection','SiteInspections@updateInspection'); 
	Route::post('/submit-inspection','SiteInspections@submitInspection'); 
    
    Route::get('/getproject','ProjectController@getProject');
    Route::get('/getproject/{id}','ProjectController@getProjectByID');
    
    Route::get('/get-compare-discom','ProjectController@getCompareDiscom');
    Route::get('/get-compare-finance','ProjectController@getCompareFinance');
    Route::get('/get-compare-components','ProjectController@getCompareComponents');
    Route::get('/get-compare-installation','ProjectController@getCompareInstallation');
    Route::get('/get-compare-compliance','ProjectController@getCompareCompliance');
    Route::get('/get-compare-commissioning','ProjectController@getCompareCommissioning'); 

    Route::get('/getscheduled','ContactController@getScheduled');
    Route::get('/getprojecttracker/{id}','ProjectTrackerController@getProjectTracker');

    Route::post('/getrevenue','ProjectController@getRevenue');
	Route::post('/getsystems','ProjectController@getSystems');
	Route::post('/getsystemssize ','ProjectController@getSystemsSize');
	Route::post('/getpotentialcarbonsavings ','ProjectController@getPotentialCarbonSavings');
	Route::get('/getnumberofqueries ','ProjectController@getNumberOfQueries'); 

    Route::post('/update-potential','PotentialsController@updatePotential');
    Route::get('/getProjectStatusFlow/{id}','ProjectController@getProjectStatusFlow');
    Route::post('/editProjectStatusFlow','ProjectController@editProjectStatusFlow');
}); 