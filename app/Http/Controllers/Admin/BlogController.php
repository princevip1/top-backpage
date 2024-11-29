<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // blog list page
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    // blog add new page
    public function add_new()
    {
        return view('admin.blog.add');
    }

    // store blog
    public function store(Request $request)
    {
        // request validation
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'keyword' => 'required',
            'slug' => 'required', 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/img/blog'), $imageName);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->image = $imageName;
        $blog->description = $request->description;
        $blog->keyword = $request->keyword;
        $blog->slug = $request->slug;
        $blog->save();
        return redirect()->route('blog.list')->with('success', 'New Blog added successfully');
    }
    public function edit($id)
    {

        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('blog'));
    }

    // update blog
    public function update(Request $request)
    {
        // request validation
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'keyword' => 'required',
            'slug' => 'required',

        ]);

        $blog = Blog::find($request->id);

        // unlink old image
        $image_path = public_path('assets/img/blog/' . $blog->image);

        if (file_exists($image_path)) {
            @unlink($image_path);
        }

        // upload new image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/img/blog'), $imageName);

        $blog->image = $imageName;



        $blog->title = $request->title;

        $blog->description = $request->description;
        $blog->keyword = $request->keyword;
        $blog->slug = $request->slug;
        $blog->save();
        return redirect()->route('blog.list')->with('success', 'Blog updated successfully');
    }

    // delete blog
    public function delete($id)
    {
        $blog = Blog::find($id);
        // delete blog image
        $image_path = public_path('assets/img/blog/' . $blog->image);

        if (file_exists($image_path)) {
            @unlink($image_path);
        }

        $blog->delete();
        return redirect()->route('blog.list')->with('success', 'Blog deleted successfully');
    }

    public function publicBlogList()
    {
        $blogs = Blog::all();

        // create image url for each blog post image
        foreach ($blogs as $blog) {
            $blog->image = asset('assets/img/blog/' . $blog->image);
        }

        return view('blog', compact('blogs'));
    }

    public function publicBlogDetails($id)
    {
        $blog = Blog::find($id);
        $blog->image = asset('assets/img/blog/' . $blog->image);
        return view('blog-details', compact('blog'));
    }
}
