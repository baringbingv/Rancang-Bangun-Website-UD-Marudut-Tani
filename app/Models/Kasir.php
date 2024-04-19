<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Kasir extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'kasir';
    protected $guard = 'kasir';
}
