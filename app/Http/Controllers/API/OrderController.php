<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Posts;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Mail;
use DB;
use DataTables;

class OrderController extends Controller
{

// {{ ============= Commercial Departmant Section ===================== }}
    public function order_store(Request $request)
    {
//        dd($request);
        error_reporting(0);
        $user_id = auth('sanctum')->user()->id;
            DB::table('tbl_order')->insert([
                "order_confirm_date" => $request->order_confirm_date,
                "order_no" => $request->order_no,
                "factory" => $request->factory,
                "lc_no" => $request->lc_no,
                "description" => $request->description,
                "shipment_date" => $request->shipment_date,
                "shipment_date_after_ext" => $request->shipment_date_after_ext,
                "order_qty" => $request->order_qty,
                "pi_to_buyer_date" => $request->pi_to_buyer_date,
                "lc_to_fty_date" => $request->lc_to_fty_date,
                "buyer" => $request->buyer,
                "commercial_id" => $user_id,
            ]);
        return response()->json(['success' => 'Post created successfully']);
    }

    public function order_list()
    {
        $user_id = auth('sanctum')->user()->id;

        $data = DB::table('tbl_order')
            ->join('tbl_buyer','tbl_buyer.id', '=', 'tbl_order.buyer')
            ->select('tbl_order.*','tbl_buyer.buyer_name')
            ->get()
            ->toArray();
        return array_reverse($data);
    }

    public function commercial_order_info_edit($id)
    {
        $data = DB::table('tbl_order')
            ->join('tbl_buyer','tbl_buyer.id', '=', 'tbl_order.buyer')
            ->select('tbl_order.*','tbl_buyer.buyer_name')
            ->where('tbl_order.id', $id)
            ->first();
        return response()->json($data);
    }
    public function commercial_order_info_update($id, Request $request)
    {
//        dd($request);
        $user_id = auth('sanctum')->user()->id;
        if($request->buyer != 'undefined'){
            DB::table('tbl_order')
                ->where('id', $id)
                ->update([
                    "order_confirm_date" => $request->order_confirm_date,
                    "order_no" => $request->order_no,
                    "factory" => $request->factory,
                    "lc_no" => $request->lc_no,
                    "description" => $request->description,
                    "shipment_date" => $request->shipment_date,
                    "shipment_date_after_ext" => $request->shipment_date_after_ext,
                    "order_qty" => $request->order_qty,
                    "pi_to_buyer_date" => $request->pi_to_buyer_date,
                    "lc_to_fty_date" => $request->lc_to_fty_date,
                    "buyer" => $request->buyer,
                ]);
        }
        if($request->buyer == 'undefined'){
            $buyer_id = DB::table('tbl_order')
                ->select('buyer')
                ->where('id', $id)
                ->first();

//             dd($buyer_id);

            DB::table('tbl_order')
                ->where('id', $id)
                ->update([
                    "order_confirm_date" => $request->order_confirm_date,
                    "order_no" => $request->order_no,
                    "factory" => $request->factory,
                    "lc_no" => $request->lc_no,
                    "description" => $request->description,
                    "shipment_date" => $request->shipment_date,
                    "shipment_date_after_ext" => $request->shipment_date_after_ext,
                    "order_qty" => $request->order_qty,
                    "pi_to_buyer_date" => $request->pi_to_buyer_date,
                    "lc_to_fty_date" => $request->lc_to_fty_date,
                    "buyer" => $buyer_id->buyer,
                ]);
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'Commercial Order Information Updated Successfully !!!'
            ]
        );
    }

    public function order_delete($id)
    {
        DB::table('tbl_order')->where('id', '=', $id)->delete();
        return response()->json(['success'=> 'Commercial Order Information Deleted Successfully']);

    }


