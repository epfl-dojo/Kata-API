<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beer;
use \Illuminate\Support\Facades\Validator;
use Log;
use DateTime;

class BeerController extends Controller
{
    public static function getBeers(){
        return Beer::all();
    }

    public static function getBeer($id){
        return Beer::find($id);
    }

    public static function createBeer($request){

            // $json = $request->json();
            Log::error(var_export($request->json()->all(), true));
            Log::error(var_export($request->getContent(), true));
            Log::debug(var_export($request->input('name'), true));
            $param = $request->json()->all();
            Log::debug(var_export($param, true));

            // Log::debug($param->name);


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
            // $validator = Validator::make($request->json()->all(), [
            //     'name' => ['required', 'integer'],
            //     'descript' => 'required',
            // ]);


            // Log::debug($date->format('Y-m-d H:i:s'));



              if($validator->fails()){
                  Log::error('fail');
                  return 400;
              } else {
                  Log::info('success');
                  Beer::create(['name' => $request->input('name'), 'brewery_id' => $request->input('brewery_id'), 'cat_id' => $request->input('cat_id'), 'style_id' => $request->input('style_id'), 'abv' => $request->input('abv'), 'ibu' => $request->input('ibu'), 'srm' => $request->input('srm'), 'upc' => $request->input('upc'), 'filepath' => $request->input('filepath'), 'descript' => $request->input('descript'), 'add_user' => $request->input('add_user'), 'last_mod' => $formatedDate]);
                  return 204;
              }
    }

    public static function deleteBeer($id){
        Beer::destroy($id);
    }

    public static function putBeer($request){

        $date = new DateTime();
        $formatedDate = $date->format('Y-m-d H:i:s');
        $data = $request->json()->all();
        $data['last_mod'] = $formatedDate;

        $validator = Validator::make($request->json()->all(), [
            'name' => ['required'],
            'brewery_id' => ['required', 'integer'],
            'cat_id' => ['required', 'integer'],
            'style_id' => ['required', 'integer'],
            'abv' => ['required', 'float'],
            'ibu' => ['required', 'float'],
            'srm' => ['required', 'float'],
            'upc' => ['required', 'integer'],
            'filepath' => 'required',
            'descript' => 'required',
            'add_user' => ['required', 'integer'],
            'last_mod' => ['required', 'integer'],
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
