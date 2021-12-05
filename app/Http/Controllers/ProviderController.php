<?php

namespace App\Http\Controllers;

use App\Provider;
use App\Offer;
use Illuminate\Http\Request;
use App\Http\Requests\Provider\StoreRequest;
use App\Http\Requests\Provider\UpdateRequest;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:providers.create')->only(['create','store']);
        $this->middleware('can:providers.index')->only(['index']);
        $this->middleware('can:providers.edit')->only(['edit','update']);
        $this->middleware('can:providers.show')->only(['show']);
        $this->middleware('can:providers.destroy')->only(['destroy']);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::get();
        return view('admin.provider.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.provider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if($request->hasFile('curriculum')){
            $file = $request->file('curriculum');
            $curriculum_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/curriculums"),$curriculum_name);

            $provider = Provider::create($request->all()+[
                'curriculum_file'=> $curriculum_name,
                'user_id'=>Auth::user()->id,
            ]);
            
        }else{
            Provider::create($request->all()+[
                'user_id'=>Auth::user()->id,
            ]);
        }
        
        return redirect()->route('providers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        $offers = Offer::join('purchase_details','offers.id', '=','purchase_details.offer_id')
                         ->where('purchase_details.offer_id', Auth::user()->id)->get(); 
        
        $offersLeft = Offer::get();        

        return view('admin.provider.show', compact('provider', 'offers', 'offersLeft'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('admin.provider.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Provider $provider)
    {
        $provider->update($request->all());
        return redirect()->route('providers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('providers.index');
    }
}
