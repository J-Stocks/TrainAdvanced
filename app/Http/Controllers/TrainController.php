<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TrainController extends Controller
{
    private const RULES = [
        'make' => 'required|min:1|max:255',
        'model' => 'required|min:1|max:255',
        'production_start' => 'required|date|before_or_equal:production_end',
        'production_end' => 'required|date|after_or_equal:production_start',
        'description' => 'max:3000',
        'image' => 'nullable|image|max:2048',
    ];

    private const TRAINS_PER_INDEX = 24;

    public function index()
    {
        $trains = Train::orderBy('make')->orderBy('model')->paginate(self::TRAINS_PER_INDEX);
        return view('trains.index', compact('trains'));
    }

    public function create()
    {
        return view('trains.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate(self::RULES);
        $attributes['editor_id'] = Auth::user()->id;
        if ($request['image']) {
            $attributes['image_url'] = $request
                ->file('image')
                ->storePublicly('train-images', ['disk' => 'public']);
        }
        $train = Train::create($attributes);
        return redirect(url($train->path));
    }

    public function show(Train $train)
    {
        return view('trains.show', compact('train'));
    }

    public function edit(Train $train)
    {
        return view('trains.edit', compact('train'));
    }

    public function update(Request $request, Train $train)
    {
        $attributes = $request->validate(self::RULES);
        $attributes['editor_id'] = Auth::user()->id;
        if ($request['image']) {
            Storage::disk('public')->delete($train->image_url);
            $attributes['image_url'] = $request
                ->file('image')
                ->storePublicly('train-images', ['disk' => 'public']);
        }
        $train->update($attributes);
        return redirect(url($train->path));
    }

    public function destroy(Train $train)
    {
        Storage::disk('public')->delete($train->image_url);
        $train->delete();
        return redirect(url('/trains'));
    }
}
