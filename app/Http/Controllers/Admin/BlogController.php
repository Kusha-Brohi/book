<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Blog;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Validation\Rule;
use DB;
class BlogController extends Controller
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
        $model = str_slug('blog','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $blog = Blog::where('name', 'LIKE', "%$keyword%")->where('Is_deleted',0)->where('status',0)
                ->orWhere('short_detail', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $blog = Blog::where('Is_deleted',0)->where('status',0)->paginate($perPage);
            }

            return view('admin.blog.index', compact('blog'));
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
        $model = str_slug('blog','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('admin.blog.create');
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
        $model = str_slug('blog','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'short_detail' => 'required',
			'detail' => 'required',
			'image' => 'required',
            'slug' => ['required', Rule::unique('blogs')->where('status', 'active')->where('Is_deleted', '0')],
		]);

            if ($request->hasFile('image')) {
                $blog = new blog;

           
                $blog->name = $request->input('name');   
                $blog->short_detail = $request->input('short_detail');     
                $blog->detail = $request->input('detail');
                $blog->slug = $request->input('slug');
                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $destination_path = 'uploads/blogs/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($destination_path) . DIRECTORY_SEPARATOR. $profileImage);

                $blog->image = $destination_path.$profileImage;
                $blog->save();
            }

            return redirect('admin/blog')->with('message', 'Blog added!');
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
        $model = str_slug('blog','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $blog = Blog::findOrFail($id);
            return view('admin.blog.show', compact('blog'));
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
        $model = str_slug('blog','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $blog = Blog::findOrFail($id);
            return view('admin.blog.edit', compact('blog'));
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
    {      /* dd($request);*/
        $model = str_slug('blog','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'short_detail' => 'required',
			'detail' => 'required',
            'slug' => ['required', Rule::unique('blogs')->where('status', 'active')->where('Is_deleted', '0')->ignore($id)],
		]);
            $requestData = $request->all();
             $requestData['status'] = (!empty($request->status))?$request->status:0;

        if ($request->hasFile('image')) {
            
            $blog = blog::where('id', $id)->first();
            $image_path = public_path($blog->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/blogs/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/blogs/'.$fileNameToStore;               
        }


            $blog = Blog::findOrFail($id);
            $blog->update($requestData);

            return redirect('admin/blog')->with('message', 'Blog updated!');
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
        $model = str_slug('blog','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            //Blog::destroy($id);
            $blog = DB::table('blogs')->where('id',$id)->update(['Is_deleted' => 1]);
            $blog = DB::table('blogs')->where('id',$id)->update(['status' => 0]);
            return redirect('admin/blog')->with('message', 'Blog deleted!');
        }
        return response(view('403'), 403);

    }
}
