<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Url extends Model
{
    public $timestamps = false;

    public $fillable = ['url', 'shortened'];

    public static function getUniqueShortUrl()
    {
        $shortened = str_random(5);

        if (Url::whereShortened($shortened)->count() != 0) {
            return getUniqueShortUrl();
        }

        return $shortened;
    }

}
