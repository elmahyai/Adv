<?php
namespace App\Http\Controllers\Admin;

use App\Advertisement;
use App\AdvModel;
use App\Http\Controllers\Controller;
use App\Package;
use App\Screen;
use App\User;
use App\Viewer;
use Illuminate\Support\Facades\DB;


class AdminHomeController extends Controller
{
    public function index()
    {
        $advertisement_content_id= DB::table('viewers')->select('advertisement_id')->groupBy('advertisement_id')->orderByRaw('SUM(time_in_front_of_camera) DESC')->first();
        $advertisement_happiness_id= DB::table('viewers')->select('advertisement_id')->groupBy('advertisement_id')->orderByRaw('SUM(smiling_percentage) DESC')->first();
         $data = array(
             'clients_count' => User::where('is_admin', '0')->count(),
             'models_count' => AdvModel::all()->count(),
             'package_count' => Package::all()->count(),
             'screen_count' => Screen::all()->count(),
             'advertisement_count' => Advertisement::all()->count(),
             'top_Content_for_Attention' => $advertisement_content_id ? Advertisement::where('id' ,$advertisement_content_id->advertisement_id)->first()->name : 'No',
             'top_Content_for_Happiness' => $advertisement_happiness_id ? Advertisement::where('id' ,$advertisement_happiness_id->advertisement_id)->first()->name : 'No',
         );

        return view('admin.index')->with($data);
    }
}
