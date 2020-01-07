<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScreenRequest;
use App\Http\Requests\UpdateScreenRequest;
use App\Screen;
use App\User;
use Illuminate\Http\Request;

class AdminScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $screens = Screen::all();
        return view('admin.screen.index')->with(['screens' => $screens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('is_admin', 0)->get();
        return view('admin.screen.create')->with(['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScreenRequest $request)
    {
        $data = $request->validated();
        $data['default_url'] = 'http://18.188.164.175/videos/Adv5dfa9add35b32.webm';
        $data['waiting_url'] = 'http://18.188.164.175/videos/Adv5dfa9add35b32.webm';
        $screen = Screen::create($data);
        $notification = [
            'message' => 'Screen created successfully!',
            'alert-type' => 'success'
        ];
        return redirect('/admin/screen')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Screen  $screen
     * @return \Illuminate\Http\Response
     */
    public function show(Screen $screen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Screen  $screen
     * @return \Illuminate\Http\Response
     */
    public function edit(Screen $screen)
    {
        $users = User::where('is_admin', 0)->get();
        return view('admin.screen.edit')->with(['users' => $users,'screen' => $screen]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Screen  $screen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScreenRequest $request, Screen $screen)
    {
        $data = $request->validated();
        if($screen->update($data)) {
            $notification = [
                'message' => 'Screen Updated successfully!',
                'alert-type' => 'success'
            ];
            return redirect('/admin/screen')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Screen  $screen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Screen $screen)
    {
        if($screen->delete()) {
            $notification = [
                'message' => "Screen that name is $screen->name  removed successfully!",
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Screen $screen
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function status(Screen $screen)
    {
        if($screen->update(['status' => !$screen->status])) {
            $notification = [
                'message' => "Screen that name is $screen->name  change status successfully!",
                'alert-type' => $screen->status == 1 ? 'success' : 'error'
            ];
            return back()->with($notification);
        }
    }
}
