<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Kata-API",
 *      description="L5 Swagger OpenApi description"
 * )
 *
 */

 /**
 * @OA\Get(
 *     path="/beers",
 *     description="Get all beers",
 *     @OA\Response(response="default", description="List of all beers")
 * )
 */

 /**
 * @OA\Get(
 *     path="/breweries",
 *     description="Get all breweries",
 *     @OA\Response(response="default", description="List of all breweries")
 * )
 */

 /**
 * @OA\Get(
 *     path="/categories",
 *     description="Get all categories",
 *     @OA\Response(response="default", description="List of all categories")
 * )
 */

 /**
 * @OA\Get(
 *     path="/styles",
 *     description="Get all styles",
 *     @OA\Response(response="default", description="List of all styles")
 * )
 */

 /**
 * @OA\Post(
 *     path="/beer",
 *     description="Create a beer",
 *     @OA\Response(response="default", description="Confirmation")
 * )
 */

 /**
 * @OA\Get(
 *     path="/beer/:id",
 *     description="Return a beer by id",
 *     @OA\Response(response="default", description="Beer")
 * )
 */

 /**
 * @OA\Get(
 *     path="/breweries/:id",
 *     description="Return a brewerie by id",
 *     @OA\Response(response="default", description="Brewerie")
 * )
 */

 /**
 * @OA\Get(
 *     path="/categories/:id",
 *     description="Return a categorie by id",
 *     @OA\Response(response="default", description="Categorie")
 * )
 */

 /**
 * @OA\Get(
 *     path="/styles/:id",
 *     description="Return a style by id",
 *     @OA\Response(response="default", description="Style")
 * )
 */

 /**
 * @OA\Put(
 *     path="/beer/:id",
 *     description="Modify a beer by id",
 *     @OA\Response(response="default", description="Confirmation")
 * )
 */

 /**
 * @OA\Patch(
 *     path="/beer/:id",
 *     description="Partially modify a beer by id",
 *     @OA\Response(response="default", description="Confirmation")
 * )
 */

 /**
 * @OA\Delete(
 *     path="/beer/:id",
 *     description="Delete a beer by id",
 *     @OA\Response(response="default", description="Confirmation")
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
