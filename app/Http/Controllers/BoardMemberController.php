<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardMemberModel;

class BoardMemberController extends Controller
{
    // Board Member Function start
        public function View(Request $request){
            $memberData = BoardMemberModel::all();
            return view("admin.board-member.index",compact('memberData'));
        }
        public function Add(){
            return view("admin.board-member.add");
        }
        public function AddProcess(Request $request){
            $data = $request->all();
            if ($request->file("image") != null) {
                $path = $request->file("image")->store("BoardMember_Images");
                $data["image"] = $path;
            }
            $data['social_sites'] = implode('@',$request->social);
            $data['social_link'] = implode('@',$request->link);
            $member = new BoardMemberModel;
            $member->fill($data);
            $member->save();
            $success = "Your Data has Saved successfully.";
            $request->session()->put("success",$success);
            return back();
        }
        public function Delete(Request $request,$id){
            $data = BoardMemberModel::find($id);
            $data->delete();
            $danger = "Your Data has been Delete successfully.";
            $request->session()->put("danger",$danger);
            return back();
        }
        public function Edit(Request $request,$id){
            $data = BoardMemberModel::find($id);
            return view('admin.board-member.edit',compact('data'));
        }
        public function EditProcess(Request $request,$id){
            $data = $request->all();
            if ($request->file("image") != null) {
                $path = $request->file("image")->store("BoardMember_Images");
                $data["image"] = $path;
            }
            $data['social_sites'] = implode('@',$request->social);
            $data['social_link'] = implode('@',$request->link);
            $member = BoardMemberModel::find($id);
            $member->fill($data);
            $member->save();
            $success = "Your Data has been Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
    // Board Member Function end
}
