<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    //funcao para apenas quem estar logado poder ver
    public function __construct(){
        $this->middleware('auth');

    }

   public function create(){
       return view('posts.create');
   }
/*
    //funcao para postagem
    public function store(){

        $data = request()->validate([
            
            'caption' => 'required',
            'image' => 'required|image',
            
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image -> save();

        //Métodos para salvar o post  
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);
        
        //Esse está incompleto
        //$post = new \App\Post();
        
        //$post -> caption = $data['caption'];
        //$post->save();
        
        return redirect('/profile/'.auth()->user()->id);
        


        //para verificar se os dados estao corretos, é um dump de todas as informacoes
        //dd(request()->all());
    }
*/
    public function show(\App\Post $post){
        return view('posts.show', compact('post'));
    }
}
