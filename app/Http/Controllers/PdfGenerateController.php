<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
class PdfGenerateController extends Controller
{
    public function pdfview(Request $request)
    {
        $tickets = DB::table("tickets")->get();
        view()->share('tickets',$tickets);

        if($request->has('download')){
            // Set extra option
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            // pass view file
            $pdf = PDF::loadView('tickets.pdfview');
            // download pdf
            return $pdf->download('tickets.pdfview.pdf');
        }
        return view('tickets.pdfview');
    }
}
