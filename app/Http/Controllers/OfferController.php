<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Category;
use App\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\Offer\StoreRequest;
use App\Http\Requests\Offer\UpdateRequest;

class OfferController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:offer.create')->only(['create','store']);
        $this->middleware('can:offer.index')->only(['index']);
        $this->middleware('can:offer.edit')->only(['edit','update']);
        $this->middleware('can:offer.show')->only(['show']);
        $this->middleware('can:offer.destroy')->only(['destroy']);

        $this->middleware('can:change.status.offers')->only(['change_status']);
        

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::get();
        return view('admin.offer.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('admin.offer.create', compact('provider'));
    }
    public function create_offer(Category $category)
    {
        return view('admin.offer.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
  
        $offer = Offer::create($request->all());
        return redirect()->route('offers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        return view('admin.offer.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        $providers = Provider::get();
        return view('admin.offer.edit', compact('offer', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Offer $offer)
    {

        $offer->update($request->all());
        return redirect()->route('offers.index');
    }

    public function change_status(Offer $offer){
        if ($offer->status == 'ACTIVE') {
            $offer->update(['status'=>'DEACTIVATED']);
            return redirect()->back();
        } else {
            $offer->update(['status'=>'ACTIVE']);
            return redirect()->back();
        } 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('offers.index');
    }

    public function get_products_by_barcode(Request $request){
        if ($request->ajax()) {
            $offers = Offer::where('code', $request->code)->firstOrFail();
            return response()->json($offers);
        }
    }
    public function get_products_by_id(Request $request){
        if ($request->ajax()) {
            $offers = Offer::findOrFail($request->product_id);
            return response()->json($offers);
        }
    }
}
