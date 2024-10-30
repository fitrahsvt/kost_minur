<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Facility;
use App\Models\Slider;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    public function index(Request $request)
    {
        // Mengambil data facility untuk dropdown
        $facilities = Facility::all();

        // Mengambil data slider
        $sliders = Slider::where('status', 'accepted')->get();

        // Query dasar untuk kamar
        $roomsQuery = Room::where('status_ketersediaan', 'ada');

        // Filter berdasarkan fasilitas jika ada
        if ($request->has('facility') && $request->facility) {
            $roomsQuery->whereHas('facilities', function ($query) use ($request) {
                $query->where('nama', $request->facility);
            });
        }

        // Filter berdasarkan rentang harga jika min dan max diisi
        if ($request->has('min') && $request->has('max') && is_numeric($request->min) && is_numeric($request->max)) {
            $roomsQuery->whereBetween('harga', [$request->min, $request->max]);
            $min = $request->min;
            $max = $request->max;
        } else {
            $min = $max = null;
        }

        // Ambil data kamar setelah query filter
        $rooms = $roomsQuery->inRandomOrder()->limit(8)->get();

        return view('landing', compact('rooms', 'facilities', 'sliders', 'min', 'max'));
    }
}
