<?php

use Illuminate\Support\Facades\Route;

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

Route::group([
    'namespace' => 'Login'
], function() {
	Route::middleware(['login'])->group(function(){
		Route::get('/login','LoginController@index')->name('login');
		Route::post('/login','LoginController@login')->name('password.postLogin');
	});
	Route::get('/customer-contact','RegisterController@index')->name('getRegister'); 
	Route::post('/register','RegisterController@register')->name('postRegister');
	Route::get('/confirm-password','ConfirmPasswordController@index')->name('password.getConfirm');
	Route::post('/confirm-password','ConfirmPasswordController@confirm')->name('password.postConfirm');
	Route::middleware(['auth'])->group(function(){
		Route::get('logout','LogoutController@logout')->name('logout');
	});
});
Route::group([
    'namespace' => 'Admin'
], function() {
	Route::middleware(['auth','admin'])->group(function(){
		Route::get('admin/dashboard','AdminController@index')->name('indexAdmin');
		Route::get('admin/getcustomer','CustomerController@getCustomer')->name('getCustomer'); 

		Route::get('admin/getsale','SaleController@getSale')->name('getSale');
		Route::get('admin/formsale','SaleController@formSale')->name('formSale');
		Route::post('admin/addsale','SaleController@addSale')->name('addSale');
		Route::get('admin/editsale/{id}','SaleController@editSale')->name('editSale');
		Route::post('admin/updatesale','SaleController@updateSale')->name('updateSale');
		Route::get('admin/deletesale/{id}', 'SaleController@deleteSale')->name('deleteSale');

		Route::get('admin/getinstaller','InstallerController@getInstaller')->name('getInstaller');
		Route::get('admin/forminstaller','InstallerController@formInstaller')->name('formInstaller');
		Route::post('admin/addinstaller','InstallerController@addInstaller')->name('addInstaller');
		Route::get('admin/editinstaller/{id}','InstallerController@editInstaller')->name('editInstaller');
		Route::post('admin/updateins/{id}','InstallerController@updateIns')->name('updateIns');
		Route::get('admin/deleteinstaller/{id}', 'InstallerController@deleteInstaller')->name('deleteInstaller');
	});
});
Route::group([
    'namespace' => 'Installer'
], function() {
	Route::middleware(['auth','installer'])->group(function(){
		Route::get('installer/dashboard','InstallerController@index')->name('indexInstaller');
		Route::get('installer/view-installer/{id}','InstallerController@view_installer');
	});
});
Route::group([
    'namespace' => 'Sale'
], function() {
	Route::middleware(['auth','sale'])->group(function(){
		Route::get('sale/dashboard','SaleController@index')->name('indexSale');
		Route::get('sale/get-contact','ContactController@get_contact')->name('get.contact');
		Route::get('sale/view-contact/{id}','ContactController@view_contact');
		Route::get('sale/view-inspection/{id}','SiteInspection@view_inspection')->name('viewInspection'); 
		Route::get('sale/list-inspection','SiteInspection@list_inspection');
		Route::post('sale/confirm-contact','ContactController@confirm_contact');
		Route::post('sale/submit-inspection','SiteInspection@submitInspection')->name('submitInspection');
		Route::get('sale/potentials-list','PotentialsController@list_potentials');
		Route::get('sale/potentials-view/{id}','PotentialsController@view_potentials')->name('viewPotentials');
		Route::post('sale/update-potential','PotentialsController@updatePotential')->name('updatePotential');
		Route::get('/sale/project-list','ProjectController@projectList')->name('projectList');
		Route::get('/sale/project-detail/{id}','ProjectController@projectDetail')->name('projectDetail');
		Route::get('/sale/gettobeconfirm','ContactController@getToBeConfirm')->name('getToBeConfirm');
		Route::get('/sale/getconfirm','ContactController@getConfirm')->name('getConfirm');

		Route::get('/sale/get-compare-discom','ProjectController@getCompareDiscom')->name('getCompareDiscom');
		Route::get('/sale/get-compare-finance','ProjectController@getCompareFinance')->name('getCompareFinance');
		Route::get('/sale/get-compare-components','ProjectController@getCompareComponents')->name('getCompareComponents');
		Route::get('/sale/get-compare-installation','ProjectController@getCompareInstallation')->name('getCompareInstallation');
		Route::get('/sale/get-compare-compliance','ProjectController@getCompareCompliance')->name('getCompareCompliance');
		Route::get('/sale/get-compare-commissioning','ProjectController@getCompareCommissioning')->name('getCompareCommissioning');
		
		
	});
});
Route::group([
    'namespace' => 'Customer'
], function() {
	Route::post('/addcontact','ContactController@addcontact')->name('post.createcontact');
	Route::get('/active-account/{id}/{rand_str}','ContactController@active_account');
	Route::middleware(['auth','check.customer','customer'])->group(function(){
		Route::get('customer/dashboard','CustomerController@index')->name('indexSale');
	});
});