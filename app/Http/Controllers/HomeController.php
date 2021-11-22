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
        $comprasmes=DB::select("SELECT extract(month from c.created_at) as mes, count(c.id) as totalmes from offers c where c.status='ACTIVE' group by extract(month from c.created_at) order by extract(month from c.created_at) desc limit 12;");

        $ventasmes=DB::select('SELECT extract(month from v.application_date) as mes, count(v.id) as totalmes from purchase_details v group by extract(month from v.application_date) order by extract(month from v.application_date) desc limit 12');

        
        // $comprasmes=DB::select('SELECT monthname(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="VALID" group by monthname(c.purchase_date) order by extract(month from c.purchase_date) desc limit 12');
        // $ventasmes=DB::select('SELECT monthname(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="VALID" group by monthname(v.sale_date) order by extract(month from v.sale_date) desc limit 12');

        $ventasdia=DB::select("SELECT to_char(v.application_date,'dd.mm.YYYY') as dia, count(v.id) as totaldia from purchase_details v group by v.application_date order by extract(day from v.application_date) desc limit 15");
        $totales=DB::select('SELECT (select ifnull(count(c.id),0) from offers c where DATE(c.created_at)=curdate() and c.status="ACTIVE") as totalcompra, (select ifnull(count(v.id),0) from providers v where DATE(v.created_at)=curdate()) as totalventa');

        
        /*$productosvendidos=DB::select('SELECT p.code as code, 
        sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p 
        inner join sale_details dv on p.id=dv.product_id 
        inner join sales v on dv.sale_id=v.id where v.status="VALID" 
        and year(v.sale_date)=year(curdate()) 
        group by p.code ,p.name, p.id , p.stock order by sum(dv.quantity) desc limit 10');*/
       
       
        return view('home', compact( 'comprasmes', 'ventasmes', 'ventasdia', 'totales'));
    }
}
