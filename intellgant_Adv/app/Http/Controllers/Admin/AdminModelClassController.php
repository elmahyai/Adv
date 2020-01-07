<?php
namespace App\Http\Controllers\Admin;

use App\AdvModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreModelClassRequest;
use App\Http\Requests\UpdateModelClassRequest;
use App\ModelClass;

class AdminModelClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model_classes = ModelClass::all();
        return view('admin.model_class.index')->with(['model_classes' => $model_classes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = AdvModel::all();
        return view('admin.model_class.create')->with(['models' => $models]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModelClassRequest $request)
    {
        $data = $request->validated();
        $model_class = ModelClass::create($data);
        $notification = [
            'message' => 'Model Class created successfully!',
            'alert-type' => 'success'
        ];
        return redirect('/admin/model_class')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param ModelClass $modelClass
     * @return void
     */
    public function show(ModelClass $modelClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ModelClass $modelClass
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelClass $modelClass)
    {
        $models = AdvModel::all();
        return view('admin.model_class.edit')->with(['modelClass' => $modelClass, 'models' => $models]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateModelClassRequest $request
     * @param ModelClass $modelClass
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModelClassRequest $request, ModelClass $modelClass)
    {
        $data = $request->validated();
        if($modelClass->update($data)) {
            $notification = [
                'message' => 'Model Class Updated successfully!',
                'alert-type' => 'success'
            ];
            return redirect('/admin/model_class')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ModelClass $modelClass
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(ModelClass $modelClass)
    {
        if($modelClass->delete()) {
            $notification = [
                'message' => "Package that name is $modelClass->name  removed successfully!",
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }
}
