<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function config(){
        return view('user.config');
    }
    
  public function update(Request $request){
      
  
    
    
    // Conseguir usuario identificado
    $user = \Auth::user();  
    $id = \Auth::user()->id;  // Cambio de $ide a $id
    
    
    
    // VALIDACION DESDE LARAVEL **VALIDATE**   
    $validate = $this->validate($request, [  
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'nick' => 'required|string|max:255|unique:users,nick,'.$id,
        'email' => 'required|string|email|max:255|unique:users,email,' .$id,
    ]);
    
    // Recoger los datos del formulario
    $name = $request->input('name');
    $surname = $request->input('surname');
    $nick = $request->input('nick');
    $email = $request->input('email');
    
    // Asignar nuevos valores al objeto del usuario
    $user->name = $name;
    $user->surname = $surname;
    $user->nick = $nick;
    $user->email = $email;
    
         //Subir nueva imagen
    $image_path=$request->file('image_path');
    if($image_path){
        //Poner nombre unico
        $image_path_name = time().$image_path->getClientOriginalName();
        
        //guardar en carpeta
        Storage::disk('users')->put($image_path_name, File::get($image_path));
        
        
        //setear nombre de la imagen en objeto
        $user->image = $image_path_name;
    }
    
   
    
    // Ejecutar consulta y ACTUALIZAR cambios en db
    $user->update();
    
    return redirect()->route('config')
                     ->with(['message' => 'Usuario actualizado correctamente']);
}


}
