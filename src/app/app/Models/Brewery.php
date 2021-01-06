<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Brewery",
 *     description="Brewery model",
 *     @OA\Xml(
 *         name="Brewery"
 *     )
 * )
 */
class Brewery extends Model
{
    use HasFactory;
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Brewery",
     *      description="Name of the brewery",
     *      example="Alaskan Brewing"
     * )
     *
     * @var string
     */
    public $cat_name;
}
