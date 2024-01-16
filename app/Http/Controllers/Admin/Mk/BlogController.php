<?php

namespace App\Http\Controllers\Admin\Mk;

use App\Http\Controllers\Controller;

use App\Models\Post;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class BlogController extends Controller {

    public function blog($tag = null) {

        $posts = Post::latest();
        if($tag) {
            $posts->where('tag', $tag);
        }

        $posts = $posts->get();
        return view('app.mk.blog', [
            'posts' => $posts
        ]);
    }

    public function viewPost($id) {

        $post = Post::find($id);

        return view('app.mk.viewPost', [
            'post' => $post
        ]);
    }
    
    public function viewPosts() {

        $posts = Post::latest()->get();

        return view('app.mk.post', [
            'posts' => $posts
        ]);
    }

    public function createPost(Request $request) {

        $post               = new Post();
        $post->img          = $request->file->store('blog');
        $post->title        = $request->title;
        $post->description  = $request->description;
        $post->content      = $request->content;
        $post->tag          = $request->tag;
        $post->views        = 0;

        if($post->save()) {
            return redirect()->back()->with('success', 'Post criado com sucesso!');
        }

        return redirect()->back()->with('error', 'Tivemos um problema, tente novamente mais tarde!');
    }

    public function updatePost(Request $request) {

        $post               = Post::find($request->id);
        if(!$post) {
            return redirect()->back()->with('error', 'Não encontramos dados do Post, tente novamente mais tarde!');
        }
        $post->title        = $request->title;
        $post->description  = $request->description;
        $post->content      = $request->content;
        $post->tag          = $request->tag;
        if($request->file) {
            $post->img      = $request->file->store('blog');
        }

        if($post->save()) {
            return redirect()->back()->with('success', 'Post atualizado com sucesso!');
        }

        return redirect()->back()->with('error', 'Tivemos um problema, tente novamente mais tarde!');
    }


    public function deletePost(Request $request) {

        $password = $request->password;    
        if (Hash::check($password, auth()->user()->password)) {
           
            $post = Post::find($request->id);
            if ($post) {

                $post->delete();
                return redirect()->back()->with('success', 'Post excluído com sucesso!');
            } else {
                return redirect()->back()->with('error', 'Não encontramos dados do Post, tente novamente mais tarde!');
            }
        } else {
            return redirect()->back()->with('error', 'Senha incorreta!');
        }
    }
    
}
