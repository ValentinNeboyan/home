@extends ('admin.layouts.app_admin')


@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Редактирование пользователей @endslot
            @slot('parent') Главная @endslot
            @slot('active') Пользователи @endslot
        @endcomponent
        <hr>

        <form action="{{route('admin_user_managment.user.update', $user)}}" method="post" class="form-horizontal">
            {{method_field('PUT')}}
            {{csrf_field()}}

            {{--Form include--}}
            @include('admin.user_managment.users.partials.form')

        </form>


    </div>

@endsection