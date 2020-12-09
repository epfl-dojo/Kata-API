<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

$dsn = "mysql:host=localhost;dbname=kata-api";
$dbh = new PDO($dsn, 'root', 'Super');

class Beer extends Model
{
    use HasFactory;

    static function getBeers(){
        $stmt = $pdo->prepare("SELECT name FROM table WHERE id=?");
        return $stmt->execute([$id]);

    }
}
