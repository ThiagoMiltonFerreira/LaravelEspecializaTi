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
    private $totalPage=3;

    public function __construct(Product $product)  //(Product $Product) e o mesmo que $product = new Product();
    {
        $this->product = $product;
    }

    public function index() 
    {
        
       //$products = $this->product->all(); //retorna todos os produtos do model produtos
        $products = $this->product->paginate($this->totalPage); // Mostra todos os produtos paginados de acordo com a quantidade de pagina desejada $this->totalPage = 3
        return view('painel.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Gestão de Produtos.';
        $categorys = ['eletronicos', 'movies', 'limpeza', 'banho'];

        return view('painel.products.create-edit', compact('title','categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // Request $request ja faz automaticamente o $request = new $request();  ja cria o objeto
    {
        //**********CAPTURAR DADOS DO FORMULARIO *********

        //dd($request->all()); // pega todos os dados do formulario
        //dd($request->only(['name','number'])); // pegar somente o valor do campo nome e number passado no formulario, passo o valor a ser cpturado dentro do array usando o metodo only
        //dd($request->except(['_token'])); // pega todos os campos enviados exeto o campo token
        //dd($request->input('name')); //pegar o valor somente pelo name do campo

        //pega todos dados que vem do formulario
        $dataForm = $request->all();

        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1; // if ternario se nao existir dataforma passa 0 se existir passa 1
        //Faz o cadastro

        // valida dados enviados do form na model
        $this->validate($request, $this->product->rules); // quando nao atender o requisito de validacao que esta na model ele retorna para view um array errors com todos os erros

        $insert = $this->product->create($dataForm); // metodo de inserçao create usa o filleable da model atrbuto que da altorizacao de inserçao de quais campos podem ser inseridos no banco

        if($insert)
        {
            return redirect()->route('produtos.index');
        }
        else
        {
            return redirect()->back(); //volta para rota anterior
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->find($id); //recupera o produto pelo id

        $title = " Detalhes do produto: $product->name";

        return view('painel.products.show', compact('product','title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Recupera produto pelo ID
        $product = $this->product->find($id);
        $title = "Editar Produto: $product->name";
        $categorys = ['eletronicos', 'movies', 'limpeza', 'banho'];
        return view('painel.products.create-edit', compact('title','categorys','product'));
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
        //Recupera todos dados do formulario
        $dataForm = $request->all();

        //Pesquisa produto por id
        $product = $this->product->find($id);
        
        //Verifica se existe o dataforme se ele nao existir ou seja nao esta marcado valor 0 se existir valor 1 
        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1; // if ternario se nao existir dataforma passa 0 se existir passa 1
        //Faz o cadastro

        //Valida os dados que vierao do formulario (Request) , Array de validaçao na model ($this->product->rules)
        $this->validate($request, $this->product->rules);

        //De fato atualiza no banco os dados
        $update = $product->update($dataForm);

        if( $update )
        {
            return redirect()->route('produtos.index');
        }
        else
        {
            //Redireciona para rota produtos.edit passando a variavel errors na view ele esta sendo verificada se exite erro exibir para o usuario
            return redirect()->route('produtos.edit', $id)->with(['errors'=>'Falha ao alterar']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // o methodo para cair nesta desta classe e o DELETE. NAO FUNCIONA GET,POST
    {
       $product = $this->product->find($id);
       $delete = $product->delete($id);

       if ($delete) 
       {
           
           return redirect()->route('produtos.index');

       }
       else
       {

            return redirect()->route('produtos.show', $id)->with(['errors' => 'Falha ao deletar']);

       }

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
