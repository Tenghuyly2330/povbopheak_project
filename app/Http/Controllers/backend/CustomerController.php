<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();

        return view('backend.customer.view-customer', compact('customers'));
    }

    public function create()
    {
        return view('backend.customer.add-customer');
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $images = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $name = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('assets/customer'), $name);
                $images[] = 'assets/customer/'.$name;
            }
        }

        Customer::create([
            'images' => $images,
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer created successfully');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('backend.customer.update-customer', compact('customer'));
    }

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $request->validate([
            'edit_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $customer = Customer::findOrFail($id);

        // Get the list of old images that the user wants to keep
        $keepImages = $request->input('keep_old_images', []); // array of paths

        // Delete removed old images from storage
        $oldImages = $customer->images ?? [];
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
                $file->move(public_path('assets/customer'), $name);
                $newImages[] = 'assets/customer/'.$name;
            }
        }

        // Update customer images as JSON
        $customer->update([
            'images' => $newImages,
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully');
    }

    // ================= DELETE =================
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        if ($customer->images) {
            foreach ($customer->images as $image) {
                if (File::exists(public_path($image))) {
                    File::delete(public_path($image));
                }
            }
        }

        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully');
    }

    // ================= DELETE SINGLE IMAGE =================
    public function deleteImage($id, $index)
    {
        $customer = Customer::findOrFail($id);
        $images = $customer->images;

        if (isset($images[$index])) {
            if (File::exists(public_path($images[$index]))) {
                File::delete(public_path($images[$index]));
            }

            unset($images[$index]);
            $customer->update(['images' => array_values($images)]);
        }

        return back()->with('success', 'Image removed successfully');
    }
}
