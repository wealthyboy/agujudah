<?php

namespace App\Http\Controllers\Admin\PageBanner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PageBanner;
use App\SystemSetting;
use Illuminate\Support\Facades\Storage;


class PageBannerController extends Controller
{
    protected $settings;

    
    public function __construct()
    {	
        $this->middleware(['admin']);  
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
           // 'image' => 'required'
        ]);

        $pb = PageBanner::where('page_name',$request->page_name)->first();
        if (null !== $pb){
           $pb->image = $request->image;
           $pb->page_name = $request->page_name;
           $pb->title = $request->title;
           $pb->description = $request->description;
           $pb->save();

           return back();
        }

        $page_banner = new PageBanner;
        $page_banner->image = $request->image;
        $page_banner->page_name = $request->page_name;
        $page_banner->title = $request->title;
        $page_banner->description = $request->description;
        $page_banner->save();

        return back();
    }  
    
    
   

}
