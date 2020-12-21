<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Style;

class StyleController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/styles",
    *     description="Get all styles",
    *     tags={"Style"},
    *     @OA\Response(response="default", description="List of all styles")
    * )
    */
    public static function getStyles(){
        return Style::all();
    }

    /**
    * @OA\Get(
    *      path="/api/style/{id}",
    *      operationId="getStyleByID",
    *      tags={"Style"},
    *      summary="Get a style by ID",
    *      description="Return a style by id",
    *      @OA\Parameter(
    *          name="id",
    *          description="Style ID",
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
    public static function getStyle($id){
        return Style::find($id);
    }
}
