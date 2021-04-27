<?php

namespace App\Http\Controllers;

use App\Models\Upload as ModelsUpload;
use App\Models\User as ModelsUser;
use App\Models\Usuario as ModelsUsuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use models\usuario;
use models\upload;
class UsuarioController extends Controller
{
    
    public function index()
    {
        $usuarios = ModelsUsuario::all();
        return view('index', compact('usuarios'));
    }

  
    public function create()
    {
        return view('cadusuario');
    }

   
    public function store(Request $request)
    {
        $regras = ([
            'titulo'=> 'required',
            'areatexto'=> 'required',
            'arquivo'=> 'required'
        ]);
        $mensagem = ['require' => 'O Campo: attribute não pode ser nulo'];
        $request->validate($regras, $mensagem);
        $usuario = new ModelsUsuario();
        $usuario->nome = $request->input('titulo');
        $usuario->descricao = $request->input('areatexto');
        $usuario->imgcapa = $request->file('arquivo')->store('imagens', 'public');
        $usuario->save();
        return redirect()->route('albuns.index');

    }

  
    public function show($id)
    {


    }

   
    public function edit($id)
    {
        $usuario = ModelsUsuario::find($id);
        return view('editaAlbun', compact('usuario'));
    }

   
    public function update(Request $request, $id)
    {
        $regras = ([
            'titulo'=> 'required',
            'areatexto'=> 'required',
            'arquivo'=> 'required'
        ]);
        $mensagem = ['require' => 'O Campo: attribute não pode ser nulo'];
        $request->validate($regras, $mensagem);
        $usuario = ModelsUsuario::find($id);
        $usuario->nome = $request->input('titulo');
        $usuario->descricao = $request->input('areatexto');
        $usuario->imgcapa = $request->file('arquivo')->store('imagens', 'public');
        $usuario->save();
        return redirect()->route('albuns.index');

    }

    
    public function destroy($id)
    {
        $teste = DB::table('uploads')->where('id_usuario', '=', $id);
       
        $usuario = ModelsUsuario::find($id);
        $foto = $usuario->imgcapa;
        Storage::disk('public')->delete($foto);
        $usuario->delete();
        return redirect('/albuns');
    }
}
