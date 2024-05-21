<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Posts;
use Illuminate\Http\Request;
use Mail;
//use Illuminate\Support\Facades\DB;
//use DataTables;
use DB;
use DataTables;
class SampleController extends Controller
{
    public function pending_requisition(){
        $data = DB::table('tbl_requisition')
            ->join('tbl_emp','tbl_emp.EmployeeCode','=','tbl_requisition.r_req_prs_id')
            ->select('tbl_requisition.*','tbl_emp.Name')
            ->where('tbl_requisition.accept_approve', '0')
            ->where('tbl_requisition.hold_approve', '0')
            ->where('tbl_requisition.reject_approve', '0')
            ->get()
            ->toArray();
        return array_reverse($data);
    }
    public function all_requisition(){
        $data = DB::table('tbl_requisition')
            ->join('tbl_emp','tbl_emp.EmployeeCode','=','tbl_requisition.r_req_prs_id')
            ->select('tbl_requisition.*','tbl_emp.Name')
            ->get()
            ->toArray();
//        dd($data);
        return array_reverse($data);
    }
    public function requisition_store(Request $request)
    {
        error_reporting(0);
        auth('sanctum')->user()->name;

        $last_id     = DB::table('tbl_requisition')->select('id')->orderBy('id', 'desc')->first();
        $tracking_no = $last_id->id + 1;

        DB::table('tbl_requisition')->insert([
            "tracking_no"            => $tracking_no,
            "buyer"                  => $request->data['buyer'],
            "style"                  => $request->data['style'],
            "item_desc"              => $request->data['item_desc'],
            "fabric"                 => $request->data['fabric'],
            "req_fab_qty"            => $request->data['req_fab_qty'],
            "fab_hand_date"          => $request->data['fab_hand_date'],
            "org_sample"             => $request->data['org_sample'],
            "tech_park"              => $request->data['tech_park'],
            "type_of_sample"         => $request->data['type_of_sample'],
            "sample_size"            => $request->data['sample_size'],
            "sample_qty"             => $request->data['sample_qty'],
            "sample_req_date"        => $request->data['sample_req_date'],
            "sewing_thread"          => $request->data['sewing_thread'],
            "req_thread_count"       => $request->data['req_thread_count'],
            "req_thread_qty"         => $request->data['req_thread_qty'],
            "thread_handover_date"   => $request->data['thread_handover_date'],
            "main_label"             => $request->data['main_label'],
            "size_label"             => $request->data['size_label'],
            "care_label"             => $request->data['care_label'],
            "interlining"            => $request->data['interlining'],
            "zipper"                 => $request->data['zipper'],
            "button"                 => $request->data['button'],
            "twill_tape"             => $request->data['twill_tape'],
            "elastic"                => $request->data['elastic'],
            "hangtag"                => $request->data['hangtag'],
            "stickers"               => $request->data['stickers'],
            "fab_shrinkage"          => $request->data['fab_shrinkage'],
            "wash_type"              => $request->data['wash_type'],
            "sewing_type"            => $request->data['sewing_type'],
            "pocketing"              => $request->data['pocketing'],
            "sample_sub_date"        => $request->data['sample_sub_date'],
            "accept_approve"         => "0",
            "hold_approve"           => "0",
            "reject_approve"         => "0",
        ]);

        foreach ($request->data as $value) {
            foreach ($value as $key => $row) {
                DB::table('tbl_requisition_add_more_one')->insert([
                    "tracking_no"  => $tracking_no,
                    "color"        => $row['color'],
                    "size"         => $row['size'],
                    "type"         => $row['type'],
                    "qty"          => $row['qty'],
                ]);
            }
        }

        foreach ($request->data as $value) {
            foreach ($value as $key => $row) {
                DB::table('tbl_requisition_add_more_two')->insert([
                    "tracking_no"    => $tracking_no,
                    "submitted_to"   => $row['submitted_to'],
                    "pcs"            => $row['pcs'],
                ]);
            }
        }

        DB::table('tbl_requisition_add_more_one')->where('size', '=', null)->delete();
        DB::table('tbl_requisition_add_more_two')->where('submitted_to', '=', null)->delete();

        return response()->json(['success' => 'Post created successfully']);
    }
    public function buyer_list(){
        $data = DB::table('tbl_buyer')
            ->select('*')
            ->get()
            ->toArray();
        return array_reverse($data);

//        $data = DB::table('tbl_buyer')->select('*')->get()->toArray();;
//        return array_reverse($data);
    }

//    public function buyer_list(Request $request)
//    {
//        if ($request->ajax()) {
//            $data = DB::table('ocl_gatepass')
//                ->select('*')
//                ->get();
//            return Datatables::of($data)
//                ->addIndexColumn()
//                ->addColumn('action', function ($row) {
//                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="add_grn" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> GRN Add</a>';
//                    return $btn;
//                })
//                ->rawColumns(['action'])
//                ->make(true);
//        }
//    }

