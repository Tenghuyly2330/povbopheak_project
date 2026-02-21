<?php

namespace App\Http\Controllers\backend;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::orderBy('created_at', 'ASC')->get();
        return view('backend.projects.view-project', compact('projects'));
    }

    public function create()
    {
        return view('backend.projects.add-project');
    }

    public function store(Request $request)
    {
        $categories = $request->category_json ? json_decode($request->category_json, true) : [];

        foreach ($categories as $cIndex => &$cat) {

            /* ============ CATEGORY BANNER ============ */
            if ($request->hasFile("category.$cIndex.banner_cate")) {

                // delete old banner if exists
                if (!empty($cat['banner_cate']) && Storage::disk('public')->exists($cat['banner_cate'])) {
                    Storage::disk('public')->delete($cat['banner_cate']);
                }

                $cat['banner_cate'] = $request
                    ->file("category.$cIndex.banner_cate")
                    ->store('projects/category_banners', 'public');
            }

            foreach ($cat['cat_type'] as $tIndex => &$type) {

                /* ============ TYPE BANNER ============ */
                if ($request->hasFile("category.$cIndex.cat_type.$tIndex.banner_type")) {

                    // delete old banner if exists
                    if (!empty($type['banner_type']) && Storage::disk('public')->exists($type['banner_type'])) {
                        Storage::disk('public')->delete($type['banner_type']);
                    }

                    $type['banner_type'] = $request
                        ->file("category.$cIndex.cat_type.$tIndex.banner_type")
                        ->store('projects/type_banners', 'public');
                }

                /* ============ TYPE IMAGES ============ */
                if ($request->hasFile("category.$cIndex.cat_type.$tIndex.img")) {

                    if (!empty($type['img'])) {
                        foreach ($type['img'] as $oldImg) {
                            if (Storage::disk('public')->exists($oldImg)) {
                                Storage::disk('public')->delete($oldImg);
                            }
                        }
                    }

                    $newImages = [];
                    foreach ($request->file("category.$cIndex.cat_type.$tIndex.img") as $file) {
                        $newImages[] = $file->store('projects', 'public');
                    }

                    $type['img'] = $newImages;
                }
            }
        }
        $request->validate([
            'category.*.banner_cate' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'category.*.cat_type.*.banner_type' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $pdfPath = null;
        if ($request->hasFile('pdf')) {
            $request->validate([
                'pdf' => 'mimes:pdf|max:204800',
            ]);

            $pdfPath = $request->file('pdf')->store('projects/pdf', 'public');
        }

        $mainImageBanner = null;
        if ($request->hasFile('banner')) {
            $request->validate([
                'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480', // max 10MB
            ]);

            $mainImageBanner = $request->file('banner')->store('projects/banners', 'public');
        }

        $mainImagePath = null;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240', // max 10MB
            ]);

            $mainImagePath = $request->file('image')->store('projects/images', 'public');
        }

        $imagePaths = [];

        if ($request->hasFile('image_default')) {
            $request->validate([
                'image_default.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240', // max 10MB
            ]);

            foreach ($request->file('image_default') as $file) {
                $imagePaths[] = $file->store('projects/images_default', 'public');
            }
        }

        Project::create([
            'name_en' => $request->name_en,
            'name_kh' => $request->name_kh,
            'name_ch' => $request->name_ch,
            'slug' =>  Str::slug($request->name_en),
            'type_en' => $request->type_en,
            'type_kh' => $request->type_kh,
            'type_ch' => $request->type_ch,
            'category' => $categories,
            'locate_text_en' => $request->locate_text_en,
            'locate_text_kh' => $request->locate_text_kh,
            'locate_text_ch' => $request->locate_text_ch,
            'locate_link' => $request->locate_link,
            'pdf' => $pdfPath,
            'banner' => $mainImageBanner,
            'image' => $mainImagePath, // <-- new field
            'image_default' => json_encode($imagePaths),
            'description_default_en' => $request->description_default_en,
            'description_default_kh' => $request->description_default_kh,
            'description_default_cn' => $request->description_default_cn,
        ]);

        return redirect()->route('project.index')->with('success', 'Project saved successfully');
    }

    public function edit($id, Request $request)
    {
        // dd($request->all(), $request->file('image'));

        $project = Project::findOrFail($id);
        return view('backend.projects.update-project', compact('project'));
    }

    // Update project
