<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Blog;

class BlogController extends Controller
{
    // Get All
    public function getall()
    {
        $blog = Blog::select('blog.id', 'post.judul', 'post.deskripsi', 'category.nama', 'tag.nama')
                        ->join('post', 'post.id', '=', 'blog.id_post')
                        ->join('category', 'category.id', '=', 'blog.id_category')
                        ->join('tag', 'tag.id', '=', 'blog.id_tag')
                        ->get();
        return response()->json($blog);
    }

    // Get By Id
    public function getbyid($id)
    {
        $blog = Blog::select('blog.id', 'post.judul', 'post.deskripsi', 'category.nama', 'tag.nama')
                        ->join('post', 'post.id', '=', 'blog.id_post')
                        ->join('category', 'category.id', '=', 'blog.id_category')
                        ->join('tag', 'tag.id', '=', 'blog.id_tag')
                        ->where('blog.id', $id)
                        ->get();
        return response()->json($blog);
    }

    // Create
    public function create(Request $request)
    {
        $this->validate($request, [
            "id_post" => "required",
            "id_category" => "required",
            "id_tag" => "required"
        ]);

        $data = $request->all();
        $blog = Blog::create($data);

        return response()->json($blog);
    }

    // Update
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        
        if (!$blog) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        
        $this->validate($request, [
            "id_post" => "required",
            "id_category" => "required",
            "id_tag" => "required"
        ]);

        $data = $request->all();
        $blog->fill($data);
        $blog->save();

        return response()->json($blog);
    }

    // Delete
    public function destroy($id)
    {
        $blog = Blog::find($id);
        
        if (!$blog) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $blog->delete();

        return response()->json(['message' => 'Data deleted successfully'], 200);
    }
} 