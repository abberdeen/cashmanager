<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Currency;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view(
            'category.index',
            [
                'categories' =>  Category::where('user_id', auth()->id())->get()
            ]
        );
    }

    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a new category.
     *
     * @return Response
     */
    public function store()
    {
        $request = $this->validateRequest();
        // The blog post is valid...
        Category::create([
            'user_id' => auth()->id(),
            'name' => $request['name'],
        ]);
        return redirect(action('CategoriesController@index'));
    }

    public function update(Category $category)
    {
        $request = $this->validateRequest();
        // The blog post is valid...
        $category->update([
            'user_id' => auth()->id(),
            'name' => $request['name'],
        ]);
        return redirect(action('CategoriesController@index'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(action('CategoriesController@index'));
    }

    public function edit(Category $category)
    {
        return view(
            'category.edit',
            [
                'category' => $category,
            ]
        );
    }

    public function show(Category $category)
    {
        return view(
            'category.show',
            [
                'category' => $category
            ]
        );
    }

    private function validateRequest () {
        return request()->validate([
            'name' => ['required','min:3','max:60'],
        ]);
    }

}
