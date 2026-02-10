<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
     /*==========================================================
                            @@ Our Team
    ==========================================================*/
    public function addAbout(){
        return view("backend.about-us.add-about");
    }
    public function viewAbout(){
        $row = DB::table("about_us")->get();
        return view("backend.about-us.view-about", ["row"=> $row]);
    }
    public function submitAddAbout(Request $request){
        // Validation
        $request->validate([
            'title_en'        => 'required|string|max:255',
            'description_en'    => 'required|string',

            'title_kh'        => 'nullable|string|max:255',
            'description_kh'    => 'nullable|string',

             'title_cn'        => 'nullable|string|max:255',
            'description_cn'    => 'nullable|string',
        
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        $title_en = $request->input("title_en");
        $description_en = $request->input("description_en");

        $title_kh = $request->input("title_kh");
        $description_kh = $request->input("description_kh");

        $title_cn = $request->input("title_cn");
        $description_cn = $request->input("description_cn");

        $image = $request->file("image");

        $path = './assets/about_us';
        $img = time().'-'.$image->getClientOriginalName();
        $image->move($path, $img);

        $result = DB::table('about_us')->insert([
            'title_en'=> $title_en,
            'description_en'=> $description_en,
            
            'title_kh'=> $title_kh,
            'description_kh'=> $description_kh,

            'title_cn'=> $title_cn,
            'description_cn'=> $description_cn,
            'image'=> $img,
        ]);

        if($result){
            return redirect()->route('view_about')->with('success','created sucess');
        }
    }
    // update team
    public function updateAbout($id){
        $row = DB::table('about_us')->where('id', $id)->get();
        return view('backend.about-us.update-about', ['row'=> $row]);
    }
    public function submitToUpdateAbout(Request $request)
{
    $request->validate([
        'update_title_en'       => 'required|string|max:255',
        'update_description_en' => 'required|string',

        'update_title_kh'       => 'nullable|string|max:255',
        'update_description_kh' => 'nullable|string',

        'update_title_cn'       => 'nullable|string|max:255',
        'update_description_cn' => 'nullable|string',

        'update_image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $update_id = $request->update_id;
    $old_image = $request->old_image;

    $img = $old_image;

    if ($request->hasFile('update_image')) {
        $img = time() . '-' . $request->file('update_image')->getClientOriginalName();
        $request->file('update_image')->move(public_path('assets/about_us'), $img);
    }

    DB::table('about_us')->where('id', $update_id)->update([
        'title_en'       => $request->update_title_en,
        'description_en' => $request->update_description_en,

        'title_kh'       => $request->update_title_kh,
        'description_kh' => $request->update_description_kh,

        'title_cn'       => $request->update_title_cn,
        'description_cn' => $request->update_description_cn,

        'image'          => $img,
    ]);

    return redirect()->route('view_about')->with('success', 'Updated successfully!');
}


    public function submitToRemoveAbout(Request $request){
         $remove_id = $request->input('remove_id');

        $result = DB::table('about_us')->where('id', $remove_id)->delete();

        if($result){
            return redirect()->route('view_about')->with('success','delated success');
        }
    }
}
