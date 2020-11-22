<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view("pages.posts.index")->with('posts', $posts);
    }

    public function create()
    {
        return view("pages.posts.create");
    }

    public function store(Request $request)
    {
        $this->validatePost($request);

        $post=new Post();

        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id = auth()->user()->id;
        
        $fileNameToStore = $this->uploadFile($request);
        $post->post_image = $fileNameToStore;

        $post->save();

        return redirect('/posts')->with('success', 'Post created');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view("pages.posts.show")->with('post', $post);
    }

    public function edit($id)
    {
        $post = POST::find($id);

        if(Auth::user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized page');
        }

        return view('pages.posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $this->validatePost($request);

        $post=Post::find($id);

        $post->title=$request->input('title');
        $post->body=$request->input('body');

        if($request->hasFile('post_image')){
            $fileNameToStore = $this->uploadFile($request);
            $post->post_image = $fileNameToStore; 
        }
        $post->save();

        return redirect('/posts')->with('success', 'Post updated');
    }

    public function destroy($id)
    {
        $post=Post::find($id);

        if(Auth::user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized page');
        }
        //:: delete file :://
        if($post->post_image!== 'noImage.jpg'){
            Storage::delete('public/post_images/'.$post->post_image);
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post removed');
    }

    //:: handle posts validation forms :://
    private function validatePost($request){
        $this->validate($request, [
            'title'=> 'required',
            'body'=> 'required',
            'post_image' => 'image|nullable|max:1999'
        ]);
    }

    //:: handle file upload :://
    private function uploadFile($request){
        if($request->hasFile('post_image')){
           $fileNameWithExt = $request->file('post_image')->getClientOriginalName();
           $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
           $extension = $request->file('post_image')->getClientOriginalExtension();
           $fileNameToStore = $fileName.'_'.time().'.'.$extension;

           $request->file('post_image')->storeAs('public/post_images', $fileNameToStore);
       }else{
           $fileNameToStore = 'noImage.jpg';
       }
       return $fileNameToStore;
   }
   
}
