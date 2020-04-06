<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Response|View
     */
    public function index()
    {
        $categories = Category::all();
        return \view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|Response|View
     */
    public function create()
    {
        return view('category.create');
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
            'category_name' => 'required|max:255'
        ]);

        $category = new Category();
        $category->category_name = $request['category_name'];
        $category->slug = Str::slug($request['category_name']);

        // if exist slug it would be add number end of slug
        $latest_slug = Category::whereRaw("slug RLIKE '^($category->slug)(-[0-9]*)?$'")
            ->latest('id')->value('slug');
        if ($latest_slug) {
            $pieces = explode('-', $latest_slug);
            $number = intval(end($pieces));
            $category->slug .= '-' . ($number + 1);
            // Youtube Videos -> youtube-videos
            // Youtube Videos -> youtube-videos-1
            // Youtube Videos -> youtube-videos-2
        }
        $category->save();
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
