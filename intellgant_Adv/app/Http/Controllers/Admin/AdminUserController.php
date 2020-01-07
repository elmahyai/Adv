<?php
namespace App\Http\Controllers\Admin;

use App\Advertisement;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Package;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    public function index()
    {
        $clients = User::withTrashed()->where('is_admin', 0)->get();
        return view('admin.client.index')->with(['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Package::all();
        return view('admin.client.create')->with(['packages'=> $packages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClientRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        DB::transaction(function () use (&$data) {
            $client = User::create($data);
            $client->consumption()->create([
                'package_id' => $data['package_id'],
                'subscription_date' => Carbon::now()->addDays($client->package->duration),
            ]);
        });
        $notification = [
            'message' => 'Client created successfully!',
            'alert-type' => 'success'
        ];
        return redirect('/admin/client')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $client
     * @return \Illuminate\Http\Response
     */
    public function edit(User $client)
    {
        $packages = Package::all();
        return view('admin.client.edit')->with(['client' => $client, 'packages' => $packages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClientRequest $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, User $client)
    {
        $data = $request->validated();
        if(isset($data['password']))
            $data['password'] = bcrypt($data['password']);
        else
            unset($data['password']);
        if($client->update($data)) {
            $notification = [
                'message' => 'Client Updated successfully!',
                'alert-type' => 'success'
            ];
            return redirect('/admin/client')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $client
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $client)
    {
        if($client->delete()) {
            $notification = [
                'message' => "Client that name is $client->name  removed successfully!",
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $client
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function restore_client($client)
    {
        $client = User::withTrashed()->find($client);
        if($client->restore()) {
            $notification = [
                'message' => "Client that name is $client->name  restore successfully!",
                'alert-type' => 'success'
            ];
            return back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $client
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function status($client)
    {
        $client = User::find($client);
        if($client->update(['status' => !$client->status])) {
            $notification = [
                'message' => "Client that name is $client->name  change status successfully!",
                'alert-type' => $client->status == 1 ? 'success' : 'error'
            ];
            return back()->with($notification);
        }
    }

    public function renew_subscription($client)
    {
        $client = User::find($client);
        $client->consumption()->where('package_id',$client->package_id)->first()->update([
            'subscription_date' => Carbon::now()->addDays($client->package->duration),
        ]);
        $notification = [
            'message' => "Client that name is $client->name renew Subscription successfully!",
            'alert-type' => 'success'
        ];
        return back()->with($notification);
    }
}
