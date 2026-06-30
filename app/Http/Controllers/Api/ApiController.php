<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CategoryResource;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function category($slug)
    {
        $category = Category::where("slug", $slug)->latest()->first();
        return new CategoryResource($category);
    }

    public function latest_articles()
    {
        $latest_articles = Article::where("status", true)->latest()->take(2)->get();
        return ArticleResource::collection($latest_articles);
    }
}
