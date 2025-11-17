<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request) {
        //$posts = Post::orderBy('id', 'desc')->get();
        $posts = Post::all();
        return view('index', compact('posts'));
    } 
    
    
    public function addview(Request $request) {
        return view('add');
    }


    public function createData(Request $request) {
        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'subtitle'=>'required',
            'content' => 'required',
            'image' => 'required|file|mimes:jpg,png,pdf,docx|max:10240'
        ]);
        $post = new Post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->content = $request->content;
         if($request->hasFile('image')){
               //unlink(public_path('uploads/site_logo/'.$row->site_logo));
                $files = $request->file('image');
                $image = $files->getClientOriginalName();
                $name = time().'.'.$files->getClientOriginalExtension();
                $destinationPath = public_path('/uploads');
                $imagePath = $destinationPath. "/".  $name;
                $files->move($destinationPath, $name);
                $post->image=$name;
            }
        $post->save();
        if ($post) {
            return redirect()->route('posts.index')->with('success', 'Post created successfully');
        }
        
    }


    public function editview(Request $request, $id) {
        $post = Post::find($id);
        return view('edit', compact('post'));
    }


    public function update(Request $request, $id) {
        
        $request->validate([
        'title' => 'required',
        'subtitle' => 'required',
        'content' => 'required',
        "image" => "required|file|mimes:jpg,png,pdf,docx|max:10240"
    ]);
    
    $post = Post::find($id);
    $post->title = $request->title;
    $post->subtitle = $request->subtitle;
    $post->content = $request->content;

    if ($request->hasFile('image')) {
        // Check if the file exists before deleting it
        $existingImagePath = public_path('uploads/' . $post->image);
        if (is_file($existingImagePath)) {
            unlink($existingImagePath);  // Delete the existing image file
        }

        $file = $request->file('image');
        $image = $file->getClientOriginalName();
        $name = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');
        $imagePath = $destinationPath . "/" . $name;
        
        // Move the uploaded file
        $file->move($destinationPath, $name);

        // Update the image path in the database
        $post->image = $name;
    }

    $post->save();

    if ($post) {
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }
    }



    public function destroy(Request $request, $id) {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
