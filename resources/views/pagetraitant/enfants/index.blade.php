@extends('layouts.traitants')
@section('title','| قائمة الأطفال')
@section('content')
    <br>
    <br>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">


            <table class="table table-bordered table-striped">
                <tr>
                    <th width="10%">الرقم</th>
                    <th width = "35px"> اللقب</th>
                    <th  width = "35px">الاسم</th>
                    <th  width = "35px">الجنس</th>
                    <th width = "30px">الحركة</th>
                </tr>
                @if(count($enfants))
                    @foreach($enfants as $c)
                        <tr>
                            <td>{{ $c->id_enfant}}</td>
                            <td>{{ $c->prenom}}</td>
                            <td>{{ $c->nom}}</td>
                            <td>{{ $c->sexe}}</td>
                            <td>
                                <a href="#" class="btn btn-info">تعديل</a>

                                <a class="btn btn-success" href="#">عرض</a>

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
