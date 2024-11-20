<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categories;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private array $data = [];

    public function category($id)
    {
        $this->data['blogs'] = Blog::select([
            'blogs.id',
            'blogs.name as blog_name',
            'blogs.image',
            'blogs.created_at',
            'blogs.view',
            'categories.name as category_name',
        ])
            ->join("categories", "categories.id", "=", "blogs.categories_id")
            ->where(function ($query) use ($id) {
                $query
                    ->where('blogs.status', '=', 1)
                    ->where('blogs.categories_id', '=', $id);
            })
            ->paginate(4);
        $this->data['category_name'] = Categories::select('name')->where('id', '=', $id)->first()->name;
        return inertia("Category", $this->data);
    }

    public function blogDetail(Blog $blog)
    {
        $this->data['blog'] = Blog::select([
            'blogs.id',
            'blogs.content',
            'blogs.image',
            'blogs.created_at',
            'blogs.view',
            'categories.name as category_name',
        ])->join("categories", "categories.id", "=", "blogs.categories_id")->where('blogs.id', '=', $blog->id)->firstOrFail();
        return inertia("BlogDetail", $this->data);
    }
}
