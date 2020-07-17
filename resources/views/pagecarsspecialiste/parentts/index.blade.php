@extends('layouts.specialistes')
@section('title','| قائمة الأطفال')
@section('content')
    <br>
    <br>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
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
                    @foreach($enfants as $c)
                        <tr>
                            <td>{{ $c->id_enfant}}</td>
                            <td><img src="{{ asset('storage/enfants/'.$c->image) }}"  style="border-radius: 8px; display: block;
                                     margin-left: auto;
                                     margin-right: auto;  border: 2px solid #ddd;
                                     " width="50"  />
                            <td>{{ $c->prenom}}</td>
                            <td>{{ $c->nom}}</td>
                            <td>{{ $c->sexe}}</td>

                            <td>{{ $c->created_at}}</td>

                            <td>
                                <a href="{{route('pagecarsspecialiste.parentts.edit',$c->id_enfant)}}" class="btn btn-info">تعديل</a>

                                <a class="btn btn-success" href="{{route('pagecarsspecialiste.parentts.show',$c->id_enfant)}}">عرض</a>

                            </td>
                        </tr>

                    @endforeach
                @else
                    <tr><td colspan="5">لا يوجد طفل</td></tr>
                @endif
            </table>
            {{$enfants->render()}}
        </div>
    </section>
@endsection
