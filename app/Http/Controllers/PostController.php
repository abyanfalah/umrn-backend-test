<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // server side pagination
        $count =  $request->query("count") ?? 5;

        $posts = Post::latest()->paginate($count);
        return response($posts);
    }

    public function store(Request $request)
    {
        $newPost = $request->validate([
            "title" => "required",
            "author_name" => "required",
            "content" => "required",
        ]);


        try {
            Post::create($newPost);
            return response('post created successfully', 200);
        } catch (\Exception $e) {
            return response("failed creating post: $e", 500);
        }
    }

    public function show(Post $post)
    {
        return response($post);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title" => "required",
            "author_name" => "required",
            "content" => "required",
        ]);

        $post->title = $request->title;
        $post->author_name = $request->author_name;
        $post->content = $request->content;

        try {
            $post->save();
            return response("post updated successfully", 200);
        } catch (\Exception $e) {
            return response("failed updating post: $e", 500);
        }
    }



    public function destroy(Post $post)
    {

        try {
            $post->delete();
            return response("post deleted successfully", 200);
        } catch (\Exception $e) {
            return response("failed deleting post: $e", 500);
        }
    }
}
