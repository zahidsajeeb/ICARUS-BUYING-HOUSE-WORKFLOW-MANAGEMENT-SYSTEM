<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Posts;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use DB;
use DataTables;
class SettingsController extends Controller
{
//{{==============User Section==================}}
    public function user_list(){
        $data = DB::table('users')
            ->select('*')
            ->get()
            ->toArray();
        return array_reverse($data);
    }
    public function user_save(Request $request)
    {
        DB::table('users')->insert([
            "name" => $request->user_name,
            "user_name" => $request->user_name,
            "designation" => $request->designation,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "confirm_password" =>$request->password,
        ]);
        return response()->json(['success'=> 'User Save Successfully']);
    }
    public function user_edit($id)
    {
        $data = DB::table('users')
            ->select('*')
            ->where('id', $id)
            ->first();
        return response()->json($data);
    }
    public function user_update($id, Request $request)
    {
        if(isset($request->password) != NULL){
            DB::table('users')
                ->where('id', $id)
                ->update([
                    "user_name" => $request->user_name,
                    "email" => $request->email,
                    "designation" => $request->designation,
                    "password" => Hash::make($request->password),
                    "confirm_password" => $request->password,
                ]);
        }
        if(isset($request->password) == NULL){
            DB::table('users')
                ->where('id', $id)
                ->update([
                    "user_name" => $request->user_name,
                    "email" => $request->email,
                    "designation" => $request->designation,
                ]);
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'User Information Updated Successfully !!!'
            ]
        );
    }
    public function user_delete($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();
        return response()->json(['success'=> 'User deleted successfully']);
    }

//{{==============Role Section==================}}


    public function get_user_role(){
        $user_id = auth('sanctum')->user()->id;
        $data = DB::table('tbl_role')
            ->select('*')
            ->where('user_id',$user_id)
            ->first();
        return response()->json($data);
    }
    public function role_name_list(){
        $data = DB::table('tbl_role_name')
            ->select('*')
            ->get()
            ->toArray();
        return array_reverse($data);
    }
    public function role_list(){
        $data = DB::table('tbl_role')
            ->join('users','users.id','=','tbl_role.user_id')
            ->select('tbl_role.*','users.name')
            ->get()
            ->toArray();
        return array_reverse($data);
    }
    public function role_save(Request $request)
    {
        $input = $request->all();
        $emp_id = $input['user_id'];
        $filename = $input['role_name'];

        DB::table('tbl_role')->insert([
            "user_id" => $request->user_id,
            "role" => $request->role_name,
        ]);

//        foreach ($filename as $file) {
//            $file_data = array(
//                'role' => $file,
//                'user_id' => $emp_id,
//            );
//            DB::table('tbl_role')->insert($file_data);
//        }
        return response()->json(['success'=> 'Role Save Successfully']);
    }
    public function role_edit($id)
    {
        $data = DB::table('tbl_role')
            ->select('*')
            ->where('id', $id)
            ->first();
        return response()->json($data);
    }
    public function role_update($id, Request $request)
    {
        DB::table('tbl_role')
                ->where('id', $id)
                ->update([
                    "user_id" => $request->user_id,
                    "role" => $request->role,
                ]);


        return response()->json(
            [
                'success' => true,
                'message' => 'Role Updated Successfully !!!'
            ]
        );
    }
    public function role_delete($id)
    {
        DB::table('tbl_role')->where('id', '=', $id)->delete();
        return response()->json(['success'=> 'Role Deleted Successfully']);
    }
}
