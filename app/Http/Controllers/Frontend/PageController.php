<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    public function __construct()
    {
        $categories = Category::where("status", true)->get();
        View::share([
            "categories" => $categories
        ]);
    }

    public function home()
    {
        $latest_articles = Article::where("status", true)->latest()->take(2)->get();
        $advertises = Advertise::where("status", true)
            ->where("expiry_date", ">=", time())
            ->latest()
            ->take(3)
            ->get();
        return view('Frontend.home', compact('latest_articles', 'advertises'));
    }

    public function category($slug)
    {
        $category = Category::where("slug", $slug)->latest()->first();
        $advertises = Advertise::where("expiry_date", ">=", time())->get();
        return view('Frontend.category', compact('category', 'advertises'));
    }
    public function search(Request $request)
    {
        $q = $request->q;
        $articles = Article::where("title", "like", "%$q%")->get();
        $advertises = Advertise::where("expiry_date", ">=", time())->get();
        return view('Frontend.search', compact('articles', 'advertises', 'q'));
    }
    public function article($slug)
    {
        $article = Article::where("slug", $slug)->first();
        $advertises = Advertise::where("expiry_date", ">=", time())->get();
        return view('Frontend.article', compact('article', 'advertises'));
    }

   
}
