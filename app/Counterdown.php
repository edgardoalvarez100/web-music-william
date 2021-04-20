<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Carbon\CarbonImmutable;

class Counterdown extends Model
{
    public static function get(){
        $countdowns = Counterdown::where('status',1)->get();
        if($countdowns){
            
            $now = CarbonImmutable::now();
            $diacercano=null;
            
            foreach ($countdowns as $key => $item) {
                if($diacercano == null ){
                    $diacercano = Carbon::parse($item->day." ".$item->start_service)->add(7, 'day');
                    $resp = $item;
                }
                
                $start_service = Carbon::parse($item->day." ".$item->start_service);
                $end_service = Carbon::parse($item->day." ".$item->end_service);

               
                if($start_service->isPast() && $end_service->isFuture()){
                    //estamos en vivo
                    return array("live" => 1, "data" => $item, "date" => $start_service);
                }

                //buscando el service mas cercano
                if($start_service->lessThan($diacercano) && $start_service->isFuture()){
                    $diacercano = $start_service;
                    $resp = $item;
                }   

            }

            return array("live" => 0, "data" => $resp, "date" => $diacercano);
        }
    }
}
