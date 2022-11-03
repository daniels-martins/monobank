<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CardKind;
use App\Models\CardType;
use App\Models\CardGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Controllers\AzaController as AZaCtrl;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = [
            'card-type' => 'debit', //constant
            'card-kind' => 'virtual', //constant 
            'card-group' => 'visa', //variable
            'status' => '1' //default value in db=1
        ];
        $this->generateCard($config);
    }


    /**
     *  The above method handles the following logic for each card 
     *  pan,
     * 
     *  card num,
     * 
     *  card kind,
     * 
     *  card type visa or master etc.,
     * 
     *  card group,
     * 
     *   status,
     * 
     *   cvv,
     * 
     *   pin default(0000),
     * 
     *   exp,
     * 
     *   exp timestamp,
     * 
     *   */
    public function generateCard(array $config)
    {

        $card_num = $this->generateCCNum($config);

        // user foreign key constraint
        $user = Auth::user() ?? User::first();
        return  $user->cards()->create([
            //unavailable for debit card config
            'pan'          => $config['card-type'] == 'credit' ? AzaCtrl::generateAzaNum() : null,
            'card_num'     => $card_num,

            // the following should be dynamically created data
            'cvv' =>  rand(111, 999) ?? '111',
            'pin' => '0000',
            'expiry' => self::getExpiry()[0],
            'expiry_timestamp' =>   self::getExpiry()[1],

            // foreign key constraints
            'card_kind_id' => CardKind::where('name', $config['card-kind'])->first()->id,
            'card_type_id' => CardType::where('name', $config['card-type'])->first()->id,
            'card_group_id' => CardGroup::where('name', $config['card-group'])->first()->id,

            'status' => $config['status'], //has a default(1)
        ]);
    }

    public function generateCCNum(array $config): string
    {
        $first_number = $this->generateFirstNumberForCardGroup($config);
        $other_15_digits = rand(0, 999999999999999);
        return $cc_num = $first_number . $other_15_digits;
    }

    public function generateFirstNumberForCardGroup($config)
    {
        switch ($config['card-group']) {
            case 'visa':
                $first_number = '4';
                break;
            case 'master':
            case 'master card':
            case 'master_card':
                $first_number = '5';
                break;

            case 'amex':
            case 'american express':
            case 'american_express':
                $first_number = '3';
                break;

            case 'discover':
                $first_number = '6';
                break;
        }
        return $first_number;
    }

     /**
     * 
     * This method is used in another class (CardSeeder::class)
     */
    public static function getExpiry()
    {
        $today = new \DateTime('now');
        $three_yrs_later = new \DateInterval('P3Y');

        $plus_3_yrs = date_add($today, $three_yrs_later);
        $exp_month = date_format($plus_3_yrs, 'm');
        $exp_yr = date_format($plus_3_yrs, 'y');

        $exp_date_time = $plus_3_yrs; //DateTime
        return ["$exp_month/$exp_yr", $exp_date_time];
    }
}
