<?php

    namespace App\Models;


    class Listing {
        public static function all(){
            return
                [
                    [
                        'id' => 1,
                        'title' => 'Listing One',
                        'description' =>  'the quick brown fox jumps over the lazy dog somehow.'
                    ],
                    [
                        'id' =>2,
                        'title' => 'Listing Two',
                        'description' => 'the light quick brown fox jumps over the lazy dog somehow.'
                    ],
                    [
                        'id' => 3,
                        'title' => 'Listing Three',
                        'description'=> 'the dark quick brown fox jumps over the lazy dog somehow.'
                    ],
                ];
        }


        public static function find($id) {
            $listings = self::all();
            foreach($listings as $listing){
                if ($listing['id'] == $id){
                    return $listing;
                }
            }
        }
    }



?>
