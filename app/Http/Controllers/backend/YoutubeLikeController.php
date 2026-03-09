<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\LinkYoutube;
use Illuminate\Http\Request;

class YoutubeLikeController extends Controller
{
    public function index()
    {
        // FIX: Standardized variable name to $contactUs for clarity
        $link = LinkYoutube::all(); // Changed get() to all() - both work, but all() is often preferred for full retrieval.
        return view('backend.youtube.view-news', compact('link'));
    }

    public function create()
    {
        return view('backend.youtube.add-news');
    }

    public function store(Request $request)
{
    $request->validate([
        'link' => 'required|string',
    ]);

    // Save Data
    LinkYoutube::create([
        'link' => $request->link,
    ]);

    return redirect()->route('youtube.index')->with('success', 'Added successfully!');
}


    public function edit(LinkYoutube $youtube)
    {
        return view('backend.youtube.update-news', compact('youtube'));
    }

   public function update(Request $request, LinkYoutube $youtube)
{
    $request->validate([
        'link' => 'required|string',
    ]);
    //  Update text fields
    $youtube->update([
        'link' => $request->link,
    ]);

    return redirect()->route('youtube.index')->with('success', 'Updated successfully!');
}



    // FIX: Renamed the parameter variable to $contact for consistency with edit/update methods
    public function destroy(LinkYoutube $youtube)
    {
        $youtube->delete();
        return redirect()->route('youtube.index')->with('success', 'Deleted successfully!');
    }
}
