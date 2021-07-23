<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Admin;
use DataTables;

class AdminController extends Controller
{
    public function CreateAdmin()
    {
        return view('back-end.admin.index');
    }

    public function StoreAdmin(Request $request)
    {
        $admin = new Admin();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->is_super = $request->is_super;

        $admin->save();

        return response()->json(['success'=>True]);

    }

     public function getAdminData()
    {
        $admins = Admin::all();

         return DataTables::of($admins)
                            ->addColumn('is_super',function($row){
                                if($row->is_super == 0){
                                    return 'Yes';
                                }else{
                                    return 'No';
                                }
                            })
                            ->addColumn('action',function($row){
                                return "<a href='#' class='btn btn-sm btn-primary' id='edit_admin' data-id='".$row->id."'>edit</a>
                                <a href='#' class='btn btn-sm btn-danger' id='delete_admin' data-id='".$row->id."'>delete</a>";
                            })
                            ->make(true);
    }

    public function EditAdmin(Request $request)
    {
        $admin = Admin::find($request->id);

        return $admin;
    }

    public function UpdateAdmin(Request $request)
    {
        $admin = Admin::find($request->id);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->is_super = $request->is_super;
        $admin->save();

        return response()->json(['success'=>True]);

    }

    public function DeleteAdmin(Request $request)
    {
        $admin = Admin::find($request->id);

        $admin->delete();

        return response()->json(['success'=>True]);
        
    }
}
