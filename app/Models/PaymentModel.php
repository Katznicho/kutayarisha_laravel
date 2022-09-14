<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = [
        'user_id',
        'plan_id',
        'status',
        'externalReference',
        'narrative',
        'phone',
        'currency',
        'amount',

    ];

}
