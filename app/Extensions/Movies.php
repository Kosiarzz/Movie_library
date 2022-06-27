<?php 

namespace App\Extensions;

class Movies
{

    //Separate the cast by commas
    public function getCastWithCommas(string $cast)
    {
        $preg_cast = preg_replace('/([a-z]), ([A-Z])/', '$1 $2', $cast);
        $castExplode = explode(" ", $preg_cast, 10);
        
        $formatCast = [];

        for($i = 0; $i < count($castExplode); $i+=2)
        {
            if(substr($castExplode[$i+1], -1) == ".")
            {
                $person = $castExplode[$i].' '.$castExplode[$i+1].' '.$castExplode[$i+2];
                $i++;
            }
            else
            {
                $person = $castExplode[$i].' '.$castExplode[$i+1];
            }
            
            $formatCast[] = $person;
        }
        
        return $formatCast;
    }

    /** 
     *  Separate the cast by spaces
     *  @return array
     */
    public function getCastWithoutSpaces(string $cast)
    {
        $preg_cast = preg_replace('/([a-z])([A-Z])/', '$1 $2', $cast);
        $castExplode = explode(" ", $preg_cast, 10);
        
        $formatCast = [];

        for($i = 0; $i < count($castExplode); $i+=2)
        {
            if(substr($castExplode[$i+1], -1) == ".")
            {
                $person = $castExplode[$i].' '.$castExplode[$i+1].' '.$castExplode[$i+2];
                $i++;
            }
            else
            {
                $person = $castExplode[$i].' '.$castExplode[$i+1];
            }
            
            $formatCast[] = $person;
        }
        
        return $formatCast;
    }

    /** 
     *  Format time for new coustom movie
     *  @return array
     */
    public function getFormatTime(string $time)
    {
        $preg_time = preg_replace('/([0-9])([a-z])/', '$1 $2', $time);
        $timeExplode = explode(" ", $preg_time, 10);
        
        $formatTime = '';
        $formatTime .= '0'.$timeExplode[0].':'.$timeExplode[2].':00';
        
        return $formatTime;
    }

    /** 
     *  Format time for input
     *  @return array
     */
    public function getFormatTimed(string $time)
    {
        $preg_time = preg_replace('/([0-9])([a-z])/', '$1 $2', $time);
        $timeExplode = explode(" ", $preg_time, 10);
        return "CHUJ";

        $formatTime = '';

        foreach($timeExplode as $key => $time)
        {
            if ($key === array_key_last($timeExplode))
            {
                $formatTime .= $time;
                break;
            }

            $formatTime .= $time.'';
        }

        return $formatTime;
    }
}