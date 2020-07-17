@extends('layouts.specialistes')
@section('title','|تعديل بيانات الطفل')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">تعديل بيانات الطفل</h1>
                </div><!-- /.col -->

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <form  method="post" action="{{route('pagecarsspecialiste.parentts.update',$parentt->id_parentt)}}" enctype="multipart/form-data" >
            @method('PUT')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">بيانات الطفل</h3>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    @foreach($enfants as $c)
                                        @if($c->id_enfant == $parentt->enfant_id)
                                            <div class="form-group">
                                                @if($c->image)
                                                    <img id="img" src="{{ asset('storage/enfants/'.$c->image) }}" height=100 width=100><br>
                                                    <input id="takephoto" type="button" value="تغيير الصورة" onclick="document.getElementById('child').click();" />
                                                    <input type="file"  style="display:none;" id="child" name="imageChild" />
                                                @endif
                                            </div>


                                            <div class="form-group">
                                                <label>اللقب :</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-child "></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="prenom" value="{{$c->prenom}}" >

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>الإسم :</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-child "></i></span>


                                                    </div>
                                                    <input type="text" class="form-control" name="nom" value="{{$c->nom}}">

                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label> الجنس :</label>


                                                <select class="form-control" name="sexe" >
                                                    <option selected>{{$c->sexe}}</option>
                                                    @if($c->sexe=="أنثى")
                                                        <option sexe=" ذكر"> ذكر</option>
                                                    @else
                                                        <option sexe="أنثى"> أنثى</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>  تاریخ الميلاد :</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control ltr" name="dateNaissance" value="{{$c->dateNaissance}}" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <div class="form-group">
                                                <label>مكان الميلاد :</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-map-marker"></i>
                                                    </span>


                                                    </div>
                                                    <input type="text" class="form-control" name="lieuNaissannce" value="{{$c->lieuNaissannce}}" >

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> زمرة الدم :</label>
                                                <select class="form-control" name="groupage" value="{{$c->groupage}}">
                                                    <option  selected>{{$c->groupage}}</option>

                                                    @if($c->groupage=="+A")
                                                        <option groupage="-A"> -A</option>
                                                        <option groupage="+B"> +B</option>
                                                        <option groupage="-B"> -B</option>
                                                        <option groupage="+AB"> +AB</option>
                                                        <option groupage="-AB"> -AB</option>
                                                        <option groupage="+O"> +O</option>
                                                        <option groupage="-O"> -O</option>
                                                    @elseif($c->groupage=="+B")
                                                        <option groupage="+A"> +A</option>
                                                        <option groupage="-A"> -A</option>
                                                        <option groupage="-B"> -B</option>
                                                        <option groupage="+AB"> +AB</option>
                                                        <option groupage="-AB"> -AB</option>
                                                        <option groupage="+O"> +O</option>
                                                        <option groupage="-O"> -O</option>
                                                    @elseif($c->groupage=="+AB")
                                                        <option groupage="-A"> -A</option>
                                                        <option groupage="+B"> +B</option>
                                                        <option groupage="-B"> -B</option>
                                                        <option groupage="+A"> +A</option>
                                                        <option groupage="-AB"> -AB</option>
                                                        <option groupage="+O"> +O</option>
                                                        <option groupage="-O"> -O</option>
                                                    @elseif($c->groupage=="+O")
                                                        <option groupage="-A"> -A</option>
                                                        <option groupage="+B"> +B</option>
                                                        <option groupage="-B"> -B</option>
                                                        <option groupage="+AB"> +AB</option>
                                                        <option groupage="-AB"> -AB</option>
                                                        <option groupage="+A"> +A</option>
                                                        <option groupage="-O"> -O</option>
                                                    @elseif($c->groupage=="-A")
                                                        <option groupage="+A"> +A</option>
                                                        <option groupage="+B"> +B</option>
                                                        <option groupage="-B"> -B</option>
                                                        <option groupage="+AB"> +AB</option>
                                                        <option groupage="-AB"> -AB</option>
                                                        <option groupage="+O"> +O</option>
                                                        <option groupage="-O"> -O</option>
                                                    @elseif($c->groupage=="-B")
                                                        <option groupage="-A"> -A</option>
                                                        <option groupage="+B"> +B</option>
                                                        <option groupage="+A"> +A</option>
                                                        <option groupage="+AB"> +AB</option>
                                                        <option groupage="-AB"> -AB</option>
                                                        <option groupage="+O"> +O</option>
                                                        <option groupage="-O"> -O</option>
                                                    @elseif($c->groupage=="-AB")
                                                        <option groupage="-A"> -A</option>
                                                        <option groupage="+B"> +B</option>
                                                        <option groupage="-B"> -B</option>
                                                        <option groupage="+AB"> +AB</option>
                                                        <option groupage="+A"> +A</option>
                                                        <option groupage="+O"> +O</option>
                                                        <option groupage="-O"> -O</option>
                                                    @elseif($c->groupage=="-O")
                                                        <option groupage="-A"> -A</option>
                                                        <option groupage="+B"> +B</option>
                                                        <option groupage="-B"> -B</option>
                                                        <option groupage="+AB"> +AB</option>
                                                        <option groupage="-AB"> -AB</option>
                                                        <option groupage="+O"> +O</option>
                                                        <option groupage="+A"> +A</option>
                                                    @endif

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>الولاية  :</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-map-marker"></i></span>


                                                    </div>
                                                    <input type="text" class="form-control" name="wilaya" value="{{$c->wilaya}}">

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>البلدية  :</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-map-marker"></i></span>


                                                    </div>
                                                    <input type="text" class="form-control" name="commune" value="{{$c->commune}}">

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>العنوان  :</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-map-marker"></i></span>


                                                    </div>
                                                    <input type="text" class="form-control" name="domicile" value="{{$c->domicile}}">

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                            </div>
                            <!-- /.col (right) -->
                        </div>
                        <!-- /.row -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">بيانات الأولياء</h3>
                                </div>


                                <!-- /.card-header -->
                                <div class="card-body">

                                    @if($parentt->image)
                                        <img id="father" src="{{ asset('storage/familles/'.$parentt->image) }}" height=100 width=100><br>
                                        <input id="fatherpic" type="button" value=  " صورة الأب" onclick="document.getElementById('fa').click();" />
                                        <input type="file" style="display:none;" id="fa" name="imageFather"/>
                                    @endif
                                    @if($parentt->image)
                                        <img id="mother" src="{{ asset('storage/familles/'.$parentt->image) }}" height=100 width=100><br>
                                        <input id="motherpic" type="button" value=  " صورة الأم" onclick="document.getElementById('ma').click();" />
                                        <input type="file" style="display:none;" id="ma" name="imageMother"/>
                                    @endif
                                    <div class="form-group">
                                        <label>إسم الأب :</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>


                                            </div>
                                            <input type="text" class="form-control"  name="prenomParentpere" value="{{$parentt->prenom}}">

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>المستوى الدراسي :</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-graduation-cap"></i></span>

                                                    </div>
                                                    <input type="text" class="form-control"  name="niveauEducpere" value="{{$parentt->niveauEduc}}">

                                                </div>
                                            </div>

                                            <div class="form-group">

                                                <label>رقم الهاتف :</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>


                                                    </div>
                                                    <input type="text" class="form-control"   name="numTelpere" value="{{$parentt->numTel}}">

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>البريد الإلكتروني :</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control"  name="emailpere" value="{{$parentt->email}}">

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>إسم الأم :</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="prenomParent"  value="{{$parentt->prenom}}">

                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label>المستوى الدراسي :</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-graduation-cap"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"  name="niveauEduc" value="{{$parentt->niveauEduc}}">

                                                </div>
                                            </div>

                                            <div class="form-group">

                                                <label>رقم الهاتف :</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"  name="numTel" value="{{$parentt->numTel}}">

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>البريد الإلكتروني :</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>

                                                    </div>
                                                    <input type="email" class="form-control" name="email"  value="{{$parentt->email}}">

                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>  تاریخ الميلاد :</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control ltr"  name="dateNaissanceParentpere" value="{{$parentt->dateNaissance}}" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>عنوان العمل :</label>

                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-map-marker"></i></span>

                                                        </div>
                                                        <input type="text" class="form-control"  name="lieuTravailParentpere" value="{{$parentt->lieuTravail}}">

                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label> كلمة المرور :</label>

                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="motpasspere" value="{{$parentt->motpass}}" >

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>اللقب :</label>

                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control"  name="nomParent" value="{{$parentt->nom}}">

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>  تاریخ الميلاد :</label>

                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input type="date" class="form-control ltr"  name="dateNaissanceParent" value="{{$parentt->dateNaissance}}" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>عنوان العمل :</label>

                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control"  name="lieuTravailParent" value="{{$parentt->lieuTravail}}">

                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label> كلمة المرور :</label>

                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-lock"></i></span>


                                                            </div>
                                                            <input type="text" class="form-control"  name="motpass" value="{{$parentt->motpass}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card card-default">
                                                <button type="submit" class="btn btn-success btn-block"  >حفظ</button>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            {!! Html::linkRoute('pagecarsspecialiste.parentts.index', 'الغاء', array($parentt->id_parentt), array('class' => 'btn btn-danger btn-block')) !!}
                                        </div>
                                    </div>

                                </div>


                            </div></div></div>

                </div></section>



            <!-- /.content -->



            <!-- ./wrapper -->
            <script>
                window.addEventListener('load', function() {
                    document.querySelector('#child').addEventListener('change', function() {
                        if (this.files && this.files[0]) {
                            var img = document.querySelector('#img');
                            img.src = URL.createObjectURL(this.files[0]);
                            img.onload = imageIsLoaded;
                        }
                    });
                });
                window.addEventListener('load', function() {
                    document.querySelector('#ma').addEventListener('change', function() {
                        if (this.files && this.files[0]) {
                            var img = document.querySelector('#mother');
                            img.src = URL.createObjectURL(this.files[0]);
                            img.onload = imageIsLoaded;
                        }
                    });
                });
                window.addEventListener('load', function() {
                    document.querySelector('#fa').addEventListener('change', function() {
                        if (this.files && this.files[0]) {
                            var img = document.querySelector('#father');
                            img.src = URL.createObjectURL(this.files[0]);
                            img.onload = imageIsLoaded;
                        }
                    });
                });
            </script>
        </form></div>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

@endsection



