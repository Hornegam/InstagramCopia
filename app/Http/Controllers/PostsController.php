<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    //funcao para apenas quem estar logado poder ver
    public function __construct(){
        $this->middleware('auth');

    }

    public function index(){
        //Pega todos os ids dos usuarios autenticados que o perfil está seguindo
        //o pluck serve para unir todos
        $users = auth()->user()->following()->pluck('profiles.user_id');
        //Junta todos em uma variavel, pois sem essa linha o sistema não sabe qual user_id usar
        //basicamente essa linha fala para utilizar todos os ID e pegas os posts
      //  $posts = Post::whereIn('user_id',$users)->orderBy('created_at','DESC')->get();
        //OU PODE UTILIZAR A MESMA LINHA, MESMO RESULTADOS
        $posts = Post::whereIn('user_id',$users)->with('user')->latest()->paginate(5);
        return view('posts.index',compact('posts'));
    }

   public function create(){
       return view('posts.create');
   }

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

    public function show(\App\Post $post){
        return view('posts.show', compact('post'));
    }
}
