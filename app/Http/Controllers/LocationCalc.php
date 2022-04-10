<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Subfunc;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Artisan;


use Illuminate\Http\Request;

class LocationCalc extends Controller
{
    public static function setup()
    {
        DB::table('cars')->insert([
            'name'=>'default',
            'type'=>1,
            'url'=>'https://api.3geonames.org/?randomland=TR&json=yes'
        ]);
    }

    public static function getlocations()
    {

        try {

            $cars=DB::table('cars')->get();
            if (isset($cars[0])) {
                foreach ($cars as $value) {
                $carlocadat=Subfunc::GetCurl($value->url);
                $carmaindat=LocationCalc::parseUrl($value->type,$carlocadat);
                DB::table('car_locations')->insert([
                    'car_id'=>$value->id,
                    'latitude'=>$carmaindat['lat'],
                    'longitude'=>$carmaindat['lon']
                ]);         
                Redis::set($value->id, json_encode($carmaindat));
                broadcast(new \App\Events\Cargetlocation);
            }
            }else {
                LocationCalc::setup();
            }
            
        } catch (\Throwable $th) {
            Artisan::call('migrate');
            echo "Error getlocation f.";
        }
        
        //Redis::set('name', 'Taylor');
        //echo Redis::get('name');
        //print_r (Subfunc::GetCurl("https://api.3geonames.org/?randomland=TR&json=yes"));

    }

    public static function parseUrl($type,$datas)
    {
        if ($type==1) {
            $pureloca = array('lat' =>$datas['nearest']['latt'] ,'lon' =>$datas['nearest']['longt']  );
            return $pureloca;
        }
    }
}
