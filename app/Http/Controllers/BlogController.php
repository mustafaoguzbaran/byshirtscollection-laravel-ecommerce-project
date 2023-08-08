<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        if (Route::is("blog.home")) {
            $getBlogData = Blog::all();
            return view("front.blog", compact("getBlogData"));
        } elseif (Route::is("blog.index")) {
            $blogData = Blog::all();
            return view("backoffice.all-blog", compact("blogData"));
        }
    }

    public function create()
    {
        return view("backoffice.add-blog");
    }

    public function store(Request $request)
    {
        $createPostData = [
            "title" => $request->create_post_title,
            "content" => html_entity_decode($request->create_post_content),
            "slug" => Str::slug($request->create_post_title),
        ];
        if ($request->create_post_featured_image) {
            $image = $request->file("create_post_featured_image");
            $imageName = time() . "-" . $image->getClientOriginalName();
            $image->storeAs("featured_images", $imageName, "public");
            $createPostData["featured_image"] = "storage/featured_images/" . $imageName;
        }
        $blog = Blog::create($createPostData);
        if ($request->create_post_tags) {
            $tags = explode(",", $request->create_post_tags);
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(["name" => trim($tagName), "slug" => Str::slug($tagName)]);
                $blog->tags()->attach($tag->id);
            }
        }
        return redirect()->route("blog.create");
    }

    public function show(Request $request)
    {
        $getBlogData = Blog::where("slug", $request->slug)->first();
        return view("front.show-blog", compact("getBlogData"));
    }

    public function destroy(Request $request)
    {
        Blog::destroy($request->id);
        return redirect()->route("blog.index");
    }
}
