<?php

namespace App;

use App\Interfaces\Iyoutube;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CyoutubeApi extends Model implements Iyoutube
{
    public function printlist(Request $request){

    }

    public static function verifyCurl($url)
    {   
         $arr_result = array();
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $response = curl_exec($ch);
         $arr_result = json_decode($response);

         if (isset($arr_result->error))
            throw new Exception(response()->json(['status' => 'erro', 'message' => $arr_result->error->message]));
         
         return $arr_result;
    }

    public static function buildUrl($request_arr)
    {
        $URL = Config::get('myconfig.URL');
        $Developer_Key = Config::get('myconfig.Developer_Key');

        $format_keyword = implode("+", explode(" ", $request_arr['keyword']));            
        $url = $URL.$format_keyword."&order=". $request_arr['order'].
              "&part=snippet&type=video&maxResults=". $request_arr['results'] ."&key=". $Developer_Key;
        
        return $url;
    }


}