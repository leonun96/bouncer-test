<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsers extends Model
{
	use HasFactory;
	protected $table = "tipo_users";
	protected $guarded = [];
	public function users ()
	{
		return $this->hasMany(User::class);
	}
}
