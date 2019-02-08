<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AdminCategoryController extends Controller
{
    /**
     * All categories
     * 
     */
    public function allCategories()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);

        return view('categories', ['categories' => $categories]);
    }

    /**
     * Add category
     * 
     */
    public function addCategory() 
    {
        return view('categories');
    }

    /**
     * Edit cateogry
     * 
     */
    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);

        return view('categories-edit', ['category' => $category, 'categories' => $categories]);
    }

    /** 
     * Store category
     * 
    */
    public function storeCategory(Request $request, $id = 0)
    {
        $category = Category::firstOrCreate([
            'id' => $id
        ]);

        $category->name = $request->name;
        $category->slug = $request->slug;

        if ($category->save()) {
            $message = 'Категория сохранена';
        }

        return redirect('/admin/categories')->with('message', $message);
    }

    /**
     * Delete category
     * 
     */
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);

        if ($category->delete()) {
            $message = 'Категория удалена';
        }

        return redirect('/admin/categories')->with('message', $message);
    }
}
