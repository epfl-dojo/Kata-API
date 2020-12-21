<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beer;
use \Illuminate\Support\Facades\Validator;
use Log;
use DateTime;

class BeerController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/beers",
    *     description="Get all beers",
    *     tags={"Beer"},
    *     @OA\Response(response="default", description="List of all beers")
    * )
    */
    public static function getBeers(){
        return Beer::all();
    }

     /**
     * @OA\Get(
     *      path="/api/beer/{id}",
     *      operationId="getBeerByID",
     *      tags={"Beer"},
     *      summary="Get a beer by ID",
     *      description="Return a beer by id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Beer ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Beer")
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
    public static function getBeer($id){
        return Beer::find($id);
    }

    /**
    * @OA\Post(
    *     path="/api/beer",
    *     description="Create a beer",
    *     tags={"Beer"},
    *     @OA\Response(response="default", description="Confirmation")
    * )
    */


    public static function createBeer($request){

            $date = new DateTime();
            $formatedDate = $date->format('Y-m-d H:i:s');
            $data = $request->json()->all();
            $data['last_mod'] = $formatedDate;

            $validator = Validator::make($data, [
                'name' => ['required', 'string'],
                'brewery_id' => ['required', 'integer'],
                'cat_id' => ['required', 'integer'],
                'style_id' => ['required', 'integer'],
                'abv' => ['required', 'numeric'],
                'ibu' => ['required', 'numeric'],
                'srm' => ['required', 'numeric'],
                'upc' => ['required', 'integer'],
                'filepath' => ['required', "string"],
                'descript' => ['required', "string"],
                'add_user' => ['required', 'integer'],
                'last_mod' => ['required', 'string'],
            ]);

              if($validator->fails()){
                  Log::error('fail');
                  return 400;
              } else {
                  Log::info('success');
                  Beer::create(['name' => $request->input('name'), 'brewery_id' => $request->input('brewery_id'), 'cat_id' => $request->input('cat_id'), 'style_id' => $request->input('style_id'), 'abv' => $request->input('abv'), 'ibu' => $request->input('ibu'), 'srm' => $request->input('srm'), 'upc' => $request->input('upc'), 'filepath' => $request->input('filepath'), 'descript' => $request->input('descript'), 'add_user' => $request->input('add_user'), 'last_mod' => $formatedDate]);
                  return 204;
              }
    }

    /**
    * @OA\Delete(
    *     path="/api/beer/:id",
    *     description="Delete a beer by id",
    *     tags={"Beer"},
    *     @OA\Response(response="default", description="Confirmation")
    * )
    */
    public static function deleteBeer($id){
        Beer::destroy($id);
    }

    /**
    * @OA\Put(
    *     path="/api/beer/:id",
    *     description="Modify a beer by id",
    *     tags={"Beer"},
    *     @OA\Response(response="default", description="Confirmation")
    * )
    */
    public static function putBeer($request, $id){

        $date = new DateTime();
        $formatedDate = $date->format('Y-m-d H:i:s');
        $data = $request->json()->all();
        $data['last_mod'] = $formatedDate;

        $validator = Validator::make($data, [
            'name' => ['required', 'string'],
            'brewery_id' => ['required', 'integer'],
            'cat_id' => ['required', 'integer'],
            'style_id' => ['required', 'integer'],
            'abv' => ['required', 'numeric'],
            'ibu' => ['required', 'numeric'],
            'srm' => ['required', 'numeric'],
            'upc' => ['required', 'integer'],
            'filepath' => ['required', "string"],
            'descript' => ['required', "string"],
            'add_user' => ['required', 'integer'],
            'last_mod' => ['required', 'string'],
        ]);

        if($validator->fails()){
            Log::error('fail');
            return 400;
        } else {
            Log::info('success');
            $beer = Beer::find($id);
            $beer->fill($data);
            $beer->save();
            return 204;
        }
    }

    /**
    * @OA\Patch(
    *     path="/api/beer/:id",
    *     description="Partially modify a beer by id",
    *     tags={"Beer"},
    *     @OA\Response(response="default", description="Confirmation")
    * )
    */
    public static function patchBeer($request, $id){
        $date = new DateTime();
        $formatedDate = $date->format('Y-m-d H:i:s');
        $data = $request->json()->all();
        $data['last_mod'] = $formatedDate;
        $validator = Validator::make($data, [
            'name' => ['string'],
            'brewery_id' => ['integer'],
            'cat_id' => ['integer'],
            'style_id' => ['integer'],
            'abv' => ['numeric'],
            'ibu' => ['numeric'],
            'srm' => ['numeric'],
            'upc' => ['integer'],
            'filepath' => ['string'],
            'descript' => ['string'],
            'add_user' => ['integer'],
        ]);

        if($validator->fails()){
            Log::error('fail');
            return 400;
        } else {
            Log::info('success');
            $beer = Beer::find($id);
            $beer->fill($data);
            $beer->save();
            return 204;
        }
    }
}
