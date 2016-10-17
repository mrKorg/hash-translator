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
                if ($itemHash == 'sha1') {
                    $thisHash += ['sha1'=>sha1($thisWord)];
                } elseif ($itemHash == 'md5') {
                    $thisHash += ['md5'=>md5($thisWord)];
                } elseif ($itemHash == 'hash') {
                    $thisHash += ['hash'=>hash('md5', $thisWord)];
                } elseif ($itemHash == 'crypt') {
                    $thisHash += ['crypt'=>crypt($thisWord, '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$')];
                }
            }
            $result[$thisWord] = $thisHash;
        }
        return $result;
    }
}
