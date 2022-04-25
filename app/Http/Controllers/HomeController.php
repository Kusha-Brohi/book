<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquiry;
use App\schedule;
use App\newsletter;
use App\post;
use App\banner;
use App\imagetable;
use DB;
use Mail;use View;
use Session;
use App\Http\Helpers\UserSystemInfoHelper;
use App\Http\Traits\HelperTrait;
use Auth;
use App\Profile;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{   
    use HelperTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     // use Helper;
     
    public function __construct()
    {
        //$this->middleware('auth');

        $logo = imagetable::
                     select('img_path')
                     ->where('table_name','=','logo')
                     ->first();
             
        $favicon = imagetable::
                     select('img_path')
                     ->where('table_name','=','favicon')
                     ->first(); 
        
        View()->share('logo',$logo);
        View()->share('favicon',$favicon);

    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
      
        
        $cms_abt1 = DB::table('pages')->where('id', 1)->where('is_deleted',0)->first();
       
        $cms_abt2 = DB::table('pages')->where('id', 2)->where('is_deleted',0)->first();
        $cms_abt3 = DB::table('pages')->where('id', 3)->where('is_deleted',0)->first();
        $book_release = DB::table('pages')->where('id', 4)->where('is_deleted',0)->first();
        $books = DB::table('books')->where('deleted_at',null)->where('status','active')->get();

        $products = DB::table('products')->get()->take(10);


       
        return view('welcome', compact('test','cms_abt1','cms_abt2','cms_abt3','book_release','books'));
    }
    

    public function contactUsSubmit(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'fname' => ['required'],
            'lname' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'message' => ['required'],
            
        ]);

            $response = '';
            if($validator->fails()){

             $response = array('message' => $validator->errors()->all(),'status'=>false);

            }
            else{
        $inquiry = new inquiry;
        $inquiry->inquiries_fname = $request->fname;
        $inquiry->inquiries_lname = $request->lname;
        $inquiry->inquiries_email = $request->email;
        $inquiry->inquiries_phone = $request->phone;
        $inquiry->extra_content =   $request->message;
          //dd($inquiry);
           $inquiry->save();
   /*     $inquiry->availability =   $request->availability;*/
      /*  $file = $request->file('file');*/
       //dd($file);
         /*   $folderName = '/uploads/inquiry/';
            $destinationPath = public_path() . $folderName;
            $fileName = $request->file('file')->getClientOriginalName();
            $fileExt = $request->file('file')->getClientOriginalExtension();
            $safeName = $fileName.'_'.time().'.'.$fileExt;
            $file->move($destinationPath, $safeName);
            $inquiry['file'] = 'uploads/inquiry/'.$safeName;
            */
        
          $check = $inquiry->save();
          $response = array('message' =>'Something went wrong. Try Again!', 'status' => false );
            if($check){
            $response = array('message' =>'Thank you for contacting us. We will get back to you asap!', 'status' => true );
            }
            }
            return Response()->json($response);
            /*
        Session::flash('message', 'Thank you for contacting us. We will get back to you asap'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();*/
    }

 public function newsletterSubmit(Request $request)
    {      //dd($request);

    $validator = Validator::make($request->all(),[
            'newsletter_email' => ['required','email','unique:newsletter'],
            
        ]);

        $response='';
        if ($validator->fails()){
            $response = array('message' => $validator->errors()->all(),'status' => false);
        }else {
            $newsletter = new newsletter;
         /*   $newsletter->newsletter_name=$request->newsletter_name;*/
            $newsletter->newsletter_email=$request->newsletter_email;
            $check=$newsletter->save();
            $response = array('message' => 'Something went wrong. Try Again!', 'status' => false);
            if($check){
                $response = array('message' => 'Thank you for subscribing. We will get back to you asap!', 'status' => true);
            }
        }

        return Response()->json($response);
       /* $is_email = newsletter::where('newsletter_email',$request->email)->count();
        
        if($is_email == 0) {
            
        $newsletter = new newsletter;
        $newsletter->newsletter_name = $request->newsletter_name;
        $newsletter->newsletter_email = $request->newsletter_name;
        //$inquiry->newsletter_message = $request->comment;
        $newsletter->save();
        Session::flash('message', 'Thank you for contacting us. We will get back to you asap'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/');
        
        } else {
            Session::flash('flash_message', 'email already exists'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('/');
        }*/
      



    }

    public function  Video(){
      $video = DB::table('videos')->where('deleted_at',null)->where('status','active')->get();

      return view('video',compact('video'));
    } 

     public function  Blog(){
      $blog = DB::table('blogs')->where('is_deleted',0)->where('status','active')->get();
   /*   dd($blog);*/

      return view('blog',compact('blog'));
    }


    public  function BlogDetail($slug)
    {

      $blogDetail = DB::table('blogs')->where('slug',$slug)->first();

      return view('BlogDetail',compact('blogDetail'));
    }    

    public function  About(){
      $cms_abt1 = DB::table('pages')->where('id', 5)->where('is_deleted',0)->first();
      $cms_abt2 = DB::table('pages')->where('id', 6)->where('is_deleted',0)->first();

      return view('about',compact('cms_abt1','cms_abt2'));
    }



    public function Book(){

      $books = DB::table('books')->where('deleted_at',null)->where('status','active')->get();


      return view ('book',compact('books'));
    }

    public  function BookDetail($slug)
    {
      $BookDetail = DB::table('books')->where('slug',$slug)->first();
      $booksimages = DB::table('book_imagess')->where('book_id',$BookDetail->id)->get();
      $reviews = DB::table('reviews')->where('deleted_at',null)->where('book_id',$slug)->get();
      return view('BookDetail',compact('BookDetail','booksimages','reviews'));
    }

    public  function story($slug)
    {
      $storydetail = DB::table('stories')->where('slug',$slug)->where('deleted_at',Null)->first();
      return view('story',compact('storydetail'));
    }
}
