<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Password;
use App\Models\Folder;

class PasswordController extends Controller
{
    public function index()
    {
        $passwords = Password::where('user_id', auth()->id())->get();
        return view('passwords.index', compact('passwords'));
    }


    public function create()
    {
        $folders = Folder::where('user_id', auth()->id())->get();

        return view('passwords.create', ['folders' => $folders]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'password' => 'required|string',
            'folder_id' => 'required|int'
        ]);

        Password::create([
            'user_id' => auth()->id(),
            'service_name' => $request->service_name,
            'encrypted_password' => $request->password,
            'folder_id' => $request->folder_id,
            'direccion' => $request->url,
        ]);

        return redirect()->route('home')->with('success', 'Contraseña guardada.');
    }


    public function update(Request $request, Password $password)
    {
        $this->authorize('update', $password);
    
        $request->validate([
            'service_name' => 'required|string|max:255',
            'password' => 'required|string',
        ]);
    
        $password->update([
            'service_name' => $request->service_name,
            'encrypted_password' => $request->password,
        ]);
    
        return redirect()->route('passwords.index')->with('success', 'Contraseña actualizada.');
    }
    

    public function destroy(Password $password)
    {
        $this->authorize('delete', $password);
        $password->delete();
    
        return redirect()->route('passwords.index')->with('success', 'Contraseña eliminada.');
    }
}
