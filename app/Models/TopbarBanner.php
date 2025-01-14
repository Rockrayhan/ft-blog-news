<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopbarBanner extends Model
{
    use HasFactory;
    protected $table = 'topbar_banners';

    protected $fillable = ['image', 'link', 'is_active'];
}
