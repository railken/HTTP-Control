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
    <link rel='stylesheet' href="{{ assets('Nut::vendor/cropperjs/dist/cropper.css') }}">

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

    <script type='text/template' name='header'>
        <div>
            
        </div>
        <div class='fill'>

        </div>
        <div class='header-sync-container'>

            {#syncing}
                <i class="fa fa-refresh rotate-1" aria-hidden="true"></i>
                <span class='text-sm'>SYNCING</span>
            {/syncing}

            {^syncing}
                <i class="fa fa-refresh" aria-hidden="true"></i>
                <span class='text-sm'>IN SYNC</span>
            {/syncing}
        </div>
        <div>
            &nbsp;&nbsp;
        </div>
        <div class='header-container-user'>
            {user.username}
        </div>
    </script>

    <script type='text/template' name='side-left'>
        <div class='side-left'>

            <div class='full-height fluid'>
                <nav class='full-height nav-teams'>
                    {#user.teams}
                        <div class='nav-team' data-id='{id}' data-name='{name}' data-navigo="" href="/team/{id}">
                            {#avatar}
                                <img src='{avatar}' width='50' height='50'>
                            {/avatar}
                            {^avatar}
                                <i class='fa fa-plus'></i>
                            {/avatar}
                        </div>
                    {/user.teams}

                    <div class='nav-team nav-team-add'  data-toggle="modal" data-target="#team-create">
                        <i class='fa fa-plus'></i>
                    </div>
                </nav>
                <div class='fill {#team}side-left-resizable{/team}' data-container='left-side-team'>

                  
                </div>
            </div>
        </div>
    </script>
    <script type='text/template' name='left-side-team'>

        {#team}
          <div class='container-left-side-top fluid fluid-vcenter'>
                <div class='team-name'>{name}</div>

                <div class='fill'></div>

                <div class='fluid fluid-stretch dropdown'>
                    <div class='nav-project-action-icon-a fluid fluid-vcenter fill' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="nav-team-actions">
                 
                        <i class='fa fa-ellipsis-h nav-project-action-icon'></i>
                    </div>
                    <div class="dropdown-menu" aria-labelledby="nav-team-actions">

                        <a class="dropdown-item" href="#" data-toggle="modal" data-team-id='{team.id}' data-target="#project-create">Create project</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#team-update" data-id="{id}">Edit</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#team-change-avatar" data-id="{id}">Change avatar</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#team-remove" data-id="{id}">Remove</a>
                        <!--
                        <form method='POST' class='projects-delete'>
                            <input type='hidden' name='id' value='{id}'>
                            <button class="dropdown-item" type='submit'>Leave project</button>
                        </form>-->
                    </div>
                </div>

            </div>

            <nav class='full-height nav-projects fill'>


                {#team.projects}
                    <div class='nav-project fluid fluid-stretch dropdown'>
                        <div class='nav-project-spacing'>
                            <div class='nav-project-icon'>
                            {#avatar}
                                <img src='{avatar}' width='40' height='40'>
                            {/avatar}
                            {^avatar}
                                <i class='fa fa-cubes nav-project-icon-default nav-project-action-icon'></i>
                            {/avatar}
                            </div>
                        </div>
                        <div class='nav-project-info nav-project-spacing fill'>
                            <div class='project-name'>{name}</div>
                            <div class='text-sm'>0 requests</div>
                        </div>
                        <div class='fluid fluid-stretch dropdown'>
                            <div class='nav-project-actions fluid fluid-vcenter fill' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="nav-project-action">
                                <!--<div><i class='fa fa-users nav-project-action-icon'></i></div>-->
                                <i class='fa fa-ellipsis-h nav-project-action-icon'></i>
                            </div>
                            <div class="dropdown-menu" aria-labelledby="nav-project-actions">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#project-update" data-id="{id}" data-team-id='{team.id}'>Edit project</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#project-change-avatar" data-id="{id}" data-team-id='{team.id}'>Change avatar</a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#project-remove" data-id="{id}" data-team-id='{team.id}'>Remove project</a>
                                <!--
                                <form method='POST' class='projects-delete'>
                                    <input type='hidden' name='id' value='{id}'>
                                    <button class="dropdown-item" type='submit'>Leave project</button>
                                </form>-->
                            </div>
                        </div>
                    </div>
                {/team.projects}
            </nav>

        <br><br><br><br><br><br>
        {/team}
    </script>
    <script type='text/template' name='layout'>@include('Nut::base')</script>
    <script type='text/template' name='sign-in'>@include('Nut::sign-in')</script>
    <script type='text/template' name='home'>@include('Nut::home')</script>
    <script type='text/template' name='project'>@include('Nut::project')</script>

    @include('Nut::modals/project')
    @include('Nut::modals/team')
@endsection

@section('scripts')
    
    <link rel='stylesheet' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/themes/overcast/jquery-ui.css'>
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

    <script src="{{ assets('Nut::vendor/cropperjs/dist/cropper.js') }}"></script>
    <script src="{{ assets('Nut::vendor/railken/uploader/uploader.js') }}"></script>
    <!-- component -->
    <script src="{{ assets('Nut::component/toggle/toggle.js') }}"></script>
    <script src="{{ assets('Nut::component/modal/modal.js') }}"></script>


    <!-- core -->
    <script src="{{ assets('Nut::core/Entity/Entity.js') }}"></script>
    <script src="{{ assets('Nut::core/User/UserManager.js') }}"></script>
    <script src="{{ assets('Nut::core/User/User.js') }}"></script>
    <script src="{{ assets('Nut::core/Project/ProjectManager.js') }}"></script>
    <script src="{{ assets('Nut::core/Project/Project.js') }}"></script>
    <script src="{{ assets('Nut::core/Team/TeamManager.js') }}"></script>
    <script src="{{ assets('Nut::core/Team/Team.js') }}"></script>
    <!-- app -->
    <script src="{{ assets('Nut::app/providers/RouteServiceProvider.js') }}"></script>
    <script src="{{ assets('Nut::app/providers/AuthServiceProvider.js') }}"></script>


    <script src="{{ assets('Nut::app/resolvers/ProjectResolver.js') }}"></script>
    <script src="{{ assets('Nut::app/resolvers/TeamResolver.js') }}"></script>
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