public function update(Request $request, Project $project)
{
    $request->validate([
        'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        'pdf' => 'nullable|mimes:pdf|max:204800',
        'image_default.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
    ]);

    $categories = $request->category_json
        ? json_decode($request->category_json, true)
        : [];

    $oldCategories = $project->category ?? [];

    foreach ($categories as $cIndex => &$cat) {

        // KEEP OLD BANNER IF NOT UPLOADED
        $cat['banner_cate'] = $oldCategories[$cIndex]['banner_cate'] ?? null;

        if ($request->hasFile("category.$cIndex.banner_cate")) {

            if (!empty($cat['banner_cate'])) {
                Storage::disk('public')->delete($cat['banner_cate']);
            }

            $cat['banner_cate'] = $request
                ->file("category.$cIndex.banner_cate")
                ->store('projects/category_banners', 'public');
        }

        foreach ($cat['cat_type'] as $tIndex => &$type) {

            $type['banner_type'] = $oldCategories[$cIndex]['cat_type'][$tIndex]['banner_type'] ?? null;
            $type['img'] = $oldCategories[$cIndex]['cat_type'][$tIndex]['img'] ?? [];

            // TYPE BANNER
            if ($request->hasFile("category.$cIndex.cat_type.$tIndex.banner_type")) {

                if (!empty($type['banner_type'])) {
                    Storage::disk('public')->delete($type['banner_type']);
                }

                $type['banner_type'] = $request
                    ->file("category.$cIndex.cat_type.$tIndex.banner_type")
                    ->store('projects/type_banners', 'public');
            }

            // TYPE IMAGES
            if ($request->hasFile("category.$cIndex.cat_type.$tIndex.img")) {

                // delete old images
                foreach ($type['img'] as $oldImg) {
                    Storage::disk('public')->delete($oldImg);
                }

                $newImages = [];

                foreach ($request->file("category.$cIndex.cat_type.$tIndex.img") as $file) {
                    $newImages[] = $file->store('projects/type_images', 'public');
                }

                $type['img'] = $newImages;
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | PDF
    |--------------------------------------------------------------------------
    */

    $pdfPath = $project->pdf;

    if ($request->hasFile('pdf')) {

        if ($pdfPath) {
            Storage::disk('public')->delete($pdfPath);
        }

        $pdfPath = $request->file('pdf')->store('projects/pdf', 'public');
    }

    /*
    |--------------------------------------------------------------------------
    | Banner
    |--------------------------------------------------------------------------
    */

    $bannerPath = $project->banner;

    if ($request->hasFile('banner')) {

        if ($bannerPath) {
            Storage::disk('public')->delete($bannerPath);
        }

        $bannerPath = $request->file('banner')->store('projects/banners', 'public');
    }

    /*
    |--------------------------------------------------------------------------
    | Main Image
    |--------------------------------------------------------------------------
    */

    $mainImagePath = $project->image;

    if ($request->hasFile('image')) {

        if ($mainImagePath) {
            Storage::disk('public')->delete($mainImagePath);
        }

        $mainImagePath = $request->file('image')->store('projects/images', 'public');
    }

    /*
    |--------------------------------------------------------------------------
    | Default Images
    |--------------------------------------------------------------------------
    */

    $defaultImages = json_decode($project->image_default, true) ?? [];

    if ($request->filled('removed_images')) {
        foreach (json_decode($request->removed_images, true) as $img) {
            Storage::disk('public')->delete($img);
            $defaultImages = array_values(array_diff($defaultImages, [$img]));
        }
    }

    if ($request->hasFile('image_default')) {
        foreach ($request->file('image_default') as $file) {
            $defaultImages[] = $file->store('projects/images_default', 'public');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Project
    |--------------------------------------------------------------------------
    */

    $project->update([
        'name_en' => $request->name_en,
        'name_kh' => $request->name_kh,
        'name_ch' => $request->name_ch,
        'slug' => Str::slug($request->name_en),
        'type_en' => $request->type_en,
        'type_kh' => $request->type_kh,
        'type_ch' => $request->type_ch,
        'category' => $categories,
        'locate_text_en' => $request->locate_text_en,
        'locate_text_kh' => $request->locate_text_kh,
        'locate_text_ch' => $request->locate_text_ch,
        'locate_link' => $request->locate_link,
        'pdf' => $pdfPath,
        'banner' => $bannerPath,
        'image' => $mainImagePath,
        'image_default' => json_encode($defaultImages),
        'description_default_en' => $request->description_default_en,
        'description_default_kh' => $request->description_default_kh,
        'description_default_cn' => $request->description_default_cn,
    ]);

    return redirect()->route('project.index')
        ->with('success', 'Project updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Project::findOrFail($id)->delete();

        return redirect()
            ->route('project.index')
            ->with('success', 'Project deleted successfully');
    }
}
