@extends('layouts.specialistes')

@section('title','| تشخيص')

@section('content')

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>تشخيص</title>
        <script src="{{ asset('http://code.jquery.com/jquery-latest.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".minimal").click(function(event) {
                    var total = 0;
                    $(".minimal:checked").each(function() {
                        total += parseFloat($(this).val());
                    });

                    if (total == 0) {
                        $('#points').val('');
                    } else {
                        $('#points').val(total);
                    }
                });
            });
        </script>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css')}}">
        <!-- Ionicons -->
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-rtl.min.css')}}">
        <!-- template rtl version -->
        <link rel="stylesheet" href="{{ asset('dist/css/custom-style.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css')}}">
        <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js')}}"></script>
        <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js')}}"></script>
        <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js')}}"></script>
        <link href="{{ asset('https://fonts.googleapis.com/css2?family=Tajawal&display=swap')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css')}}">
        <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js')}}"></script>
    </head>



    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <form method="post" action="{{route('pagecarsspecialiste.diagnostics.store')}}" enctype="multipart/form-data">


        <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- left column -->
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">البيانات</h3>
                        </div>

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
                                        <label>اللقب و الإسم:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-child"></i></span>
                                            </div>

                                            <select   class="form-control" style="width: 463px" id="named" name="enfant_id" >
                                                <option ></option>
                                                @foreach($enfants as $enfant)
                                                    <option  value="{{$enfant->id_enfant}}">{{$enfant->prenom}} {{$enfant->nom}}</option>
                                                    <option id="birthday" value="{{$enfant->dateNaissance}}" hidden ></option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label> المشرفة  :</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>

                                            <select   style="width: 460px" id="nametrait" name="trait" >
                                                <option ></option>
                                                @foreach($carsspecialistes as $trait)
                                                    <option value="{{$trait->id_carsspecialiste}}" >{{$trait->nom}} {{$trait->prenom}}</option>
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
                                            <input type="date" class="form-control" id="date" name="date" readonly value="{{$dateActuelle}}">

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
                                    <h3 class="card-title" >العلاقات مع الآخرين</h3>
                                    <input type="text" name="quest1" value="العلاقات مع الآخرين" hidden>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <!-- radio -->
                                    <div class="form-group">
                                        <label class="container">
                                            <input type="radio" name="r1"  class="minimal" value="1">
                                            <input type="radio"  class="minimal" value="لا يوجد أي دلالة أو صعوبة في التعامل مع الآخرين." name="لا يوجد أي دلالة أو صعوبة في التعامل مع الآخرين." hidden>
                                            <span class="input-label" >لا يوجد أي دلالة أو صعوبة في التعامل مع الآخرين.</span>
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
                                            <input type="radio" class="minimal" value="علاقات غير عادية بدرجة بسيطة." name="علاقات غير عادية بدرجة بسيطة." hidden>
                                            <span class="input-label">علاقات غير عادية بدرجة بسيطة.</span>
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
                                            <input type="radio" name="r1"  class="minimal" value="3" >
                                            <input type="radio"   class="minimal" value="علاقات غير عادية بدرجة متوسطة." name="علاقات غير عادية بدرجة متوسطة." hidden >
                                            <span class="input-label"  >علاقات غير عادية بدرجة متوسطة.</span>
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
                                            <span class="input-label" > علاقات غير عادية بدرجة شديدة.</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            ملاحظات :
                                        </label>
                                        <textarea class="remarquearea" name="remarque1" rows="4" cols="56,5"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title" name="quest2"> التقليد</h3>
                                    <input type="text" name="quest2" value="التقليد" hidden>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <!-- radio -->
                                    <div class="form-group">
                                        <label class="container">
                                            <input type="radio" name="r2" class="minimal" value="1">
                                            <span class="input-label" >  التقليد المناسب.</span>
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
                                            <span class="input-label" > التقليد غير العادي من الدرجة البسيطة.</span>
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
                                            <span class="input-label" >التقليد غير العادي من الدرجة المتوسطة.</span>
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
                                            <span class="input-label" >التقليد غير العادي من الدرجة الشديدة. </span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            ملاحظات :
                                        </label>
                                        <textarea class="remarquearea" name="remarque2" rows="4" cols="56,5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-md-6">
                                <!-- general form elements -->
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title" name="quest3">الإستجابة الإنفعالية</h3>
                                        <input type="text" name="quest3" value="الإستجابة الإنفعالية" hidden>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <!-- radio -->
                                        <div class="form-group">
                                            <label class="container">
                                                <input type="radio" name="r3" class="minimal" value="1">
                                                <span class="input-label"> إستجابات إنفعالية مناسبة للمواقف و العمر.</span>
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
                                                <span class="input-label" >  إستجابات إنفعالية غير عادية من الدرجة البسيطة.</span>
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
                                                <span class="input-label" >إستجابات إنفعالية غير عادية من الدرجة المتوسطة.</span>
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
                                                <span class="input-label" >إستجابات إنفعالية غير عادية من الدرجة الشديدة.</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                ملاحظات :
                                            </label>
                                            <textarea class="remarquearea" name="remarque3" rows="4" cols="56,5"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- general form elements -->

                            <div class="col-md-6">

                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title" name="quest4">إستخدام الجسم</h3>
                                        <input type="text" name="quest4" value="إستخدام الجسم" hidden>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <!-- radio -->
                                        <div class="form-group">
                                            <label class="container">
                                                <input type="radio" name="r4" class="minimal" value="1">
                                                <span class="input-label">  إستخدام الجسم بشكل مناسب لعمر الطفل.</span>
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
                                                <span class="input-label" > إستخدام غير عادي للجسم من الدرجة البسيطة.</span>
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
                                                <span class="input-label" >  إستخدام غير عادي للجسم من الدرجة المتوسطة.</span>
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
                                                <span class="input-label" > إستخدام غير عادي للجسم من الدرجة الشديدة.</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                ملاحظات :
                                            </label>
                                            <textarea class="remarquearea" name="remarque4" rows="4" cols="56,5"></textarea>
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
                                        <h3 class="card-title" name="quest5">إستخدام الأشياء</h3>
                                        <input type="text" name="quest5" value="إستخدام الأشياء" hidden>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <!-- radio -->
                                        <div class="form-group">
                                            <label class="container">
                                                <input type="radio" name="r5" class="minimal" value="1">
                                                <span class="input-label"  > الإستخدام المناسب و الإستمتاع بالألعاب و الأشياء الأخرى.</span>
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
                                                <span class="input-label">الإستخدام و الإستمتاع غير المناسب في الألعاب والأشياء الأخرى من الدرجة البسيطة. </span>
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
                                                <span class="input-label" > الإستخدام و الإستمتاع غير المناسب في الألعاب والأشياء الأخرى من الدرجة المتوسطة.</span>
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
                                                <span class="input-label"> الإستخدام و الإستمتاع غير المناسب في الألعاب والأشياء الأخرى من الدرجة الشديدة.</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                ملاحظات :
                                            </label>
                                            <textarea class="remarquearea" name="remarque5" rows="4" cols="56,5"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- general form elements -->

                            <div class="col-md-6">

                                <div class="card card-warning">
                                    <div class="card-header">
                                        <h3 class="card-title" name="quest6"> التكيف للتغير</h3>
                                        <input type="text" name="quest6" value=" التكيف للتغير" hidden>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- radio -->
                                        <div class="form-group">
                                            <label class="container">
                                                <input type="radio" name="r6" class="minimal" value="1">
                                                <span class="input-label" >  الإستجابة للتغير مناسبة لعمر الطفل.</span>
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
                                                <span class="input-label" > تكيف غير مناسب بدرجة بسيطة للتغيير.</span>
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
                                                <span class="input-label" >   تكيف غير مناسب بدرجة متوسطة للتغيير.</span>
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
                                                <span class="input-label" > تكيف غير مناسب بدرجة شديدة للتغيير.</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                ملاحظات :
                                            </label>
                                            <textarea class="remarquearea" name="remarque6" rows="4" cols="56,5"></textarea>
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
                                        <h3 class="card-title" name="quest7">الإستجابة البصرية</h3>
                                        <input type="text" name="quest7" value=" الإستجابة البصرية" hidden>

                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <!-- radio -->
                                        <div class="form-group">
                                            <label class="container">
                                                <input type="radio" name="r7" class="minimal" value="1">
                                                <span class="input-label">إستجابة بصرية مناسبة للعمر. </span>
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
                                                <span class="input-label" > إستجابة بصرية غير عادية من الدرجة البسيطة.</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label class="container"> ---
                                                <input type="radio" name="r7" class="minimal" value="2.5">
                                                <span class="checkmark" ></span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label class="container">
                                                <input type="radio" name="r7" class="minimal" value="3" >
                                                <span class="input-label" >   إستجابة بصرية غير عادية من الدرجة المتوسطة.</span>
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
                                                <span class="input-label"> إستجابة بصرية غير عادية من الدرجة الشديدة.</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                ملاحظات :
                                            </label>
                                            <textarea class="remarquearea" name="remarque7" rows="4" cols="56,5"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- general form elements -->

                            <div class="col-md-6">

                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title" name="quest8">الإستجابة السمعية</h3>
                                        <input type="text" name="quest8" value="الإستجابة السمعية" hidden>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <!-- radio -->
                                        <div class="form-group">
                                            <label class="container">
                                                <input type="radio" name="r8" class="minimal" value="1">
                                                <span class="input-label" >  إستجابة سمعية مناسبة لعمر الطفل.</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label class="container">
                                                <input type="radio" name="r8" class="minimal" value="1.5">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label class="container">
                                                <input type="radio" name="r8" class="minimal" value="2" >
                                                <span class="input-label" > إستجابة سمعية غير عادية من الدرجة البسيطة.</span>
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
                                                <span class="input-label" > إستجابة سمعية غير عادية من الدرجة المتوسطة.</span>
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
                                                <span class="input-label" >   إستجابة سمعية غير عادية من الدرجة الشديدة.</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                ملاحظات :
                                            </label>
                                            <textarea class="remarquearea" name="remarque8" rows="4" cols="56,5"></textarea>
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
                                        <h3 class="card-title" name="quest9">إستجابات اللمس،الشم،التذوق و استخدامها</h3>
                                        <input type="text" name="quest9" value="إستجابات اللمس،الشم،التذوق و استخدامها" hidden>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <!-- radio -->
                                        <div class="form-group">
                                            <label class="container">
                                                <input type="radio" name="r9" class="minimal" value="1">
                                                <span class="input-label" >  الإستجابة و الإستخدام الطبيعي للتذوق،الشم و اللمس.</span>
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
                                                <span class="input-label" >الإستجابة و الإستخدام غير العادي للتذوق،الشم و اللمس بدرجة بسيطة.</span>
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
                                                <span class="input-label" > الإستجابة و الإستخدام غير العادي للتذوق،الشم و اللمس بدرجة متوسطة.</span>
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

                                                <span class="input-label" > الإستجابة و الإستخدام غير العادي للتذوق،الشم و اللمس بدرجة شديدة. </span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                ملاحظات :
                                            </label>
                                            <textarea class="remarquearea" name="remarque9" rows="4" cols="56,5"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- general form elements -->

                            <div class="col-md-6">

                                <div class="card card-warning">
                                    <div class="card-header">
                                        <h3 class="card-title" name="quest10"> الخوف و العصبية</h3>
                                        <input type="text" name="quest10" value=" الخوف و العصبية" hidden>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- radio -->
                                        <div class="form-group">
                                            <label class="container">
                                                <input type="radio" name="r10" class="minimal" value="1">
                                                <span class="input-label" > الخوف أو العصبية بدرجة عادية.</span>
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
                                                <span class="input-label" >  خوف أو عصبية غير عادية من الدرجة البسيطة.</span>
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
                                                <span class="input-label" >   خوف أو عصبية غير عادية من الدرجة المتوسطة. </span>
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
                                                <span class="input-label" > خوف أو عصبية غير عادية من الدرجة الشديدة.</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                ملاحظات :
                                            </label>
                                            <textarea class="remarquearea" name="remarque10" rows="4" cols="56,5"></textarea>
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
                                        <h3 class="card-title" name="quest11">التواصل اللفظي</h3>
                                        <input type="text" name="quest11" value="التواصل اللفظي" hidden>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <!-- radio -->
                                        <div class="form-group">
                                            <label class="container">
                                                <input type="radio" name="r11" class="minimal" value="1">
                                                <span class="input-label" >تواصل لفظي طبيعي مناسب لعمره الزمني و للمواقف التي يمر بها.</span>
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
                                                <span class="input-label" > تواصل لفظي غير عادي من الدرجة البسيطة.</span>
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
                                                <span class="input-label" >   تواصل لفظي غير عادي من الدرجة المتوسطة.</span>
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
                                                <span class="input-label" > تواصل لفظي غير عادي من الدرجة الشديدة.</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                ملاحظات :
                                            </label>
                                            <textarea class="remarquearea" name="remarque11" rows="4" cols="56,5"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- general form elements -->

                            <div class="col-md-6">

                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title" name="quest12">التواصل غير اللفظي</h3>
                                        <input type="text" name="quest12" value="التواصل غير اللفظي" hidden>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <!-- radio -->
                                        <div class="form-group">
                                            <label class="container">
                                                <input type="radio" name="r12" class="minimal" value="1">

                                                <span class="input-label" >   استخدام عادي للتواصل غير اللفظي، مناسب للمواقف وكذلك العمر الموجود فيه الطفل.</span>
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
                                                <span class="input-label" >   استخدام غير عادي للتواصل غير اللفظي بدرجة بسيطة.</span>
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
                                                <span class="input-label" > استخدام غير عادي للتواصل غير اللفظي بدرجة متوسطة.  </span>
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
                                                <span class="input-label" >  استخدام غير عادي للتواصل غير اللفظي بدرجة شديدة.</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                ملاحظات :
                                            </label>
                                            <textarea class="remarquearea" name="remarque12" rows="4" cols="56,5"></textarea>
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
                                    <h3 class="card-title" name="quest13">مستوى النشاط</h3>
                                    <input type="text" name="quest13" value="مستوى النشاط" hidden>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <!-- radio -->
                                    <div class="form-group">
                                        <label class="container">
                                            <input type="radio" name="r13" class="minimal" value="1">
                                            <span class="input-label" >   مستوى النشاط طبيعي بالنسبة للعمر والظروف.</span>
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
                                            <span class="input-label" > مستوى النشاط غير عادي من الدرجة البسيطة.</span>
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
                                            <span class="input-label" > مستوى النشاط غير عادي من الدرجة المتوسطة.</span>
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
                                            <span class="input-label" >   مستوى النشاط غير عادي من الدرجة الشديدة.</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            ملاحظات :
                                        </label>
                                        <textarea class="remarquearea" name="remarque13" rows="4" cols="56,5"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- general form elements -->

                        <div class="col-md-6">

                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title" name="quest14">المستوى و الدرجة الخاصة بالإستجابة العقلية</h3>
                                    <input type="text" name="quest14" value="المستوى و الدرجة الخاصة بالإستجابة العقلية" hidden>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- radio -->
                                    <div class="form-group">
                                        <label class="container">
                                            <input type="radio" name="r14" class="minimal" value="1">
                                            <span class="input-label"> الذكاء طبيعي و القدرات العقلية عادية في مختلف المجالات.</span>
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
                                            <span class="input-label" >  وظائف عقلية غير عادية من الدرجة البسيطة.</span>
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
                                            <span class="input-label">  وظائف عقلية غير عادية من الدرجة المتوسطة.</span>
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
                                            <span class="input-label"> وظائف عقلية غير عادية من الدرجة الشديدة.</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            ملاحظات :
                                        </label>
                                        <textarea class="remarquearea" name="remarque14" rows="4" cols="56,5"></textarea>
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
                                    <h3 class="card-title" name="quest15">الإنطباع العام</h3>
                                    <input type="text" name="quest15" value="الإنطباع العام" hidden>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <!-- radio -->
                                    <div class="form-group">
                                        <label class="container">
                                            <input type="radio" name="r15" class="minimal" value="1">
                                            <span class="input-label" >طبيعي.</span>
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
                                            <span class="input-label" >  توحد بسيط.</span>

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
                                            <span class="input-label" >   توحد متوسط.</span>
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
                                            <span class="input-label" >   توحد شديد.</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            ملاحظات :
                                        </label>
                                        <textarea class="remarquearea" rows="4" cols="56,5" name="remarque15"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- general form elements -->

                        <div class="col-md-6">

                            <button type="submit" class="result" value="Submit">المجموع</button>
                            <input type="text" name="points" id="points" disabled />


                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                {{ csrf_field() }}



                                <button type="submit" id="degree" class="saveresult" value="form"> حفظ</button>






                        </div>
                    </div>
                </div>

            </section>

            <!-- /.content -->
        </form>
        <button type="submit" id="degree" value="Submit" >عرض النتيجة</button>


    </div>



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
                    أعراض متوسطة من إضطراب طيف التوحد
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
                    أعراض شديدة من إضطراب طيف التوحد
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


    <script>

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
            allowClear: true
        });
    </script>

    <script type="text/javascript">

        $("#nameid").select2({
            placeholder: "اختر ",
            allowClear: true
        });
    </script>
    <script type="text/javascript">

        $("#named").select2({
            placeholder: "اختر ",
            allowClear: true
        });
    </script>
    <script type="text/javascript">
        $("#nametrait").select2({
            placeholder: "اختر ",
            allowClear: true
        });
    </script>


    <!-- select-->
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js')}}"></script>


@endsection
