@extends('layouts.admin')
@section('title','| قائمة الأطفال')
@section('content')
    <br>
    <br>

    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <p>
                <a href="{{route('admin.enfants.create')}}" class="btn btn-primary">اضافة فرد جديد</a>
            </p>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="10%">الرقم</th>
                    <th width="10%">الصورة الشمسية</th>
                    <th width = "35px"> اللقب</th>
                    <th  width = "35px">الاسم</th>
                    <th  width = "35px">الجنس</th>
                    <th  width = "35px">بتاريخ</th>
                    <th width = "30px">الحركة</th>
                </tr>
                @if(count($enfants))
                    @foreach($enfants as $c   )
                        <tr>
                            <td>{{$loop->iteration}}</td>

                            <td><img src="{{ asset('storage/enfants/'.$c->image) }}"  style="border-radius: 8px; display: block;
                                     margin-left: auto;
                                     margin-right: auto;  border: 2px solid #ddd;
                                     " width="50"  />
                            <td>{{ $c->prenom}}</td>
                            <td>{{ $c->nom}}</td>
                            <td>{{ $c->sexe}}</td>
                            <td>{{ $c->created_at}}</td>


                            <td>


                                <form action="{{route('admin.enfants.destroy',$c->id_enfant)}}" method="post">



                                    <a href="{{route('admin.enfants.show',$c->id_enfant)}}" class="btn  btn-success">عرض</a>

                                    <a href="{{route('admin.enfants.edit',$c->id_enfant)}}" class="btn btn-info">تعديل</a>
                                    @method('DELETE')
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <button href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">مسح</button>

                                </form>
                            </td>
                        </tr>

                    @endforeach

                @else
                    <tr><td colspan="7">لا يوجد طفل</td></tr>
                @endif
            </table>
            {{$enfants->render()}}
        </div>
    </section>
@endsection
