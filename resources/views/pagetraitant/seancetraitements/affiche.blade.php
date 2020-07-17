@extends('layouts.traitants')

@section('title','| ملف الشخصي')

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


                <form >
                    <!-- /.card-header -->

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

                                                <h3 class="profile-username text-center childname">{{$enfant->prenom}} {{$enfant->nom}}</h3>
                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>الجنس:</b> <a>{{ $enfant->sexe}}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>العمر:</b> <a>{{ $age}} {{"سنة"}}</a>
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
                                                            <b>الأب:</b> <a>{{$parentt->prenomp}} {{$parentt->nomp}}</a>
                                                        @endif
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>رقم الهاتف:</b> <a>{{$parentt->numTel}}</a>
                                                    </li>
                                                </ul>

                                                <div class="text-center">
                                                    @if($parentt->img)
                                                        <img src="{{ asset('storage/familles/'.$parentt->img) }}" class="profile-parents-img img-fluid img-circle" >
                                                    @else
                                                        <img  class="profile-parents-img img-fluid img-circle"
                                                              src="{{asset('dist/img/mom.jpg')}}"
                                                              alt="صورةالأم">
                                                    @endif
                                                </div>
                                                <p></p>
                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>الأم:</b> <a>{{$parentt->prenomp}} {{$parentt->nomp}}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>رقم الهاتف:</b> <a>{{$parentt->numTel}}</a>
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
                        <div class="col-md-9">
                            <div class="card">

                                <div class="card-header p-2">


                                    <div class="card-body">

                                    </div><!-- /.card-header -->
                                    <div class="card card-primary">

                                        <h3 class="card-title">المعلومات</h3>
                                    </div>
                                    <div class="card">
                                        <div class="tab-content">
                                            <div class="row">
                                                <div class="col-md-4" >
                                                    <div class="form-group" >
                                                        <i class="fa fa-child"></i><label> الإسم الكامل :</label>{{$enfant->nom}} {{$enfant->prenom}}
                                                    </div>
                                                    <div class="form-group">

                                                        <i class="fa fa-calendar"></i><label>تاريخ الميلاد  :</label>{{$enfant->dateNaissance}}

                                                    </div>
                                                    <div class="form-group">

                                                        <i class="fa fa-intersex" style="font-size:20px"></i><label>  الجنس :</label>{{$enfant->sexe}}

                                                    </div>
                                                    <div class="form-group">

                                                        <i class="fa fa-calendar"></i>  <label> تاريخ تطبيق المقياس  :</label>{{$diagnostic->date}}

                                                    </div>
                                                    <div class="form-group">
                                                        <i class="fa fa-user-md" style="font-size:24px"></i>  <label> المشرفة  :</label>
                                                        @foreach($specialistes as $t   )
                                                            @if($diagnostic->specialiste_id==$t->id_specialiste)
                                                                <td value="{{$t->id_specialiste}}">{{'الدكتور(ة)'}} {{ $t->prenom}} {{ $t->nom}}  </td>
                                                            @endif
                                                        @endforeach
                                                    </div>

                                                    <div class="form-group">

                                                        <i class="fa fa-commenting-o" ></i> <label > النتيجة  :</label>{{$diagnostic->niveau}}


                                                    </div>
                                                </div>
                                                <div class="col-md-8">

                                                    <div class="card bg-light mb-3" style="max-width: 14rem;margin-right: 300px;">

                                                        <div class="card-header">

                                                            <div class="well">
                                                                <div class="form-group" >
                                                                    <dl class="dl-horizontal" >
                                                                        <dt >بتاريخ :</dt>
                                                                        <dd>{{ date('M j, Y h:ia', strtotime($diagnostic->created_at)) }}</dd>
                                                                    </dl>
                                                                </div>

                                                                <dl class="dl-horizontal" >
                                                                    <dt>اخر تعديل:</dt>
                                                                    <dd >{{ date('M j, Y h:ia', strtotime($diagnostic->updated_at)) }}</dd>
                                                                </dl>
                                                                <hr>
                                                                <div class="row">

                                                                    <div class="col-sm-6">
                                                                        {!! Html::linkRoute('pagetraitant.show2', 'رجوع>>',array($enfant->id_enfant), array('class' => 'btn btn-default btn-block btn-h1-spacing')) !!}

                                                                    </div>
                                                                </div>
                                                                <br>


                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>   </div>

                                        </div></div>                                        </div>
                            </div></div>
                    </div>




                </form></div></section></div>




    <!-- /.col (right) -->




    <!-- /.row -->







    <!-- select -->

    <!-- select-->
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.js')}}"></script>



@endsection
