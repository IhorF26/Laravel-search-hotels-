<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Hotel;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = DB::table('hotels')->get();
        return $hotels;
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $name = $request->input('name');
            if ($name) {$hotels = Hotel::where('name', 'like', '%'.$name.'%');}
            $price1= $request->input('price1');
            $price2 = $request->input('price2');
            if ($price1 && $price2) {if (isset($hotels)) {$hotels = $hotels->whereBetween('price', [$price1, $price2]);} else{$hotels = Hotel::whereBetween('price', [$price1, $price2]); }}
            $bedrooms = $request->input('bedrooms');
            if ($bedrooms) {if (isset($hotels)) {$hotels = $hotels->where(['bedrooms' => $bedrooms]);} else {$hotels = Hotel::where(['bedrooms' => $bedrooms]); }}
            $bathrooms = $request->input('bathrooms');
            if ($bathrooms) {if (isset($hotels)) {$hotels = $hotels->where(['bathrooms' => $bathrooms]);} else{$hotels = Hotel::where(['bathrooms' => $bathrooms]); }}
            $storeys = $request->input('storeys');
            if ($storeys) {if (isset($hotels)) {$hotels = $hotels->where(['storeys' => $storeys]);} else{$hotels = Hotel::where(['storeys' => $storeys]); }}
            $garages = $request->input('garages');
            if ($garages) {if (isset($hotels)) {$hotels = $hotels->where(['garages' => $garages]);} else{$hotels = Hotel::where(['garages' => $garages]); }}

            $hotels = $hotels->get();

            return response()->json($hotels);
        }
    }


}
