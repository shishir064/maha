<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

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
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        //
    }
}
