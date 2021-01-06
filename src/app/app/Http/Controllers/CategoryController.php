<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/categories",
    *     description="Get all categories",
    *     tags={"Category"},
    *     @OA\Response(response="default", description="List of all categories")
    * )
    */
    public static function getCategories(){
        return Category::all();
    }

    /**
    * @OA\Get(
    *      path="/api/category/{id}",
    *      operationId="getCategoryByID",
    *      tags={"Category"},
    *      summary="Get a category by ID",
    *      description="Return a category by id",
    *      @OA\Parameter(
    *          name="id",
    *          description="Category ID",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful operation"
    *       ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      )
    *     )
    */
    public static function getCategory($id){
        return Category::find($id);
    }
}
