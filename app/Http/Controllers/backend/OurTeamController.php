<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OurTeamController extends Controller
{
     /*==========================================================
                            @@ Our Team
    ==========================================================*/
    public function addOurTeam(){
        return view("backend.our-team.add-team");
    }
    public function viewOurTeam(){
        $row = DB::table("our_team")->orderBy('order')->get();
        return view("backend.our-team.view-team", ["row"=> $row]);
    }
    public function submitAddOurTeam(Request $request){
        // Validation
        $request->validate([
            'order'          => 'nullable',
            'name_en'        => 'required|string|max:255',
            'position_en'    => 'required|string|max:255',

            'name_kh'        => 'nullable|string|max:255',
            'position_kh'    => 'nullable|string|max:255',

            'name_cn'        => 'nullable|string|max:255',
            'position_cn'    => 'nullable|string|max:255',
            'profile' => 'required|image|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        $order = DB::table('our_team')->max('order') + 1;
        $name_en = $request->input("name_en");
        $position_en = $request->input("position_en");

        $name_kh = $request->input("name_kh");
        $position_kh = $request->input("position_kh");

        $name_cn = $request->input("name_cn");
        $position_cn = $request->input("position_cn");

        $profile = $request->file("profile");

        $path = './assets/team';
        $image = time().'-'.$profile->getClientOriginalName();
        $profile->move($path, $image);

        $result = DB::table('our_team')->insert([
            'name_en'=> $name_en,
            'position_en'=> $position_en,

            'name_kh'=> $name_kh,
            'position_kh'=> $position_kh,

            'name_cn'=> $name_cn,
            'position_cn'=> $position_cn,
            'order' => $order,
            'profile'=> $image,
        ]);

        if($result){
            return redirect()->route('view_team')->with('success','created sucess');
        }
    }
     public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            DB::table('our_team')->where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }
    // update team
    public function updateTeam($id){
        $row = DB::table('our_team')->where('id', $id)->get();
        return view('backend.our-team.update-team', ['row'=> $row]);
    }
    public function submitToUpdateTeam(Request $request){
        
        // $request->validate([
        //     'update_name'        => 'required|string|max:255',
        //     'update_position'    => 'required|string|max:255',
        //     'update_description' => 'required|string',
        //     'old_profile' => 'required|image|mimes:jpg,jpeg,png,gif|max:10240',
        //     'update_profile' => 'required|image|mimes:jpg,jpeg,png,gif|max:10240',
        // ]);


        $update_id = $request->input('update_id');

        $update_name_en = $request->input('update_name_en');
        $update_position_en = $request->input('update_position_en');

        $update_name_kh = $request->input('update_name_kh');
        $update_position_kh = $request->input('update_position_kh');

        $update_name_cn = $request->input('update_name_cn');
        $update_position_cn = $request->input('update_position_cn');

        $update_profile = $request->file('update_profile');
        $old_profile = $request->input('old_profile');

        $path = './assets/team';
        if( $update_profile ){
            $image = time().'-'. $update_profile->getClientOriginalName();
            $update_profile->move($path, $image);
        }elseif($old_profile){
            $image = $old_profile;
        }

        $result = DB::table('our_team')->where('id', $update_id)->update([
            'name_en'=> $update_name_en,
            'position_en'=> $update_position_en,

            'name_kh'=> $update_name_kh,
            'position_kh'=> $update_position_kh,

            'name_cn'=> $update_name_cn,
            'position_cn'=> $update_position_cn,
            'profile'=> $image
        ]);
        if($result){
            return redirect()->route('view_team')->with('success','updated sucess');
        }
    }
    public function submitToRemoveTeam(Request $request){
         $remove_id = $request->input('remove_id');

        $result = DB::table('our_team')->where('id', $remove_id)->delete();

        if($result){
            return redirect()->route('view_team')->with('success','delated success');
        }
    }
}
