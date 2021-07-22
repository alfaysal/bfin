<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Section;
use DataTables;


class SectionController extends Controller
{
    public function index()
    {
        return view('back-end.section.index');
    }

    public function sectionSave(Request $request)
    {
        $section = new Section();
        
        $this->SaveSectionInfo($section,$request);

        return response()->json(['success'  =>  True]);
    }

    public function SaveSectionInfo($section,$request)
    {
        $section->name = $request->name;
        $section->save();
    }

    public function sectionData()
    {
        $sections = Section::all();

         return DataTables::of($sections)
                            ->addColumn('action',function($row){
                                return "<a href='#' class='btn btn-sm btn-primary' id='edit_sections' data-id='".$row->id."'>edit</a>
                                <a href='#' class='btn btn-sm btn-danger' id='delete_sections' data-id='".$row->id."'>delte</a>";
                            })
                            ->make(true);
        
    }

    public function sectionEdit(Request $request)
    {
        $section = Section::find($request->id);

        return $section;

    }

    public function sectionUpdate(Request $request)
    {
        $section = Section::find($request->id);

        $this->SaveSectionInfo($section,$request);

        return response()->json(['success'  =>  True]);

    }

    public function sectionDelete(Request $request)
    {
        $section = Section::find($request->id);

        $section->delete();

        return response()->json(['success'  =>  True]);
        
    }
}
