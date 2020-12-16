<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Log;
use DateTime;
use \Illuminate\Support\Facades\Validator;

class Beer extends Model
{
    use HasFactory;
    // https://stackoverflow.com/a/28277980
    public $timestamps = false;
    protected $fillable = ['name', 'descript', 'last_mod', 'cat_id', 'style_id', 'abv', 'ibu', 'srm', 'upc', 'filepath', 'add_user', 'last_mod'];

    public static function validateAll($data, $allFieldsRequired, $request){

        $date = new DateTime();
        $formatedDate = $date->format('Y-m-d H:i:s');
        $data = $request->json()->all();
        $data['last_mod'] = $formatedDate;

        if($allFieldsRequired){
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
            Log::error('allltheFIELD');
        } else {
            Log::error('NOOOTallltheFIELD');
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
        }

        if($validator->fails()){
            Log::error('fail');
            return 400;
        } else {
            Log::info('success');
            Beer::create(['name' => $request->input('name'), 'brewery_id' => $request->input('brewery_id'), 'cat_id' => $request->input('cat_id'), 'style_id' => $request->input('style_id'), 'abv' => $request->input('abv'), 'ibu' => $request->input('ibu'), 'srm' => $request->input('srm'), 'upc' => $request->input('upc'), 'filepath' => $request->input('filepath'), 'descript' => $request->input('descript'), 'add_user' => $request->input('add_user'), 'last_mod' => $formatedDate]);
            return 204;
        }
    }
}
