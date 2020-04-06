<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Painel\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $user;
    private $userPorPag = 5;
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function index(User $user)
    {
        // $users = $user->all(); Lista todos usuarios
        $users = $user->paginate($this->userPorPag);

        return view('painel.User.user', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function viewUserCreate()
    {   
        $title = 'Novo Usuario.';
       return view('painel.User.userCreate',compact('title'));
    }

    public function create(Request $request)
    {
        
        $_POST['password'] = base64_encode($_POST['password']);
        $data = $_POST;
        //valida formulario de acordo com os requisitos do atributo  rules da model
        $this->validate($request,$this->user->rules); // valor a ser validado , array de validaçao esta na model
        $insertUser = $this->user->create($data);
        
        if($insertUser)
        {   
             $users = $this->user->all();
             $statusErrorOrSusses = 'Usuario Criado!';
             return view('painel.User.user', compact('statusErrorOrSusses','users'));
        }
        else
        {
              $users = $this->user->all();
              $statusErrorOrSusses = 'Erro ao Criar usuario!';
              //return redirect('/site/users', compact('statusErrorOrSusses','users'));
               return view('painel.User.user', compact('statusErrorOrSusses','users'));
        }
      
       
    } 






    /**   viewUserEdit
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = (int)$id;
        if($id === 0)
        {
              return 'Parametro GET incorreto!';
        }
        else
        {
            $title = 'Editar usuario.';
            $data = $this->user->find($id); 
            return view('painel.User.userCreate', compact('title','data'));
          
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit()
    {
         $id = $_POST['id'];
         $data = $_POST;
         $user = $this->user->find($id); // primeiro pesquisa PELO ID
         $update = $user->update([ // altera os campos passados no array
            $data
         ]);

         if($update)
         {
            $statusErrorOrSusses = 'Usuario Alterado com Sucesso!';
            return view('painel.User.user', compact('statusErrorOrSusses','users'));
            
         }
         else
         {
            $statusErrorOrSusses = 'Erro ao Alterar Usuario!';
            return redirect('/site/users');
         }
           

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id=0)
    {
         $id = $_POST['id'];
         $data = $_POST;
         $user = $this->user->find($id); // primeiro pesquisa PELO ID
         $update = $user->update([ // altera os campos passados no array
            'name'  => $data['name'],
            'email' => $data['email']
         ]);

         if($update)
         {
            $statusErrorOrSusses = 'Usuario Alterado com Sucesso!';
            $users = $this->user->all();
            return view('painel.User.user', compact('statusErrorOrSusses','users'));
        
            
         }
         else
         {
            $statusErrorOrSusses = 'Erro ao Alterar Usuario!';
            $users = $this->user->all();
            return view('painel.User.user', compact('statusErrorOrSusses','users'));
         }
           
           
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $id = (int) $id;

        if($id === 0)
        {
              return 'Parametro GET incorreto!';
        }
        else
        {
           $users = $this->user->find($id);
            
           if($users)
           {
                $delete = $this->user->find($id)->delete();
                
                if($delete)
                {
                    $statusErrorOrSusses = 'Usuario Deletado com Sucesso!';
                    $users = $this->user->all();
                    return view('painel.User.user',compact('statusErrorOrSusses','users'));
                }
                else
                {
                    $statusErrorOrSusses = 'Erro ao Deletar!';
                    $users = $this->user->all();
                    return view('painel.User.user',compact('statusErrorOrSusses','users')); 
                }
            }  
            else
            {
                return redirect('/site/users');

            }
            
        }

    }

}



    