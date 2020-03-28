<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	//lista negra ou lista branca de insert no banco ou seja quais campos podem ou nao serem inseridos no banco
   // protected $table = 'products'; //caso a tabela tenha um nome diferente da classe

	protected $fillable = [ // quais campos podem ser inseridos no banco pelo array
		'name', 'number', 'active','category', 'description'
	]; 
	//protected $guarded = ['admin']; //quais campos nao podem ser inseridos no banco pelo array


}

