<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enfant;
use Charts;
use DB;
class CharrtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /*pie chart sexe*/
        $data = DB::table('enfants')
            ->select(
                DB::raw('sexe as sexe'),
                DB::raw('count(*) as number'))
            ->groupBy('sexe')
            ->get();
        $array[] = ['Sexe', 'Number'];
        foreach($data as $key => $value)
        {
            $array[++$key] = [$value->sexe, $value->number];
        }

/*pie chart niveau*/
        $data_niveau = DB::table('diagnostics')
            ->select(
                DB::raw('niveau as niveau'),
                DB::raw('count(*) as number'))
            ->groupBy('niveau')
            ->get();
        $ar[] = ['Niveau', 'Number'];
        foreach($data_niveau as $key => $value)
        {
            $ar[++$key] = [$value->niveau, $value->number];
        }

        /*chart year */
        $dta = DB::table('enfants')
            ->select( DB::raw("year(created_at) as year"),
                DB::raw('count(*) as num')
                )
            ->groupBy(DB::raw("year(created_at)"))
            ->get();

        $arra[] = ['Year', 'عدد المصابين'];
        foreach($dta as $key => $value)
        {
            $arra[++$key] = [(string)$value->year, (int)$value->num];

        }


             /*chart year actuelle*/
        $chart_Month = Enfant::where(DB::raw("DATE_FORMAT(created_at,'%Y')"),date('Y'))->get();
        $chart = Charts::database( $chart_Month, 'bar', 'highcharts')
            ->title("احصائيات السنة الحالية")
            ->elementLabel("عدد الاطفال  ")
            ->dimensions(1000, 500)
            ->responsive(false)
            ->groupByMonth(date('Y'));
        /*chart Age*/
        //$calculeAge=Carbon::parse($enfant->dateNaissance);
        $ranges = [ // the start of each age-range.
            '18-24' => 18,
            '25-35' => 25,
            '36-45' => 36,
            '46+' => 46
        ];
        $chartYear =  \DB::table('enfants')
            ->select( DB::raw('concat(2*floor(TIMESTAMPDIFF(YEAR,enfants.dateNaissance,CURDATE())/2), \'-\', 2*floor(TIMESTAMPDIFF(YEAR,enfants.dateNaissance,CURDATE())/2) + 1) as `range`, count(*) as `numberofusers`'))
            ->groupBy('range')
            ->get();

        // $age=$calculeAge->age;
      /*  $chartYear= DB::table('enfants')
            ->select(
                DB::raw('TIMESTAMPDIFF(YEAR,enfants.dateNaissance,CURDATE()) as age'),
                DB::raw('count(*) as numberAge'))
            ->groupBy( DB::raw('TIMESTAMPDIFF(YEAR,enfants.dateNaissance,CURDATE())'))
            ->get();*/
        $arraAge[] = [' Range', 'عدد المصابين'];
        foreach($chartYear as $key => $value)
        {
            $arraAge[++$key] = [$value->range, $value->numberofusers];
        }

        /*$chart_Age = Enfant::where(DB::raw('TIMESTAMPDIFF(YEAR,enfants.dateNaissance,CURDATE())'))->first();

        $chartAge = Charts::database( $chart_Age, 'bar', 'highcharts')
            ->title("احصائيات السنة الحالية")
            ->elementLabel("عدد الاطفال  ")
            ->dimensions(1000, 500)
            ->responsive(false)
            ->groupByAge('age');*/
        return view('admin.chart.index',compact('chart','chartAge'))->with('sexe', json_encode($array))->with('niveau', json_encode($ar))->with('year', json_encode($arra))->with('range', json_encode($arraAge));
    }


}
