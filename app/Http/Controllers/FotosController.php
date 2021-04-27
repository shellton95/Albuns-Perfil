<?php

namespace App\Http\Controllers;

use App\Models\Upload as ModelsUpload;
use App\Models\Usuario as ModelsUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use models\usuario;
use models\upload;
class FotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $perfil = ModelsUsuario::find($id);
        $fotos = $perfil->uploadsFotos;
        //$fotos = ModelsUpload::all();
        return view('conteudo', compact('perfil', 'fotos'));
       // return view('conteudo', compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idPerfil = $request->input('numeroid');
        for($i = 0; $i < count($request->allFiles()['imagens']); $i++){
            $foto = $request->allFiles()['imagens'][$i];
            $upload = new ModelsUpload();
            $upload->id_usuario = $request->input('numeroid');
            $upload->arquivo = $foto->store('memory','public');
            $upload->save();
       }
        return redirect('/albuns/perfil/'.$idPerfil);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fotoshow = ModelsUpload::find($id);
        return view('modalfoto', compact('fotoshow'));
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
    public function destroy($albuns, $id)
    {
        $idPerfil = $albuns;
        $foto = ModelsUpload::find($id);
        $f = $foto->arquivo;
        Storage::disk('public')->delete($f);
        $foto->delete();
        return redirect('albuns/perfil/'.$idPerfil);
    }
}
