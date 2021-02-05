<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){
        $allPosts = Post::all();
        return view ('posts.index' , ['posts' =>$allPosts]);
    }

    public function create(){
        $pickUser = User::all();
        return view('posts.create', ['users' =>$pickUser]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $title = $request->title;
        $description = $request->description;
        $user_name = $request->user_name;
        $storeData = Post::Create ([
            'title' => $title,
            'description' => $description,
            'name' => $user_name,
        ]);
            return redirect(route('posts.index'));
    }

    public function show($post){
        $showPost = Post::findOrFail($post);
        return view('posts.show', ['post' =>$showPost]);
    }

    public function edit($post){
    $editPost = Post::findOrFail($post);
    $pickUser = User::all();
    return view('posts.edit', ['post' =>$editPost , 'users'=>$pickUser]);
    }

    public function update($post, Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $updateData = Post::findOrFail($post);
        $updateData->Update([
            'title' => $request->title,
            'description' => $request->description,
            'name' => $request->user_name,

        ]);
        return redirect(route('posts.index'));
    }

    public function destroy($post){
        $deleteData = Post::findOrFail($post);
        $deleteData->destroy($post);
        return redirect(route('posts.index'));
    }
    
}
