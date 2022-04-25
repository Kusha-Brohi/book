<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Storycontent;
use App\Story;
use Illuminate\Http\Request;
use Image;
use File;

class StorycontentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('storycontent','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $storycontent = Storycontent::where('story_id', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('descrtiption', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $storycontent = Storycontent::paginate($perPage);
            }

            return view('admin.storycontent.index', compact('storycontent'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('storycontent','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $story = Story::where('deleted_at',Null)->get();
            // dd($story);
            return view('admin.storycontent.create',compact('story'));
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('storycontent','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'story_id' => 'required'
		]);

            $storycontent = new storycontent($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $storycontent_path = 'uploads/storycontents/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($storycontent_path) . DIRECTORY_SEPARATOR. $profileImage);

                $storycontent->image = $storycontent_path.$profileImage;
            }
            
            $storycontent->save();

            return redirect('admin/storycontent')->with('message', 'Storycontent added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('storycontent','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $storycontent = Storycontent::findOrFail($id);
            return view('admin.storycontent.show', compact('storycontent'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('storycontent','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $storycontent = Storycontent::findOrFail($id);
            $story = Story::where('deleted_at',Null)->get();
            return view('admin.storycontent.edit', compact('storycontent','story'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('storycontent','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'story_id' => 'required'
		]);
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $storycontent = storycontent::where('id', $id)->first();
            $image_path = public_path($storycontent->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/storycontents/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/storycontents/'.$fileNameToStore;               
        }else{
            $requestData['image'] = $request->old_image;
        }


            $storycontent = Storycontent::findOrFail($id);
             $storycontent->update($requestData);

             return redirect('admin/storycontent')->with('message', 'Storycontent updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('storycontent','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Storycontent::destroy($id);

            return redirect('admin/storycontent')->with('message', 'Storycontent deleted!');
        }
        return response(view('403'), 403);

    }
}
