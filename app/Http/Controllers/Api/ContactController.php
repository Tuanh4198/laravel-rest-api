<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Models\User;
use App\Models\SiteInspection;
use App\Models\ProjectTracker;

class ContactController extends Controller
{
    public function getcontact() {
        return response()->json(CustomerModel::where('status','=',1)->get(), 200);
    }

    public function getContactConFirm() {
        $data_contact_confirm = CustomerModel::getContactConFirm();
        return response()->json($data_contact_confirm, 200);
    }

    public function getScheduled() {
        $data_scheduled = CustomerModel::getScheduled();
        return response()->json($data_scheduled, 200);
    }


    public function getcontactByid($id) {
        $data_contact = CustomerModel::getContactById($id);
        if(!$data_contact){
            $data = [
                'errors' => 404,
                'message' => 'An unknown error'
            ];
        }else{
            $data = [
                'errors' => null,
                'data' => $data_contact
            ];
        }
        return response()->json($data, 200); 
    }

    public function createcontact(Request $req) {
        $contact = CustomerModel::create($req->all());
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
    
    public function activeaccount($id, $rand_str ,Request $req) {
        $cus = User::find($id)->update($req->only(['active']));
		ProjectTracker::create([
            'id_user' => $id
        ]);
        return response()->json([
            'message' => 'Your email active successful!',
            'id' => $id,
            'rand_str' => $rand_str
        ], 200);
    }

    public function confirmContact(Request $req) {
        $contact = CustomerModel::find($req->id_contact);
        $contact_visit = $contact->contact_visit;
        $new_time = $req->contact_visit;
        $visit_time = false;
        if(strtotime($contact_visit) != strtotime($new_time)){
            CustomerModel::find($req->id_contact)->update(['status' => 2,'contact_visit' => $new_time]);
            $visit_time = true;
        }else{
            CustomerModel::find($req->id_contact)->update(['status' => 2]);
        }
        SiteInspection::create([
            'id_user' => $req->id_user,
            'id_contact' => $req->id_contact
        ]);
		ProjectTracker::where('id_user','=',$req->id_user)->update(['site_inspection_scheduled' => 1]);
        return response()->json([
            'message' => 'Confirm Contact successful!',
            'visit_time' => $visit_time
        ], 200);
    }
}