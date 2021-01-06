<?php

namespace App\Http\Controllers;
use App\Models\Brewery;

use Illuminate\Http\Request;

class BreweryController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/breweries",
    *     description="Get all breweries",
    *     tags={"Brewery"},
    *     @OA\Response(response="default", description="List of all breweries")
    * )
    */
    public static function getBreweries(){
        return Brewery::all();
    }
    
    /**
    * @OA\Get(
    *      path="/api/brewery/{id}",
    *      operationId="getBreweryByID",
    *      tags={"Brewery"},
    *      summary="Get a brewery by ID",
    *      description="Return a brewery by id",
    *      @OA\Parameter(
    *          name="id",
    *          description="Brewery ID",
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
    public static function getBrewerie($id){
        return Brewery::find($id);
    }
}
