<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Tag;

class TagController extends Controller
{
    // Get All
    public function getall()
    {
        $tag = Tag::all();
        return response()->json($tag);
    }

    // Get By Id
    public function getbyid($id)
    {
        $tag = Tag::find($id);
        return response()->json($tag);
    }

    // Create
    public function create(Request $request)
    {
        $this->validate($request, [
            "nama" => "required"
        ]);

        $data = $request->all();
        $tag = Tag::create($data);

        return response()->json($tag);
    }

    // Update
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        
        if (!$tag) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        
        $this->validate($request, [
            "nama" => "required"
        ]);

        $data = $request->all();
        $tag->fill($data);
        $tag->save();

        return response()->json($tag);
    }

    // Delete
    public function destroy($id)
    {
        $tag = Tag::find($id);
        
        if (!$tag) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $tag->delete();

        return response()->json(['message' => 'Data deleted successfully'], 200);
    }
} 