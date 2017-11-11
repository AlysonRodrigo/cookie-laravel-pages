<?php
/**
 * Created by PhpStorm.
 * User: Cookiesoft
 * Date: 10/11/2017
 * Time: 23:02
 */

namespace Modules\Pages\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'body'
    ];
}