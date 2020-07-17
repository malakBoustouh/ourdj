@extends('layouts.admin')
@section('title',' | عرص المعلومات الشخصي ')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Style -->
    @include('partials._zoom')
    <!-- /.Style -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">

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
                                                    <input type="checkbox" id="zoomCheck">
                                                    <label for="zoomCheck">
                                                    <img src="{{ asset('storage/enfants/'.$enfant->image) }}" class="profile-user-img img-fluid img-circle"/>
                                                    </label>
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
                                                    <b>العمر:</b> <a>{{$calculeAgeEnf}} {{"سنة"}}</a>
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
                                                    <input type="checkbox" id="zoomCheck">
                                                    <label for="zoomCheck">
                                                    <img src="{{ asset('storage/familles/'.$parentt->img) }}" class="profile-parents-img img-fluid img-circle" alt="صورة الأب">
                                                    </label>
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
                                                    <b>العمر:</b> <a>{{$calculeAgePere}} {{"سنة"}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>رقم الهاتف:</b> <a>{{$parentt->numTel}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>مستوى الدراسي :</strong> {{$parentt->niveauEduc}}
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>البريد الإلكتروني :</strong> {{$parentt->email}}
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>عنوان العمل :</strong> {{$parentt->lieuTravail}}
                                                </li>
                                                <li class="list-group-item">
                                                    <strong> كلمة المرور  :</strong> {{$parentt->motpass}}
                                                </li>
                                            </ul>

                                            <div class="text-center">
                                                @if($parentt->img)
                                                    <input type="checkbox" id="zoomCheck">
                                                    <label for="zoomCheck">
                                                    <img src="{{ asset('storage/familles/'.$parent->img) }}" class="profile-parents-img img-fluid img-circle" >
                                                    </label>
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
                                                    <b>العمر:</b> <a>{{$calculeAgeMere}} {{"سنة"}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>رقم الهاتف:</b> <a>{{$parent->numTel}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>المستوى الدراسي :</strong> {{$parent->niveauEduc}}
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>البريد الإلكتروني  :</strong> {{$parent->email}}
                                                </li>
                                                <li class="list-group-item">
                                                    <strong> عنوان العمل :</strong> {{$parent->lieuTravail}}
                                                </li>
                                                <li class="list-group-item">
                                                    <strong> كلمة المرور:</strong> {{$parent->motpass}}
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
                    <div class="col-md-4" >

                        <div class="col-md-12">
                            <div class=" card-primary">
                            <div class="card bg-light mb-3" style="max-width: 18rem;margin-right: 70px;">
                                <div class="card-header">
                                    <div class="well">
                                        <div class="form-group" >
                                            <dl class="dl-horizontal" >
                                                <dt >التاريخ :</dt>
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

                                                {!! Html::linkRoute('admin.enfants.edit', 'تعديل', array($enfant->id_enfant), array('class' => 'btn btn-primary btn-block')) !!}
                                            </div>
                                            <div class="col-sm-6">
                                                {!! Html::linkRoute('admin.enfants.destroy', 'حذف', array($enfant->id_enfant), array('class' => 'btn btn-danger btn-block')) !!}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            {!! Html::linkRoute('admin.enfants.index', 'رجوع>>',[], array('class' => 'btn btn-default btn-block btn-h1-spacing')) !!}
                                        </div>

                                    </div>

                                </div>

                            </div>
                </div>
            </div>
                    </div></div></div></section>


                    <script src="plugins/jquery/jquery.min.js"></script>
                    <!-- jQuery UI 1.11.4 -->
                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
                    <!-- AdminLTE App -->
                    <script src="dist/js/adminlte.js"></script>

    </div>
@endsection
