<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Echo_;
use function Laravel\Prompts\error;

class BlogsController extends Controller
{
    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['password']])) {
            $request->session()->regenerate();
            return redirect()->route('home-page');
        } else{
            return redirect()->back()->with('failed', 'Incorrect email or password');
        }

    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $blogs = Blogs::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('content', 'LIKE', '%' . $query . '%')
            ->get();

        return view('pages.blogs.index', compact('blogs'));
    }
    public function index()
    {
        $blogs = Blogs::paginate(3);
        return view('pages.blogs.index', compact('blogs'));
    }
    public function create()
    {
        $blogs = Blogs::all();
        return view('pages.blogs.create',compact('blogs'));
    }

    public function store(Request $request)
    {
         $request->validate(
            [
                'name' => 'required',
                'content' => 'required',
                'publisher' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'

            ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $blog = new Blogs();
        $blog->name = $request->name;
        $blog->content = $request->content;
        $blog->publisher = $request->publisher;
        $blog->image = 'images/'.$imageName;
        $blog->save();

        return redirect()->route('Blogs-Index');


    }


    public function edit(string $id)
    {
        $blogs = Blogs::find($id);
        return view('pages.blogs.edit', compact('blogs'));
    }
//
//     public function update(Request $request, $id)
//    {
//        // Validate the request, ensuring the image is a valid file type
//        $request->validate([
//            'name' => 'required',
//                'content' => 'required',
//            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
//
//        // Retrieve the item record by ID
//        $blogs = Blogs::findOrFail($id);
//
//        // Check if a new image was uploaded
//        if ($request->hasFile('image')) {
//            // Delete the old image if it exists
//            if ($blogs->image && Storage::exists($blogs->image)) {
//                Storage::delete($blogs->image);
//            }
//
//            // Store the new image file in the 'images' directory
//            $path = $request->file('image')->store('images');
//
//            // Update the item's image path
//            $blogs->image = $path;
//        }
//
//        // Update other fields if needed (optional, based on the model’s structure)
//        $blogs->name = $request->input('name');
//        $blogs->content = $request->input('content');
//
//        // Save the updated record
//        $blogs->save();
//
//        return redirect()->route('Blogs-Index');
//    }

    public function update(Request $request, $id)
    {
        // Validate the incoming data
//        $request->validate([
//            'name' => 'required',
//            'content' => 'required',
//            'publisher' => 'required',
//            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
//        ]);

        // Find the blog by ID
        $blog = Blogs::findOrFail($id);

        // Handle image update if a new file is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }

            // Store the new image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // Update the blog's image path
            $blog->image = 'images/' . $imageName;
        }

        // Update the blog's other fields
        $blog->name = $request->name;
        $blog->content = $request->content;
        $blog->publisher = $request->publisher;

        // Save the updated blog
        $blog->save();

        // Redirect to the blogs index route with a success message
        return redirect()->route('Blogs-Index')->with('success', 'Blog updated successfully!');
    }

    public function destroy (string $id)
    {
        $blogs = Blogs::find($id);
        $blogs->delete();
        return to_route('Blogs-Index');
    }
    public function show($id)
    {
        $Blogs = Blogs::find($id);
        return view('pages.blogs.show', compact('Blogs'));
    }



}
