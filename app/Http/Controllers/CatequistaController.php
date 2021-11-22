<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Catequista;

class CatequistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $catequistas;

    public function __construct(Catequista $catequistas)
    {
        $this->catequistas = $catequistas;
    }

    public function index()
    {
        
        $catequistasList = $this->catequistas->obtenerCatequista();
       //return "ok";
        return view('catequistas.index', ['catequistas' => $catequistasList]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catequistas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $catequista = new Catequista($request->all());
        $catequista->save();
        return redirect()->action([CatequistaController::class,'index']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $catequistas = $this->catequistas->obtenerCatequistaPorId($id);
        return view('catequistas.show', ['catequista'=> $catequistas]);

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
        $catequistas = $this->catequistas->obtenerCatequistaPorId($id);
        return view('catequistas.edit', ['catequista' => $catequistas]);

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
        $catequistas = Catequista::find($id);
        $catequistas->fill($request->all());
        $catequistas->save();
        return redirect()->action([CatequistaController::class, 'index']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $catequistas = Catequista::find($id);
        $catequistas->delete();
        return redirect()->action([CatequistaController::class, 'index']);
    }
}
