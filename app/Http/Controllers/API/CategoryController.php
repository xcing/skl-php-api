<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function viewList()
    {
        $category = Category::select('id', 'name')->get();

        return response()->json([
            'data' => $category,
        ], 200);
    }

}
