<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // server side pagination
        $count =  $request->query("count");

        $posts = Post::simplePaginate($count);
        return response($posts);
    }

    public function store(Request $request)
    {
        $newPost = $request->validate([
            "author_name" => "required",
            "content" => "required",
        ]);

        if (Post::create($newPost)) {
            return response('post created successfully', 200);
        }
    }

    public function show(Post $post)
    {
        return response($post);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            "author_name" => "required",
            "content" => "required",
        ]);

        $post->author_name = $request->author_name;
        $post->content = $request->content;

        $oldPost = Post::find($post->id);

        if ($oldPost == $post) {
            return response("no changes", 304);
        }

        if ($post->save()) {
            return response("post updated successfully", 200);
        }
    }

    public function destroy(Post $post)
    {
        if ($post->delete()) {
            return response("post deleted successfully", 200);
        }

        return response("failed deleting post", 200);
    }
}
