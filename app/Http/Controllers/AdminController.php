<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    private array $data = [];

    public function dashboard()
    {
        return inertia("Admin/Dashboard", []);
    }

    public function category()
    {
        $this->data['categories'] = Categories::select(['categories.id', 'categories.name as category_name', 'users.name as user_name'])
            ->join("users", "users.id", "=", "categories.user_id")
            ->where('categories.status', '=', '1')
            ->get();
        return inertia("Admin/Category", $this->data);
    }

    public function addCategory()
    {
        return inertia("Admin/AddCategory", []);
    }

    public function handleAddCategory(Request $request)
    {
        $field = $request->validate([
            'name' => 'required|string|max:50|min:3|unique:categories',
        ]);
        $field['user_id'] = Auth::user()->id;
        Categories::insert($field);
        return redirect()->route('adminCategory');
    }

    public function editCategory(Categories $category)
    {
        $this->data['category'] = $category;
        return inertia("Admin/EditCategory", $this->data);
    }

    public function handleEditCategory(Request $request)
    {
        $fields = $request->validate([
            'id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|max:50|min:3|unique:categories',
        ]);
        Categories::where('id', '=', $fields['id'])->update([
            'name' => $fields['name'],
        ]);
        return redirect()->route('adminCategory');
    }

    public function deleteCategory(Categories $category)
    {
        Categories::where('id', '=', $category->id)->update(['status' => '0']);
        return redirect()->route('adminCategory');
    }

    public function blog()
    {
        $this->data['blogs'] = Blog::select([
            'blogs.id',
            'blogs.name as blog_name',
            'blogs.content',
            'blogs.image',
            'blogs.created_at',
            'blogs.view',
            'categories.name as category_name',
            'blogs.status'
        ])
            ->join("categories", "categories.id", "=", "blogs.categories_id")
            ->where(function($query) {
                $query->where('categories.status', '=', '1')
                    ->where('blogs.status', '=', '1');
            })
            ->paginate(4);
        return inertia("Admin/Blog", $this->data);
    }

    public function addBlog()
    {
        $this->data['categories'] = Categories::select(['id', 'name'])->where('status', '=', '1')->get();
        return inertia("Admin/AddBlog", $this->data);
    }

    public function handleAddBlog(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'image' => 'required|image|max:2048',
            'content' => 'required|string|min:10',
            'categories_id' => 'required|integer',
        ]);
        $fields['image'] = Storage::disk('public')->put('blogs', $request->file('image'));
        $fields['created_at'] = now();
        Blog::create($fields);
        return redirect()->route('adminBlog');
    }

    public function editBlog(Blog $blog)
    {
        $this->data['blog'] = $blog;
        $this->data['categories'] = Categories::select(['id', 'name'])->where('status', '=', '1')->get();
        return inertia("Admin/EditBlog", $this->data);
    }

    public function handleEditBlog(Request $request)
    {
        $fields = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|max:255|min:3',
            'image' => 'required|image|max:2048',
            'content' => 'required|string|min:10',
            'categories_id' => 'required|integer',
        ]);
        $fields['image'] = Storage::disk('public')->put('blogs', $request->file('image'));
        $fields['created_at'] = now();
        Blog::where('id', '=', $fields['id'])->update($fields);
        return redirect()->route('adminBlog');
    }
    public function deleteBlog(Blog $blog){
        Blog::where('id','=',$blog->id)->update(['status' => '0']);
        return redirect()->route('adminBlog');
    }
}
