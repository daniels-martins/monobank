<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // helpers


    /**
     * Obtain the card type
     */
    public function getType()
    {
        return CardType::find($this->card_type_id)->name;
    }

    /**
     * 
     * Get last four digits of card
     */
    public function getLastFourDigts()
    {
        $card_num = (String)$this->card_num;
        $startIndex = strlen($card_num) - 4;
       return substr($this->card_num, $startIndex);
    }


    /**
     * 
     * Get the first three digits of card
     */
    public function getFirstThreeDigits()
    {
        $card_num = (String)$this->card_num;
        $endIndex = 3;
       return substr($this->card_num, 0, $endIndex);
    }

    /**
     * 
     * Get the card in passwordmode
     */
    public function hiddenMode()
    {
        $first_three = $this->getFirstThreeDigits();
        $last_four = $this->getLastFourDigts();
        $expected_no_of_stars = 16-3-4; 
        $star = ''; $total_no_of_stars=0;
        for($i = 0; $i < $expected_no_of_stars; $i++){
            $star.='*';
            $total_no_of_stars++;
        }
        return $first_three . $star . $last_four;
 
    }
}
