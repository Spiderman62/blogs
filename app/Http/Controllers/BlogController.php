<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categories;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private array $data = [];

    public function category(Request $request)
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
            ->where(function ($query) use ($request) {
                $query
                    ->where('blogs.status', '=', 1)
                    ->where('blogs.categories_id', '=', $request->route('id'));
            })
            ->when($request->search, function ($query) use ($request) {
                $query->where('blogs.name', 'like', '%' . $request->search . '%');
            })
            ->when($request->startDate && $request->endDate, function ($query) use ($request) {
                $query->
                whereDate('blogs.created_at', '>=', $request->startDate)
                    ->whereDate('blogs.created_at', '<=', $request->endDate);

            })
            ->paginate(5)->withQueryString();
        $this->data['category'] = Categories::select(['name', 'id'])->where('id', '=', $request->route('id'))->first();
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
