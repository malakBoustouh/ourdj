<?php

namespace App\Http\Controllers\carsSpecialiste;

use App\Detail;
use App\Enfant;
use App\Carsspecialiste;
use App\Diagnostic;
use App\Parentt;
use DB;
use PDF;
use App\Traitant;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Integer;
use Session;

class DiagnosticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$arr['enfants']=Enfant::latest()->paginate(2);
        $arr['enfants'] = Enfant::simplePaginate(5);
        $arr['diagnostics'] = Diagnostic::all();
        $arr['carsspecialistes'] = Carsspecialiste::all();


        return view('pagecarsspecialiste.diagnostics.index')->with($arr)->with('i', (request()->input('page', 1) - 1) * 5);
    }
//***************************search


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $arr['enfants'] = Enfant::all();
        $arr['diagnostics'] = Diagnostic::all();
        $arr['carsspecialistes'] = Carsspecialiste::all();
        $dateActuelle = Carbon::now()->toDateString();
        return view('pagecarsspecialiste.diagnostics.create', compact('dateActuelle', 'carsspecialiste'))->with($arr);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Diagnostic $diagnostic, Detail $detail)
    {

        dd($request->all());
        if (isset($request)) {
            /*  $this->validate($request,
                  array(
                      'nom'=>'required',
                      'prenom'=>'required',
                      'dateNaissance'=>'required',
                      'autismresult'=>'required'
                  )
              );*/

            $nomid = $request->enf_id;
            $prenomid = $request->enfant_id;
            $dateid = $request->enfa_id;


            //  dd("test1");
            $diagnostic->enfant_id = $prenomid;

            $diagnostic->id_superviseur = $request->trait;
            $nomSpecialiste = Auth::user()->name;
            $nomSpecialiste = User::where('name', 'LIKE', '%' . $nomSpecialiste . '%')->first();
            $iduser = $nomSpecialiste->id;
            $specialiste = Carsspecialiste::join('users', 'users.id', '=', 'carsspecialistes.user_id')->where('carsspecialistes.user_id', $iduser)->first();
            $idSp = $specialiste->id_carsspecialiste;
            $diagnostic->carsspecialiste_id = $idSp;
            $diagnostic->dateDiagnostic = $request->date;
            $diagnostic->remarque = $request->remarque15;
            $diagnostic->niveau = $request->autismresult;
            $diagnostic->save();
            $requestData = $request->all();

            for ($i = 1; $i <= 15; $i++) {
                $details = new Detail();
                $details->reponses = $requestData['r' . $i];
                // $requestData['text'];
                //$requestData['r'.$i];
                $details->questions = $requestData['quest' . $i];
                $details->observations = $requestData['remarque' . $i];
                $diagnostic->detail()->save($details);
            }

            return redirect()->route('pagecarsspecialiste.affiche', $prenomid)->with(compact('detail'))->with('success', 'تمت اضافة التشخيص بنجاح ');


        } else {
            return view('pagecarsspecialiste.diagnostics.create');

        }
    }

    public function question($j)
    {
        $quest1 = "العلاقات مع الآخرين";
        $quest2 = " التقليد";
        $quest3 = "الإستجابة الإنفعالية";
        $quest4 = "إستخدام الجس";
        $quest5 = "إستخدام الأشياء";
        $quest6 = " التكيف للتغير";
        $quest7 = "لإستجابة البصرية";
        $quest8 = "الإستجابة السمعية";
        $quest9 = " إستجابات اللمس،الشم،التذوق و استخدامها";
        $quest10 = " الخوف و العصبية";
        $quest11 = "التواصل اللفظي";
        $quest12 = "التواصل غير اللفظي";
        $quest13 = "مستوى النشاط";
        $quest14 = "المستوى و الدرجة الخاصة بالإستجابة العقلية";
        $quest15 = "الإنطباع العام";
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diagnostic = Diagnostic::where('id', $id)->first();
        $enfant = Enfant::join('diagnostics', 'diagnostics.enfant_id', '=', 'enfants.id_enfant')->where('diagnostics.id', $id)->first();
        $id_enfant = $enfant->id_enfant;
        $enfant = $enfant::find($id_enfant);
        $carsspecialiste = Carsspecialiste::join('diagnostics', 'diagnostics.carsspecialiste_id', '=', 'carsspecialistes.id_carsspecialiste')->where('diagnostics.id', $id)->first();
        $id_carsspecialiste = $carsspecialiste->id_carsspecialiste;
        $carsspecialiste = carsspecialiste::find($id_carsspecialiste);
        $arr['carsspecialistes'] = Carsspecialiste::all();
        $parentt = Parentt::join('enfants', 'enfants.id_enfant', '=', 'parentts.enfant_id')->where('parentts.enfant_id', $id_enfant)->first();
        $firs = $parentt->id_parentt;
        $parent = Parentt::join('enfants', 'enfants.id_enfant', '=', 'parentts.enfant_id')->where('parentts.id_parentt', $firs + 1)->first();
        $calculeAge = Carbon::parse($enfant->dateNaissance);
        $age = $calculeAge->age;
        return view('pagecarsspecialiste.diagnostics.show')->with(compact('diagnostic', 'parent', 'age', 'parentt', 'carsspecialiste', 'enfant','id'))->with($arr);
    }

    public function affiche($id_enfant)
    {
        $arr['enfants'] = Enfant::all();
        $arr['diagnostics'] = Diagnostic::all();
        $arr['carsspecialistes'] = Carsspecialiste::all();
        $enfant = Enfant::where('id_enfant', $id_enfant)->first();
        $dateNaiss = $enfant->dateNaissance;

        $dateActuelle = Carbon::now()->toDateString();
        $diagnostic = Diagnostic::join('enfants', 'enfants.id_enfant', '=', 'diagnostics.enfant_id')->where('diagnostics.enfant_id', $id_enfant)->first();
        // dd($diagnostic);
        $parentt = Parentt::join('enfants', 'enfants.id_enfant', '=', 'parentts.enfant_id')->where('parentts.enfant_id', $id_enfant)->first();
        $firs = $parentt->id_parentt;
        $parent = Parentt::join('enfants', 'enfants.id_enfant', '=', 'parentts.enfant_id')->where('parentts.id_parentt', $firs + 1)->first();

        //$idcarsspecialiste=$diagnostic->carsspecialiste_id;
        //$carsspecialiste = Carsspecialiste::where('id_carsspecialiste', $idcarsspecialiste)->first();

        $arr['parentts'] = Parentt::all();
        $arr['$diagnostics'] = Diagnostic::all();
        $arr['enfants'] = Enfant::all();
        $calculeAge = Carbon::parse($dateNaiss)->age;
        //dd($calculeAge);
        return view('pagecarsspecialiste.diagnostics.affiche')->with(compact('calculeAge', 'parent', 'dateActuelle', 'enfant', 'parentt', 'diagnostic', 'carsspecialiste', 'dateActuelle'))->with($arr);
    }

    public function storeAffiche(Request $request, Diagnostic $diagnostic)
    {
        $this->validate($request,
            array(
                'nom' => 'required',
                'prenom' => 'required',
                'dateNaissance' => 'required',
                'autismresult' => 'required'
            )
        );
        // dd($request->all());
        $nomid = $request->enf_id;
        $prenomid = $request->enfant_id;
        $dateid = $request->enfa_id;
        $diagnostic->enfant_id = $prenomid;
        $diagnostic->id_superviseur = $request->trait;
        $nomSpecialiste = explode(' ', Auth::user()->name, 2); // Restricts it to only 2 values, for names like Billy Bob Jones

        $nomSpecialiste = User::where('name', 'LIKE', '%' . $nomSpecialiste . '%')
            ->first();
        $iduser = $nomSpecialiste->id;
        $specialiste = Carsspecialiste::join('users', 'users.id', '=', 'carsspecialistes.user_id')->where('carsspecialistes.user_id', $iduser)->first();
        $idSp = $specialiste->id_carsspecialiste;
        $diagnostic->carsspecialiste_id = $idSp;
        $diagnostic->dateDiagnostic = $request->date;
        $diagnostic->remarque = $request->remarque;
        $diagnostic->niveau = $request->autismresult;
        $diagnostic->save();
        $requestData = $request->all();
        for ($i = 1; $i <= 15; $i++) {
            $details = new Detail();
            $details->reponses = $requestData['r' . $i];
            $details->questions = $requestData['quest' . $i];
            $details->observations = $requestData['remarque' . $i];
            $diagnostic->detail()->save($details);
        }

        return redirect()->route('pagecarsspecialiste.affiche', $prenomid)->with('success', 'تمت اضافة التشخيص بنجاح ');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnostic $diagnostic)
    {
        $arr['diagnostic'] = $diagnostic;

        $arr['enfant'] = $diagnostic->enfant_id;
        $enfant = enfant::find($arr['enfant']);
        $arr['enfant'] = $enfant;

        $arr['carsspecialiste'] = $diagnostic->carsspecialiste_id;
        $carsspecialiste = carsspecialiste::find($arr['carsspecialiste']);
        $arr['carsspecialiste'] = $carsspecialiste;


        return view('pagecarsspecialiste.diagnostics.edit', compact('enfant'), compact('carsspecialiste'))->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnostic $diagnostic)
    {
        // dd($request->all());
        // $nomid=$request->enf_id;
        // $prenomid=$request->enfant_id;
        // $dateid=$request->enfa_id;
        // if(($nomid==$prenomid) && ($dateid==$prenomid)){
        $diagnostic->enfant_id = $request->enf_id;
        $diagnostic->carsspecialiste_id = $request->speciale_id;
        $diagnostic->dateDiagnostic = $request->date;
        $diagnostic->remarque = $request->remarque;
        $diagnostic->niveau = $request->autismresult;

        $diagnostic->save();
        return redirect()->route('pagecarsspecialiste.diagnostic.index')->with('success', 'تمت عملية التعديل بنجاح ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //search
    /* function action(Request $request)
     {
         if($request->ajax())
         {
             $output = '';
             $query = $request->get('query');
             if($query != '')
             {
                 $data = DB::table('enfants')
                     ->where('nom', 'like', '%'.$query.'%')
                    // ->orWhere('prenom', 'like', '%'.$query.'%')
                     //->orWhere('sexe', 'like', '%'.$query.'%')
                     //->orWhere('image', 'like', '%'.$query.'%')
                    // ->orderBy('enfant_id', 'desc')
                     ->get();

             }
             else
             {
                 $data = DB::table('enfants')
                     ->orderBy('id_enfant', 'desc')
                     ->get();
             }
             $total_row = $data->count();
             if($total_row > 0)
             {
                 foreach($data as $row)
                 {
                     $output .= '

          <tr >

          <td  width="6%">'.$row->image.'</td>
          <td  width="46%">'.$row->nom.'</td>
          <td  width="36%">'.$row->prenom.'</td>
          <td  width="26%">'.$row->sexe.'</td>
         </tr>
         ';
                 }
             }
             else
             {
                 $output = '
        <tr>
         <td align="center" colspan="5">No Data Found</td>
        </tr>
        ';
             }
             $data = array(
                 'table_data'  => $output,
                 'total_data'  => $total_row
             );

             echo json_encode($data);


         }
     }*/

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";

            $enfants = DB::table('enfants')->where('nom', 'LIKE', '%' . $request->search . "%")->get();
            if ($enfants) {
                foreach ($enfants as $key => $enfant) {
                    $output .= '<tr>' .
                        '<td>' . $enfant->id - enfant . '</td>' .
                        '<td>' . $enfant->nom . '</td>' .
                        '<td>' . $enfant->prenom . '</td>' .
                        '<td>' . $enfant->sexe . '</td>' .
                        '</tr>';
                }
                return Response($output);
            }
        }
    }

    function get_customer_data()
    {
        /*$enfants = DB::table('enfants')
            ->get();
        return $enfants;*/
        $id = 2;
        $enfant = Enfant::join('diagnostics', 'diagnostics.enfant_id', '=', 'enfants.id_enfant')->where('diagnostics.id', $id)->first();
        $id_enfant = $enfant->id_enfant;
        $enfant = $enfant::find($id_enfant);
        return $enfant;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_enfant_to_html());
        return $pdf->stream();
    }
    /* function convert_enfant_to_html()
     {
         $enfants = $this->get_customer_data();
         $output = '
      <h3 align="center">Customer Data</h3>
      <table width="100%" style="border-collapse: collapse; border: 0px;">
       <tr>
     <th  width = "30px">num</th>
     <th  width = "30px">اللقب</th>
                         <th  width = "30px">الاسم</th>
                         <th  width = "30px">الجنس</th>

    </tr>
      ';
         foreach($enfants as $enfant)
         {
             $output .= '
       <tr>
         <td style="border: 1px solid; padding:12px;">'.$enfant->id_enfant.'</td>
        <td style="border: 1px solid; padding:12px;" value="$enfant->id_enfant">'.$enfant->nom.'</td>
        <td style="border: 1px solid; padding:12px;" value="$enfant->id_enfant">'.$enfant->prenom.'</td>
        <td style="border: 1px solid; padding:12px;" >'.$enfant->sexe.'</td>

       </tr>
       ';
         }
         $output .= '</table>';
         return $output;
     }
 }*/
    function convert_enfant_to_html()
    {
        $enfant = $this->get_customer_data();
        $output = '
     <h3 align="center">Customer Data</h3>

        <ul class="list-group list-group-unbordered mb-3">

                                                    <li class="list-group-item">
                                                        <b>"/الجنس/":</b> <a>' .$enfant->sexe.'</a>
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
