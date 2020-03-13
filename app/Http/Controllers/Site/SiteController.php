<?php

namespace App\Http\Controllers\Site; 

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function __construct()
    {
        /*
        //$this->middleware('auth');
        $this->middleware('auth')   // middleware('auth') requer que o ususuario esteja logado
        ->only([ // passe o filtro no contato e categoria, requer que esteja logado para acesso nas funcoes
            //'contato',
            'categoria'
        ]);
    
        */

        /*
        $this->middleware('auth')
            ->except([ // Todos o metodos requer autorizacao de usuaario exceto index e contato
                'index',
                'contato'
            ]);

         */   
    }
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
