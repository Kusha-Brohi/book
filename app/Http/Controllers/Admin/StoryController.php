<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Story;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Validation\Rule;

class StoryController extends Controller
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
        $model = str_slug('story','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $story = Story::where('content', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $story = Story::paginate($perPage);
            }

            return view('admin.story.index', compact('story'));
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
        $model = str_slug('story','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('admin.story.create');
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
        $model = str_slug('story','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'content' => 'required',
            'slug' => ['required', Rule::unique('stories')->where('deleted_at', NULL)],
		]);

            $story = new story($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $story_path = 'uploads/storys/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($story_path) . DIRECTORY_SEPARATOR. $profileImage);

                $story->image = $story_path.$profileImage;
            }
            
            $story->save();

            return redirect('admin/story')->with('message', 'Story added!');
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
        $model = str_slug('story','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $story = Story::findOrFail($id);
            return view('admin.story.show', compact('story'));
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
        $model = str_slug('story','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $story = Story::findOrFail($id);
            return view('admin.story.edit', compact('story'));
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
        $model = str_slug('story','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'content' => 'required',
            'slug' => ['required', Rule::unique('stories')->where('deleted_at', NULL   )->ignore($id)],
		]);
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $story = story::where('id', $id)->first();
            $image_path = public_path($story->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/storys/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/storys/'.$fileNameToStore;               
        }


            $story = Story::findOrFail($id);
             $story->update($requestData);

             return redirect('admin/story')->with('message', 'Story updated!');
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
        $model = str_slug('story','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Story::destroy($id);

            return redirect('admin/story')->with('message', 'Story deleted!');
        }
        return response(view('403'), 403);

    }
}
