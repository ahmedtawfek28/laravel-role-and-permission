<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Category;

class CategoryController extends Controller
{
    function __construct()
    {    $this->middleware('permission:category-list');
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-showdetails', ['only' => ['show']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title_ar' => 'required',
            'title_en' => 'required',
            'image' => 'required',
            'details_ar' => 'required',
            'details_en' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title_en);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('category'))
            {
                Storage::disk('public')->makeDirectory('category');
            }

            $categoryImage = Image::make($image)->resize(1600,1066)->save('test.jpg');
            Storage::disk('public')->put('category/'.$imageName,$categoryImage);

        } else {
            $imageName = "default.png";
        }
        $category = new Category();
        $category->title_ar = $request->title_ar;
        $category->title_en = $request->title_en;
        $category->slug = $slug;
        $category->image = $imageName;
        $category->details_ar = $request->details_ar;
        $category->details_en = $request->details_en;

        $category->save();
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $categories = Category::find($category);
        return view('category.show',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'title_ar' => 'required',
            'title_en' => 'required',
            'image' => 'image',
            'details_ar' => 'required',
            'details_en' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title_en);
        if(isset($image))
        {
            // make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('category'))
            {
                Storage::disk('public')->makeDirectory('category');
            }

            // delete old post image
            if(Storage::disk('public')->exists('category/'.$category->image))
            {
                Storage::disk('public')->delete('category/'.$category->image);
            }
            $categoryImage = Image::make($image)->resize(1600,1066)->save('test.jpg');
            Storage::disk('public')->put('category/'.$imageName,$categoryImage);

        } else {
            $imageName = $category->image;
        }
        $category->title_ar = $request->title_ar;
        $category->title_en = $request->title_en;
        $category->slug = $slug;
        $category->image = $imageName;
        $category->details_ar = $request->details_ar;
        $category->details_en = $request->details_en;

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category Updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request->category_id);

        if (Storage::disk('public')->exists('category/'.$category->image))
        {
            Storage::disk('public')->delete('category/'.$category->image);
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category Deleted successfully.');
    }



}
