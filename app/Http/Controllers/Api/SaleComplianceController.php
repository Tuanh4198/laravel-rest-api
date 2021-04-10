<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Ixudra\Curl\Facades\Curl;
use DB;
use App\Models\DataInstaller;

class SaleComplianceController extends Controller
{
    //

    public function getCustomer() {
    	$customer = DB::table('users')
		->join('contact','contact.id_user','=' ,'users.id')
		->where('user_type', 4)
		->get();
        return response()->json($customer, 200);
    }

    public function getSale() {
    	$sale = DB::table('users')
		->where('user_type', 2)
		->get();
        return response()->json($sale, 200);
    }


    public function getInstaller() {
		$installer = DB::table('users')
		->join('data_installer','data_installer.id_user','=' ,'users.id')  
		->where('user_type', 3)
		->get();
        return response()->json($installer, 200);
    }


    public function updateSale(Request $req) {
        $id = $req->id;
        $cus = User::find($id)->update($req->all());
        return response()->json([
            'message' => 'Your account update successful!',
            'id' => $id
        ], 200);
    }

    public function addInstaller(Request $req)
    {
        $addIns = DataInstaller::create($req->all());
        return response()->json([
            'message' => 'Created account Installer Successfully!'
        ], 201);

    } 


    public function updateInstaller(Request $req) {
		User::find($req->id_user)->update(['name' => $req->installer_contact_name,'phone' => $req->installer_phone]);
		DataInstaller::where('id_user',$req->id_user)->update([
            'installer_name' => $req->installer_name,
            'installer_contact_name'=> $req->installer_contact_name,
            'installer_phone'=> $req->installer_phone,
            'installer_email'=> $req->installer_email,
            'installer_adr_1'=> $req->installer_adr_1,
            'installer_adr_2'=> $req->installer_adr_2,
            'installer_state'=> $req->installer_state,
            'installer_city'=> $req->installer_city,
            'installer_pincode'=> $req->installer_pincode,
            'installer_number_of_project'=> $req->installer_number_of_project,
            'installer_total_installer'=> $req->installer_total_installer,
            'installer_maximum_installer'=> $req->installer_maximum_installer,
            'installer_number_of_employees'=> $req->installer_number_of_employees,
            'installer_maximum_distance'=> $req->installer_maximum_distance
		]);
        return response()->json([
            'message' => 'Update account Installer successful!',
            'id' => $req->id_user
        ], 200);
    }


    public function deleteSale(Request $req, $sale){
        $user = DB::table('users')->where('id',$sale)->delete();
        return response()->json(['message' => 'Delete account Successfully!'], 200);
    }


    public function deleteInstaller(Request $req, $installer){
        $user = DB::table('users')->where('id',$installer)->delete();
        $idInstaller = DB::table('data_installer')
        ->where('id_user', $installer)->delete();
        return response()->json(['message' => 'Delete account Successfully!'], 200);
    }


    public function getSaleByID(User $sale){
        return response()->json(User::find($sale), 200);
    }

    public function getInstallerByID($id){
        $user = DB::table('users')
        ->join('data_installer','data_installer.id_user','=' ,'users.id')  
        ->where('id_user', $id)
        ->first();
        return response()->json($user, 200);
    }

}
