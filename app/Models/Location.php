<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Location extends Model
{
    use HasFactory;

    protected $table = null;

    /**
     * Get unique locations from the users table.
     */
    public static function getAllLocations()
    {
        return DB::table('users')->select('address')->distinct()->whereNotNull('address')->get();
    }
}
