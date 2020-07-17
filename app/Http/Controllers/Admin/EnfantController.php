<?php

namespace App\Http\Controllers\Admin;
use App\Enfant;
use App\Parentt;
use App\Traitant;
use Carbon\Carbon;
use Cassandra\FutureRows;
use Cassandra\Rows;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use mysql_xdevapi\RowResult;
use Session;
class EnfantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    public function index()
    {

        $arr['enfants']=Enfant::paginate(5);
        $arr['parentts']=Parentt::paginate(5);;

        return view('admin.enfants.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['enfants']=Enfant::all();
        $arr['parentts']=Parentt::all();
        $arr['traitants']=Traitant::all();

        return view('admin.enfants.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Enfant $enfant,Parentt $parentt)
    {
        $this->validate($request, array('imageChild'=>'required','imageMother1'=>'required','imageMother2'=>'required',
                'nom'=>'required', 'nom1'=>'required', 'dateNaissance'=>'required', 'lieuNaissannce'=>'required','wilaya'=>'required',
            'commune'=>'required','domicile'=>'required',
                'motpass1'=>'required', 'email1'=>'required|email','prenom1'=>'required','dateNaissance1'=>'required',
                'numTel1'=>'required', 'lieuTravail1'=>'required','niveauEduc1'=>'required', 'motpass2'=>'required', 'email2'=>'required|email','prenom2'=>'required','dateNaissance2'=>'required',
                'numTel2'=>'required', 'lieuTravail2'=>'required','niveauEduc2'=>'required','nom2'=>'required'
                )
        );
       // dd($request->all());
        if($request->imageChild->getClientOriginalName()){
            $ext =  $request->imageChild->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->imageChild->storeAs('public/enfants',$file);
        }
        else
        {
            $file = '';
        }
        $enfant->image=$file;
        $enfant->prenom=$request->nom1;
        $enfant->nom=$request->nom;
        $enfant->dateNaissance=$request->dateNaissance;
        $enfant->lieuNaissannce=$request->lieuNaissannce;
        $enfant->sexe=$request->sexe;
        $enfant->groupage=$request->groupage;
        $enfant->wilaya=$request->wilaya;
        $enfant->commune=$request->commune;
        $enfant->domicile=$request->domicile;

        $enfant->save();
        $requestData=$request->all();

        for($i=1;$i<=2;$i++){
            $parentts=new Parentt();

            if($requestData['imageMother'.$i]->getClientOriginalName()){
                $ext = $requestData['imageMother'.$i]->getClientOriginalExtension();
                $file = date('YmdHis').rand(1,99999).'.'.$ext;
                $requestData['imageMother'.$i]->storeAs('public/familles',$file);
            }
            else
            {
                $file = '';
            }
            $parentts->img=$file;
            $parentts->prenomp=$requestData['prenom'.$i];
            $parentts->nomp=$requestData['nom'.$i];
            $parentts->dateNaissancep=$requestData['dateNaissance'.$i];
            $parentts->motpass=$requestData['motpass'.$i];
            $parentts->numTel=$requestData['numTel'.$i];
            $parentts->email=$requestData['email'.$i];
            $parentts->niveauEduc=$requestData['niveauEduc'.$i];
            $parentts->lieuTravail=$requestData['lieuTravail'.$i];
            $enfant->parentts()->save($parentts);
        }



        return redirect()->route('admin.enfants.index')->with('success','تمت عملية الاضافة بنجاح ');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_enfant)
    {
        $enfant = Enfant::where('id_enfant',$id_enfant)->first();
        $parentt = Parentt::join('enfants', 'enfants.id_enfant', '=', 'parentts.enfant_id')->where('parentts.enfant_id',$id_enfant)->first();
        $firs=$parentt->id_parentt;
        $parent = Parentt::join('enfants', 'enfants.id_enfant', '=', 'parentts.enfant_id')->where('parentts.id_parentt',$firs+1)->first();

        //CALCUATE AGE Enfant
        $dateNaiss= $enfant->dateNaissance;
        $calculeAgeEnf=Carbon::parse($dateNaiss)->age;
        //CALCUATE AGE pere
        $dateNaissP= $parentt->dateNaissancep;
        $calculeAgePere=Carbon::parse($dateNaissP)->age;
        //CALCUATE AGE mere
        $dateNaissM= $parent->dateNaissancep;
        $calculeAgeMere=Carbon::parse($dateNaissM)->age;


        return view('admin.enfants.show')->with( compact('calculeAgeMere','calculeAgePere','calculeAgeEnf','parentt','parent','enfant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id_enfant)
    {
        $enfant = Enfant::where('id_enfant',$id_enfant)->first();
        $parentt = Parentt::join('enfants', 'enfants.id_enfant', '=', 'parentts.enfant_id')->where('parentts.enfant_id',$id_enfant)->first();

        $firs=$parentt->id_parentt;
        $parent = Parentt::join('enfants', 'enfants.id_enfant', '=', 'parentts.enfant_id')->where('parentts.id_parentt',$firs+1)->first();
        $arr['enfants']=$id_enfant;
        $arr['parentt'] =$parentt;


        return view('admin.enfants.edit')->with(compact('parentt','parent','enfant'))->with($arr);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Parentt $pare)
    {
       //dd($request->all());
        $paren=$pare->get();
        //pour determiner le terme 1
        $gg=$paren->get(1);
       //pour determiner le terme 1
        $parent=$paren->get(0);
//pour determine id enfant
        $pa=$pare->first();
        $idf= $pa->enfant_id;
        $enfant=Enfant::find($idf);
        if(isset($request->imageMother1) && $request->imageMother1->getClientOriginalName()){
            $ext =  $request->imageMother1->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->imageMother1->storeAs('public/familles',$file);
        }
        else
        {
            if(!$parent->img)
                $file = '';
            else
                $file = $parent->img;
        }
        $parent->img=$file;
        $parent->prenomp=$request->prenomp1;
        $parent->nomp=$request->prenomEnf;
        $parent->dateNaissancep=$request->dateNaissancep1;
        $parent->motpass=$request->motpassp1;
        $parent->numTel=$request->numTelp1;
        $parent->email=$request->emailp1;
        $parent->niveauEduc=$request->niveauEducp1;
        $parent->lieuTravail=$request->lieuTravailp1;
        $parent->save();

        if(isset($request->imageMother2) && $request->imageMother2->getClientOriginalName()){
            $ext =  $request->imageMother2->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->imageMother2->storeAs('public/familles',$file);
        }
        else
        {
            if(!$gg->img)
                $file = '';
            else
                $file = $gg->img;
        }

        $gg->img=$file;
        $gg->prenomp=$request->prenomp2;
        $gg->nomp=$request->nomp2;
        $gg->dateNaissancep=$request->dateNaissancep2;
        $gg->motpass=$request->motpassp2;
        $gg->numTel=$request->numTelp2;
        $gg->email=$request->emailp2;
        $gg->niveauEduc=$request->niveauEducp2;
        $gg->lieuTravail=$request->lieuTravailp2;
        $gg->save();


        if(isset($request->imageChild) && $request->imageChild->getClientOriginalName()){
            $ext =  $request->imageChild->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->imageChild->storeAs('public/enfants',$file);
        }
        else
        {
            if(!$enfant->image)
                $file = '';
            else
                $file = $enfant->image;
        }

        $enfant->image=$file;
        $enfant->prenom=$request->prenomEnf;
        $enfant->nom=$request->nomEnf;
        $enfant->dateNaissance=$request->dateNaissance;
        $enfant->lieuNaissannce=$request->lieuNaissannce;
        $enfant->sexe=$request->sexe;
        $enfant->groupage=$request->groupage;
        $enfant->wilaya=$request->wilaya;
        $enfant->commune=$request->commune;
        $enfant->domicile=$request->domicile;

        $enfant->save();
        return redirect()->route('admin.enfants.index')->with('success','تمت عملية التعديل بنجاح ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_enfant)
    {
        $parentt = Parentt::join('enfants', 'enfants.id_enfant', '=', 'parentts.enfant_id')->where('parentts.enfant_id',$id_enfant)->first();
        $idF=$parentt->id_parentt;
        Parentt::destroy($idF);
        Enfant::destroy($id_enfant);

        return redirect()->route('admin.enfants.index')->with('success','تمت عملية الحذف بنجاح ');
    }
}
