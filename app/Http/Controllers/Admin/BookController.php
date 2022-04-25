<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Book;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Validation\Rule;
use DB;
class BookController extends Controller
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
        $model = str_slug('book','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $book = Book::where('name', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('book detail', 'LIKE', "%$keyword%")
                ->orWhere('info', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $book = Book::paginate($perPage);
            }

            return view('admin.book.index', compact('book'));
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
        $model = str_slug('book','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('admin.book.create');
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
        $model = str_slug('book','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'slug' => ['required', Rule::unique('books')->where('status', 'active')->where('deleted_at', NULL)],
			'book_detail' => 'required',
			'info' => 'required',
			'description' => 'required',
			'image' => 'required'
		]);

            $book = new book($request->all());
            $book->slug = $request->input('slug');
            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $book_path = 'uploads/books/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($book_path) . DIRECTORY_SEPARATOR. $profileImage);

                $book->image = $book_path.$profileImage;
            }
            
            $book->save();

                if(! is_null(request('images'))) {
                $photos=request()->file('images');
                foreach ($photos as $photo) {
                    $book_path = 'uploads/books/';
                          /* dd($destinationPath);*/
                   
                    $filename = date("Ymdhis").uniqid().".".$photo->getClientOriginalExtension();
                    
                    
                    Image::make($photo)->save(public_path($book_path) . DIRECTORY_SEPARATOR. $filename);
                  
                               /* dd($book_path.$filename);*/
                    DB::table('book_imagess')->insert([
                        ['image' => $book_path.$filename, 'book_id' => $book->id]
                       
                    ]);
                    
                }
            
            }

         /*   dd($book);*/

            return redirect('admin/book')->with('message', 'Book added!');
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
        $model = str_slug('book','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $book = Book::findOrFail($id);
            return view('admin.book.show', compact('book'));
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
        $model = str_slug('book','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $book = Book::findOrFail($id);
            $book_images = DB::table('book_imagess')
                          ->where('book_id', $id)
                          ->get();
                         
            return view('admin.book.edit', compact('book','book_images'));
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
        $model = str_slug('book','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'slug' => ['required', Rule::unique('books')->where('status', 'active')->where('deleted_at', NULL)->ignore($id)],
			'book_detail' => 'required',
			'info' => 'required',
			'description' => 'required',
		
		]);
            $requestData = $request->all();
            $requestData['status'] = (!empty($request->status))?$request->status:0;

        if ($request->hasFile('image')) {
            
            $book = book::where('id', $id)->first();
            $image_path = public_path($book->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/books/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/books/'.$fileNameToStore;               
        }



             if(! is_null(request('images'))) {
                
                $photos=request()->file('images');
                foreach ($photos as $photo) {
                    $destinationPath = 'uploads/banner/';
                   
                    $filename = date("Ymdhis").uniqid().".".$photo->getClientOriginalExtension();
                    //dd($photo,$filename);
                    Image::make($photo)->save(public_path($destinationPath) . DIRECTORY_SEPARATOR. $filename);
                  
                               
                    DB::table('book_imagess')->insert([
                        ['image' => $destinationPath.$filename, 'book_id' => $id]
                       
                    ]);
                    
                }
            
            }

  

            $book = Book::findOrFail($id);
             $book->update($requestData);

             return redirect('admin/book')->with('message', 'Book updated!');
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
        $model = str_slug('book','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Book::destroy($id);

            return redirect('admin/book')->with('message', 'Book deleted!');
        }
        return response(view('403'), 403);

    }
}
