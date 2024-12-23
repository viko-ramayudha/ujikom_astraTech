<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Layanan;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response{

        // $layanan = Layanan::all();
        $layanan = Layanan::with('kategori')->get();
        // Variabel $layanans kemudian kita passing sebagai parameter ketika render view
        return response(view('layanan.index', ['layanan' => $layanan]));

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id_layanan): Response
    {
        dd('halaman show');
    }

    
}
