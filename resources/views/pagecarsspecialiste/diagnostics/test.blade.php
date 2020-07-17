<form method="post" action="{{route('pagecarsspecialiste.diagnostics.store')}}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- left column -->
            <!-- general form elements -->


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
                            <label> الإسم :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-child"></i></span>
                                </div>

                                <select   class="form-control" style="width: 319px" id="named" name="enfant_id" >
                                    <option ></option>
                                    <option  value="{{$enfant->id_enfant}}" selected readonly>{{$enfant->nom}}</option>
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

                                <select   style="width:314px" id="speciale_id" name="trait_id" >
                                    <option ></option>
                                    @foreach($carsspecialistes as $speciale)
                                        <option  value="{{$speciale->id_carsspecialiste}}">{{$speciale->nom}} {{$speciale->prenom}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">

                            <label> اللقب  :</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-child"></i></span>
                                </div>
                                <select   style="width: 319px" id="nameid" name="enf_id" >
                                    <option></option>

                                    <option value="{{$enfant->id_enfant}}" selected readonly>{{$enfant->prenom}}</option>

                                </select>

                            </div>
                        </div>
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
                            <textarea class="remarquearea" style="width:323px" rows="4" cols="56,5"></textarea>
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
                                <textarea class="remarquearea" style="width:323px" rows="4" cols="56,5"></textarea>
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
                                <textarea class="remarquearea" style="width:323px" rows="4" cols="56,5"></textarea>
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
                                <textarea class="remarquearea" style="width:323px" rows="4" cols="56,5"></textarea>
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
                                <textarea class="remarquearea" style="width:323px" rows="4" cols="56,5"></textarea>
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
                                <textarea class="remarquearea" style="width:323px" rows="4" cols="56,5"></textarea>
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
                                <textarea class="remarquearea" style="width:323px" rows="4" cols="56,5"></textarea>
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
                                <textarea class="remarquearea" style="width:323px" rows="4" cols="56,5"></textarea>
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
                                <textarea class="remarquearea" style="width:323px" rows="4" cols="56,5"></textarea>
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
                                <textarea class="remarquearea" style="width:323px" rows="4" cols="56,5"></textarea>
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
                                <textarea class="remarquearea" style="width:323px" rows="4" cols="56,5"></textarea>
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
                            <textarea class="remarquearea" style="width:323px" rows="4" cols="56,5"></textarea>
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
                            <textarea class="remarquearea" style="width:323px" rows="4" cols="56,5"></textarea>
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
                            <textarea class="remarquearea" style="width:323px" rows="4" cols="56,5" name="remarque"></textarea>
                        </div>

                    </div>
                </div>
            </div>
            <!-- general form elements -->

            <div class="col-md-6"  >

                <button type="submit" class="result" value="Submit">المجموع</button>
                <input type="text" name="points" id="points" disabled />
                <button type="submit" id="degree" class="saveresult" value="Submit"> حفظ</button>

            </div>
        </div>




        <!-- /.content -->


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









    </section></form>
