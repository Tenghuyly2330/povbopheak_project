<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\NewsLatest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class NewslatestController extends Controller
{
     public function index()
    {
        $newslatests = NewsLatest::orderBy('created_at', 'ASC')->get();

        return view('backend.news.view-news', compact('newslatests'));
    }

    public function create()
    {
        return view('backend.news.add-news');
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        $request->validate([
            'title_en'        => 'required|string|max:255',
            'description_en'    => 'required|string',

            'title_kh'        => 'nullable|string|max:255',
            'description_kh'    => 'nullable|string',

            'title_cn'        => 'nullable|string|max:255',
            'description_cn'    => 'nullable|string',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $images = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $name = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('assets/newslatest'), $name);
                $images[] = 'assets/newslatest/'.$name;
            }
        }

        NewsLatest::create([
            'title_en'       => $request -> title_en,
            'description_en' => $request -> description_en,

            'title_kh'       => $request -> title_kh,
            'description_kh' => $request -> description_kh,

            'title_cn'       => $request -> title_cn,
            'description_cn' => $request -> description_cn,
            'images' => $images,
        ]);

        return redirect()->route('newslatest.index')->with('success', 'News created successfully');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $news = NewsLatest::findOrFail($id);

        return view('backend.news.update-news', compact('news'));
    }

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $request->validate([
            'title_en'        => 'required|string|max:255',
            'description_en'    => 'required|string',

            'title_kh'        => 'nullable|string|max:255',
            'description_kh'    => 'nullable|string',

            'title_cn'        => 'nullable|string|max:255',
            'description_cn'    => 'nullable|string',
            'edit_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $news = NewsLatest::findOrFail($id);

        // Get the list of old images that the user wants to keep
        $keepImages = $request->input('keep_old_images', []); // array of paths

        // Delete removed old images from storage
        $oldImages = $news->images ?? [];
        foreach ($oldImages as $oldImage) {
            if (! in_array($oldImage, $keepImages) && File::exists(public_path($oldImage))) {
                File::delete(public_path($oldImage));
            }
        }

        $newImages = $keepImages; // start with kept old images

        // Add newly uploaded images
        if ($request->hasFile('edit_images')) {
            foreach ($request->file('edit_images') as $file) {
                $name = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('assets/newslatest'), $name);
                $newImages[] = 'assets/newslatest/'.$name;
            }
        }

        // Update customer images as JSON
        $news->update([
            'title_en'       => $request -> title_en,
            'description_en' => $request -> description_en,

            'title_kh'       => $request -> title_kh,
            'description_kh' => $request -> description_kh,

            'title_cn'       => $request -> title_cn,
            'description_cn' => $request -> description_cn,
            'images' => $newImages,
        ]);

        return redirect()->route('newslatest.index')->with('success', 'News updated successfully');
    }

    // ================= DELETE =================
    public function destroy($id)
    {
        $news = NewsLatest::findOrFail($id);

        if ($news->images) {
            foreach ($news->images as $image) {
                if (File::exists(public_path($image))) {
                    File::delete(public_path($image));
                }
            }
        }

        $news->delete();

        return redirect()->route('newslatest.index')->with('success', 'news deleted successfully');
    }

    // ================= DELETE SINGLE IMAGE =================
    public function deleteImage($id, $index)
    {
        $news = NewsLatest::findOrFail($id);
        $images = $news->images;

        if (isset($images[$index])) {
            if (File::exists(public_path($images[$index]))) {
                File::delete(public_path($images[$index]));
            }

            unset($images[$index]);
            $news->update(['images' => array_values($images)]);
        }

        return back()->with('success', 'Image removed successfully');
    }
}
