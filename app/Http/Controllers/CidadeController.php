<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
class CidadeController extends Controller
{
    public function cidades($id){
        $cidades = Cidade::where('estados_id', $id)->get();

        return json_encode($cidades);
    }
}
