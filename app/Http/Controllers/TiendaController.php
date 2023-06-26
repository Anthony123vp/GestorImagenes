<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tienda;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiendas = Tienda::paginate(5);
        $ubicacion = $tiendas->values();
        $lat = -12.045494;
        $lng = -76.952272;
        return view('tiendas.index', compact(['tiendas','ubicacion','lat','lng']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tiendas.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required', 'distrito' => 'required', 'direccion' => 'required', 'lat' => 'required', 'lng' => 'required',
        ]);

        $tienda = $request->all();

        Tienda::create($tienda);
        return redirect()->route('tiendas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tienda $tienda)
    {
        $tiendas = Tienda::paginate(5);
        $ubicacion = $tiendas->values();
        $lat = floatval($tienda->lat);
        $lng = floatval($tienda->lng);
        return view('tiendas.index', compact(['tiendas','ubicacion','lat','lng']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tienda $tienda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tienda $tienda)
    {
        $tienda->delete();
        return redirect()->route('tiendas.index');
    }
}
