<?php

namespace App\Http\Controllers;

use App\Models\BlogUser;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Session;


class ZenBlogController extends Controller
{

    public function index()
    {
        $blogs = DB::table('blogs')
            ->join('authors', 'authors.id', '=', 'blogs.author_id')
            ->join('categories', 'categories.id', '=', 'blogs.category_id')
//            ->where('blog_type', 'Latest')
            ->where('blogs.status', 1)
            ->orderByDesc('blog_type')
            ->select('blogs.*', 'authors.author_name', 'categories.category_name')
            ->get();
        return view('frontEnd.home.home', [
            'blogs' => $blogs
        ]);
    }

    public function blogDetails($slug)
    {

        $blogs = DB::table('blogs')
            ->join('authors', 'authors.id', '=', 'blogs.author_id')
            ->join('categories', 'categories.id', '=', 'blogs.category_id')
            ->where('blogs.slug', $slug)
            ->select('blogs.*', 'authors.author_name', 'categories.category_name')
            ->first();
        $catID = $blogs->category_id;

        $categoryWiseBlogs = DB::table('blogs')
            ->join('authors', 'authors.id', '=', 'blogs.author_id')
            ->join('categories', 'categories.id', '=', 'blogs.category_id')
            ->where('category_id', $catID)
            ->select('blogs.*', 'authors.author_name', 'categories.category_name')
            ->get();

        $comments = DB::table('comments')
            ->join('blog_users', 'blog_users.id', '=', 'comments.user_id')
            ->select('comments.*', 'blog_users.name', 'blog_users.image')
            ->where('blog_id', $blogs->id)
            ->get();

        return view('frontEnd.blog.blog-details', [
            'blogs' => $blogs,
            'categoryWiseBlogs' => $categoryWiseBlogs,
            'comments' => $comments,
        ]);
    }

    public function about()
    {
        return view('frontEnd.about.about');
    }

    public function contact()
    {
        return view('frontEnd.contact.contact');
    }

    public function category($id)
    {
        $categoryWiseBlogs = DB::table('blogs')
            ->join('authors', 'authors.id', '=', 'blogs.author_id')
            ->join('categories', 'categories.id', '=', 'blogs.category_id')
            ->where('category_id', $id)
            ->select('blogs.*', 'authors.author_name', 'categories.category_name')
            ->get();

        $category = Category::where('id', $id)->first();

        return view('frontEnd.category.category', [
            'categoryWiseBlogs' => $categoryWiseBlogs,
            'category' => $category,
        ]);
    }

    public function userRegister()
    {
        return view('frontEnd.user.user-register');
    }

    public function saveUser(Request $request)
    {
        BlogUser::saveUser($request);
        return redirect(route('user.login'));
    }

    public function userLogin()
    {
        return view('frontEnd.user.user-login');
    }

    public function checkUserLogin(Request $request)
    {
        $userInfo = BlogUser::where('email', $request->user_name)
            ->orWhere('phone', $request->user_name)
            ->first();


        if ($userInfo) {
            $existingPass = $userInfo->password;
            if (password_verify($request->password, $existingPass)) {
                Session::put('userId', $userInfo->id);
                Session::put('userName', $userInfo->name);
                return redirect('/');
            } else {
                return back()->with('message', 'Please enter valid username or password');
            }
        } else {
            return back()->with('message', 'Please enter valid username or password');
        }
    }

    public function logout()
    {
        Session::forget('userId');
        Session::forget('userName');
        return redirect(route('user.login'));
    }

}
