<?php

namespace  App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Screen;
use App\Http\Resources\AdvertisementResource;
use Carbon\Carbon;

class ClientHomeController extends Controller
{
    public function index()
    {
        $videos = [];
        if (count(auth()->user()->screens) > 0){
            foreach (auth()->user()->screens as $screen) {
                if (count($screen->advertisements) > 0) {
                    foreach ($screen->advertisements as $advertisement) {
                        array_push($videos, $advertisement->url);
                    }
                }
            }
        }
        $expire_package = Carbon::parse(auth()->user()->consumption->subscription_date);
        $data = [
            'useage_pachage' => round((auth()->user()->consumption->used_ads > 0 ? (auth()->user()->consumption->used_ads / auth()->user()->package->allowed_ads) * 100 : 0), 2),
            'screens_count' =>  auth()->user()->screens->count() > 0 ? auth()->user()->screens->count() : 0,
            'advertisements_count' => auth()->user()->consumption->used_ads > 0 ? auth()->user()->consumption->used_ads : 0,
            'package_time' =>$expire_package->diff(Carbon::now())->format('%a'),
            'allowed_ads' => auth()->user()->package->allowed_ads,
            'package_expire' => $expire_package->format('Y-m-d H:i:s'),
            'advertisement_video' => empty($videos) ? auth()->user()->screens->first()->default_url : $videos[array_rand($videos)],
        ];
        return view('client.index')->with($data);
    }

    // get Adv that shared in screen
    public function get_ads($screen_code)
    {
        $screen = Screen::where('code', $screen_code)->first();
        if($screen) {
            return response()->json(new AdvertisementResource($screen), 200);
        }
        return response()->json(['error' => 'Invalid boardId'], 400);
    }
}
