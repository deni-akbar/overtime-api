<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use League\CommonMark\Reference\Reference;

class References extends Model
{
    use HasFactory;

    protected $table="references";

    /**
     * @param array $attributes
     * @return References
     */

}
