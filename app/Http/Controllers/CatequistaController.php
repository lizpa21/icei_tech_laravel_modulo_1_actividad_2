<?php

namespace App\Http\Controllers;

use App\Models\Catequista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatequistaController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $catequistas = Catequista::latest()->paginate(5);
        return view('catequistas.index', compact('catequistas'));
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('catequistas.create');
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'    => 'required',
            'celular'   => 'required|integer',
            'correo'    => 'required|email|unique:catequistas',
            'parroquia' => 'required',
            'grupo'     => 'required'
        ]);

        $catequista = Catequista::create([
            'nombre'    => $request->nombre,
            'celular'   => $request->celular,
            'correo'    => $request->correo,
            'parroquia' => $request->parroquia,
            'grupo'     => $request->grupo
        ]);

        if($catequista){
            //Redirigir con mensaje de éxito
            return redirect()->route('catequistas.index')->with(['success' => 'Datos guardados exitosamente...']);
        }else{
            //Redirigir con mensaje de error
            return redirect()->route('catequistas.index')->with(['error' => 'No se pudieron guardar los datos...']);
        }
    }
    
    /**
     * edit
     *
     * @param  mixed $catequista
     * @return void
     */
    public function edit(Catequista $catequista)
    {
        return view('catequistas.edit', compact('catequista'));
    }

    /**
     * show
     *
     * @param  mixed $catequista
     * @return void
     */
    public function show(Catequista $catequista)
    {
        return view('catequistas.show', compact('catequista'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $catequista
     * @return void
     */
    public function update(Request $request, Catequista $catequista)
    {
        $this->validate($request, [
            'nombre'    => 'required',
            'celular'   => 'required|integer',
            'correo'    => 'required|email',
            'parroquia' => 'required',
            'grupo'     => 'required'
        ]);

        //Obtener datos de catequista por ID
        $catequista = Catequista::findOrFail($catequista->id);

        $catequista->update([
            'nombre'    => $request->nombre,
            'celular'   => $request->celular,
            'correo'    => $request->correo,
            'parroquia' => $request->parroquia,
            'grupo'     => $request->grupo
        ]);        

        if($catequista){
            //Redirigir con mensaje de éxito
            return redirect()->route('catequistas.index')->with(['success' => 'Datos actualizados con éxito...']);
        }else{
            //Redirigir con mensaje de error
            return redirect()->route('catequistas.index')->with(['error' => 'No se pudieron actualizar los datos...!']);
        }
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $catequista = Catequista::findOrFail($id);
        $catequista->delete();

        if($catequista){
            //Redirigir con mensaje de éxito
            return redirect()->route('catequistas.index')->with(['success' => 'Datos eliminados con éxito...']);
        }else{
            //Redirigir con mensaje de error
            return redirect()->route('catequistas.index')->with(['error' => 'No se pudieron borrar los datos...']);
        }
    }

}