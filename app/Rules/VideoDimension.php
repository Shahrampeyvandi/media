<?php

namespace App\Rules;

use getID3;
use Illuminate\Contracts\Validation\Rule;

class VideoDimension implements Rule
{
   protected $type;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
       if ($this->type == 3) {
        $getID3 = new getID3;

        // the value is an instance of UploadedFile
        $file = $getID3->analyze($value->getRealPath());

        $passes = true;

        // if ($this->maxWidth < $file['video']['resolution_x']
        //     || $this->maxHeight < $file['video']['resolution_y']){
        //     $passes = false;
        // }
        $time= date('H:i:s', $file['playtime_seconds']);
        if($time <  date("00:03:00")){
            $passes = true;

        }else{
            $passes = false;

        }
       }else{
           $passes = true;
       }

        return $passes;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'کلیپ نمیتواند بیشتر از 3 دقیقه بابشد';
    }
}
