<?php

namespace App\Http\Controllers\Admin;
use App\Carsspecialiste;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CarsspecialisteController extends Controller
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
        $arr['carsspecialistes']=Carsspecialiste::paginate(5);
        return view('admin.carsSpecialistes.index')->with($arr)->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carsSpecialistes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Carsspecialiste $specialiste,User $user)
    {
        $this->validate($request, array('imagespecialiste'=>'required',
                'prenom'=>'required', 'nom'=>'required',
                'dateNaissance'=>'required', 'motpass'=>'required', 'email'=>'required|email',
                'numTel'=>'required', 'address'=>'required',
                'specialite'=>'required')
        );

        if($request->imagespecialiste->getClientOriginalName()){
            $ext =  $request->imagespecialiste->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->imagespecialiste->storeAs('public/specialistes',$file);
        }
        else
        {
            $file = '';
        }
        $specialiste->image=$file;
        $specialiste->prenom=$request->prenom;
        $specialiste->nom=$request->nom;
        $specialiste->dateNaissance=$request->dateNaissance;
        $specialiste->motpass=Hash::make($request->motpass);
        $specialiste->email=$request->email;
        $specialiste->numTel=$request->numTel;
        $specialiste->address=$request->address;
        $specialiste->specialite=$request->specialite;


        $names[0] = $request->nom;
        $names[1] = $request->prenom ;
        $user->name= implode(" ", $names);
        $user->image=$file;
        $user->email=$request->email;
        $user->password=Hash::make($request->motpass);
       // $user->password=$request->motpass;

        $user->usertype="specialiste";
        $specialiste->save();
        $user->save();
        //Session::flash('success', 'تمت عملية الاضافة بنجاح ');
        return redirect()->route('admin.carsSpecialistes.index')->with('success','تمت عملية الاضافة بنجاح ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_carsspecialiste)
    {
        $carsspecialiste = Carsspecialiste::find($id_carsspecialiste);
        //CALCUATE AGE Enfant
        $dateNaiss= $carsspecialiste->dateNaissance;
        $calculeAgeSpc=Carbon::parse($dateNaiss)->age;
        return view('admin.carsSpecialistes.show', compact('carsspecialiste','calculeAgeSpc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Carsspecialiste $carsspecialiste)
    {
        $arr['carsspecialiste']=$carsspecialiste;
        //$carsspecialiste = Carsspecialiste::find($carsspecialiste);

        return view('admin.carsSpecialistes.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$carsspecialiste)
    {
        $carsspecialiste = Carsspecialiste::find($carsspecialiste);

        if(isset($request->image) && $request->image->getClientOriginalName()){
            $ext =  $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->image->storeAs('public/specialistes',$file);
        }
        else
        {
            if(!$carsspecialiste->image)
                $file = '';
            else
                $file = $carsspecialiste->image;
        }

        $carsspecialiste->image=$file;
        $carsspecialiste->prenom=$request->prenom;
        $carsspecialiste->nom=$request->nom;
        $carsspecialiste->dateNaissance=$request->dateNaissance;
        $carsspecialiste->motpass=$request->motpass;
        $carsspecialiste->email=$request->email;
        $carsspecialiste->numTel=$request->numTel;
        $carsspecialiste->address=$request->address;
        $carsspecialiste->specialite=$request->specialite;
        $carsspecialiste->save();

        return redirect()->route('admin.carsSpecialistes.index')->with('success','تمت عملية التعديل بنجاح ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_carsspecialiste)
    {
        Carsspecialiste::destroy($id_carsspecialiste);
        //session()->flash('notif''Succes to save');
        return redirect()->route('admin.carsSpecialistes.index')->with('success','تمت عملية الحذف بنجاح ');
    }
}
