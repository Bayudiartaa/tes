<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;
    protected $table = "members";
    // protected $guarded = [];
    protected $fillable = ['nama', 'username', 'email', 'no_telepon', 'user_id'];

    public function refferal()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
