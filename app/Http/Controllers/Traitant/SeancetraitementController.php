<?php

namespace App\Http\Controllers\Traitant;

use App\Diagnostic;
use App\Enfant;
use App\Parentt;
use App\Specialiste;
use App\Traitant;
use App\Seancetraitement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;

class SeancetraitementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       // if (Seancetraitement::where('enfant_id', '=', Input::get('enfant_id'))->count() == 1) {

        /*if ($user =Seancetraitement::where('enfant_id', '=', 6)->exists())
        {
            if(($user)=="true"){
             */
        $seancetraitement = Seancetraitement::select('enfant_id')->join('enfants', 'enfants.id_enfant', '=', 'seancetraitements.enfant_id')->GROUPBY('enfant_id')->get();
           // dd(count($seancetraitement));

        $arr['seancetraitements']=Seancetraitement::all();
        $arr['enfants']=Enfant::paginate(5);
        return view('pagetraitant.seancetraitements.index')->with($arr) ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $arr['enfants']=Enfant::all();
        $arr['traitants']=Traitant::all();
        $arr['seancetraitements']=Seancetraitement::all();
        $dateActuelle=Carbon::now()->toDateString();
        return view('pagetraitant.seancetraitements.create',compact('dateActuelle'))->with($arr);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Seancetraitement $seancetraitement)
    {
     /*   $this->validate($request,
            array(
                'image'=>'required',
                'prenom'=>'required',
                'nom'=>'required',
                'dateNaissance'=>'required',
                'motpass'=>'required',
                'email'=>'required|email',
                'numTel'=>'required',
                'address'=>'required',
                'specialiste'=>'required')
        );*/

       // dd($request->all());
        $nomid=$request->enf_id;
        $prenomid=$request->enfant_id;
        if($nomid==$prenomid){
        $seancetraitement->enfant_id= $prenomid;
            $nomTraitant = explode(' ',  Auth::user()->name, 2); // Restricts it to only 2 values, for names like Billy Bob Jones
            $last_name = $nomTraitant[0];
            $first_name = !empty($nomTraitant[1]) ? $nomTraitant[1] : '';
            $nomSpecialiste = Traitant::where('prenom', 'LIKE', '%'.$first_name.'%')
                ->Where('nom', 'LIKE', '%'.$last_name.'%')
                ->first();
            $idTrait= $nomSpecialiste->id_traitant;
            $seancetraitement->traitant_id= $idTrait;
            $seancetraitement->dateTraite=$request->dateTraite;
            $seancetraitement->methode=$request->methode;
            if($request->commentaire==""){
                $seancetraitement->commentaire="لاتوجد";

            }else  {
                $seancetraitement->commentaire=$request->commentaire;
           }
            if($request->conseils==""){
                $seancetraitement->conseils="لاتوجد";

            }else  {
                $seancetraitement->conseils=$request->conseils;
            }

            $seancetraitement->duree=$request->duree;
            if($request->description==""){
                $seancetraitement->description="لايوجد";

            }else  {
                $seancetraitement->description=$request->description;
            }
            $seancetraitement->save();
            return redirect()->route('pagetraitant.show2',$seancetraitement->enfant_id)->with('success','تمت عملية الاضافة بنجاح ');

        }
        else{
            return redirect()->route('pagetraitant.seancetraitements.create')->with('success','خطأ في تحديد الاسم او اللقب ');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        /**************************************************/
        /* $enfant=enfant::find($id);
        // dd($enfant);
         $idf=  $enfant->enfant_id;
         $seancetraitement=Seancetraitement::find($idf);*/
        $seance= seancetraitement::find($id);
        $idt= $seance->traitant_id;

       // $traitant=Traitant::find(  $idt);
        $seancetraitement= seancetraitement::find($id);

        $idf= $seancetraitement->enfant_id;

        $enfant=Enfant::find(  $idf);
        $traitant = Traitant::where('id_traitant',$idt)->first();
        //dd( $traitant);
        $arr['traitants']=Traitant::all();


        return view('pagetraitant.seancetraitements.show', compact('seancetraitement'),compact('enfant'),compact('traitant'))->with($arr);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seancetraitement $seancetraitement)
    {
        $arr['seancetraitement']=$seancetraitement;
        $arr['enfant']=$seancetraitement->enfant_id ;
        $enfant = enfant::find($arr['enfant']);
        $id_enfant=$enfant->id_enfant;
        $arr['enfant']= $enfant;
        $enfant = Enfant::where('id_enfant',$id_enfant)->first();
        $calculeAge=Carbon::parse($enfant->dateNaissance);
        $age=$calculeAge->age;
        $parentt = Parentt::join('enfants', 'enfants.id_enfant', '=', 'parentts.enfant_id')->where('parentts.enfant_id',$id_enfant)->first();

        return view('pagetraitant.seancetraitements.edit')->with(compact('enfant','parentt','seancetraitement','age'))->with($arr);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seancetraitement $seancetraitement)
    {
        $nomid=$request->enf_id;
        $prenomid=$request->enfant_id;

            $seancetraitement->enfant_id= $prenomid;
            $seancetraitement->traitant_id=1;
            $seancetraitement->dateTraite=$request->dateTraite;
            $seancetraitement->methode=$request->methode;
            $seancetraitement->commentaire=$request->commentaire;
            $seancetraitement->conseils=$request->conseils;
            $seancetraitement->duree=$request->duree;
            $seancetraitement->description=$request->description;
        $seancetraitement->save();
        return redirect()->route('pagetraitant.show2',$seancetraitement->enfant_id)->with('success','تمت عملية التعديل بنجاح ');
    }


    public function traite($id){

        $enfant= enfant::find($id);

        //dd($id);
        $arr['traitants']=Traitant::all();
        $arr['seancetraitements']=Seancetraitement::all();
        $arr['enfants']=Enfant::all();

        return view('pagetraitant.seancetraitements.traite', compact('seancetraitement'),compact('enfant'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function show2($id_enfant){
        $arr['enfants']=Enfant::all();
        $arr['diagnostics']=Diagnostic::all();
        $arr['seancetraitements']=Seancetraitement::all();
        $enfant = Enfant::where('id_enfant',$id_enfant)->first();
        $calculeAge=Carbon::parse($enfant->dateNaissance);
        $age=$calculeAge->age;
        $dateActuelle=Carbon::now()->toDateString();
        $seancetraitement = Seancetraitement::join('enfants', 'enfants.id_enfant', '=', 'seancetraitements.enfant_id')->where('seancetraitements.enfant_id',$id_enfant)->first();
        $diagnostic = Diagnostic::join('enfants', 'enfants.id_enfant', '=', 'diagnostics.enfant_id')->where('diagnostics.enfant_id',$id_enfant)->first();
        $parentt= Parentt::join('enfants', 'enfants.id_enfant', '=', 'parentts.enfant_id')->where('parentts.enfant_id',$id_enfant)->first();
        $arr['traitants']=Traitant::all();
        $arr['specialistes']=Specialiste::all();
        $arr['parentts']=Parentt::all();
        return view('pagetraitant.seancetraitements.show2')->with(compact('enfant','parentt','seancetraitement','diagnostic','specialiste','age','dateActuelle'))->with($arr);
    }


    public function affiche($idF){
       // dd($idF);
        $diagnostic = Diagnostic::where('id',$idF)->first();
        $enfant = Enfant::join('diagnostics', 'diagnostics.enfant_id', '=', 'enfants.id_enfant')->where('diagnostics.id',$idF)->first();
        $id_enfant=$enfant->id_enfant;
        $enfant=$enfant::find($id_enfant);
        $calculeAge=Carbon::parse($enfant->dateNaissance);
        $age=$calculeAge->age;
        $parentt = Parentt::join('enfants', 'enfants.id_enfant', '=', 'parentts.enfant_id')->where('parentts.enfant_id',$id_enfant)->first();

        $specialiste = Specialiste::join('diagnostics', 'diagnostics.specialiste_id', '=', 'specialistes.id_specialiste')->where('diagnostics.id',$idF)->first();
        $id_specialiste= $specialiste->id_specialiste;
        $specialiste = specialiste::find($id_specialiste);
        $arr['specialistes']=Specialiste::all();
        return view('pagetraitant.seancetraitements.affiche')->with (compact('parentt','age','diagnostic','enfant','specialiste'))->with($arr) ;
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
