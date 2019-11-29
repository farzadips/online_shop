<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $categories = Category::all();
//        $categories = Category::paginate(10);
        $categories = Category::with('childrenRecursive')
            ->where('parent_id',null)->get();
        return view('admin.categories.index',compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('childrenRecursive')
            ->where('parent_id',null)
            ->get();
//        $categories = Category::paginate(10);
        return view('admin.categories.create',compact(['categories']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->parent_id = $request->input('category_parent');
        $category->meta_title = $request->input('meta_title');
        $category->meta_desc = $request->input('meta_desc');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();

        return redirect('administrator/categories');
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
        $categories = Category::with('childrenRecursive')
            ->where('parent_id',null)
            ->get();
        $category = Category::findOrFail($id);
        return view('admin.categories.edit',compact(['categories','category']));

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
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->parent_id = $request->input('category_parent');
        $category->meta_title = $request->input('meta_title');
        $category->meta_desc = $request->input('meta_desc');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();

        return redirect('administrator/categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::with('childrenRecursive')->where('id',$id)->first();
        if (count($category->childrenRecursive)>0){
            Session::flash('error_category',' دسته بندی '. $category->name .'  دارای زیر دسته است پس امکان پذیر نیست ');
            return redirect('/administrator/categories');
        }

        $category->delete();
        return redirect('/administrator/categories');
    }
}
