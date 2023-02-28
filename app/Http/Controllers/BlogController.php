<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\b;

class BlogController extends Controller
{
    public $blog, $image, $imageName, $directory, $imgUrl, $slug, $str;
    public function addBlog()
    {
        return view('admin.blog.add-blog',[
            'categories' => Category::all(),
            'authors' => Author::all(),
        ]);
    }

    public function saveBlog(Request $request)
    {
        $this->blog = new Blog();
        $this->blog->category_id = $request->category_id;
        $this->blog->author_id = $request->author_id;
        $this->blog->title = $request->title;
        $this->blog->slug = $this->makeSlug($request);
        $this->blog->date = $request->date;
        $this->blog->description = $request->description;
        if ($request->file('image')) {
            $this->blog->image = $this->saveImage($request);
        }
        $this->blog->blog_type = $request->blog_type;
        $this->blog->status = $request->status;
        $this->blog->save();
        return redirect(route('manage.blog'));
    }

    private function saveImage($request)
    {
        $this->image = $request->file('image');
        $this->imageName = rand() . '.' . $this->image->getClientOriginalExtension();
        $this->directory = 'asset/image/';
        $this->imgUrl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imgUrl;
    }

    private function makeSlug($request)
    {
        $this->slug = $request->slug;
        if($this->slug)
        {
            $this->slug = $request->slug;
            return preg_replace('/\s+/u','-',trim($this->str));
        }
        $this->str = $request->title;
        return preg_replace('/\s+/u','-',trim($this->str));
    }

    public function manageBlog()
    {

        $this->blog = DB::table('blogs')
            ->join('authors', 'authors.id', '=', 'blogs.author_id')
            ->join('categories','categories.id' , '=', 'blogs.category_id')
            ->select('blogs.*', 'authors.author_name', 'categories.category_name')
            ->get();

        return view('admin.blog.manage-blog', [
            'blogs' => $this->blog,
        ]);
    }

    public function status($id)
    {
        $this->blog = Blog::find($id);
        if($this->blog->status == 1)
        {
            $this->blog->status = 0;
        }
        else
        {
            $this->blog->status = 1;
        }
        $this->blog->save();
        return back();
    }

    public function deleteBlog(Request $request)
    {
        $this->blog = Blog::find($request->blog_id);
        $this->blog->delete();
        return back();
    }

    public function blogUpdate($id)
    {
        $this->blog = DB::table('blogs')
            ->join('authors', 'authors.id', '=', 'blogs.author_id')
            ->join('categories','categories.id' , '=', 'blogs.category_id')
            ->select('blogs.*', 'authors.author_name', 'categories.category_name')
            ->where('blogs.id',$id)->first();

        $categoryAuthorName = DB::table('blogs')
            ->join('authors', 'authors.id', '=', 'blogs.author_id')
            ->join('categories','categories.id' , '=', 'blogs.category_id')
            ->select('blogs.*', 'authors.author_name',  'categories.category_name')
            ->get();

        return view('admin.blog.blog-update',[
            'blogs' => $this->blog,
            'categoryAuthorNames' => $categoryAuthorName,
        ]);
    }

    public function blogUpdateForm(Request $request)
    {
        $this->blog = Blog::find($request->blog_id);
        $this->blog->category_id = $request->category_id;
        $this->blog->author_id = $request->author_id;
        $this->blog->title = $request->title;
        $this->blog->slug = $this->makeSlug($request);
        $this->blog->date = $request->date;
        $this->blog->description = $request->description;
        if ($request->file('image')) {
            if ($this->blog->image != null) {
                unlink($this->blog->image);
            }
            $this->blog->image = $this->saveImage($request);
        }
        $this->blog->blog_type = $request->blog_type;
        $this->blog->status = $request->status;
        $this->blog->save();
        return redirect(route('manage.blog'));
    }

}
