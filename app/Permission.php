<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{

	protected $fillable = [
		'name','guard_name'
   ];
}
