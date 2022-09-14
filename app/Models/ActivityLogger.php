<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLogger extends Model
{
    use HasFactory;
    protected $fillable = [
        'ip_address',
     'user_id', 'activity', 'status', 'description', 'active_flag', 'del_flag',];
}
