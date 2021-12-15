<?php

namespace App\Http\Controllers;

use App\PurchaseDetails;
use App\Offer;
use App\Provider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.offer.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($purchaseDetails);
        $purchaseDetails = PurchaseDetails::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'application_date'=>Carbon::now('America/Chihuahua '),
        ]);

        
        return redirect()->route('offers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PurchaseDetails  $purchaseDetails
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseDetails $purchaseDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PurchaseDetails  $purchaseDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseDetails $purchaseDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PurchaseDetails  $purchaseDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseDetails $purchaseDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PurchaseDetails  $purchaseDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseDetails $purchaseDetails)
    {
        //
    }
    public function change_status($id){
        $offer = PurchaseDetails::where('id', $id)->get();

        if ($offer[0]->status_offer == 'ACTIVE') {
            $offer[0]->update(['status_offer'=>'INACTIVE']);
            return redirect()->back();
        } else {
            $offer[0]->update(['status_offer'=>'ACTIVE']);
            return redirect()->back();
        } 
    }
}
