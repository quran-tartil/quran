<?php

namespace App\Repositories\Quran;

use App\Models\Quran\Ayah;
use App\Models\Quran\Root;
use App\Models\Quran\Word;
use App\Repositories\BaseRepository;

class AyahRepository extends BaseRepository
{
    protected $model;
    protected $fieldsSearchable = [
        'quran_simple',
        'quran_simple_clean' ,
        'quran_simple_enhanced',
        'quran_simple_min' ,
        'quran_uthmani_min',
        'quran_uthmani' ,
    ];

    public function __construct()
    {
        $this->model = new Ayah;
    }
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }

    public function getWordsAndRoot($ayah_id){

        $word_details = [];

        $ayah = $this->find($ayah_id);
        $quran_simple_clean =  $ayah->quran_simple_clean;
        $word_labels =  explode(" ", $quran_simple_clean);

        foreach($word_labels as $word_label ) {

            $word_detail = (object)[];
            $word_detail->word_label =  $word_label;
            $word_detail->root_label = "";
            $word_detail->words_labels_from_root = "";


            $root = null;
            $word = Word::where("code", $word_label)->first();
            if($word != null) $root = Root::find($word->root_id);

           
            if($root != null) {
                // root_label
                $word_detail->root_label = $root->root;

                // words_labels_from_root
                $words = Word::where("root_id",$root->id);
            }

            
            

            array_push($word_details,$word_detail);
           
        }
 // dd($word_details);
        
        return $word_details;

       
       
    }

}
