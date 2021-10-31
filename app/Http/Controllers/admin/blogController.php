<?php

namespace App\Http\Controllers\admin;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $all = Blog::all();
        return view('admin.blogindex', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',

        ]);


        $blog = auth()->user()->blogs()->create([
            'title' => $request->get('title'),
            'body' => $request->get('body') ?? null,
            'user_id' => auth()->user()->id,

        ]);

        $blog->categories()->sync($validData['category']);


        // dd($blog);

        return redirect(route('blog.index'))->with(
            'flash_message',
            $blog->title . ' ' .  'ساخته شد ' . ' '
        );;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrfail($id);
        $blog->delete();
        return redirect()->route('blog.index')->with('message', 'بلاگ مورد نظر حذف شد.');
    }
}
