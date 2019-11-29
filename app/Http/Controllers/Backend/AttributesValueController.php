<?php

namespace App\Http\Controllers\Backend;

use App\AttributeGroup;
use App\AttributeValue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AttributesValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attribute_value = AttributeValue::with('attributeGroup')->get();
        return view('admin.attributes_value.index'
        ,compact(['attribute_value']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes_group = AttributeGroup::all();
        return view('admin.attributes_value.create'
        ,compact(['attributes_group']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attribute_value = new AttributeValue();
        $attribute_value->title = $request->input('title');
        $attribute_value->attributeGroup_id = $request->input('group');
        $attribute_value->save();

        Session::flash('value','مقدار ویژگی با موفقیت اضافه شد');
        return redirect('administrator/attributes-value');
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
        $attribute_value = AttributeValue::findOrFail($id);
        $attributes_group = AttributeGroup::all();
        return view('admin.attributes_value.edit'
        ,compact(['attribute_value','attributes_group']));
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
        $attribute_value = AttributeValue::findOrFail($id);
        $attribute_value->title = $request->input('title');
        $attribute_value->attributeGroup_id = $request->input('group');
        $attribute_value->save();

        Session::flash('value','مقدار ویژگی با موفقیت بروز رسانی شد');


        return redirect('administrator/attributes-value');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute_value = AttributeValue::findOrFail($id);
        $attribute_value->delete();

        Session::flash('value','مقدار ویژگی با موفقیت حذف شد');


        return redirect('administrator/attributes-value');
    }
}
