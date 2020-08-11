<?php

namespace App\Http\Controllers\carsSpecialiste;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use PDF;


class DynamicPDFController extends Controller
{
    function index()
    {
        $enfant = $this->get_customer_data();
        return view('dynamic_pdf')->with('customer_data', $enfant);
    }

    function get_customer_data()
    {
        $enfant = DB::table('enfant')
            ->limit(10)
            ->get();
        return $enfant;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_enfant_to_html());
        return $pdf->stream();
    }
    function convert_enfant_to_html()
    {
        $enfant = $this->get_customer_data();
        $output = '
     <h3 align="center">Customer Data</h3>

        <ul class="list-group list-group-unbordered mb-3">

                                                    <li class="list-group-item">
                                                        <b>الجنس:</b> <a>' .$enfant->sexe.'</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>العمر:</b> <a></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>زمرة الدم:</b> <a>' .$enfant->groupage.'</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b> العنوان:</b> <a>'.$enfant->domicile.' </a>
                                                    </li>
                                                </ul>


     ';

        return $output;
    }

}
