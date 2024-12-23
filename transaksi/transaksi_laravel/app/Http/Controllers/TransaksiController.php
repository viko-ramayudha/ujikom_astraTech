<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Layanan;
use Illuminate\Support\Facades\Auth;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $transaksi = Transaksi::all();

        // // Filter berdasarkan pencarian
        // if ($request->has('search')) {
        //     $searchTerm = $request->query('search');
        //     // Lakukan filter berdasarkan ID hanya jika search term adalah numeric
        //     if (is_numeric($searchTerm)) {
        //         $transaksi->where('id_trx', $searchTerm);
        //     }
        // }

        // $transaksi = $transaksi->get();

        // return view('transaksi.index', compact('transaksi'));

        $transaksi = Transaksi::with('layanan')->get();

        foreach ($transaksi as $trx) {
            // Fetch username for doctor based on id_userr
            $doctor = User::find($trx->id_userr);
            if ($doctor && $doctor->role == 'doctor') {
                $trx->id_userr = $doctor->username;
            } else {
                $trx->id_userr = 'N/A'; // Default value if no doctor found
            }
        }

        // Variabel $products kemudian kita passing sebagai parameter ketika render view
        return response(view('transaksi.index', ['transaksi' => $transaksi]));
    }

    // public function create()
    // {
    //     return view('transaksi.create');
    // }

    public function create(Request $request)
    {
        
        // $user = user::all();
        $username = session()->get('username'); 
        $user = user::where('role', 'user')->get();
        $dokter = user::where('role', 'doctor')->get();
        $layanan = Layanan::all();
       
         // Retrieve id_layanan from the query string
         $id_layanan = $request->query('id_layanan');
         $harga = $request->query('harga');
    
        return view('transaksi.create', compact('user','username', 'dokter', 'layanan', 'id_layanan', 'harga'));
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'id_trx',
            'tgl_trx',
            'id_layanan',
            'id_user',
            'id_userr',
            'username',
            'tgl_janjian',
            'total_hrg',
            'updated_at',
            'created_at',
        ]);

        if (Transaksi::create($data)) {
            return redirect()->route('transaksi.index')->with('success', 'Transaksi Berhasil Ditambah');
        }

        return redirect()->route('transaksi.index')->with('error', 'Gagal menambahkan transaksi!');
    }

    public function show($id_trx)
    {
        $transaksi = Transaksi::findOrFail($id_trx);
        return view('transaksi.show', ['transaksi' => $transaksi]);
    }

    public function edit($id_trx)
    {
        $transaksi = Transaksi::findOrFail($id_trx);
        return view('transaksi.edit', ['transaksi' => $transaksi]);
    }

    public function update(Request $request, $id_trx)
    {
        $validatedData = $request->validate([
            'id_trx' => 'required|integer|min:0',
            'tgl_trx' => 'required|date_format:Y-m-d H:i:s',
            'id_layanan' => 'required|integer|min:0',
            'id_user' => 'required|integer|min:0',
            'id_userr' => 'required|integer|min:0',
            'tgl_janjian' => 'required|date_format:Y-m-d H:i:s',
            'total_hrg' => 'required|numeric|min:0',
        ]);

        $transaksi = Transaksi::findOrFail($id_trx);
        if ($transaksi->update($validatedData)) {
            return redirect()->route('transaksi.index')->with('success', 'Transaksi Berhasil Diubah');
        }

        return redirect()->route('transaksi.index')->with('error', 'Gagal mengubah transaksi!');
    }

    public function destroy($id_trx)
    {
        $transaksi = Transaksi::findOrFail($id_trx);
        if ($transaksi->delete()) {
            return redirect()->route('transaksi.index')->with('success', 'Transaksi Berhasil Dihapus');
        }

        return redirect()->route('transaksi.index')->with('error', 'Gagal menghapus transaksi!');
    }
}

//'id_trx' => [
            //     'required',
            //     'string',
            //     'max' => 10,
            //     'unique' => 'transaksi',
            //     ],
            //     'tgl_trx' => 'required|date',
            //     'id_layanan' => 'required|integer',
            //     'id_user' => 'required|integer',
            //     'id_userr' => 'required|integer',
            //     'tgl_janjian' => 'required|date',
            //     'total_hrg' => [
            //     'required',
            //     'numeric',
            //     'min' => 0.00,
            //     ],