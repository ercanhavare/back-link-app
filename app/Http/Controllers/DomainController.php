<?php

namespace App\Http\Controllers;

use App\Category;
use App\Domain;
use App\SubCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DomainController extends Controller
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
        $subcategories = SubCategory::all();
        return view('domain.create', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'title' => 'required|max:60',
            'url' => 'required|max:255',
            'short_desc' => 'required|max:150'
        ]);

        $domain = new Domain();
        $domain->title = $request['title'];
        $domain->email = $request['email'];
        $domain->url = $request['url'];
        $domain->short_description = $request['short_desc'];
        $domain->description = $request['desc'];
        $domain->category_id = $request['category_id'];
        $domain->sub_category_id = $request['subcategory_id'];

        if ($request['img']) {
            $image = $request['img'];
            $extension = $image->getClientOriginalExtension();
            $name = time() . '_' . $image->getClientOriginalName();
            Storage::disk('public')->put($name, File::get($image));
            $domain->img = $name;
        } else {
            $domain->img = 'default.jpg';
        }
        $domain->save();
    }

    /**
     * Display the specified resource.
     *
     * @param Domain $domain
     * @return Response
     */
    public function show(Domain $domain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Domain $domain
     * @return Response
     */
    public function edit(Domain $domain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Domain $domain
     * @return Response
     */
    public function update(Request $request, Domain $domain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Domain $domain
     * @return Response
     */
    public function destroy(Domain $domain)
    {
        //
    }
}