    public function buyer_save(Request $request)
    {
//        $mailData = [
//            'title' => 'Mail from ItSolutionStuff.com',
//            'body' => 'This is for testing email using smtp.'
//        ];
//        try {
//            Mail::to('zahidsajeeb100@gmail.com')->send(new SendMail($mailData));
//        }
//        catch (Exception $e) {
//            echo 'Error - ' . $e;
//        }

        $request->validate([
            'buyer_name' => 'required',
        ]);
        DB::table('tbl_buyer')->insert([
            "buyer_name" => $request->buyer_name,
        ]);
        return response()->json(['success'=> 'Buyer Save Successfully']);

    }
    public function buyer_edit($id)
    {
        $data = DB::table('tbl_buyer')
            ->select('*')
            ->where('id', $id)
            ->first();
        return response()->json($data);
    }
    public function buyer_update($id, Request $request)
    {
        DB::table('tbl_buyer')
            ->where('id', $id)
            ->update([
                "buyer_name" => $request->buyer_name,
            ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Branch Updated Successfully'
            ]
        );
    }
    public function buyer_delete($id)
    {
        DB::table('tbl_buyer')->where('id', '=', $id)->delete();
        return response()->json(['success'=> 'Buyer deleted successfully']);

    }

    public function approval($id)
    {
        $data = DB::table('tbl_requisition')
            ->select('*')
            ->where('id', $id)
            ->get()
            ->toArray();
        return array_reverse($data);
    }
    public function approve($id)
    {
        DB::table('tbl_requisition')
            ->where('id', $id)
            ->update([
                "accept_approve" => "1",
            ]);
        return response()->json(['success'=> 'Buyer deleted successfully']);
    }
    public function add_pattern_date(Request $request, $id)
    {
        DB::table('tbl_requisition')
            ->where('id', $id)
            ->update([
                "sample_pattern_date" => $request->sample_pattern_date,
            ]);
        return response()->json(['success'=> 'Buyer deleted successfully']);
    }
    public function add_submission_date(Request $request, $id)
    {
        DB::table('tbl_requisition')
            ->where('id', $id)
            ->update([
                "sample_sub_date_cadman" => $request->sample_sub_date_cadman,
            ]);
        return response()->json(['success'=> 'Buyer deleted successfully']);
    }

    public function change_status(Request $request, $id)
    {
//        dd($id);
        DB::table('tbl_requisition')
            ->where('id', $id)
            ->update([
                "sample_status_date" => $request->sample_status_date,
                "sample_done_qty"    => $request->sample_done_qty,
            ]);
        return response()->json(['success'=> 'Buyer deleted successfully']);
    }

    public function sample_add_more_one_list(){
        $data = DB::table('tbl_requisition_add_more_one')
            ->select('*')
            ->get()
            ->toArray();
        return array_reverse($data);
    }
    public function sample_add_more_two_list(){
        $data = DB::table('tbl_requisition_add_more_two')
            ->select('*')
            ->get()
            ->toArray();
        return array_reverse($data);
    }

    public function item_delete($id)
    {
        error_reporting(0);
        DB::table('ocl_gatepass_send_item')->where('id', '=', $id)->delete();
        $notification = array(
            'message' => 'Item Delete Successfully!',
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }

//    public function pending_requisition(){
//        $data = DB::table('ocl_gatepass')
//            ->select('*')
//            ->get()
//            ->toArray();
//        return array_reverse($data);
//    }
}
