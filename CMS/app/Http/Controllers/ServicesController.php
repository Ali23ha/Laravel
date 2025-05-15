<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view('pages.services.index',compact('services'));
    }
    public function create()
    {
        return view('pages.services.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'detail' => 'required',
                'price' => 'required',

            ]);
        Services::create($validatedData);
        return redirect()->route('Services-Index');

    }
    public function edit(string $id)
    {
        $services = Services::find($id);
        return view('pages.services.edit', compact('services'));
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'detail' => 'required',
                'price' => 'required'
            ]);
        $services = Services::find($id);
        $services->update($validatedData);
        return redirect()->route('Services-Index');
    }
    public function destroy (string $id)
    {
        $services = Services::find($id);
        $services->delete();
        return to_route('Services-Index');
    }
}
