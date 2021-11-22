<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comprasmes=DB::select('SELECT month(c.expiration_date) as mes, count(c.id) as totalmes, c.name as name from offers c where c.status="ACTIVE" group by month(c.expiration_date) order by month(c.expiration_date) desc limit 12;');
        //dd($comprasmes);
        $ventasmes=DB::select('SELECT month(v.application_date) as mes, count(v.id) as totalmes from purchase_details v group by month(v.application_date) order by month(v.application_date) desc limit 12');

        
        // $comprasmes=DB::select('SELECT monthname(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="VALID" group by monthname(c.purchase_date) order by month(c.purchase_date) desc limit 12');
        // $ventasmes=DB::select('SELECT monthname(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="VALID" group by monthname(v.sale_date) order by month(v.sale_date) desc limit 12');

        $ventasdia=DB::select('SELECT DATE_FORMAT(v.application_date,"%d/%m/%Y") as dia, count(v.id) as totaldia from purchase_details v group by v.application_date order by day(v.application_date) desc limit 15');
        $totales=DB::select('SELECT (select ifnull(count(c.id),0) from offers c where DATE(c.expiration_date)=curdate() and c.status="ACTIVE") as totalcompra, (select ifnull(count(v.id),0) from providers v where DATE(v.expiration_date)=curdate()) as totalventa');

        
        /*$productosvendidos=DB::select('SELECT p.code as code, 
        sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p 
        inner join sale_details dv on p.id=dv.product_id 
        inner join sales v on dv.sale_id=v.id where v.status="VALID" 
        and year(v.sale_date)=year(curdate()) 
        group by p.code ,p.name, p.id , p.stock order by sum(dv.quantity) desc limit 10');*/
       
       
        return view('home', compact( 'comprasmes', 'ventasmes', 'ventasdia', 'totales'));
    }
}
