<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;

class PostController extends Controller
{
    // Get All
    public function getall()
    {
        $post = Post::all();
        return response()->json($post);
    }

    // Get By Id
    public function getbyid($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    // Create
    public function create(Request $request)
    {
        $this->validate($request, [
            "judul" => "required",
            "deskripsi" => "required"
        ]);

        $data = $request->all();
        $post = Post::create($data);

        return response()->json($post);
    }

    // Update
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        
        if (!$post) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        
        $this->validate($request, [
            "judul" => "required",
            "deskripsi" => "required"
        ]);

        $data = $request->all();
        $post->fill($data);
        $post->save();

        return response()->json($post);
    }

    // Delete
    public function destroy($id)
    {
        $post = Post::find($id);
        
        if (!$post) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Data deleted successfully'], 200);
    }
} 