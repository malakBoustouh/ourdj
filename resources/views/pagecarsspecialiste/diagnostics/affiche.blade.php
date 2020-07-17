@extends('layouts.specialistes')
@section('title','| ملف الطفل')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#child" data-toggle="tab"> الطفل</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#parents" data-toggle="tab">بيانات الأولياء</a></li>
                                </ul>
                                <div class="tab-content">

                                    <div class="active tab-pane" id="child">
                                        <div class="post">
                                            <div class="text-center">
                                                @if($enfant->image)
                                                    <img src="{{ asset('storage/enfants/'.$enfant->image) }}" class="profile-user-img img-fluid img-circle"/>
                                                @else
                                                    <img class="profile-user-img img-fluid img-circle"
                                                         src="{{asset('dist/img/child1.jpg')}}"
                                                         alt="صورة الطفل">
                                                @endif
                                            </div>

                                            <h3 class="profile-username text-center childname">{{$parentt->nomp}} {{$enfant->nom}}</h3>
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>الجنس:</b> <a>{{ $enfant->sexe}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>العمر:</b> <a>{{$calculeAge}} {{"سنة"}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>زمرة الدم:</b> <a>{{ $enfant->groupage}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b> العنوان:</b> <a>{{ $enfant->domicile}}{{"-"}} {{ $enfant->commune}}{{"-"}} {{ $enfant->wilaya}} </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="parents">
                                        <div class="post">
                                            <div>
                                                <p></p>
                                            </div>
                                            <div class="text-center">
                                                @if($parentt->img)

                                                    <img src="{{ asset('storage/familles/'.$parentt->img) }}" class="profile-parents-img img-fluid img-circle" alt="صورة الأب">
                                                @else
                                                    <img class="profile-parents-img img-fluid img-circle"
                                                         src="{{asset('dist/img/dad.jpg')}}"
                                                         alt="صورة الأب">
                                                @endif
                                            </div>
                                            <p></p>
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    @if($parentt->enfant_id==$enfant->id_enfant)
                                                        <b>الأب:</b> <a> {{$parentt->nomp}} {{$parentt->prenomp}}</a>
                                                    @endif
                                                </li>
                                                <li class="list-group-item">
                                                    <b>رقم الهاتف:</b> <a>{{$parentt->numTel}}</a>
                                                </li>
                                            </ul>

                                            <div class="text-center">
                                                @if($parentt->img)
                                                    <img src="{{ asset('storage/familles/'.$parent->img) }}" class="profile-parents-img img-fluid img-circle" >
                                                @else
                                                    <img  class="profile-parents-img img-fluid img-circle"
                                                          src="{{asset('dist/img/mom.jpg')}}"
                                                          alt="صورةالأم">
                                                @endif
                                            </div>
                                            <p></p>
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>الأم:</b> <a>{{$parent->nomp}} {{$parent->prenomp}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>رقم الهاتف:</b> <a>{{$parent->numTel}}</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">

                            <div class="card-header p-2">

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="بحث">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#prise" data-toggle="tab">التشخيص</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#traite" data-toggle="tab" >إضافة تشخيص</a></li>


                                </ul>

                                <div class="card-body">

                                </div><!-- /.card-header -->

                                <div class="tab-content">
                                    <div class="active tab-pane"  id="prise">
                                        <div class="post">
                                            <div class="card">
                                                <div class="card-body table-responsive p-0">
                                                    @if ($message = Session::get('success'))
                                                        <div class="alert alert-success">
                                                            <p>{{ $message }}</p>
                                                        </div>
                                                    @endif
                                                        @if ($message = Session::get('succe'))
                                                            <div class="alert alert-danger" role="alert">
                                                                <p>{{ $message }}</p>
                                                            </div>
                                                        @endif
                                                    <table class="table table-hover">
                                                        <tr>
                                                            <th>التاريخ</th>
                                                            <th>المختص(ة)</th>
                                                            <th>المشرف(ة)</th>
                                                            <th>النتيجة</th>
                                                        </tr>
                                                        @if(count($diagnostic))
                                                            @foreach($diagnostics as $h   )
                                                                @if($enfant->id_enfant==$h->enfant_id)
                                                                    <tr   data-href="{{route('pagecarsspecialiste.show',$h->id)}}"  style="cursor: pointer;">
                                                                        <td>{{$h->date}}</td>
                                                                        @foreach($carsspecialistes as $t   )
                                                                            @if($h->carsspecialiste_id==$t->id_carsspecialiste)
                                                                                <td value="{{$t->id_carsspecialiste}}">{{'الدكتور(ة)'}} {{ $t->prenom}} {{ $t->nom}}  </td>


                                                                                <td  value="{{$t->id_carsspecialiste}}">{{'الدكتور(ة)'}} {{ $t->prenom}} {{ $t->nom}}  </td>
                                                                            @endif
                                                                        @endforeach
                                                                        <td>{{$h->niveau}}</td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <tr><td colspan="7">لا يوجد معالجة</td></tr>
                                                        @endif
                                                    </table>



                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="traite">
                                        <div class="card">
                                            <div class="card-body table-responsive p-0">
                                                <div class="card-header">
                                                    <h3 class="card-title">المعلومات</h3>
                                                </div>

                                                <form method="post" action="{{route('pagecarsspecialiste.storeAffiche')}}" enctype="multipart/form-data">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                    <!-- Main content -->
                                                    <section class="content">
                                                        <div class="container-fluid">
                                                            <!-- left column -->
                                                            <!-- general form elements -->
                                                            <div class="card card-primary">

                                                                <!-- /.card-header -->
                                                                @if ($message = Session::get('success'))
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <p>{{ $message }}</p>
                                                                    </div>
                                                            @endif
                                                            <!-- /.card-header -->
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group" >
                                                                                <label> اللقب و الإسم :</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="fa fa-child"></i></span>
                                                                                    </div>

                                                                                    <select   class="form-control" style="width: 319px" id="named" name="enfant_id" >
                                                                                        <option ></option>
                                                                                        <option  value="{{$enfant->id_enfant}}" selected readonly>{{$enfant->prenom}} {{$enfant->nom}}</option>
                                                                                    </select>

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">

                                                                                <label>تاريخ الميلاد  :</label>

                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                                    </div>
                                                                                    <select   class="form-control" style="width:314px" id="birthday" name="enfa_id" >
                                                                                        <option ></option>

                                                                                        <option  value="{{$enfant->id_enfant}}" selected readonly>{{$enfant->dateNaissance}}</option>

                                                                                    </select>

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">

                                                                                <label> المشرفة  :</label>

                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                                                    </div>

                                                                                    <select   style="width:314px" id="carsspecialiste_id" name="trait" >
                                                                                        <option ></option>
                                                                                        @foreach($carsspecialistes as $speciale)
                                                                                            <option  value="{{$carsspecialiste->id_carsspecialiste}}">{{$speciale->nom}} {{$speciale->prenom}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">

                                                                            <div class="form-group">

                                                                                <label> تاريخ تطبيق المقياس  :</label>

                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                                    </div>
                                                                                    <input type="date" class="form-control" name="date" readonly value="{{$dateActuelle}}">

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">

                                                                                <label > النتيجة  :</label>

                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="fa fa-commenting-o" ></i></span>
                                                                                    </div>
                                                                                    <input type="text" readonly class="form-control"  id="autismresult"  name="autismresult" >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.row -->

                                                                    </div><!-- /.container-fluid -->


                                                                </div>
                                                            </div>

                                                            <div class="row">

                                                                <div class="col-md-6">
                                                                    <!-- general form elements -->
                                                                    <div class="card card-info">
                                                                        <div class="card-header">
                                                                            <h3 class="card-title">العلاقات مع الآخرين</h3>
                                                                        </div>
                                                                        <!-- /.card-header -->
                                                                        <div class="card-body">

                                                                            <!-- radio -->
                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r1" class="minimal" value="1">
                                                                                    لا يوجد أي دلالة أو صعوبة في التعامل مع الآخرين.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container"> ---
                                                                                    <input type="radio" name="r1" class="minimal" value="1.5">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r1" class="minimal" value="2" >
                                                                                    علاقات غير عادية بدرجة بسيطة.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container"> ---
                                                                                    <input type="radio" name="r1" class="minimal" value="2.5">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r1" class="minimal" value="3" >
                                                                                    علاقات غير عادية بدرجة متوسطة.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container"> ---
                                                                                    <input type="radio" name="r1" class="minimal" value="3.5">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r1" class="minimal" value="4" >
                                                                                    علاقات غير عادية بدرجة شديدة.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>
                                                                                    ملاحظات :
                                                                                </label>
                                                                                <textarea class="remarquearea" rows="4" style="width:323px" cols="56,5"></textarea>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">

                                                                    <div class="card card-warning">
                                                                        <div class="card-header">
                                                                            <h3 class="card-title"> التقليد</h3>
                                                                        </div>
                                                                        <!-- /.card-header -->
                                                                        <div class="card-body">

                                                                            <!-- radio -->
                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r2" class="minimal" value="1">
                                                                                    التقليد المناسب.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container"> ---
                                                                                    <input type="radio" name="r2" class="minimal" value="1.5">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r2" class="minimal" value="2" >
                                                                                    التقليد غير العادي من الدرجة البسيطة.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container"> ---
                                                                                    <input type="radio" name="r2" class="minimal" value="2.5">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r2" class="minimal" value="3" >
                                                                                    التقليد غير العادي من الدرجة المتوسطة.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container"> ---
                                                                                    <input type="radio" name="r2" class="minimal" value="3.5">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r2" class="minimal" value="4" >
                                                                                    التقليد غير العادي من الدرجة الشديدة.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>
                                                                                    ملاحظات :
                                                                                </label>
                                                                                <textarea class="remarquearea" rows="4" style="width:323px" cols="56,5"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <!-- general form elements -->
                                                                        <div class="card card-danger">
                                                                            <div class="card-header">
                                                                                <h3 class="card-title">الإستجابة الإنفعالية</h3>
                                                                            </div>
                                                                            <!-- /.card-header -->
                                                                            <div class="card-body">

                                                                                <!-- radio -->
                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r3" class="minimal" value="1">
                                                                                        إستجابات إنفعالية مناسبة للمواقف و العمر.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r3" class="minimal" value="1.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r3" class="minimal" value="2" >
                                                                                        إستجابات إنفعالية غير عادية من الدرجة البسيطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r3" class="minimal" value="2.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r3" class="minimal" value="3" >
                                                                                        إستجابات إنفعالية غير عادية من الدرجة المتوسطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r3" class="minimal" value="3.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r3" class="minimal" value="4" >
                                                                                        إستجابات إنفعالية غير عادية من الدرجة الشديدة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        ملاحظات :
                                                                                    </label>
                                                                                    <textarea class="remarquearea" rows="4" style="width:323px" cols="56,5"></textarea>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- general form elements -->

                                                                    <div class="col-md-6">

                                                                        <div class="card card-success">
                                                                            <div class="card-header">
                                                                                <h3 class="card-title">إستخدام الجسم</h3>
                                                                            </div>
                                                                            <!-- /.card-header -->
                                                                            <div class="card-body">

                                                                                <!-- radio -->
                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r4" class="minimal" value="1">
                                                                                        إستخدام الجسم بشكل مناسب لعمر الطفل.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r4" class="minimal" value="1.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r4" class="minimal" value="2" >
                                                                                        إستخدام غير عادي للجسم من الدرجة البسيطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r4" class="minimal" value="2.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r4" class="minimal" value="3" >
                                                                                        إستخدام غير عادي للجسم من الدرجة المتوسطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r4" class="minimal" value="3.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r4" class="minimal" value="4" >
                                                                                        إستخدام غير عادي للجسم من الدرجة الشديدة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        ملاحظات :
                                                                                    </label>
                                                                                    <textarea class="remarquearea" rows="4" style="width:323px" cols="56,5"></textarea>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <!-- general form elements -->
                                                                        <div class="card card-info">
                                                                            <div class="card-header">
                                                                                <h3 class="card-title">إستخدام الأشياء</h3>
                                                                            </div>
                                                                            <!-- /.card-header -->
                                                                            <div class="card-body">

                                                                                <!-- radio -->
                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r5" class="minimal" value="1">
                                                                                        الإستخدام المناسب و الإستمتاع بالألعاب و الأشياء الأخرى.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r5" class="minimal" value="1.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r5" class="minimal" value="2" >
                                                                                        الإستخدام و الإستمتاع غير المناسب في الألعاب والأشياء الأخرى من الدرجة البسيطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r5" class="minimal" value="2.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r5" class="minimal" value="3" >
                                                                                        الإستخدام و الإستمتاع غير المناسب في الألعاب والأشياء الأخرى من الدرجة المتوسطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r5" class="minimal" value="3.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r5" class="minimal" value="4" >
                                                                                        الإستخدام و الإستمتاع غير المناسب في الألعاب والأشياء الأخرى من الدرجة الشديدة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        ملاحظات :
                                                                                    </label>
                                                                                    <textarea class="remarquearea" rows="4" style="width:323px" cols="56,5"></textarea>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- general form elements -->

                                                                    <div class="col-md-6">

                                                                        <div class="card card-warning">
                                                                            <div class="card-header">
                                                                                <h3 class="card-title"> التكيف للتغير</h3>
                                                                            </div>
                                                                            <!-- /.card-header -->
                                                                            <div class="card-body">
                                                                                <!-- radio -->
                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r6" class="minimal" value="1">
                                                                                        الإستجابة للتغير مناسبة لعمر الطفل.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r6" class="minimal" value="1.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r6" class="minimal" value="2" >
                                                                                        تكيف غير مناسب بدرجة بسيطة للتغيير.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r6" class="minimal" value="2.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r6" class="minimal" value="3" >
                                                                                        تكيف غير مناسب بدرجة متوسطة للتغيير.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r6" class="minimal" value="3.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r6" class="minimal" value="4" >
                                                                                        تكيف غير مناسب بدرجة شديدة للتغيير.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        ملاحظات :
                                                                                    </label>
                                                                                    <textarea class="remarquearea" rows="4" style="width:323px" cols="56,5"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <!-- general form elements -->
                                                                        <div class="card card-danger">
                                                                            <div class="card-header">
                                                                                <h3 class="card-title">الإستجابة البصرية</h3>
                                                                            </div>
                                                                            <!-- /.card-header -->
                                                                            <div class="card-body">

                                                                                <!-- radio -->
                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r7" class="minimal" value="1">
                                                                                        إستجابة بصرية مناسبة للعمر.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r7" class="minimal" value="1.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r7" class="minimal" value="2" >
                                                                                        إستجابة بصرية غير عادية من الدرجة البسيطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r7" class="minimal" value="2.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r7" class="minimal" value="3" >
                                                                                        إستجابة بصرية غير عادية من الدرجة المتوسطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r7" class="minimal" value="3.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r7" class="minimal" value="4" >
                                                                                        إستجابة بصرية غير عادية من الدرجة الشديدة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        ملاحظات :
                                                                                    </label>
                                                                                    <textarea class="remarquearea" rows="4" style="width:323px" cols="56,5"></textarea>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- general form elements -->

                                                                    <div class="col-md-6">

                                                                        <div class="card card-success">
                                                                            <div class="card-header">
                                                                                <h3 class="card-title">الإستجابة السمعية</h3>
                                                                            </div>
                                                                            <!-- /.card-header -->
                                                                            <div class="card-body">

                                                                                <!-- radio -->
                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r8" class="minimal" value="1">
                                                                                        إستجابة سمعية مناسبة لعمر الطفل.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r8" class="minimal" value="1.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r8" class="minimal" value="2" >
                                                                                        إستجابة سمعية غير عادية من الدرجة البسيطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r8" class="minimal" value="2.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r8" class="minimal" value="3" >
                                                                                        إستجابة سمعية غير عادية من الدرجة المتوسطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r8" class="minimal" value="3.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r8" class="minimal" value="4" >
                                                                                        إستجابة سمعية غير عادية من الدرجة الشديدة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        ملاحظات :
                                                                                    </label>
                                                                                    <textarea class="remarquearea" rows="4" style="width:323px" cols="56,5"></textarea>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <!-- general form elements -->
                                                                        <div class="card card-info">
                                                                            <div class="card-header">
                                                                                <h3 class="card-title">إستجابات اللمس،الشم،التذوق و استخدامها</h3>
                                                                            </div>
                                                                            <!-- /.card-header -->
                                                                            <div class="card-body">

                                                                                <!-- radio -->
                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r9" class="minimal" value="1">
                                                                                        الإستجابة و الإستخدام الطبيعي للتذوق،الشم و اللمس.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r9" class="minimal" value="1.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r9" class="minimal" value="2" >
                                                                                        الإستجابة و الإستخدام غير العادي للتذوق،الشم و اللمس
                                                                                        بدرجة بسيطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r9" class="minimal" value="2.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r9" class="minimal" value="3" >
                                                                                        الإستجابة و الإستخدام غير العادي للتذوق،الشم و اللمس
                                                                                        بدرجة متوسطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r9" class="minimal" value="3.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r9" class="minimal" value="4" >
                                                                                        الإستجابة و الإستخدام غير العادي للتذوق،الشم و اللمس
                                                                                        بدرجة شديدة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        ملاحظات :
                                                                                    </label>
                                                                                    <textarea class="remarquearea" rows="4" style="width:323px" cols="56,5"></textarea>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- general form elements -->

                                                                    <div class="col-md-6">

                                                                        <div class="card card-warning">
                                                                            <div class="card-header">
                                                                                <h3 class="card-title"> الخوف و العصبية</h3>
                                                                            </div>
                                                                            <!-- /.card-header -->
                                                                            <div class="card-body">
                                                                                <!-- radio -->
                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r10" class="minimal" value="1">
                                                                                        الخوف أو العصبية بدرجة عادية.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r10" class="minimal" value="1.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r10" class="minimal" value="2" >
                                                                                        خوف أو عصبية غير عادية من الدرجة البسيطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r10" class="minimal" value="2.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r10" class="minimal" value="3" >
                                                                                        خوف أو عصبية غير عادية من الدرجة المتوسطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r10" class="minimal" value="3.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r10" class="minimal" value="4" >
                                                                                        خوف أو عصبية غير عادية من الدرجة الشديدة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        ملاحظات :
                                                                                    </label>
                                                                                    <textarea class="remarquearea" rows="4" style="width:323px" cols="56,5"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <!-- general form elements -->
                                                                        <div class="card card-danger">
                                                                            <div class="card-header">
                                                                                <h3 class="card-title">التواصل اللفظي</h3>
                                                                            </div>
                                                                            <!-- /.card-header -->
                                                                            <div class="card-body">

                                                                                <!-- radio -->
                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r11" class="minimal" value="1">
                                                                                        تواصل لفظي طبيعي مناسب لعمره الزمني و للمواقف
                                                                                        التي يمر بها.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r11" class="minimal" value="1.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r11" class="minimal" value="2" >
                                                                                        تواصل لفظي غير عادي من الدرجة البسيطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r11" class="minimal" value="2.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r11" class="minimal" value="3" >
                                                                                        تواصل لفظي غير عادي من الدرجة المتوسطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r11" class="minimal" value="3.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r11" class="minimal" value="4" >
                                                                                        تواصل لفظي غير عادي من الدرجة الشديدة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        ملاحظات :
                                                                                    </label>
                                                                                    <textarea class="remarquearea" rows="4" style="width:323px" cols="56,5"></textarea>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- general form elements -->

                                                                    <div class="col-md-6">

                                                                        <div class="card card-success">
                                                                            <div class="card-header">
                                                                                <h3 class="card-title">التواصل غير اللفظي</h3>
                                                                            </div>
                                                                            <!-- /.card-header -->
                                                                            <div class="card-body">

                                                                                <!-- radio -->
                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r12" class="minimal" value="1">
                                                                                        استخدام عادي للتواصل غير اللفظي، مناسب للمواقف
                                                                                        وكذلك العمر الموجود فيه الطفل.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r12" class="minimal" value="1.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r12" class="minimal" value="2" >
                                                                                        استخدام غير عادي للتواصل غير اللفظي بدرجة
                                                                                        بسيطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r12" class="minimal" value="2.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r12" class="minimal" value="3" >
                                                                                        استخدام غير عادي للتواصل غير اللفظي بدرجة
                                                                                        متوسطة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container"> ---
                                                                                        <input type="radio" name="r12" class="minimal" value="3.5">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="container">
                                                                                        <input type="radio" name="r12" class="minimal" value="4" >
                                                                                        استخدام غير عادي للتواصل غير اللفظي بدرجة
                                                                                        شديدة.
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        ملاحظات :
                                                                                    </label>
                                                                                    <textarea class="remarquearea" rows="4" style="width:323px" cols="56,5"></textarea>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-md-6">
                                                                    <!-- general form elements -->
                                                                    <div class="card card-info">
                                                                        <div class="card-header">
                                                                            <h3 class="card-title">مستوى النشاط</h3>
                                                                        </div>
                                                                        <!-- /.card-header -->
                                                                        <div class="card-body">

                                                                            <!-- radio -->
                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r13" class="minimal" value="1">
                                                                                    مستوى النشاط طبيعي بالنسبة للعمر والظروف.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container"> ---
                                                                                    <input type="radio" name="r13" class="minimal" value="1.5">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r13" class="minimal" value="2" >
                                                                                    مستوى النشاط غير عادي من الدرجة البسيطة.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container"> ---
                                                                                    <input type="radio" name="r13" class="minimal" value="2.5">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r13" class="minimal" value="3" >
                                                                                    مستوى النشاط غير عادي من الدرجة المتوسطة.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container"> ---
                                                                                    <input type="radio" name="r13" class="minimal" value="3.5">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r13" class="minimal" value="4" >
                                                                                    مستوى النشاط غير عادي من الدرجة الشديدة.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>
                                                                                    ملاحظات :
                                                                                </label>
                                                                                <textarea class="remarquearea" rows="4" style="width:323px" cols="56,5"></textarea>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- general form elements -->

                                                                <div class="col-md-6">

                                                                    <div class="card card-warning">
                                                                        <div class="card-header">
                                                                            <h3 class="card-title">المستوى و الدرجة الخاصة بالإستجابة العقلية</h3>
                                                                        </div>
                                                                        <!-- /.card-header -->
                                                                        <div class="card-body">
                                                                            <!-- radio -->
                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r14" class="minimal" value="1">
                                                                                    الذكاء طبيعي و القدرات العقلية عادية في مختلف المجالات.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container"> ---
                                                                                    <input type="radio" name="r14" class="minimal" value="1.5">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r14" class="minimal" value="2" >
                                                                                    وظائف عقلية غير عادية من الدرجة البسيطة.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container"> ---
                                                                                    <input type="radio" name="r14" class="minimal" value="2.5">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r14" class="minimal" value="3" >
                                                                                    وظائف عقلية غير عادية من الدرجة المتوسطة.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container"> ---
                                                                                    <input type="radio" name="r14" class="minimal" value="3.5">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r14" class="minimal" value="4" >
                                                                                    وظائف عقلية غير عادية من الدرجة الشديدة.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>
                                                                                    ملاحظات :
                                                                                </label>
                                                                                <textarea class="remarquearea" rows="4" style="width:323px" cols="56,5"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">

                                                                <div class="col-md-6">
                                                                    <!-- general form elements -->
                                                                    <div class="card card-danger">
                                                                        <div class="card-header">
                                                                            <h3 class="card-title">الإنطباع العام</h3>
                                                                        </div>
                                                                        <!-- /.card-header -->
                                                                        <div class="card-body">

                                                                            <!-- radio -->
                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r15" class="minimal" value="1">
                                                                                    طبيعي.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container"> ---
                                                                                    <input type="radio" name="r15" class="minimal" value="1.5">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r15" class="minimal" value="2" >
                                                                                    توحد بسيط.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container"> ---
                                                                                    <input type="radio" name="r15" class="minimal" value="2.5">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r15" class="minimal" value="3" >
                                                                                    توحد متوسط.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container"> ---
                                                                                    <input type="radio" name="r15" class="minimal" value="3.5">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="container">
                                                                                    <input type="radio" name="r15" class="minimal" value="4" >
                                                                                    توحد شديد.
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>
                                                                                    ملاحظات :
                                                                                </label>
                                                                                <textarea class="remarquearea" rows="4" style="width:323px" cols="56,5" name="remarque"></textarea>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- general form elements -->

                                                                <div class="col-md-6">

                                                                    <button type="submit" class="result" value="Submit">المجموع</button>
                                                                    <input type="text" name="points" id="points" disabled />
                                                                    <button type="submit" id="degree" class="saveresult" value="Submit"> حفظ</button>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </section>

                                                    <!-- /.content -->
                                                </form></div>
                                            <div class="modal fade" id="#degree1">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">النتيجة</h4>
                                                            <button type="button" class="exit" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            أعراض بسيطة من إضطراب طيف التوحد
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="#degree2">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">النتيجة</h4>
                                                            <button type="button" class="exit" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            أعراض متوسطة من إضطراف طيف التوحد
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="#degree3">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" >النتيجة</h4>
                                                            <button type="button" class="exit" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            أعراض شديدة من إضطراف طيف التوحد
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="#error">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" >خطأ</h4>
                                                            <button type="button" class="exit" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            يرجى الإجابة على جميع الأسئلة
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="#sein">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" >النتيجة</h4>
                                                            <button type="button" class="exit" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            لا توجد أعراض إضطراب التوحد
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div></div></div>
                        </div>
                    </div>
                    </div></div> </div></section></div>
    <!-- /.content -->


    <!-- ./wrapper -->
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded",()=>{
            const rows=document.querySelectorAll("tr[data-href]");
            rows.forEach(row=>{
                row.addEventListener("click",()=>{
                    window.location.href=row.dataset.href;
                });

            });
        });

        /* $(document).ready(function () {
             $(document.body).on("click","tr[data-href]",function () {
                 window.location.href=this.dataset.href;

             });

         });*/
    </script>

    <script >
        $('#degree').click(function() {
            var points = $('#points').val();
            var b = new Date($('#birthday').val());
            var birthday = b.getFullYear();
            var d = new Date();
            var year = d.getFullYear();
            var age = year-birthday;

            if (age<13){
                if (points > 15 && points <= 29.5 ) {
                    $('#\\#degree1').modal('show');
                    document.getElementById("autismresult").value = "أعراض بسيطة من إضطراب طيف التوحد";
                }
                if (points >=30 && points <= 36.5) {
                    $('#\\#degree2').modal('show');
                    document.getElementById("autismresult").value = "أعراض متوسطة من إضطراب طيف التوحد";
                }
                if (points >= 37) {
                    $('#\\#degree3').modal('show');
                    document.getElementById("autismresult").value = "أعراض شديدة من إضطراب طيف التوحد";
                }
                if (points <15) {
                    $('#\\#error').modal('show');
                }
                if (points ==15) {
                    $('#\\#sein').modal('show');
                    document.getElementById("autismresult").value = "لا توجد أعراض إضطراب التوحد";

                }
            }
            else{
                if(age>=13){
                    if (points > 15 && points <= 27.5 ) {
                        $('#\\#degree1').modal('show');
                        document.getElementById("autismresult").value = "أعراض بسيطة من إضطراب طيف التوحد";

                    }
                    if (points >=28 && points <= 34.5) {
                        $('#\\#degree2').modal('show');
                        document.getElementById("autismresult").value = "أعراض متوسطة من إضطراب طيف التوحد";
                    }
                    if (points >= 35) {
                        $('#\\#degree3').modal('show');
                        document.getElementById("autismresult").value = "أعراض شديدة من إضطراب طيف التوحد";

                    }
                    if (points <15) {
                        $('#\\#error').modal('show');
                    }
                    if (points ==15) {
                        $('#\\#sein').modal('show');
                        document.getElementById("autismresult").value = "لا توجد أعراض إضطراب التوحد";

                    }
                }
            }
        });
    </script>


    <!-- select -->
    <script type="text/javascript">

        $("#birthday").select2({
            placeholder: "اختر ",
            allowClear: false
        });
    </script>

    <script type="text/javascript">

        $("#nameid").select2({
            placeholder: "اختر ",
            allowClear: false
        });
    </script>
    <script type="text/javascript">

        $("#named").select2({
            placeholder: "اختر ",
            allowClear: false
        });
    </script>
    <script type="text/javascript">
        $("#nametrait").select2({
            placeholder: "اختر ",
            allowClear: false
        });
    </script>
    <script type="text/javascript">
        $("#speciale_id").select2({
            placeholder: "اختر ",
            allowClear: false
        });
    </script>


    <!-- jQuery -->


    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
@endsection
