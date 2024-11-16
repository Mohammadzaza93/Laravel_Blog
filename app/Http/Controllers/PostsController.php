<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
{
    $posts = Post::take(3)->orderby('id','DESC' )->get(); // استرجاع جميع المشاركات
    return view('blog.index')->with('posts', $posts); // تمرير المشاركات إلى العرض
}

    public function create()
    {
        return view ('blog.create');
    }


    public function store(Request $request)
{
    $request->validate([
        'title' => 'required | max:50 | min:20',
        'description' => 'required|min:140',
        'image' => 'required | mimes:jpg,png,jpeg|max:5048',
    ]);
    
    // Generate slug
    $slug = Str::slug($request->title, '-');
    
    // Generate unique image name
    $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $newImageName);
    
    // Create post
    $post = Post::create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'slug' => $slug,
        'image_path' => $newImageName,
        'user_id' => Auth::user()->id,
    ]);

    return redirect('/blog');
}



    
    public function show(string $slug)
    {
       return view('blog.show')->with('post',Post::where('slug',$slug)->first());

    }

   
    public function edit(string $slug)
    {
        return view ('blog.edit')
        ->with('post',Post::where('slug',$slug)->first());;

    }

   
    public function update(Request $request, string $slug)
    {
        $request->validate([
            'title' => 'required | max:50 | min"20',
            'description' => 'required|min:140',
            'image' => 'required | mimes:jpg,png,jpeg|max:5048',
        ]);
        
        $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
        $request->image->move(public_path('images'),$newImageName);

        Post::where('slug', $slug)
    ->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'slug' => $slug,
        'image_path' => $newImageName, 
        'user_id' => Auth::user()->id
    ]);
    
           return redirect('/blog/' . $slug)
           ->with('message','Done');
    }

    
    public function destroy(string $slug)
    {
        Post::where('slug',$slug)
        ->delete();
        return redirect('/blog/')
           ->with('message','Done delete');
    }
}
