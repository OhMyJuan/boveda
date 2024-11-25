<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Folder;

class FolderController extends Controller
{
    public function mosrtrarCrearFolder() 
    {
        return view('folder.create');
    }

    public function crearFolder(Request $request)
    {

        $request->validate([
            'folder_name' => 'required|string',
        ]);

        Folder::create([
            'user_id' => auth()->id(),
            'nombre' => $request->folder_name,
        ]);

        return redirect()->route('home')->with('success', 'Carpeta creada.');
    }

    public function destroy($id)
    {
        $folder = Folder::where('id', $id)->where('user_id', auth()->id())->first();
    
        if ($folder) {
            $folder->delete();
    
            return redirect()->route('home')->with('success', 'Carpeta eliminada exitosamente.');
        } else {
            return redirect()->route('home')->with('error', 'Carpeta no encontrada o no tienes permiso para eliminarla.');
        }
    }
    
}
