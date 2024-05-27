<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('parent_code')->with('allChildren')->get();
        Log::info('Loaded categories count: ' . count($categories));
        return view('admin.pages.categories.index', compact('categories'));
    }
    public function getCategories()
    {
        try {
            $categories = Category::whereNull('parent_code')->with('childrenRecursive')->get();
            $formattedCategories = $this->formatForFancyTree($categories);
            return response()->json($formattedCategories);
        } catch (\Exception $e) {
            Log::error('Error fetching categories: ' . $e->getMessage());
            return response()->json(['error' => 'Server error'], 500);
        }
    }
    private function formatForFancyTree($categories, $parentId = null) {
        $result = [];
        foreach ($categories as $category) {
            $entry = [
                'title' => $category->name,
                'key' => $category->id,
                'children' => $this->formatForFancyTree($category->childrenRecursive)
            ];
            if (!$category->childrenRecursive->isEmpty()) {
                $entry['folder'] = true;
            }
            $result[] = $entry;
        }
        return $result;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = new Category($validated);
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Категория успешно создана.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category->update($validated);

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['success' => true]);
    }
}
