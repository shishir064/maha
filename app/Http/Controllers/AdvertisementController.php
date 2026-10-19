<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\AvertisementRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertisements = Advertisement::paginate(5);
        return view('admin.advertisement.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('admin.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(AvertisementRequest $request)
    {
        $validated = $request->validated();

        // Store the banner image in storage/app/public/advertisements
        $validated['image'] = $request->file('image')
            ->store('advertisements-images', 'public');

        // No destination item is needed for a banner without a link.
        if ($validated['link_type'] === 'none') {
            $validated['link_id'] = null;
        }

        Advertisement::create($validated);

        return redirect()
            ->route('admin.advertisement.index')
            ->with('success', 'Advertisement created successfully.');
    }

public function items(string $type)
{
    $items = match ($type) {
        'product' => \App\Models\Product::select('id', 'name')
            ->orderBy('name')
            ->get(),

        'category' => \App\Models\Category::select('id', 'name')
            ->orderBy('name')
            ->get(),

        'brand' => \App\Models\Brand::select('id', 'name')
            ->orderBy('name')
            ->get(),

        default => null,
    };

    if ($items === null) {
        return response()->json([
            'message' => 'Invalid link type.',
        ], 422);
    }

    return response()->json($items);
}

    /**
     * Display the specified resource.
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $advertisement = Advertisement::find($id);
        return view('admin.advertisement.edit', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AvertisementRequest $request, $id)
    {
    $advertisement=Advertisement::find($id);

    $validated = $request->validated();
    $path=null;
    if($request->hasFile('image'))
    {
        $path=$request->file('image')->store('advertisements-images', 'public');
        if($advertisement->image)
        {
            Storage::disk('public')->delete($advertisement->image);
        };
    }
    $validated['image']=$path??$advertisement->image;
    $advertisement->update($validated);
    return redirect()
        ->route('admin.advertisement.index')
        ->with('success', 'Advertisement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $advertisement=Advertisement::find($id);
        $advertisement->delete();
        return redirect()
            ->route('admin.advertisement.index')
            ->with('success', 'Advertisement deleted successfully.');
    }
}
