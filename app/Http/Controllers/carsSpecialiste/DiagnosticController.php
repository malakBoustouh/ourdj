<?php

namespace App\Http\Controllers\carsSpecialiste;

use App\Detail;
use App\Enfant;
use App\Carsspecialiste;
use App\Diagnostic;
use App\Parentt;

use App\Traitant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Session;

class DiagnosticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$arr['enfants']=Enfant::latest()->paginate(2);
        $arr['enfants']=Enfant::paginate(5);
        $arr['diagnostics']=Diagnostic::all();
        $arr['carsspecialistes']=Carsspecialiste::all();


        return view('pagecarsspecialiste.diagnostics.index')->with($arr) ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $arr['enfants']=Enfant::all();
        $arr['diagnostics']=Diagnostic::all();
        $arr['carsspecialistes']=Carsspecialiste::all();
        $dateActuelle=Carbon::now()->toDateString();
        return view('pagecarsspecialiste.diagnostics.create',compact('dateActuelle','carsspecialiste'))->with($arr);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Diagnostic $diagnostic,Detail $detail)
    {

   // dd($request->all());
        //تقسيم الاسم الى نصفين و ايجاد  id
      /*  $Speialiste=$request->Nomspecialiste;
        $nomSpeialiste = explode(' ',  $Speialiste, 2); // Restricts it to only 2 values, for names like Billy Bob Jones

        $last_name = $nomSpeialiste[0];
        $first_name = !empty($nomSpeialiste[1]) ? $nomSpeialiste[1] : '';

        $specialiste=  Specialiste::where('prenom',$first_name) -> first();
            $nom = $specialiste->prenom;
        $specialiste=  Specialiste::where('nom', $last_name) -> first();
        $prenom = $specialiste->nom;

            if(($last_name==$prenom)&& ($first_name==$nom)){
                //$specialiste=  Specialiste::where('nom',$last_name) ->orwhere('prenom',$first_name)-> first();
               $result = Specialiste::where('nom', 'LIKE', '%'.$last_name.'%')
                    ->Where('prenom', 'LIKE', '%'.$first_name.'%')
                    ->first();
                  $idf= $result->id_specialiste;

            }*/
         $nomid=$request->enf_id;
        $prenomid=$request->enfant_id;
        $dateid=$request->enfa_id;


          //  dd("test1");
            $diagnostic->enfant_id= $prenomid;

            $diagnostic->id_superviseur=$request->trait;
        $nomSpecialiste = explode(' ',  Auth::user()->name, 2); // Restricts it to only 2 values, for names like Billy Bob Jones

        $last_name = $nomSpecialiste[0];
        $first_name = !empty($nomSpecialiste[1]) ? $nomSpecialiste[1] : '';
        $nomSpecialiste = Carsspecialiste::where('prenom', 'LIKE', '%'.$first_name.'%')
            ->Where('nom', 'LIKE', '%'.$last_name.'%')
            ->first();
        $idSp= $nomSpecialiste->id_carsspecialiste;
            $diagnostic->carsspecialiste_id= $idSp;
            $diagnostic->date=$request->date;
            $diagnostic->remarque=$request->remarque15;
            $diagnostic->niveau=$request->autismresult;
            $diagnostic->save();
                $requestData=$request->all();
                for($i=1;$i<=15;$i++){
                    $details=new Detail();
                    $details->reponses=$requestData['text'];
                        //$requestData['r'.$i];
                    $details->questions=$requestData['quest'.$i];
                    $details->observations=$requestData['remarque'.$i];
                    $diagnostic->detail()->save($details);
                }

            return redirect()->route('pagecarsspecialiste.affiche',$prenomid)->with(compact('detail'))->with('success','تمت اضافة التشخيص بنجاح ');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {
        $diagnostic = Diagnostic::where('id',$id)->first();
        $enfant = Enfant::join('diagnostics', 'diagnostics.enfant_id', '=', 'enfants.id_enfant')->where('diagnostics.id',$id)->first();
        $id_enfant=$enfant->id_enfant;
        $enfant=$enfant::find($id_enfant);
        $carsspecialiste = Carsspecialiste::join('diagnostics', 'diagnostics.carsspecialiste_id', '=', 'carsspecialistes.id_carsspecialiste')->where('diagnostics.id',$id)->first();
        $id_carsspecialiste= $carsspecialiste->id_carsspecialiste;
        $carsspecialiste = carsspecialiste::find($id_carsspecialiste);
        $arr['carsspecialistes']=Carsspecialiste::all();
        $parentt = Parentt::join('enfants', 'enfants.id_enfant', '=', 'parentts.enfant_id')->where('parentts.enfant_id',$id_enfant)->first();

        $calculeAge=Carbon::parse($enfant->dateNaissance);
        $age=$calculeAge->age;
        return view('pagecarsspecialiste.diagnostics.show')->with( compact('diagnostic','age','parentt','carsspecialiste','enfant'))->with($arr) ;
    }

   public function affiche($id_enfant){

        $arr['enfants']=Enfant::all();
        $arr['diagnostics']=Diagnostic::all();
        $enfant = Enfant::where('id_enfant',$id_enfant)->first();
       $dateNaiss= $enfant->dateNaissance;

        $dateActuelle=Carbon::now()->toDateString();
        $diagnostic = Diagnostic::join('enfants', 'enfants.id_enfant', '=', 'diagnostics.enfant_id')->where('diagnostics.enfant_id',$id_enfant)->first();
        $parentt = Parentt::join('enfants', 'enfants.id_enfant', '=', 'parentts.enfant_id')->where('parentts.enfant_id',$id_enfant)->first();
       $firs=$parentt->id_parentt;
       $parent = Parentt::join('enfants', 'enfants.id_enfant', '=', 'parentts.enfant_id')->where('parentts.id_parentt',$firs+1)->first();
        $arr['carsspecialistes']=Carsspecialiste::all();
        $arr['parentts']=Parentt::all();
        $arr['$diagnostics']=Diagnostic::all();
        $arr['enfants']=Enfant::all();
        $calculeAge=Carbon::parse($dateNaiss)->age;
        //dd($calculeAge);
        return view('pagecarsspecialiste.diagnostics.affiche')->with(compact('calculeAge','parent','dateActuelle','enfant','parentt','diagnostic','carsspecialiste','dateActuelle'))->with($arr);
    }
    public function storeAffiche(Request $request ,Diagnostic $diagnostic)
    {
       // dd($request->all());
        $nomid=$request->enf_id;
        $prenomid=$request->enfant_id;
        $dateid=$request->enfa_id;
     $diagnostic->enfant_id= $prenomid;
                $diagnostic->id_superviseur=$request->trait;
        $nomSpecialiste = explode(' ',  Auth::user()->name, 2); // Restricts it to only 2 values, for names like Billy Bob Jones

        $last_name = $nomSpecialiste[0];
        $first_name = !empty($nomSpecialiste[1]) ? $nomSpecialiste[1] : '';
        $nomSpecialiste = Carsspecialiste::where('prenom', 'LIKE', '%'.$first_name.'%')
            ->Where('nom', 'LIKE', '%'.$last_name.'%')
            ->first();
        $idSp= $nomSpecialiste->id_carsspecialiste;
                $diagnostic->carsspecialiste_id=$idSp;
                $diagnostic->dateDiagnostic=$request->date;
                $diagnostic->remarque=$request->remarque;
                $diagnostic->niveau=$request->autismresult;
                $diagnostic->save();
                $requestData=$request->all();
                for($i=1;$i<=15;$i++){
                    $details=new Detail();
                    $details->reponses=$requestData['r'.$i];
                    $details->questions=$requestData['quest'.$i];
                    $details->observations=$requestData['remarque'.$i];
                    $diagnostic->detail()->save($details);
                }

                return redirect()->route('pagecarsspecialiste.affiche',$prenomid)->with('success','تمت اضافة التشخيص بنجاح ');


    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnostic $diagnostic)
    {
        $arr['diagnostic']=$diagnostic;

        $arr['enfant']=$diagnostic->enfant_id ;
        $enfant = enfant::find($arr['enfant']);
        $arr['enfant']= $enfant;

        $arr['carsspecialiste']=$diagnostic->carsspecialiste_id ;
        $carsspecialiste = carsspecialiste::find($arr['carsspecialiste']);
        $arr['carsspecialiste']= $carsspecialiste;


        return view('pagecarsspecialiste.diagnostics.edit' ,compact('enfant'),compact('carsspecialiste'))->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnostic $diagnostic)
    {
       // dd($request->all());
       // $nomid=$request->enf_id;
       // $prenomid=$request->enfant_id;
       // $dateid=$request->enfa_id;
       // if(($nomid==$prenomid) && ($dateid==$prenomid)){
            $diagnostic->enfant_id=$request->enf_id;
            $diagnostic->carsspecialiste_id=$request->speciale_id;
            $diagnostic->dateDiagnostic=$request->date;
            $diagnostic->remarque=$request->remarque;
            $diagnostic->niveau=$request->autismresult;

            $diagnostic->save();
        return redirect()->route('pagecarsspecialiste.diagnostic.index')->with('success','تمت عملية التعديل بنجاح ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
