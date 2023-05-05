<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return view('dashboard.slides.index',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'subtitle'=>'required'
        ]);

        $data = $request->only(['title','subtitle']);
        $data['user_id'] = Auth::id();

        if($request->hasfile('image')){
            // rename
            $file = $request['image']->getClientOriginalName();
            $name = pathinfo($file,PATHINFO_FILENAME);
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $image = time().'-'.$name.'.'.$ext;

            Storage::putFileAs('public/slides/',$request['image'],$image);
            $data['image'] = $image;
        }

        if(Slide::create($data)){
            return redirect()->route('slides.index')->with('status','Slide was created success.');
        }

        return redirect()->back()->with('status','Something want wrong.');
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
        $slide = Slide::findOrFail($id);
        return view('dashboard.slides.edit',compact('slide'));
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
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required'
        ]);

        $data = $request->only(['title', 'subtitle']);

        $slide = Slide::findOrFail($id);

        if($request->hasfile('image')) {
            // rename
            $file = $request['image']->getClientOriginalName();
            $name = pathinfo($file, PATHINFO_FILENAME);
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $image = time().'-'.$name.'.'.$ext;

            //old photo delete
            Storage::delete($slide->image);
            //upload new photo
            Storage::putFileAs('public/slides/', $request['image'], $image);
            $slide->image = $image;
        }

        $slide->title = $request->title;
        $slide->subtitle = $request->subtitle;

        if($slide->save()) {
            return redirect()->route('slides.index')->with('status', 'Slide was updated successfully.');
        }

        return redirect()->back()->with('status', 'Something want wrong!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);

        // Delete the slide's image from storage
        if (Storage::delete('public/slides/' . $slide->image)) {
            // Delete the slide's record from the database
            if ($slide->delete()) {
                return redirect()->route('slides.index')->with('status', 'Slide was deleted successfully.');
            } else {
                return redirect()->back()->with('status', 'Failed to delete slide from database.');
            }
        } else {
            return redirect()->back()->with('status', 'Failed to delete slide image from storage.');
        }
    }

    public function destroyPhoto(Slide $slide)
    {
    // Delete the photo file from the disk
    Storage::delete('public/slides/' . $slide->image);

    // Update the slide record in the database to remove the photo
    $slide->image->update(['photo' => null]);

    // Redirect to the index page with a success message
    return redirect()->route('slides.edit')->with('success', 'Slide photo deleted successfully.');
    }
}
