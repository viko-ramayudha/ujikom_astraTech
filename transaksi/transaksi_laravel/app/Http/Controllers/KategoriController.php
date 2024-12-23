<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response{

        $kategori = Kategori::all();
        
        // Variabel $layanans kemudian kita passing sebagai parameter ketika render view
        return response(view('kategori.index', ['kategori' => $kategori]));

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id_kategori): Response
    {
        dd('halaman show');
    }
}
