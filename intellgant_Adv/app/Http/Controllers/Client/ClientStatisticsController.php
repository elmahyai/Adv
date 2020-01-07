<?php
namespace App\Http\Controllers\Client;

use App\Advertisement;
use App\AdvModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\ModelClass;
use App\Screen;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ClientStatisticsController extends Controller
{
    public function index()
    {
        $male_id = ModelClass::where('class_name', 'male')->first();
        $female_id = ModelClass::where('class_name', 'female')->first();
        $screens_id = auth()->user()->screens->pluck('id');
        $data = [
            'models' => DB::table('models')->whereIn('id', auth()->user()->package->models->pluck('id'))->get(),
            'classes' => DB::table('model_class')->whereIn('model_id', auth()->user()->package->models->pluck('id'))->get(),
            'advertisements' =>Advertisement::with('viewers')
                ->join('screen_advertisement', 'advertisements.id','=', 'screen_advertisement.advertisement_id')->get(),
//                ->leftJoin('screens', 'screens.id','=', 'screen_advertisement.screen_id')
            'male' => $male_id ? DB::table('viewer_Model_classes')->where('model_class_id', $male_id->id)->count() : 0,
            'female' => $female_id ? DB::table('viewer_Model_classes')->where('model_class_id', $female_id->id)->count() : 0
        ];
        return view('client.statistics')->with($data);
    }

    public function search(SearchRequest $request)
    {
        $male_id = ModelClass::where('class_name', 'male')->first();
        $female_id = ModelClass::where('class_name', 'female')->first();
        $data = $request->validated();
        $data['started'] = Carbon::parse($data['started']);
        $data['ended'] = Carbon::parse($data['ended']);
        $all_data = [];
        $advertisements = Advertisement::with('viewers')->join('screen_advertisement', 'advertisements.id','=', 'screen_advertisement.advertisement_id')
//            ->leftJoin('screens', 'screens.id','=', 'screen_advertisement.screen_id')
            ->join('advertisement_Model_classes', 'advertisements.id','=', 'advertisement_Model_classes.advertisement_id')
            ->leftJoin('model_class', 'model_class.id','=', 'advertisement_Model_classes.model_class_id')
            ->leftJoin('models', 'model_class.model_id', 'models.id')
            ->where([
                ['advertisements.created_at', '>=', $data['started']],
                ['advertisements.created_at', '<=', $data['ended']]])->get();
        $data = [
            'advertisements' => $advertisements,
            'male' => $male_id ? DB::table('viewer_Model_classes')->where('model_class_id', $male_id->id)->count() : 0,
            'female' => $female_id ? DB::table('viewer_Model_classes')->where('model_class_id', $female_id->id)->count() : 0
        ];
        return view('client.statistics_filter')->with($data);
    }
}
