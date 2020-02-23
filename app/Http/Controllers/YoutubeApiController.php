<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CyoutubeApi;
use Exception;

class YoutubeApiController extends Controller
{
	public function indexView()
    {   
        return view('search');
    }
	
	  
    public function store(Request $request)
	{ 
                
		$validatedData = $request->validate([
			'keyword' => 'required',
			'results' => 'required|numeric',
			'order' => 'required'
		]);
		
		try{
			$request_arr = $request->all();
			
            $url = CyoutubeApi::buildUrl($request_arr);     
            $arr_curl = CyoutubeApi::verifyCurl($url);  
        
			$collection = collect($arr_curl->items);
			$result_colletion = $collection->map(function($item) {
					return $item->snippet->title;
			});
			
        }catch(Exception $e){
			return json_encode(['erro'=>true, 'message' => $e->getMessage()]);
		}

		return json_encode(['erro'=>false,'message' => $result_colletion]); 
    }

    
}
