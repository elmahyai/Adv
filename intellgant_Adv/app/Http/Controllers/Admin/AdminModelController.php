<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreModelRequest;
use App\Http\Requests\UpdateModelRequest;
use App\AdvModel;
use Illuminate\Http\Request;

class AdminModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = AdvModel::all();
        return view('admin.model.index')->with(['models' => $models]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.model.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModelRequest $request)
    {
        $data = $request->validated();
        $model = AdvModel::create($data);
        $notification = [
            'message' => 'Model created successfully!',
            'alert-type' => 'success'
        ];
        return redirect('/admin/advModel')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdvModel  $advModel
     * @return \Illuminate\Http\Response
     */
    public function show(AdvModel $advModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdvModel  $advModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AdvModel $advModel)
    {
        return view('admin.model.edit')->with(['advModel' => $advModel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdvModel  $advModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModelRequest $request, AdvModel $advModel)
    {
        $data = $request->validated();
        if($advModel->update($data)) {
            $notification = [
                'message' => 'Model Updated successfully!',
                'alert-type' => 'success'
            ];
            return redirect('/admin/advModel')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdvModel  $advModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvModel $advModel)
    {
        if($advModel->delete()) {
            $notification = [
                'message' => "Model that name is $advModel->name  removed successfully!",
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }
}
