<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersProducts extends Model
{
        // Table Name
    protected $table = 'users_products';

    public $user_id = 'user_id';

    public $order_id = 'order_id';
    // Timestamps
    public $timestamps = true;

    // Create a relationship with product to user
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
