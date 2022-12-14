<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PageBanner;
use App\Review;

class ReviewsController extends Controller
{
    //where we display art collection
	
	public function __construct()
    {	  
	    //$this->middleware('admin'); 
    }

	
	public function  index(Request $request)  {
		$reviews      = Review::orderBy('created_at','DESC')->paginate(20);
		$review_image = PageBanner::where('page_name','reviews')->first();
	    return view('reviews.index',compact('reviews','review_image'));
	}	


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

   
}
