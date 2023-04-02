<?php

namespace App\Http\Controllers\Client\Api;

use App\Helpers\PolygonHelper;
use App\Http\Controllers\Controller;
use App\Models\POI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MapController extends Controller
{
    public function index(Request $request)
    {
        $lat = $request->post('lat');
        $lng = $request->post('lng');
        $data = Http::get("https://api.mapbox.com/isochrone/v1/mapbox/walking/" . $lng . "%2C" . $lat . "?contours_minutes=15&polygons=true&denoise=1&generalize=0&access_token=pk.eyJ1IjoibWFyY2VsaHJpYyIsImEiOiJja29zd2hiZ3kwMDJrMzFwY25xNnV5aTliIn0.FJPCVKhDzagzMV7yfVOe8w")->json();
        $polygon = $data['features'][0]['geometry']['coordinates'][0];

        $points = POI::all();

        $visiblePoints = [];
        $events = [];
        foreach ($points as $point) {
            if (PolygonHelper::pointInPolygon($point->lng, $point->lat, $polygon)) {
                $visiblePoints[] = $point;
                foreach ($point->events as $e) {
                    $events[] = $e->toArray() + ['poi_name' => $point->name];
                }
            }
        }
        return response()->json([
            'points' => $visiblePoints,
            'events' => $events,
            'polygon' => $data,
        ]);
    }

    public function show(Request $request, $id)
    {
        $poi = POI::with(['events'])->find($id);

        if (!$poi) {
            abort(404);
        }

        return response()->json([
            'poi' => $poi,
        ]);
    }
}
