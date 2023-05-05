<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required',
            'product_id' => 'required|exists:products,id',
        ]);

        $comment = new Comment;
        $comment->content = $validated['content'];
        $comment->user_id = auth()->id();
        $comment->product_id = $validated['product_id'];
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        $product = Product::find($id);
        return view('view-product', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'content' => 'required',
        ]);

        if ($comment->user_id == auth()->id()) {
            $comment->update($validated);
            return back();
        }

        return response()->json(['error' => 'You are not authorized to update this comment.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if ($comment->user_id == auth()->id()) {
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully.');
        }
        return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
    }
}
