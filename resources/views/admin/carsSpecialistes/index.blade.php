@extends('layouts.admin')
@section('title','  |المشخصين ')
@section('content')
    <br>
    <br>

    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <p>
                <a href="{{route('admin.carsSpecialistes.create')}}" class="btn btn-primary">اضافة فرد جديد</a>
            </p>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close"
                            data-dismiss="alert" aria-hidden="true">&times;
                    </button>
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="5%">الرقم</th>
                    <th width="10%">الصورة الشمسية</th>
                    <th width = "15%"> اللقب</th>
                    <th  width = "15%">الاسم</th>
                    <th  width = "20%">البريد الالكتروني</th>
                    <th  width = "10%">رقم الهاتف</th>
                    <th width = "30px">الحركة</th>
                </tr>
                @if(count($carsspecialistes))
                    @foreach($carsspecialistes as $c)
                        <tr>
                            <td>{{ $c->id_carsspecialiste}}</td>
                            <td><img src="{{ asset('storage/specialistes/'.$c->image) }}"  style="border-radius: 8px; display: block;
                                     margin-left: auto;
                                     margin-right: auto;  border: 2px solid #ddd;
                                     " width="50"  />

                            <td>{{ $c->nom}}</td>
                            <td>{{ $c->prenom}}</td>
                            <td>{{ $c->email}}</td>
                            <td>{{ $c->numTel}}</td>
                            <td>
                                <form action="{{route('admin.carsSpecialistes.destroy',$c->id_carsspecialiste)}}" method="post">


                                    <a href="{{route('admin.carsSpecialistes.show',$c->id_carsspecialiste)}}" class="btn  btn-success">عرض</a>

                                    <a href="{{route('admin.carsSpecialistes.edit',$c->id_carsspecialiste)}}" class="btn btn-info">تعديل</a>

                                    @method('DELETE')
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <button href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">مسح</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="7">لا يوجد مشخص</td></tr>
                @endif
            </table>
        </div>
    </section>
@endsection
