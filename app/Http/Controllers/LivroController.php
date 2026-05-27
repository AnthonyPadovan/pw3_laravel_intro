<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::orderBy('titulo')->get();
        return view('livros.index', compact('livros'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'titulo' => 'required|min:3|max:150',
            'autor' => 'required|min:3|max:100',
            'ano_publicacao' => 'required|integer|min:1|max:' . date('Y')
        ]);

        Livro::create($dados);

        return redirect('/livros');
    }
}