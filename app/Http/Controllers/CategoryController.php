<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
    	return Category::all();
    }

    public function topics(Category $category)
    {
    	$topics = $category->topics()->orderBy('created_at', 'desc')->paginate(5);

    	return $topics;
    }
}
