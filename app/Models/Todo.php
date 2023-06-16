<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'payment_id',
        'payment_date',
        'payment_time',
        'payment_method',
        'payment_status',
        'payment_total',
    ];

    public function user(){
        $this->belongsTo(User::class);
    }

}
