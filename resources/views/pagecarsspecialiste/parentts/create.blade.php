@extends('layouts.specialistes')

@section('title','| حصة معالجة')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">المعلومات</h3>
                    </div>
                    <form role="form">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>اللقب :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>

                                            </div>
                                            <input type="text" class="form-control" name="nom">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>تاريخ الحصة :</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>


                                            </div>
                                            <input type="text" class="form-control" name="dateTraite">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> الطريقة المستعملة:</label>
                                        <select class="form-control" name="methode">
                                            <option methode="TEACCH"> TEACCH</option>
                                            <option methode="ABA"> ABA</option>
                                            <option methode="PECS"> PECS</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            التعليق :
                                        </label>
                                        <textarea class="remarquearea" rows="3,5" cols="58,5" name="commentaire" placeholder="لا يوجد"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            نصائح للوالدين :
                                        </label>
                                        <textarea class="remarquearea" rows="3,5" cols="58,5" name="conseils" placeholder="لا توجد"></textarea>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الإسم :</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>


                                            </div>
                                            <input type="text" class="form-control" name="prenom">

                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label> مدة الحصة :</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-clock-o"></i></span>

                                            </div>
                                            <input type="text" class="form-control" name="duree">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            الوصف :
                                        </label>
                                        <textarea class="remarquearea" rows="13" cols="58" name="description" placeholder="لا يوجد"></textarea>
                                    </div>

                                </div>
                                <!-- /.col (right) -->

                            </div>
                            <!-- /.row -->

                        </div><!-- /.container-fluid -->
                        <div class="card ">
                            <button type="submit" class="btn btn-primary" >حفظ</button>
                        </div>
                    </form></div>


                <!-- ./wrapper -->
            </div>
        </section>
    </div>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
@endsection
