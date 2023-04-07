@extends('layouts.app')

@section('title-block')Форма отправики данных@endsection

@section('content')
<div class="container panel panel-default wm-100 ">
    <div class="col-sm-7 mx-auto">
        <h1 class="panel-heading  text-center">Форма отправики данных</h1>
        
        <div class=" p-4 pt-3 pb-3 rounded-top">
        
                <img class=" row mx-auto " src="img/logo.png" alt=""  height="100">


        </div>

        <form id="contactForm" class="rounded-bottom  p-4 pt-3 pb-3 " action="postic" method="post">
   
            @csrf
      
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="h3 mb-3 fw-normal "  name="title" >Заполните информацию</h1>


            <div class="form-floating mt-2 mb-2">
                <input type="email" class="form-control" name="email"  value="{{ old('email') }}" placeholder="name@example.com">
                <label for="floatingInput">Email адрес</label>
            </div>
            <div class="form-floating mt-2 mb-2">
                <input type="telephone" class="form-control" name="Телефон" value="{{ old('Телефон') }}"  placeholder="+7 199 (483)-31-11">
                <label for="floatingInput">Телефон</label>
            </div>
            <div class="form-floating mt-2 mb-2">
                <input type="text" class="form-control" name="Фамилия" value="{{ old('Фамилия') }}" placeholder="Surname">
                <label for="floatingInput">Фамилия</label>
            </div>
            <div class="form-floating mt-2 mb-2">
                <input type="text" class="form-control" name="Имя" value="{{ old('Имя') }}"  placeholder="Name">
                <label for="floatingInput">Имя</label>
            </div>
            <div class="form-floating mt-2 mb-2">
                <input type="text" class="form-control" name="Отчество" value="{{ old('Отчество') }}"  placeholder="Patronymic">
                <label for="floatingInput">Отчество</label>
            </div>
            <div class="form-floating mt-2 mb-2">
                <textarea type="text" class="form-control" name="Комментарий" value="{{ old('Комментарий') }}"  placeholder="Comment"></textarea>
                <label for="floatingInput">Комментарий</label>
            </div>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Отправить</button>
        </form>
    </div>
</div>
@endsection