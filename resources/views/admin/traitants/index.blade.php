@extends('layouts.admin')
@section('title','  |المعالجين')
@section('content')
<br>
<br>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">

            <p>

                <a href="{{route('admin.traitants.create')}}" class="btn btn-primary">اضافة فرد جديد</a>

            </p>

        @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="10%">الصورة الشمسية</th>
                    <th width = "35px"> اللقب</th>
                    <th  width = "35px">الاسم</th>
                    <th  width = "35px">البريد الالكتروني</th>
                    <th width = "30px">الحركة</th>
                </tr>
                @if(count($traitants))
                @foreach($traitants as $c)
                    <tr>
                        <td><img src="{{ asset('storage/traitants/'.$c->image) }}" class="img-thumbnail"  width="50"  />
                        <td>{{ $c->prenom}}</td>
                        <td>{{ $c->nom}}</td>
                        <td>{{ $c->email}}</td>
                        <td>

                            <form action="{{route('admin.traitants.destroy',$c->id_traitant)}}" method="post">


                                <a href="{{route('admin.traitants.show',$c->id_traitant)}}" class="btn  btn-success">عرض</a>

                                <a href="{{route('admin.traitants.edit',$c->id_traitant)}}" class="btn btn-info">تعديل</a>

                                    @method('DELETE')
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <button href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">مسح</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
                @else
                    <tr><td colspan="5">لا يوجد معالج</td></tr>
                @endif
            </table>
            {{$traitants->render()}}
        </div>
    </section>
@endsection
