<?php

namespace App\Http\Controllers;

use App\Models\Empresario;
use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Cidade;
class EmpresarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::get();
        $empresarios = Empresario::orderBy('created_at', 'DESC')->get();
        return view('home', [
            'estados' => $estados,
            'empresarios' => $empresarios,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
                    'name' => 'required|string|max:255',
                    'cell' => 'required|digits:11|unique:empresarios',
                    'state'=> 'required|max:27|numeric|gt:0',
                    'city' => 'required|string|',
                ],
                [
                    'name.required' => 'O campo nome é obrigatório!',
                    'name.string' => 'Nome não pode conter numeros',
                    'name.max' => 'O nome deve possuir no maximo 255 caracteres',
                    'cell.required' => 'O celular é obrigatório',
                    'cell.digits' => 'O celular deve possuir 11 números',
                    'cell.unique' => 'Este número de celular já está cadastrado',
                    'state.required' => 'Estado é obrigatório',
                    'state.max' => 'Escolha um estado válido',
                    'state.numeric' => 'Escolha um estado válido',
                    'state.gt' => 'Escolha um estado válido!',
                    'city.string' => 'Escolha uma cidade Válida',
                ]);
                
            
            $estado = Estado::where('id', $request->state)->get()->first();
            $empresario = new Empresario;
            $empresario -> name = $request->name;
            $empresario -> cell = $request->cell;
            $empresario -> city = $request->city . '/' . $estado->sigla;
            
            if($request->business_parent != null){
                
                $business_parent = Empresario::where( 'id', $request->business_parent)->get()->first();
                if($business_parent)
                $empresario -> business_parent = $business_parent->name;
                else
                return redirect (route('/'))->with('fail', 'Não foi possivel cadastrar usuário');
            }
            // dd($empresario);
            if($empresario -> Save()){
            return back()->with('success', 'Empresário cadastrado com sucesso');
            }
            else{
                return redirect (route('/'))->with('fail', 'Não foi possivel cadastrar usuário');
            }
        
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresario  $empresario
     * @return \Illuminate\Http\Response
     */
    public function show(Empresario $empresario)
    {
        
        $empresario = Empresario::where('id', $empresario)->get();
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresario  $empresario
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresario $empresario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresario  $empresario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresario $empresario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresario  $empresario
     * @return \Illuminate\Http\Response
     */
    public function destroy($empresario)
    {
        $empresario = Empresario::where('id', $empresario)->get()->first();
        if($empresario){
            $empresario->delete();
            return back()->with('deleted', 'Registro deletado com sucesso');
        }

        return back()->with('deleted', 'Erro ao excluir registro, tente novamente!');
        
    }
}
