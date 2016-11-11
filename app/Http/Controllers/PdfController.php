<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Products;
use DateTime;
use Uuid;

class PdfController extends Controller
{
public function orderDetail()
    {
        
        $cart = \Session::get('cart');
        $total = $this->total();
    }
    private function total()
    {
        $cart = \Session::get('cart');
        $total = 0;
        foreach($cart as $item){
            $total += $item->price * $item->quantity;
        }

        return $total;
    }
  
    public function invoice() 
    {
        $cart = $this->getData();
        $date = date('d-m-Y');
        $time = date('H:i:s');
        $invoice = Uuid::generate(4);
        $total = $this->total();
        $view =  \View::make('store.invoice', compact('cart', 'date','time','invoice','total'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
		return $pdf->download('Factura-TiendaOnline.pdf');

    }

    public function getData() 
    {
        $cart = \Session::get('cart');
        return $cart;
    }

}
