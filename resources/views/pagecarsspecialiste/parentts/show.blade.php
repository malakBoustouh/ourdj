@extends('layouts.specialistes')
@section('title',' | عرص المعلومات الشخصي ')
@section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3> المعلومات الخاصة</h3>
                    <hr>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="form-group"  >

                            @if($enfant->image)
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <img src="{{ asset('storage/enfants/'.$enfant->image) }}" style="border-radius: 8px; display: block;
                                     margin-left: auto;
                                     margin-right: auto;  border: 5px solid #ddd;
                                     width:350px;">
                                </div>
                                <div class="clearfix"></div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <strong> اللقب:</strong> {{$enfant->prenom}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>الاسم: </strong> {{$enfant->nom}}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group" >
                            <strong> تاريخ الميلاد : </strong> {{$enfant->dateNaissance}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>  مكان الميلاد:</strong> {{$enfant->lieuNaissannce}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>  الجنس:</strong> {{$enfant->sexe}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>زمرة الدم :</strong> {{$enfant->groupage}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>الولاية :</strong> {{$enfant->wilaya}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>البلدية :</strong> {{$enfant->commune}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>العنوان :</strong> {{$enfant->domicile}}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group"  >

                            @if($parentt->image)
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <img src="{{ asset('storage/familles/'.$parentt->image) }}" style="border-radius: 8px; display: block;
                                     margin-left: auto;
                                     margin-right: auto;  border: 5px solid #ddd;
                                     width:200px;">
                                </div>
                                <div class="clearfix"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group"  >

                            @if($parentt->image)
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <img src="{{ asset('storage/familles/'.$parentt->image) }}" style="border-radius: 8px; display: block;
                                     margin-left: auto;
                                     margin-right: auto;  border: 5px solid #ddd;
                                     width:200px;">
                                </div>
                                <div class="clearfix"></div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>إسم الأب :</strong> {{$parentt->prenom}}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>مستوى الدراسي :</strong> {{$parentt->niveauEduc}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>رقم الهاتف:</strong> {{$parentt->numTel}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>البريد الإلكتروني :</strong> {{$parentt->email}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>إسم الأم :</strong> {{$parentt->prenom}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>المستوى الدراسي :</strong> {{$parentt->niveauEduc}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>رقم الهاتف :</strong> {{$parentt->numTel}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>البريد الإلكتروني  :</strong> {{$parentt->email}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>تاریخ الميلاد :</strong> {{$parentt->dateNaissance}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>عنوان العمل :</strong> {{$parentt->lieuTravail}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong> كلمة المرور  :</strong> {{$parentt->motpass}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>اللقب :</strong> {{$parentt->nom}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong> تاریخ الميلاد :</strong> {{$parentt->dateNaissance}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong> عنوان العمل :</strong> {{$parentt->lieuTravail}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong> كلمة المرور:</strong> {{$parentt->motpass}}
                        </div>
                    </div>

                </div>

                <div class="col-md-6" >

                    <div class="col-md-6">

                        <div class="card bg-light mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <div class="well">
                                    <div class="form-group" >
                                        <dl class="dl-horizontal" >
                                            <dt >بتاريخ :</dt>
                                            <dd>{{ date('M j, Y h:ia', strtotime($enfant->created_at)) }}</dd>
                                        </dl>
                                    </div>

                                    <dl class="dl-horizontal" >
                                        <dt>اخر تعديل:</dt>
                                        <dd >{{ date('M j, Y h:ia', strtotime($enfant->updated_at)) }}</dd>
                                    </dl>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            {!! Html::linkRoute('pagecarsspecialiste.parentts.edit', 'تعديل', array($enfant->id_enfant), array('class' => 'btn btn-primary btn-block')) !!}
                                        </div>
                                        <div class="col-sm-6">
                                            {!! Html::linkRoute('pagecarsspecialiste.parentts.index', 'رجوع>>',[], array('class' => 'btn btn-default btn-block btn-h1-spacing')) !!}
                                        </div>
                                    </div>
                                    <br>


                                </div>

                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
