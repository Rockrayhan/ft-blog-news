<?php

namespace App\Http\Controllers;

use App\Models\TopbarBanner;
use Illuminate\Http\Request;

class TopbarBannerController extends Controller
{
    public function index()
    {
        $banners = TopbarBanner::all(); // Fetch all banners from the database
        return view('admin.topbar-banner.index', compact('banners')); // Pass the banners to the view
    }

    public function create()
    {
        return view('admin.topbar-banner.create'); // Show form to create a new banner
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'string|nullable',
            'is_active' => 'required|boolean',
        ]);

        // Check if there's already an active banner
        if ($request->is_active) {
            $existingBanner = TopbarBanner::where('is_active', 1)->first();

            // If there's an active banner, deactivate it first
            if ($existingBanner) {
                $existingBanner->is_active = 0;
                $existingBanner->save();
            }
        }

        // Handle image upload
        $filename = null;
        if ($request->hasFile('image')) {
            $extension = strtolower($request->image->extension());
            $filename = time() . '.' . $extension;
            $request->image->move(public_path('uploads/banners'), $filename);
        }

        // Prepare data for saving
        $data = [
            'image' => $filename,
            'link' => $request->link,
            'is_active' => $request->is_active,
        ];

        // Create a new banner
        TopbarBanner::create($data);

        return redirect()->route('topbar-banner.index')->with('success', 'Banner created successfully.');
    }



    public function edit($id)
    {
        $banner = TopbarBanner::findOrFail($id); // Find the banner by ID
        return view('admin.topbar-banner.edit', compact('banner')); // Pass banner to the edit view
    }





    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image is optional for update
            'link' => 'string|nullable',
            'is_active' => 'required|boolean',
        ]);
    
        // Find the banner by ID
        $banner = TopbarBanner::findOrFail($id);
    
        // Check if the banner is being set as active
        if ($request->is_active) {
            // Deactivate the previous active banner if there's any
            $existingBanner = TopbarBanner::where('is_active', 1)->first();
            if ($existingBanner && $existingBanner->id !== $banner->id) {
                $existingBanner->is_active = 0;
                $existingBanner->save();
            }
        }
    
        // Handle image upload (only if there's a new image)
        $filename = $banner->image; // Retain existing image if not updating
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($filename) {
                $oldImagePath = public_path('uploads/banners/' . $filename);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
    
            // Upload the new image
            $extension = strtolower($request->image->extension());
            $filename = time() . '.' . $extension;
            $request->image->move(public_path('uploads/banners'), $filename);
        }
    
        // Update the banner
        $banner->update([
            'image' => $filename, // Retain old image if no new image is uploaded
            'link' => $request->link,
            'is_active' => $request->is_active,
        ]);
    
        return redirect()->route('topbar-banner.index')->with('success', 'Banner updated successfully.');
    }
    



    public function destroy($id)
    {
        $banner = TopbarBanner::findOrFail($id); // Find the banner by ID

        // Check if the banner has an image and delete it if it exists
        if ($banner->image_path) {
            $imagePath = public_path('uploads/banners/' . $banner->image_path); // Get the full path of the image

            // Delete the banner image if it exists
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }
        }

        // Delete the banner record from the database
        $banner->delete();

        return redirect()->route('topbar-banner.index')->with('success', 'Banner deleted successfully');
    }
}
