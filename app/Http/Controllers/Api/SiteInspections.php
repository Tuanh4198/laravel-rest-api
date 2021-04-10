<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Ixudra\Curl\Facades\Curl;
use App\Models\Bank;
use App\Models\SiteInspection;
use App\Models\CustomerModel;
use App\Models\Potentials;
use App\Models\ProjectTracker;

class SiteInspections extends Controller
{
    public function getbank() {
        return response()->json(Bank::get(), 200);
    }

    public function getinspection() {
        $inspection = DB::table('inspection')
        ->join('users','users.id','=' ,'inspection.id_user')
        ->get();
        return response()->json($inspection, 200);
    }

    public function view_inspection($id){
        return response()->json(SiteInspection::find($id), 200);
    }

    public function updateInspection(Request $request){
		$request->validate([
			'value' => 'required'
		]);
		$id = $request->id;
		$session = $request->session;
		$name = $request->name;
		$value = $request->value;
		$data_check = SiteInspection::find($id);
		if(!$data_check){ 
			return response()->json(['success' => false, 'errors' => 'An unknown error.'], 200);
		}
		if($session == 'session_1'){
			SiteInspection::where('id',$id)->update([
				$name => $value
			]);
			$data = SiteInspection::find($id);
			if($data->session_1 == 1){
				if($data->average_monthly_usage && $data->average_sun_hours && $data->bill_offset){
					$average_monthly_usage = $data->average_monthly_usage;
					$average_sun_hours = $data->average_sun_hours;
					$bill_offset = $data->bill_offset;
					$daily_kwh = $average_monthly_usage/30;
					$system_size = ($daily_kwh/$average_sun_hours)*1.1*$bill_offset/100;
					$effective_kw = floor($system_size);
					$system_size_floor = $system_size - $effective_kw;
					if($system_size_floor > 0){
						$effective_kw = $effective_kw+1;
					}
					if($data->remaining || $data->deposit){
						if($effective_kw > 0 && $effective_kw <= 3){
							$price_per = 48000;
						}elseif($effective_kw >= 4 && $effective_kw <= 6){ 
							$price_per = 47000;
						}elseif($effective_kw > 6 && $effective_kw <= 10){
							$price_per = 46000;
						}else{
							$price_per = 45000;
						}
						$deposit = $data->deposit;
						$tpc = $effective_kw*$price_per;
						$remaining = $tpc - $deposit;
						if($data->emi){
							$down_payment = $data->down_payment;
							$p = $tpc - $down_payment;
							$interest = $data->interest;
							$of_months = $data->of_months;
							$emi = $p*$interest*((1 + $interest)*$of_months)/((1 + $interest)*$of_months - 1);
							SiteInspection::where('id',$id)->update([
								'daily_kwh' => $daily_kwh,
								'system_size' => $system_size,
								'remaining' => $remaining,
								'tpc' => $tpc,
								'emi'=> $emi
							]);
						}else{
							SiteInspection::where('id',$id)->update([
								'daily_kwh' => $daily_kwh,
								'system_size' => $system_size,
								'remaining' => $remaining,
								'tpc' => $tpc
							]);
						}
					}else{
						SiteInspection::where('id',$id)->update([
							'daily_kwh' => $daily_kwh,
							'system_size' => $system_size
						]);
					}
				}
			}else{
				if($data->average_monthly_usage && $data->average_sun_hours && $data->bill_offset){
					$average_monthly_usage = $data->average_monthly_usage;
					$average_sun_hours = $data->average_sun_hours;
					$bill_offset = $data->bill_offset;
					$daily_kwh = $average_monthly_usage/30;
					$system_size = ($daily_kwh/$average_sun_hours)*1.1*$bill_offset/100;
					if($data->potential_install_area){
						SiteInspection::where('id',$id)->update([
							'daily_kwh' => $daily_kwh,
							'system_size' => $system_size,
							'session_1' => 1
						]);
					}else{
						SiteInspection::where('id',$id)->update([
							'daily_kwh' => $daily_kwh,
							'system_size' => $system_size,
						]);
					}
				}
			}
		}elseif($session == 'session_2'){
			if($name == 'panel_image'){
				$rand = uniqid();
				$url = $request->root();
				$name_image = $rand.''.time().'.jpeg';
				$img_URL =  $url."/public/dist/upload/".$name_image;
				$imgPro = base_path().'/public/dist/upload/'.$name_image; 
				file_put_contents($imgPro, file_get_contents($value));
				SiteInspection::where('id',$id)->update([
					'panel_image' => $img_URL
				]);
			}else{
				SiteInspection::where('id',$id)->update([
					$name => $value
				]);
			}
			$data = SiteInspection::find($id);
			if($data->session_2 == 0){
				if($data->panel_image && $data->small_leg && $data->large_leg && $data->number_of_rows && $data->inverter_length){
					SiteInspection::where('id',$id)->update([
						'session_2' => 1
					]);
				}
			}
		}elseif($session == 'session_3'){
			SiteInspection::where('id',$id)->update([
				$name => $value
			]);
			$data = SiteInspection::find($id);
			if($data->deposit && $data->system_size){
				$system_size = $data->system_size;
				$effective_kw = floor($system_size);
				$system_size_floor = $system_size - $effective_kw;
				if($system_size_floor > 0){
					$effective_kw = $effective_kw+1;
				}
				$deposit = $data->deposit;
				if($effective_kw > 0 && $effective_kw <= 3){
					$price_per = 48000;
				}elseif($effective_kw >= 4 && $effective_kw <= 6){
					$price_per = 47000;
				}elseif($effective_kw > 6 && $effective_kw <= 10){
					$price_per = 46000;
				}else{
					$price_per = 45000;
				}
				$deposit = $data->deposit;
				$tpc = $effective_kw*$price_per;
				$remaining = $tpc - $deposit;
				if($data->remaining){
					$down_payment = $data->down_payment;
					$p = $tpc - $down_payment;
					$interest = $data->interest;
					$of_months = $data->of_months;
					$emi = $p*$interest*((1 + $interest)*$of_months)/((1 + $interest)*$of_months - 1);
					SiteInspection::where('id',$id)->update([
						'remaining' => $remaining,
						'tpc' => $tpc,
						'emi'=> $emi
					]);
					$data = SiteInspection::find($id);
				}else{
					SiteInspection::where('id',$id)->update([
						'remaining' => $remaining,
						'tpc' => $tpc
					]);
				}
			}
			$data_session3 = SiteInspection::find($id);
			if($data_session3->emi && $data_session3->existing_home == 1 && $data_session3->bank_id && $data_session3->bank_branch){
				SiteInspection::where('id',$id)->update([
					'session_3' => 1
				]);
			}
		}elseif($session == 'session_4'){
			$file = $request->file('value');
			$url = $request->root();
			if($file){
				$file_arr_type = ['txt','docx','pdf'];
				$file_type = strtolower($file->getClientOriginalExtension());
				if(!in_array($file_type, $file_arr_type)){
					return response()->json(['success' => false, 'errors' => 'The value must be a file of type: txt, docx, pdf.'], 200);
				}
				$get_name_file = $file->getClientOriginalName();
				$name_file = current(explode('.',$get_name_file));
				$new_file = $name_file.time().$file->getClientOriginalExtension();
				$file->move(public_path("/dist/upload_file/"),$new_file);
				$link_file = $url."/public/dist/upload_file/".$new_file;
			}else{
				return response()->json(['success' => false, 'errors' => 'The file you uploaded is not in the correct format.'], 200);
			}

			SiteInspection::where('id',$id)->update([
				$name => $link_file
			]);
			$data = SiteInspection::find($id);
			if($data->session_4 == 0){
				if($data->document_1 && $data->document_2 && $data->document_3){
					SiteInspection::where('id',$id)->update([
						'session_4' => 1
					]);
				}
			}
		}elseif($session == 'session_5'){ 
			$url = $request->root();
			$arr_link_file = array();
			$files = $request->file('value');
			if($files){
				foreach ($files as $file) {
					if ($name == 'wiring_path_video') {
						$file_arr_type = ['mp4','ogg','mpeg4','avi'];
						$file_type = strtolower($file->getClientOriginalExtension());
						if(!in_array($file_type, $file_arr_type)){
							return response()->json(['success' => false, 'errors' => 'The value must be a file of type: mp4, ogg, mpeg4, avi.'], 200);
						}
					} else {
						$file_arr_type = ['png','gif','jpeg','jpg'];
						$file_type = strtolower($file->getClientOriginalExtension());
						
						if(!in_array($file_type, $file_arr_type)){
							return response()->json(['success' => false, 'errors' => 'The value must be a file of type: png, gif, jpeg, jpg.'], 200);
						}
					}
				}
				foreach ($files as $file) {
					$get_name_file = strtolower($file->getClientOriginalName());
					$name_file = current(explode('.',$get_name_file));
					$new_file = $name_file.time().'.'.$file->getClientOriginalExtension();
					$file->move(public_path("/dist/upload_image_video/"),$new_file);
					$link_file = $url."/public/dist/upload_image_video/".$new_file;
					array_push($arr_link_file, $link_file);
				}
			}else{
				return response()->json(['success' => false, 'errors' => 'The file you uploaded is not in the correct format.'], 200);
			}

			SiteInspection::where('id',$id)->update([
				$name => json_encode($arr_link_file)
			]); 
			$data = SiteInspection::find($id);
			if($data->session_5 == 0){
				if($data->panel_area && $data->inverter_area && $data->wiring_path_video){
					SiteInspection::where('id',$id)->update([
						'session_5' => 1
					]);
				}
			}
		}
		$data_update = SiteInspection::find($id);
		$submit = false;
		if($data_update->session_1 == 1 && $data_update->session_2 == 1 && $data_update->session_3 == 1 && $data_update->session_4 == 1 && $data_update->session_5 == 1){
			$submit = true;
		}
		$session_1 = [];
		$session_1 = [
			'session' => $data_update->session_1,
			'daily_kwh' => $data_update->daily_kwh,
			'system_size' => $data_update->system_size
		];
		$session_2 = [
			'session' => $data_update->session_2,
			'panel_image' => $data_update->panel_image
		];
		$session_3 = [
			'session' => $data_update->session_3,
			'remaining' => $data_update->remaining,
			'tpc' => $data_update->tpc,
			'emi'=> $data_update->emi
		];
		if($session == 'session_4'){
			$session_4 = [
				'session' => $data_update->session_4,
				'document_upload' => $data_update->$name,
				'document' => [
					'document_1' => $data_update->document_1,
					'document_2' => $data_update->document_2,
					'document_3' => $data_update->document_3
				]
				
			];
		}else{
			$session_4 = [
				'session' => $data_update->session_4,
				'document_upload' => '',
				'document' => [
					'document_1' => $data_update->document_1,
					'document_2' => $data_update->document_2,
					'document_3' => $data_update->document_3
				]
				
			];
		}
		if($session == 'session_5'){
			$session_5 = [
				'session' => $data_update->session_5,
				'data_upload' => json_decode($data_update->$name),
				'data_file' => [
					'panel_area' => json_decode($data_update->panel_area),
					'inverter_area' => json_decode($data_update->inverter_area),
					'wiring_path_video' => json_decode($data_update->wiring_path_video)
				]
			];
		}else{
			$session_5 = [
				'session' => $data_update->session_5,
				'data_upload' => '',
				'data_file' => [
					'panel_area' => json_decode($data_update->panel_area),
					'inverter_area' => json_decode($data_update->inverter_area),
					'wiring_path_video' => json_decode($data_update->wiring_path_video)
				]
				
			];
		}
		$array = [
			'success' => true,
            'submit' => $submit,
			'data_session' => [
				'system_size' => formatAmountKw($data_update->system_size),
				'remaining' => formatAmount($data_update->remaining),
				'tpc' => formatAmount($data_update->tpc),
				'emi'=> formatAmount($data_update->emi)
			],
            'session_1' => $session_1,
			'session_2' => $session_2,
			'session_3' => $session_3,
			'session_4' => $session_4,
			'session_5' => $session_5
        ];
		return response()->json($array, 200);
	}
	
	public function submitInspection(Request $request){
		$id = $request->id;
		if(!$id){
			return response()->json(['success' => false, 'message' => 'An unknown error.'], 200);
		}
		$data = SiteInspection::find($id);
		if(!$data){ 
			return response()->json(['success' => false, 'message' => 'An unknown error.'], 200);
		}else{
			if($data->session_1 == 1 && $data->session_2 == 1 && $data->session_3 == 1 && $data->session_4 == 1 && $data->session_5 == 1 && $data->status == 0){
				SiteInspection::where('id',$id)->update([
					'status' => 1
				]);
				CustomerModel::where('id',$data->id_contact)->update([
					'status' => 0
				]);
				Potentials::create([
					'user_id' => $data->id_user,
					'site_inspection_id' => $data->id,
					'effective_system_size' => $data->system_size
				]);
				ProjectTracker::where('id_user','=',$data->id_user)->update(['site_inspection_completed' => 1]);
				return response()->json(['success' => true, 'message' => 'Site Inspection form is submitted.'], 200);
			}else{
				return response()->json(['success' => false, 'message' => 'An unknown error.'], 200);
			}
		}
		
	}
}