// {{ ============= Fabic Departmant Section ===================== }}
    public function fabric_order_list()
    {
        $user_id = auth('sanctum')->user()->id;
        $data = DB::table('tbl_order')
            ->join('tbl_buyer','tbl_buyer.id', '=', 'tbl_order.buyer')
            ->select('tbl_order.*','tbl_buyer.buyer_name')
            ->get()
            ->toArray();
        return array_reverse($data);
    }
    public function fabric_order_info_form($id)
    {
        $data = DB::table('tbl_order')
            ->select('*')
            ->where('id', $id)
            ->first();
        return response()->json($data);
    }
    public function fabric_order_info_store($id, Request $request)
    {
        $user_id = auth('sanctum')->user()->id;
        DB::table('tbl_order')
            ->where('id', $id)
            ->update([
                "shell_fabric_booking_date" => $request->shell_fabric_booking_date,
                "shell_fabric_plan_date" => $request->shell_fabric_plan_date,
                "shell_fabric_actual" => $request->shell_fabric_actual,
                "shell_fabric_remarks" => $request->shell_fabric_remarks,
                "pocketing_booking_date" => $request->pocketing_booking_date,
                "pocketing_plan_date" => $request->pocketing_plan_date,
                "pocketing_actual_date" => $request->pocketing_actual_date,
                "pocketing_remarks" => $request->pocketing_remarks,
                "fabric_id" => $user_id,
            ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Fabric Order Information Updated Successfully !!!'
            ]
        );
    }
    public function fabric_order_info_edit($id)
    {
        $data = DB::table('tbl_order')
            ->select('*')
            ->where('id', $id)
            ->first();
        return response()->json($data);
    }
    public function fabric_order_info_update($id, Request $request)
    {
        $user_id = auth('sanctum')->user()->id;
        DB::table('tbl_order')
            ->where('id', $id)
            ->update([
                "shell_fabric_booking_date" => $request->shell_fabric_booking_date,
                "shell_fabric_plan_date" => $request->shell_fabric_plan_date,
                "shell_fabric_actual" => $request->shell_fabric_actual,
                "shell_fabric_remarks" => $request->shell_fabric_remarks,
                "pocketing_booking_date" => $request->pocketing_booking_date,
                "pocketing_plan_date" => $request->pocketing_plan_date,
                "pocketing_actual_date" => $request->pocketing_actual_date,
                "pocketing_remarks" => $request->pocketing_remarks,
            ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Fabric Order Information Updated Successfully !!!'
            ]
        );
    }

    // {{ ============= Trims Departmant Section ===================== }}
    public function trims_order_list()
    {
        $user_id = auth('sanctum')->user()->id;
        $data = DB::table('tbl_order')
            ->join('tbl_buyer','tbl_buyer.id', '=', 'tbl_order.buyer')
            ->select('tbl_order.*','tbl_buyer.buyer_name')
            ->get()
            ->toArray();
        return array_reverse($data);
    }
    public function trims_order_info_form($id)
    {
        $data = DB::table('tbl_order')
            ->select('*')
            ->where('id', $id)
            ->first();
        return response()->json($data);
    }
    public function trims_order_info_store($id, Request $request)
    {
        $user_id = auth('sanctum')->user()->id;
        DB::table('tbl_order')
            ->where('id', $id)
            ->update([
                "fusing" => $request->fusing,
                "zipper_plan" => $request->zipper_plan,
                "zipper_actual" => $request->zipper_actual,
                "swing_thread_plan" => $request->swing_thread_plan,
                "swing_thread_actual" => $request->swing_thread_actual,
                "print_plan" => $request->print_plan,
                "print_actual" => $request->print_actual,
                "button" => $request->button,
                "rivet" => $request->rivet,
                "main_label" => $request->main_label,
                "size_label" => $request->size_label,
                "care_label" => $request->care_label,
                "other_label" => $request->other_label,
                "back_patch" => $request->back_patch,
                "hang_tag" => $request->hang_tag,
                "stretch_tag" => $request->stretch_tag,
                "waist_tag" => $request->waist_tag,
                "price" => $request->price,
                "poly" => $request->poly,
                "ctn" => $request->ctn,
                "hanger_plan" => $request->hanger_plan,
                "hanger_actual" => $request->hanger_actual,
                "single_poly" => $request->single_poly,
                "carton" => $request->carton,
                "trims_remarks" => $request->trims_remarks,
                "trims_id" => $user_id,
            ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Trims Order Information Updated Successfully !!!'
            ]
        );
    }
    public function trims_order_info_edit($id)
    {
        $data = DB::table('tbl_order')
            ->select('*')
            ->where('id', $id)
            ->first();
        return response()->json($data);
    }
    public function trims_order_info_update($id, Request $request)
    {
        $user_id = auth('sanctum')->user()->id;
        DB::table('tbl_order')
            ->where('id', $id)
            ->update([
                "fusing" => $request->fusing,
                "zipper_plan" => $request->zipper_plan,
                "zipper_actual" => $request->zipper_actual,
                "swing_thread_plan" => $request->swing_thread_plan,
                "swing_thread_actual" => $request->swing_thread_actual,
                "print_plan" => $request->print_plan,
                "print_actual" => $request->print_actual,
                "button" => $request->button,
                "rivet" => $request->rivet,
                "main_label" => $request->main_label,
                "size_label" => $request->size_label,
                "care_label" => $request->care_label,
                "other_label" => $request->other_label,
                "back_patch" => $request->back_patch,
                "hang_tag" => $request->hang_tag,
                "stretch_tag" => $request->stretch_tag,
                "waist_tag" => $request->waist_tag,
                "price" => $request->price,
                "poly" => $request->poly,
                "ctn" => $request->ctn,
                "hanger_plan" => $request->hanger_plan,
                "hanger_actual" => $request->hanger_actual,
                "single_poly" => $request->single_poly,
                "carton" => $request->carton,
                "trims_remarks" => $request->trims_remarks,
            ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Fabric Order Information Updated Successfully !!!'
            ]
        );
    }

    // {{ ============= Merchant Departmant Section ===================== }}
    public function merchant_order_list()
    {
        $user_id = auth('sanctum')->user()->id;
        $data = DB::table('tbl_order')
            ->join('tbl_buyer','tbl_buyer.id', '=', 'tbl_order.buyer')
            ->select('tbl_order.*','tbl_buyer.buyer_name')
            ->get()
            ->toArray();
        return array_reverse($data);
    }
    public function merchant_order_info_form($id)
    {
        $data = DB::table('tbl_order')
            ->select('*')
            ->where('id', $id)
            ->first();
        return response()->json($data);
    }
    public function merchant_order_info_store($id, Request $request)
    {
        $user_id = auth('sanctum')->user()->id;
        DB::table('tbl_order')
            ->where('id', $id)
            ->update([
                "fit_sample_plan" => $request->fit_sample_plan,
                "fit_sample_actual" => $request->fit_sample_actual,
                "pp_sample_plan" => $request->pp_sample_plan,
                "pp_sample_actual" => $request->pp_sample_actual,
                "shipping_plan" => $request->shipping_plan,
                "shipping_actual" => $request->shipping_actual,
                "merchant_id" => $user_id,
            ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Merchant Order Information Updated Successfully !!!'
            ]
        );
    }
    public function merchant_order_info_edit($id)
    {
        $data = DB::table('tbl_order')
            ->select('*')
            ->where('id', $id)
            ->first();
        return response()->json($data);
    }
    public function merchant_order_info_update($id, Request $request)
    {
        $user_id = auth('sanctum')->user()->id;
        DB::table('tbl_order')
            ->where('id', $id)
            ->update([
                "fit_sample_plan" => $request->fit_sample_plan,
                "fit_sample_actual" => $request->fit_sample_actual,
                "pp_sample_plan" => $request->pp_sample_plan,
                "pp_sample_actual" => $request->pp_sample_actual,
                "shipping_plan" => $request->shipping_plan,
                "shipping_actual" => $request->shipping_actual,
            ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Fabric Order Information Updated Successfully !!!'
            ]
        );
    }

    // {{ ============= Production Departmant Section ===================== }}
    public function production_order_list()
    {
        $user_id = auth('sanctum')->user()->id;
        $data = DB::table('tbl_order')
            ->join('tbl_buyer','tbl_buyer.id', '=', 'tbl_order.buyer')
            ->select('tbl_order.*','tbl_buyer.buyer_name')
            ->get()
            ->toArray();
        return array_reverse($data);
    }
    public function production_order_info_form($id)
    {
        $data = DB::table('tbl_order')
            ->select('*')
            ->where('id', $id)
            ->first();
        return response()->json($data);
    }
    public function production_order_info_store($id, Request $request)
    {
        $user_id = auth('sanctum')->user()->id;
        DB::table('tbl_order')
            ->where('id', $id)
            ->update([
                "swing_start" => $request->swing_start,
                "swing_finish" => $request->swing_finish,
                "wash_start" => $request->wash_start,
                "wash_finish" => $request->wash_finish,
                "swing_input_plan" => $request->swing_input_plan,
                "swing_input_actual" => $request->swing_input_actual,
                "bulk_wash_plan" => $request->bulk_wash_plan,
                "bulk_wash_actual" => $request->bulk_wash_actual,
                "packing_start_plan" => $request->packing_start_plan,
                "packing_start_actual" => $request->packing_start_actual,
                "final_inspection_plan" => $request->final_inspection_plan,
                "final_inspection_actual" => $request->final_inspection_actual,
                "ex_fty_plan" => $request->ex_fty_plan,
                "ex_fty_actual" => $request->ex_fty_actual,
                "ship_qty" => $request->ship_qty,
                "production_remarks" => $request->production_remarks,
                "production_id" => $user_id,
            ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Production Order Information Updated Successfully !!!'
            ]
        );
    }
    public function production_order_info_edit($id)
    {
        $data = DB::table('tbl_order')
            ->select('*')
            ->where('id', $id)
            ->first();
        return response()->json($data);
    }
    public function production_order_info_update($id, Request $request)
    {
        $user_id = auth('sanctum')->user()->id;
        DB::table('tbl_order')
            ->where('id', $id)
            ->update([
                "swing_start" => $request->swing_start,
                "swing_finish" => $request->swing_finish,
                "wash_start" => $request->wash_start,
                "wash_finish" => $request->wash_finish,
                "swing_input_plan" => $request->swing_input_plan,
                "swing_input_actual" => $request->swing_input_actual,
                "bulk_wash_plan" => $request->bulk_wash_plan,
                "bulk_wash_actual" => $request->bulk_wash_actual,
                "packing_start_plan" => $request->packing_start_plan,
                "packing_start_actual" => $request->packing_start_actual,
                "final_inspection_plan" => $request->final_inspection_plan,
                "final_inspection_actual" => $request->final_inspection_actual,
                "ex_fty_plan" => $request->ex_fty_plan,
                "ex_fty_actual" => $request->ex_fty_actual,
                "ship_qty" => $request->ship_qty,
                "production_remarks" => $request->production_remarks,
            ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Production Order Information Updated Successfully !!!'
            ]
        );
    }

    // {{ ============= Report Section ===================== }}
    public function admin_report()
    {
        $data = DB::table('tbl_order')
            ->join('tbl_buyer','tbl_buyer.id', '=', 'tbl_order.buyer')
            ->select('tbl_order.*','tbl_buyer.buyer_name')
            ->get()
            ->toArray();
        return array_reverse($data);
    }
}
