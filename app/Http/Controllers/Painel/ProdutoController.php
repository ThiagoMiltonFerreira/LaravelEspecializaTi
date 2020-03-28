<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\painel\Product;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $product;

    public function __construct(Product $product)  //(Product $Product) e o mesmo que $product = new Product();
    {
        $this->product = $product;
    }

    public function index() 
    {
        
       $products = $this->product->all(); //retorna todos os produtos do model produtos

        return view('painel.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'Create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // Request $request ja faz automaticamente o $request = new $request();  ja cria o objeto
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tests()
    {

        /*
        ********INSERT*********
        $insert = $this->product->create([ // Usado para inserir no banco de dados(Create), cuidado com a model deve sempre DEFINIR QUAIS CAMPOS PODEM SER INSERIDOS NO BANCO
            'name'          => 'Nome do produto2',
            'number'        => 12321546,
            'active'        => false,
            'category'      => 'eletronicos',
            'description'   => 'Descrisao vem aqui'
        ]);

        if($insert)
        {
            return "Inserido com sucesso, ID: {$insert->id}";
        }
        else
        {
            return 'Falha ao inserir';
        }
        */
        //******PESQUISA POR ID********
        /*
        $prod = $this->product->find(5); //PESQUISA PELO ID
        echo $prod->name;
        dd($prod->name); // Debug do laravel da um vardup e para o processo
        */
        //******PESQUISA COM WHERE********
        /*
        $prod = $this->product->where('number','=',222);; //PESQUISA VALOR PELA COLUNA NUMBER
        dd($prod->name); // Debug do laravel da um vardup e para o processo
        */
        /*

        //******UPDATE POR ID********
         $prod = $this->product->find(2); // primeiro pesquisa PELO ID
         $update = $prod->update([ // altera os campos passados no array
            'name'      =>'Update',
            'number'    => 11111
         ]);

        if($update)
        {
            return "Alterado com sucesso";
        }
        else
        {
            return 'Falha ao alterar';
        }
        */
        /*

         //******UPDATE COM WHERE********
         $prod = $this->product->where('number','=',11111); //  pesquisa PELO CAMPO NUMERO DO BANCO DE DADOS
         $update = $prod->update([ // altera os campos passados no array
            'name'      =>'alteraçao com where2',
            'number'    => 920011848
         ]);

        if($update)
        {
            return "Alterado com sucesso";
        }
        else
        {
         
            return 'Falha ao alterar';

        }
         */
    /*
        //DELETE - Deleta somente um usuario, primeiro pesquisa para depois deletar.
        $prod = $this->product->find(7); 
        $delete = $prod->delete(); //deleta somente o valor passado como parametro
    */
    /*
        //DELETE - DELETE COM WHERE
        $prod = $this->product->where('numeber',1111); 
        $delete = $prod->delete(); //deleta somente o valor passado como parametro
    */
     //OURTRA ALTERNATIVA
    $prod = $this->product->destroy([2,4]); // posso passar um UNICO ID PARA DELETAR OU PASSAR UM ARRAY COM TODOS ID PARA DELETAR
 
    if($prod)
    {
        return 'Deletado com sucesso!';
    }
    else
    {
        return 'Falha ao Deletar!';
    }

    }
}
