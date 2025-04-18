<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Polyfill\Ctype\Ctype;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        //
        return $this->category->All();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->category->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return $this->category->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Tach 2 dong
        $category = $this->category->find($id);
        return $category->update($request->all());

        //chung 1 dong
        // return $this->category->find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return $this->category->destroy($id);
    }
}
