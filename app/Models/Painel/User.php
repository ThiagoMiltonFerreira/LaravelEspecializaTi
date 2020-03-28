<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    	protected $fillable = [ // quais campos podem ser inseridos no banco pelo array
		'name', 'email', 'password'
	]; 
}
