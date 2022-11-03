<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardType;
use Illuminate\Http\Request;
use Database\Seeders\CardSeeder;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = auth()->user()->cards;
        // dd($cards);
        return view('admin.cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $card_data = $request->except('_token', '_method');
        // dd($card_data);
        // lets Generate this new Card

        
        // step4: Generate Card
        // tryig to use a public non-static method from another class and it worked
        $newCardSeeder = new CardSeeder();

        $new_card = $newCardSeeder->generateCard($card_data); 
        return $new_card
            ?  back()->with('success', 'Card Created Successfully')
            :  back()->with('danger', 'Oops! Please Try Again..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        return view('admin.cards.edit', compact('card'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
         // we're only allowed to edit d status of an account,hence we extract only the status
         if ($updated = $card->update(['status' => $request->status ?? $card->status]))
         return ($card->wasChanged('status'))
             ? back()->with('success', "Account Updated Successfully")
             : back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        // dd($card, CardType::find($card->card_type_id)->name);
        // get Card type
        $cardTypeName = ucfirst(CardType::find($card->card_type_id)->name);
        if ($card->balance <= 0) {
            return ($deleted  = $card->delete())
                ? back()->with('success', "$cardTypeName card deleted Successfully")
                : back()->with('warning', 'Oops! Something went wrong. Please Try again');
        } else {
            back()->with('warning', 'Oops! Account Removal Failed : Account has funds in it');
        }
    }


   
}
