<?php

namespace App\Http\Controllers\Admin;

use App\Traitant;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Session;
class TraitantsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $arr['traitants']=Traitant::paginate(5);
        return view('admin.traitants.index')->with($arr)->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.traitants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Traitant $traitant,User $user)
    {
        $this->validate($request, array('image'=>'required', 'prenom'=>'required', 'nom'=>'required', 'dateNaissance'=>'required', 'motpass'=>'required', 'email'=>'required|email', 'numTel'=>'required', 'address'=>'required',
                'specialiste'=>'required')
        );



        if($request->image->getClientOriginalName()){
            $ext =  $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->image->storeAs('public/traitants',$file);
        }
        else
        {
            $file = '';
        }
        $traitant->image=$file;
        $traitant->prenom=$request->prenom;
        $traitant->nom=$request->nom;
        $traitant->dateNaissance=$request->dateNaissance;
        $traitant->motpass=Hash::make($request->motpass);
        $traitant->email=$request->email;
        $traitant->numTel=$request->numTel;
        $traitant->address=$request->address;
        $traitant->specialiste=$request->specialiste;
        $names[0] = $request->prenom;
        $names[1] = $request->nom ;
        $user->name= implode(" ", $names);
        $user->email=$request->email;
        $user->image=$file;
        $user->password=Hash::make($request->motpass);
        $user->usertype="traitant";
        $traitant->save();
        $user->save();
        //Session::flash('success', 'تمت عملية الاضافة بنجاح ');

        return redirect()->route('admin.traitants.index')->with('success','تمت عملية الاضافة بنجاح ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_traitant)
    {
        $traitant = traitant::find($id_traitant);
        $dateNaiss= $traitant->dateNaissance;
        $calculeAgeTrt=Carbon::parse($dateNaiss)->age;
        return view('admin.traitants.show', compact('traitant','calculeAgeTrt'));
        //return view('admin.traitants.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Traitant $traitant)
    {
       $arr['traitant']=$traitant;
       return view('admin.traitants.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traitant $traitant)
    {

        if(isset($request->image) && $request->image->getClientOriginalName()){
            $ext =  $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->image->storeAs('public/traitants',$file);
        }
        else
        {
            if(!$traitant->image)
                $file = '';
            else
                $file = $traitant->image;
        }
        $traitant->image=$file;
        $traitant->prenom=$request->prenom;
        $traitant->nom=$request->nom;
        $traitant->dateNaissance=$request->dateNaissance;
        $traitant->motpass=$request->motpass;
        $traitant->email=$request->email;
        $traitant->numTel=$request->numTel;
        $traitant->address=$request->address;
        $traitant->specialiste=$request->specialiste;
        $traitant->save();
        return redirect()->route('admin.traitants.index')->with('success','تمت عملية التعديل بنجاح ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_traitant)
    //public function destroy(Traitant $traitant)
    {
       Traitant::destroy($id_traitant);
        //$traitant->delete();
        return redirect()->route('admin.traitants.index')->with('success','تمت عملية الحذف بنجاح ');
    }
}
