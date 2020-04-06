<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|Response|View
     */
    public function create()
    {
        $categories = Category::all();
        return view('sub-category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'sub_category_name' => 'required|max:255'
        ]);

        $sub_category = new SubCategory();
        $sub_category->category_id = $request['category_id'];
        $sub_category->sub_category_name = $request['sub_category_name'];
        $sub_category->slug = Str::slug($request['sub_category_name']);

        // if exist slug it would be add number end of slug
        $latest_slug = SubCategory::whereRaw("slug RLIKE '^($sub_category->slug)(-[0-9]*)?$'")
            ->latest('id')->value('slug');
        if ($latest_slug) {
            $pieces = explode('-', $latest_slug);
            $number = intval(end($pieces));
            $sub_category->slug .= '-' . ($number + 1);
            // Youtube Videos -> youtube-videos
            // Youtube Videos -> youtube-videos-1
            // Youtube Videos -> youtube-videos-2
        }
        $sub_category->save();
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param SubCategory $subCategory
     * @return Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SubCategory $subCategory
     * @return Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param SubCategory $subCategory
     * @return Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SubCategory $subCategory
     * @return Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
