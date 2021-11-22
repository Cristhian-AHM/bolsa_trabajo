<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Offer;
use App\Provider;
use Carbon\Carbon;

use Barryvdh\DomPDF\Facade as PDF;

class ReportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:reports.day')->only(['reports_day']);
        $this->middleware('can:reports.date')->only(['reports_date']);
    }
    public function reports_day(){
        $offers = Offer::WhereDate('created_at', Carbon::today('America/Chihuahua'))->get();
        $total = $offers->where('status', 'ACTIVE')->count('id');
        return view('admin.report.reports_day', compact('offers', 'total'));
    }
    public function reports_date(){
        $offers = Offer::WhereDate('created_at', Carbon::today('America/Chihuahua'))->get();
        $total = $offers->where('status', 'ACTIVE')->count('id');
        return view('admin.report.reports_date', compact('offers', 'total'));
    }

    public function reports_provider(Provider $provider){
        //dd($provider);
        $sales = Sale::select('*', 'products.name as product_name')
            ->join('sale_details', 'sale_details.sale_id', '=', 'sales.id')
            ->join('products', 'sale_details.product_id', '=', 'products.id')
            ->join('providers', 'products.provider_id', '=', 'providers.id')
            ->where('providers.name', $provider->name)
            ->get();

            //dd($sales);
    
            $subtotal = 0;
            $tax = 0;
            $enter = 0;
            foreach($sales as $sale){
                
                $subtotal += $sale->quantity *$sale->price - $sale->quantity* $sale->price*$sale->discount/100;
                $tax += $sale->quantity* $sale->price*$sale->tax/100;
            
            }
            $saleDetails = $sales;
            $sale = $sales[0];
            //dd($subtotal);
            $pdf = PDF::loadView('admin.sale.pdfProvider', compact('sale', 'subtotal', 'saleDetails', 'tax'));
            return $pdf->download('Reporte_de_venta_completo_'.$sale->id.'.pdf');
    }

    public function reports_provider_date(Request $request){
        $fi = $request->fecha_ini. ' 00:00:00';
        $ff = $request->fecha_fin. ' 23:59:59';
        $sales = Sale::select('*', 'products.name as product_name')
            ->join('sale_details', 'sale_details.sale_id', '=', 'sales.id')
            ->join('products', 'sale_details.product_id', '=', 'products.id')
            ->join('providers', 'products.provider_id', '=', 'providers.id')
            ->where('providers.name', $request->name_provider)
            ->whereBetween('sales.sale_date', [$fi, $ff])
            ->get();

            //dd($sales);
    
            $subtotal = 0;
            $tax = 0;
            $enter = 0;
            foreach($sales as $sale){
                
                $subtotal += $sale->quantity *$sale->price - $sale->quantity* $sale->price*$sale->discount/100;
                $tax += $sale->quantity* $sale->price*$sale->tax/100;
            
            }
            $saleDetails = $sales;
            $sale = $sales[0];
            //dd($subtotal);
            $pdf = PDF::loadView('admin.sale.pdfDate', compact('sale', 'subtotal', 'saleDetails', 'tax','fi', 'ff'));
            return $pdf->download('Reporte_de_venta_completo_'.$sale->id.'.pdf');
    }


    public function report_results(Request $request){
        $fi = $request->fecha_ini. ' 00:00:00';
        $ff = $request->fecha_fin. ' 23:59:59';
        $offers = Offer::whereBetween('created_at', [$fi, $ff])->get();
        $total = $offers->where('status', 'ACTIVE')->count('id');
        return view('admin.report.reports_date', compact('offers', 'total')); 
        
    }
}
