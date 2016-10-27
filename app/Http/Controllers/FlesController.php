<?php

namespace App\Http\Controllers;

use App\Models\Vind;

/**
 * Class FlesController
 * @package App\Http\Controllers
 */
class FlesController extends Controller
{
    public function index()
    {
        //Make this a POST request...
        $fles = Vind::where("vind_user", "=", "Chilion")->get();

        $result = [];

        foreach($fles as $loc)
        {
            $id = $loc->id - 1;

            $previous = Vind::where("id", "=", $id)->first();

            $result[] = $this->distance(floatval(str_replace(",", ".", $previous->coord_lat)), floatval(str_replace(",", ".", $previous->coord_lon)), floatval(str_replace(",", ".", $loc->coord_lat)), floatval(str_replace(",", ".", $loc->coord_lon)),  "K");

            unset($previous);
        }

        dd($result);

    }

    /**
     * @author Chilion Snoek <c.snoek@texemus.com>
     *
     * @param float $lat1
     * @param float $lon1
     * @param float $lat2
     * @param float $lon2
     * @param $unit
     * @return mixed
     *
     */
    function distance($lat1, $lon1, $lat2, $lon2, $unit) {



        $theta = $lon1 - $lon2;

        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);



        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }
}