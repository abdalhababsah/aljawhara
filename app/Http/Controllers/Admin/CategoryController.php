<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display a listing of categories
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('admin.categories.create');
    }

    // Store a newly created category in storage
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255|unique:categories,name_ar',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Max image size 2MB
        ], [
            'name_ar.required' => 'اسم الفئة مطلوب.',
            'name_ar.unique' => 'اسم الفئة موجود بالفعل.',
            'name_ar.max' => 'يجب ألا يتجاوز الاسم 255 حرفًا.',
            'description_ar.string' => 'الوصف يجب أن يكون نصًا.',
            'image.image' => 'يجب أن تكون الصورة ملفًا صالحًا.',
            'image.max' => 'يجب ألا يتجاوز حجم الصورة 2 ميجابايت.',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('categories', 'public');
        }

        // Create category
        Category::create($validated);

        return redirect()->route('admin.categories.index')->with('success', 'تم إنشاء الفئة بنجاح.');
    }

    // Display the specified category
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    // Show the form for editing the specified category
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Update the specified category in storage
    public function update(Request $request, Category $category)
    {
        // Validate input
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255|unique:categories,name_ar,' . $category->id,
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ], [
            'name_ar.required' => 'اسم الفئة مطلوب.',
            'name_ar.unique' => 'اسم الفئة موجود بالفعل.',
            'name_ar.max' => 'يجب ألا يتجاوز الاسم 255 حرفًا.',
            'description_ar.string' => 'الوصف يجب أن يكون نصًا.',
            'image.image' => 'يجب أن تكون الصورة ملفًا صالحًا.',
            'image.max' => 'يجب ألا يتجاوز حجم الصورة 2 ميجابايت.',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            if ($category->image) {
                // Delete the old image
                \Storage::disk('public')->delete($category->image);
            }
            $validated['image'] = $request->file('image')->store('categories', 'public');
        }

        // Update category
        $category->update($validated);

        return redirect()->route('admin.categories.index')->with('success', 'تم تحديث الفئة بنجاح.');
    }

    // Remove the specified category from storage
    public function destroy(Category $category)
    {
        // Check if the category has associated products
        if ($category->products()->count() > 0) {
            return redirect()->route('admin.categories.index')->with('error', 'لا يمكن حذف الفئة لأنها تحتوي على منتجات مرتبطة.');
        }

        // Delete the category
        if ($category->image) {
            // Delete the associated image if exists
            \Storage::disk('public')->delete($category->image);
        }
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'تم حذف الفئة بنجاح.');
    }
}