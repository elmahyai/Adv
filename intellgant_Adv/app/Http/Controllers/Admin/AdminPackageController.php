<?php
namespace App\Http\Controllers\Admin;

use App\AdvModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        return view('admin.package.index')->with(['packages' => $packages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = AdvModel::all();
        return view('admin.package.create')->with(['models' => $models]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageRequest $request)
    {
        $data = $request->validated();
        DB::transaction(function () use (&$data) {
            $package = Package::create($data);
            $package->models()->sync($data['models']);
        });
        $notification = [
            'message' => 'Package created successfully!',
            'alert-type' => 'success'
        ];
        return redirect('/admin/package')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $models = AdvModel::all();
        return view('admin.package.edit')->with(['package' => $package, 'models' => $models]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        $data = $request->validated();
        if($package->update($data)) {
            $package->models()->sync($data['models']);
            $notification = [
                'message' => 'Package Updated successfully!',
                'alert-type' => 'success'
            ];
            return redirect('/admin/package')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        if($package->delete()) {
            $notification = [
                'message' => "Package that name is $package->name  removed successfully!",
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }
}
