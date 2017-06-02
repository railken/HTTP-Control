@extends('Nut::layout')

@section('title')
    Sign In
@endsection

@section('scripts')
    
    @parent
@endsection

@section('styles')

    <link rel='stylesheet' href="{{ assets('Nut::vendor/reset/reset/src/reset.css') }}">
    
    <!-- component -->
    <link rel='stylesheet' href="{{ assets('Nut::component/toggle/toggle.css') }}">


    <!-- vendor -->
    <link rel='stylesheet' href="{{ assets('Nut::vendor/bootstrap/bootstrap/src/bootstrap.css') }}">
    <link rel='stylesheet' href="{{ assets('Nut::vendor/bootstrap/bootstrap-social/bootstrap-social.css') }}">
    <link rel='stylesheet' href="{{ assets('Nut::vendor/railken/framework/src/Application/Application.css') }}">
    <link rel='stylesheet' href="{{ assets('Nut::vendor/railken/template/src/Template.css') }}">
    <link rel='stylesheet' href="{{ assets('Nut::vendor/font-awesome/font-awesome/src/css/font-awesome.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600&subset=latin-ext,cyrillic-ext' rel='stylesheet' type='text/css'>

    <link rel='stylesheet' href="{{assets('Nut::app/layout/style.css')}}">

    <link rel='stylesheet' href="{{assets('Nut::app/layout/sign-in/style.css')}}">
    <link rel='stylesheet' href="{{assets('Nut::app/layout/home/style.css')}}">


@endsection


@section('body')
    <div class="page-loader">
        <div class="loading">
            <div class="loading-spin"></div>
            <span>Loading...</span>
        </div>
    </div>

    <template data-name='header'>
        <div class='fill'>

        </div>
        <div class='header-sync-container'>

            {#syncing}
                <i class="fa fa-refresh rotate-1" aria-hidden="true"></i>
                <span class='text-sm'>SYNCING</span>
            {/syncing}

            {^syncing}
                <i class="fa fa-refresh rotate-1" aria-hidden="true"></i>
                <span class='text-sm'>IN SYNC</span>
            {/syncing}
        </div>
        <div>
            &nbsp;&nbsp;
        </div>
        <div class='header-container-user'>
            {user.username}
        </div>
    </template>
    <template data-name='layout'>@include('Nut::base')</template>
    <template data-name='sign-in'>@include('Nut::sign-in')</template>
    <template data-name='home'>@include('Nut::home')</template>
    <template data-name='project'>@include('Nut::project')</template>
@endsection

@section('scripts')
    
    <script src="{{ assets('Nut::app/layout/main.js') }}"></script>
    <!-- vendor -->
    <script src="{{ assets('Nut::vendor/navigo/navigo/navigo.min.js') }}"></script>

    <script src="{{ assets('Nut::vendor/mustache/mustache/src/mustache.min.js') }}"></script>

    <script src="{{ assets('Nut::vendor/jquery/jquery/src/jquery.js') }}"></script>
    <script src="{{ assets('Nut::vendor/jquery/jquery/src/jquery.cookie.js') }}"></script>
    <script src="{{ assets('Nut::vendor/jquery/jquery/src/jquery-ui.js') }}"></script>
    <script src="{{ assets('Nut::vendor/bootstrap/bootstrap/src/bootstrap.js') }}"></script>
    <!--<script src="{{ assets('Nut::vendor/bootstrap/bootstrap/src/bootstrap-notify.js') }}"></script>-->
    <script src="{{ assets('Nut::vendor/railken/template/src/Template.js') }}"></script>
    <script src="{{ assets('Nut::vendor/railken/framework/src/Application/Application.js') }}"></script>
    <script src="{{ assets('Nut::vendor/railken/framework/src/Client/Api.js') }}"></script>
    <script src="{{ assets('Nut::vendor/railken/framework/src/Client/Client.js') }}"></script>
    <script src="{{ assets('Nut::vendor/railken/framework/src/Client/Cookies.js') }}"></script>
    <script src="{{ assets('Nut::vendor/railken/storage/src/CookieStorage.js') }}"></script>
    <script src="{{ assets('Nut::vendor/railken/flash/src/Flash.js') }}"></script>


    <!-- component -->
    <script src="{{ assets('Nut::component/toggle/toggle.js') }}"></script>
    <script src="{{ assets('Nut::component/modal/modal.js') }}"></script>


    <!-- core -->
    <script src="{{ assets('Nut::core/Entity/Entity.js') }}"></script>
    <script src="{{ assets('Nut::core/User/UserManager.js') }}"></script>
    <script src="{{ assets('Nut::core/User/User.js') }}"></script>
    <script src="{{ assets('Nut::core/Project/ProjectManager.js') }}"></script>
    <script src="{{ assets('Nut::core/Project/Project.js') }}"></script>
    <!-- app -->
    <script src="{{ assets('Nut::app/providers/RouteServiceProvider.js') }}"></script>
    <script src="{{ assets('Nut::app/providers/AuthServiceProvider.js') }}"></script>


    <script src="{{ assets('Nut::app/resolvers/ProjectResolver.js') }}"></script>
    <script src="{{ assets('Nut::app/layout/sign-in/auth.js') }}"></script>
    <script src="{{ assets('Nut::app/layout/sign-in/events.js') }}"></script>
    <!--<script src="{{ assets('Nut::app/layout/sign-in/main.js') }}"></script>-->
    <script src="{{ assets('Nut::app/layout/home/events.js') }}"></script>


    <script>

        var configs = {
            url: "{{ env('APP_URL') }}",
            api_url: "{{ env('APP_API_URL') }}"
        };

    </script>

    <script src="{{ assets('Nut::app/bootstrap.js') }}"></script>
@endsection