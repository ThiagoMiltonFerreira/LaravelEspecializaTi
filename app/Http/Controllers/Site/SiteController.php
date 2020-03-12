<?php

namespace App\Http\Controllers\Site; 

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
    	return 'Home Page do Site';
    }

    public function contato()
    {
    	return 'Pagina contato';

    }

    public function categoria($id)
    {
    	return "Listagem dos posts da categoria: {$id}";
    }

    public function categoriaOp($id = 10) // valor padrao da rota caso nao seja enviado via get
    {
    	return "Listagem dos posts da categoria: {$id}";
    }
}
