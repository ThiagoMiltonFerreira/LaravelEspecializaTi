<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [ // quais campos podem ser inseridos no banco pelo array
		'name', 'email', 'password'
	]; 

    // campos requiridos no banco no formulario
	public $rules = [

		'name' 		=> 'required|min:3|max:50',
		'email'		=> 'required|min:1|max:50',
		'password' 	=> 'required'



	];
}
