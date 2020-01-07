<?php
namespace App\Http\Controllers\Client;

use App\Advertisement;
use App\AdvModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdvertisementRequest;
use App\Http\Requests\UpdateAdverisementRequest;
use App\Http\Requests\UpdateScreenVideosRequest;
use App\Http\Traits\VideoTrait;
use App\ModelClass;
use App\Screen;
use App\Viewer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClientAdvertisementController extends Controller
{
    use VideoTrait;
    public function index()
    {
        $screens = auth()->user()->screens;
        return view('client.advertisement.index')->with(['screens' => $screens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_screen = Auth::user()->screens->toArray();
        $all_model = Auth::user()->package->models->all();
        return view('client.advertisement.create')->with(['models'=>$all_model, 'screens'=>$all_screen]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAdvertisementRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdvertisementRequest $request)
    {
        if(auth()->user()->package->allowed_ads > auth()->user()->consumption->used_ads) {
            $data = $request->validated();
            if ($request->hasFile('url')) {
                $file = $request->file('url');
                $data['url'] = $this->upload_video($file);
            }
            DB::transaction(function () use (&$data) {
                $advertisement = Advertisement::create($data);
                $advertisement->screens()->sync($data['screens']);
                $advertisement->modelClasses()->sync($data['classes']);
                auth()->user()->consumption->used_ads += 1;
                auth()->user()->consumption->save();
            });
            $notification = [
                'message' => 'Advertisement created successfully!',
                'alert-type' => 'success'
            ];
            return redirect('/client/advertisement')->with($notification);
        }
        $notification = [
            'message' => 'Your advertisements pass limited in your package !',
            'alert-type' => 'error'
        ];
        return redirect('/client/advertisement')->with($notification);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Advertisement $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
//        return view('client.advertisement.show')->with(['advertisement' => $advertisement]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Advertisement $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        $all_screen = Auth::user()->screens->toArray();
        $all_model = Auth::user()->package->models->all();
        return view('client.advertisement.edit')->with(['advertisement' => $advertisement,'models'=>$all_model, 'screens'=>$all_screen]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAdverisementRequest $request
     * @param Advertisement $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdverisementRequest $request, Advertisement $advertisement)
    {
        $data = $request->validated();
        if($request->hasFile('url')){
            $file = $request->file('url');
            $data['url'] = $this->upload_video($file);
        }
        DB::transaction(function () use ($advertisement, &$data) {
            $advertisement->update($data);
            $advertisement->screens()->sync($data['screens']);
            $advertisement->modelClasses()->sync($data['classes']);
        });
        $notification = [
            'message' => 'Advertisement created successfully!',
            'alert-type' => 'success'
        ];
        return redirect('/client/advertisement')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Advertisement $advertisement
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Advertisement $advertisement)
    {
        if($advertisement->delete()) {
            DB::transaction(function () use ($advertisement){
                $advertisement->screens()->detach();
                $advertisement->modelClasses()->detach();
            });
            $notification = [
                'message' => "Advertisement that name is $advertisement->name  removed successfully!",
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }
    // change default video and waiting url
    public function change_default_waiting(Screen $screen)
    {
        return view('client.screen.edit')->with(['screen' => $screen]);
    }
    public function change_default_waiting_url(UpdateScreenVideosRequest $request,Screen $screen)
    {
        $data = $request->validated();
        if($request->hasFile('default_url')){
            $file = $request->file('default_url');
            $data['default_url'] = $this->upload_video($file);
        }
        if($request->hasFile('waiting_url')){
            $file = $request->file('waiting_url');
            $data['waiting_url'] = $this->upload_video($file);
        }
       if($screen->update($data)) {
           $notification = [
               'message' => "Screen that name is $screen->name  Updated successfully!",
               'alert-type' => 'success'
           ];
           return redirect('/client/advertisement')->with($notification);
       }
    }
    // reviewer
    public function advertisement_statistics($screen_code, Request $request)
    {
        $screen = Screen::where('code', $screen_code)->first();
        if($screen) {
            $screen_id = $screen->id;
            $data = $request->all();

            DB::transaction(function () use (&$data, $screen_id) {
                $viewer = Viewer::create([
                    'screen_id' => $screen_id,
                    'number_of_people' => $data['number_of_people'],
                    'smiling_percentage' => $data['smiling_percentage'],
                    'time_in_front_of_camera' => $data['time_in_front_of_camera'],
                    'advertisement_id' => $data['advertisement_id'],
                    'watcher' => $data['advertisement_id'] != 0 ? 1 : 0
                ]);

                unset($data['number_of_people'], $data['smiling_percentage'], $data['time_in_front_of_camera'], $data['advertisement_id']);
//                $models = [];
                $classess = [];

                foreach ($data as $key => $value){
//                    $model_id = AdvModel::where('name', $key)->first()->id;
//                    array_push($models, $models);
                    $class_id = ModelClass::where('class_name', $value)->first()->id;
                    array_push($classess, $class_id);
                }
                $viewer->classes()->sync($classess);
            });
            return response()->json(['success' =>'added to the database.'], 201);
        }
        return response()->json(['error' => 'Invalid input'], 405);
    }
}
