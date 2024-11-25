<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Password;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $usuario = Auth::user();
        $folders = Folder::where('user_id', auth()->id())
            ->withCount('passwords')
            ->get();
        $passwords = [];
        $selectedFolderId = null;

        return view('home', compact('folders', 'passwords', 'selectedFolderId', 'usuario'));
    }



    public function showFolder($folder_id)
    {
        // Obtiene los folders del usuario autenticado
        $folders = Folder::where('user_id', auth()->id())->withCount('passwords')->get();
    
        // Verifica si el folder pertenece al usuario
        $folder = Folder::where('id', $folder_id)->where('user_id', auth()->id())->first();
    
        // Si no existe, redirige a home con un mensaje
        if (!$folder) {
            return redirect()->route('home')->with('error', 'Folder no encontrado o no tienes permisos.');
        }
    
        // Obtiene las contraseñas asociadas al folder
        $passwords = $folder->passwords;
        $selectedFolderId = $folder_id;
        $usuario = Auth::user();
        $passwordCount = $passwords->count();
    
        return view('home', compact('folders', 'passwords', 'selectedFolderId', 'usuario', 'passwordCount'));
    }
    
}
