<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $albumId)
    {
       return view('photos.create')->with('albumId',$albumId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => ['required'],
            'description' => ['required'],
            'photo' => ['required'],
        ]);

        $filenameWithExtension = $request->file('photo')->getClientOriginalName();
        $filename              = pathinfo($filenameWithExtension,PATHINFO_FILENAME);
        $extension             =  $request->file('photo')->getClientOriginalExtension();

        $filenameToStore = $filename."_".time().'.'.$extension;
        
        $path = $request->file('photo')->storeAs('public/albums/'.$request->input('album-id'),$filenameToStore);
        
        $photo = new Photo();
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->photo = $filenameToStore;
        $photo->size = $request->file('photo')->getSize();
        $photo->album_id = $request->input('album-id');
        $photo->save();

        return redirect('/albums/'.$request->input('album-id'))->with('success','Photo has benn added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photos = Photo::find($id);
        return view('photos.show')->with('photos',$photos);
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
        $photo = Photo::find($id);

        if(Storage::delete('/storage/albums/'.$photo->album_id.'/'.$photo->photo))
        {
            $photo->delete();

            return redirect('/')->with('success','Photo has been deleted Successfully');
        }
    }
}
