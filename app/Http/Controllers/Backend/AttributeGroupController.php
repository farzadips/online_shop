<?php

namespace App\Http\Controllers\Backend;

use App\AttributeGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AttributeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = AttributeGroup::all();
        return view('admin.attributes.index',
            compact(['attributes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
        $attributeGroup = new AttributeGroup();
        $attributeGroup->title = $request->input('title');
        $attributeGroup->type = $request->input('type');
        $attributeGroup->save();

        Session::flash('attributes','ویژگی جدید با موفقیت اضافه شد');

        return redirect('administrator/attributes-group');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attributesGroup = AttributeGroup::findOrFail($id);
        return view('admin.attributes.edit',
            compact(['attributesGroup']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributeGroup = AttributeGroup::findOrFail($id);
        $attributeGroup->title = $request->input('title');
        $attributeGroup->type = $request->input('type');
        $attributeGroup->save();

        Session::flash('attributes','ویژگی جدید با موفقیت ادیت شد');

        return redirect('administrator/attributes-group');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attributeGroup = AttributeGroup::findOrFail($id);
//        return $attributeGroup;
        $attributeGroup->delete();
//        $attributeGroup->save();
        Session::flash('attributes','ویژگی با موفقیت حذف شد');

        return redirect('administrator/attributes-group');


    }
}
