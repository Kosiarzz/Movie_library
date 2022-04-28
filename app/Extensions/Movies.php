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
}