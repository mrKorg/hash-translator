<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Words extends Model
{
    protected $table = 'words';
    protected $guarded = [''];

//    public function user()
//    {
//        return $this->hasOne('App\User', 'id', 'user_id');
//    }


    public function get()
    {
        return $this::select('*')->get();
    }

    public function getHash($request)
    {
        $selectedWords = $request->word_select;
        $selectedHash = $request->hash;
        $result = [];
        foreach ($selectedWords as $itemWord){
            $thisWord = $this::where('id', $itemWord)->first()->word;
            $thisHash = [];
            foreach ($selectedHash as $itemHash){

                foreach (hash_algos() as $option){
                    if ($itemHash == $option) {
                        $salt = '$2a$10$'.substr(str_replace('+', '.', base64_encode(pack('N4', mt_rand(), mt_rand(), mt_rand(),mt_rand()))), 0, 22) . '$';
                        $thisHash += ["$option"=>hash("$option", $thisWord.$salt)];
                    }
                }

            }
            $result[$thisWord] = $thisHash;
        }
        return $result;
    }
}
