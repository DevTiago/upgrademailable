<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use \Sushi\Sushi;

    protected $rows = [
        [
            'user' => 'Upgrade',
            'password' => 'Upgrade#2020',
        ],

    ];
}
