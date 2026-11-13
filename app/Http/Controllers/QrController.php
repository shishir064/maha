<?php

namespace App\Http\Controllers;

use App\Models\Qr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all QR codes from the database
        $qrCodes = \App\Models\Qr::all();

        // Return a view with the QR codes data
        return view('admin.qr.index', compact('qrCodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return a view to create a new QR code
        return view('admin.qr.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $path = $request->file('image')->store('qr-codes', 'public');

        Qr::create([
            'name' => $request->name,
            'image' => $path,
        ]);

        return redirect()->route('admin.qr-codes.index')
            ->with('success', 'QR Code uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $qrCode = Qr::findOrFail($id);

        // Delete the image file from storage
        Storage::disk('public')->delete($qrCode->image);

        // Delete the QR code record from the database
        $qrCode->delete();

        return redirect()->route('admin.qr-codes.index')
            ->with('success', 'QR Code deleted successfully!');
    }
}
