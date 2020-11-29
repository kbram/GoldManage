<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Post;
use Mail;

class PagesController extends Controller
{
    public function __construct()
    { 
        $this->middleware('auth');
    }
    public function index(){
        $title='Welcome To GManage';
        $products= Product::orderBy('created_at','desc')->paginate(3);
        return view('pages.index')->with('title',$title)->with('products', $products);
    }
    public function about(){
        $title='About Us';
        return view('pages.about')->with('title',$title);
    }
    public function services(){
        $data=array(
            'title'=>'Services',
            'services'=>['Web Design','Programming','SEO']
        );
        return view('pages.services')->with($data);
    }
    public function system(){
        $title='THROUGHOUT';
        return view('pages.system')->with('title',$title);
    }
    public function email(){
        return view('pages.email');
    }
}
