@extends ('admin.layouts.app_admin')


@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создание пользователя @endslot
            @slot('parent') Главная @endslot
            @slot('active') Пользователт @endslot
        @endcomponent
        <hr>

        <form action="{{route('admin_user_managment.user.store')}}" method="post" class="form-horizontal">
            {{csrf_field()}}

            {{--Form include--}}
            @include('admin.user_managment.users.partials.form')


        </form>


    </div>

@endsection