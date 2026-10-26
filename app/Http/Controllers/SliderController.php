<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::paginate(5);
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(SliderRequest $request)
{
    $validated = $request->validated();

    $validated['desktop_image'] = $request
        ->file('desktop_image')
        ->store('sliders/desktop', 'public');

    $validated['mobile_image'] = $request
        ->file('mobile_image')
        ->store('sliders/mobile', 'public');

    Slider::create($validated);

    return redirect()
        ->route('admin.sliders.index')
        ->with('success', 'Slider created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
    return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
 public function update(SliderRequest $request, $id)
{
    $slider = Slider::findOrFail($id);

    $validated = $request->validated();

    // Update Desktop Image
    if ($request->hasFile('desktop_image')) {
        $path = $request->file('desktop_image')->store(
            'sliders/desktop',
            'public'
        );

        // Delete old image after storing the new one
        if ($slider->desktop_image) {
            Storage::disk('public')->delete($slider->desktop_image);
        }

        $validated['desktop_image'] = $path;
    }

    // Update Mobile Image
    if ($request->hasFile('mobile_image')) {
        $path = $request->file('mobile_image')->store(
            'sliders/mobile',
            'public'
        );

        // Delete old image after storing the new one
        if ($slider->mobile_image) {
            Storage::disk('public')->delete($slider->mobile_image);
        }

        $validated['mobile_image'] = $path;
    }

    // Update slider information
    $slider->update($validated);

    return redirect()
        ->route('admin.sliders.index')
        ->with('success', 'Slider updated successfully.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider=Slider::find($id);
        $slider->delete();
        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider deleted successfully.');
    }
}
