<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use File;
use App\Authorizable;
use Illuminate\Support\Str;



class CategoryController extends Controller
{
    use Authorizable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        // return $categories;
        return view('back-end.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id');
        return view('back-end.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = validator::make($request->all(),[
            'image' =>'required|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'name' => 'required|max:2048',

        ]);
        if($validation->passes())
        {
            $sulg = isset($request->slug)?$request->slug:str_replace(' ', '_', $request->name);
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->move(public_path('category_image'),$name);

            $category = new Category();
            $category->name = $request->name;
            $category->tamil = $request->tamil;
            // $category->slug = isset($request->slug)?$request->slug:str_replace(' ', '_', $request->name);
            // $category->slug = md5($sulg);
            $category->slug = str_slug($request->name);
            $category->parent_id = $request->parent;
            $category->status = $request->status;

            $category->image = $name;
            $category->save();

            return redirect()->back();
        }
        else
        {
            return redirect()->back()->withErrors($validation)
            ->withInput();
        }
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
        $category = Category::find($id);
        $categories = Category::pluck('name','id');
        return view('back-end.category.edit',compact('category','categories'));
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
        // return $request;
        $validation = validator::make($request->all(),[
            'image' =>'mimes:jpeg,png,jpg,gif,webp|max:2048',
            'name' => 'required|max:2048',
        ]);
        if($validation->passes())
        {
            $slug = isset($request->slug)?$request->slug:str_replace(' ', '_', $request->name);
            $category = Category::find($id);
            $category->name = $request->name;
            $category->tamil = $request->tamil;
            $category->slug = str_slug($request->name);
            $category->parent_id = $request->parent;
            $category->status = $request->status;

            if($request->hasfile('image'))
            {
                    $image_path = "category_image/".$category->image;

                    if(File::exists($image_path)) {
                        File::delete($image_path);

                    }
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $filename =$name;
                $file->move('category_image/',$filename);
                $category->image = $filename;


            }

            $category->save();

            return redirect()->back();
        }
        else
        {
            return redirect()->back()->withErrors($validation)
            ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $image_path = "category_image/".$category->image;

        if(File::exists($image_path)) {
            File::delete($image_path);

        }
        $category->delete();


        return response()->json([
            'success'=>true,
            'message'=>'Deleted Successful',
        ]);
    }
}
