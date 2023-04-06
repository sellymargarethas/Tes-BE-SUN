<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;

class CategoryController extends Controller
{
    // Get All
    public function getall()
    {
        $category = Category::all();
        return response()->json($category);
    }

    // Get By Id
    public function getbyid($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }

    // Create
    public function create(Request $request)
    {
        $this->validate($request, [
            "nama" => "required"
        ]);

        $data = $request->all();
        $category = Category::create($data);

        return response()->json($category);
    }

    // Update
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        
        if (!$category) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        
        $this->validate($request, [
            "nama" => "required"
        ]);

        $data = $request->all();
        $category->fill($data);
        $category->save();

        return response()->json($category);
    }

    // Delete
    public function destroy($id)
    {
        $category = Category::find($id);
        
        if (!$category) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Data deleted successfully'], 200);
    }
} 