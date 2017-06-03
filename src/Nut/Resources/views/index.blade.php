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
    </template>

    <template data-name='side-left'>
        <div class='side-left'>

            <div class='full-height fluid'>
                <nav class='full-height nav-teams'>
                    {#user.teams}
                        <div class='nav-team' data-name='{name}'>

                        </div>
                    {/user.teams}

                    <div class='nav-team'  data-toggle="modal" data-target="#team-create">
                        <i class='fa fa-plus'></i>
                    </div>
                </nav>
                <div class='fill'>

                    <div class='container-left-side-top fluid fluid-vcenter'>
                        <div>Team name</div>

                        <div class='fill'></div>

                        <div class='fluid fluid-stretch dropdown'>
                            <div class='nav-project-action-icon-a fluid fluid-vcenter fill' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="nav-team-actions">
                         
                                <i class='fa fa-ellipsis-h nav-project-action-icon'></i>
                            </div>
                            <div class="dropdown-menu" aria-labelledby="nav-team-actions">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#team-edit" data-modal-id="input,{id}" data-modal-name="input,{name}"  data-modal-description="textarea,{description}">Edit team</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#team-delete" data-modal-id="input,{id}">Delete team</a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#project-create">Create project</a>
                                <!--
                                <form method='POST' class='projects-delete'>
                                    <input type='hidden' name='id' value='{id}'>
                                    <button class="dropdown-item" type='submit'>Leave project</button>
                                </form>-->
                            </div>
                        </div>

                    </div>

                    <nav class='full-height nav-projects fill'>


                    </nav>
                </div>
            </div>
        </div>
    </template>
    <template data-name='nav-projects'>


        {#user.projects}
            <div class='nav-project fluid fluid-stretch dropdown'>
                <div class='nav-project-icon nav-project-spacing'>
                    <i class='fa fa-cubes nav-project-icon nav-project-action-icon'></i>
                </div>
                <div class='nav-project-info nav-project-spacing fill'>
                    <div>{name}</div>
                    <div class='text-sm'>0 requests</div>
                </div>
                <div class='fluid fluid-stretch dropdown'>
                    <div class='nav-project-actions fluid fluid-vcenter fill' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="nav-project-action">
                        <!--<div><i class='fa fa-users nav-project-action-icon'></i></div>-->
                        <i class='fa fa-ellipsis-h nav-project-action-icon'></i>
                    </div>
                    <div class="dropdown-menu" aria-labelledby="nav-project-actions">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#project-form" data-modal-id="input,{id}" data-modal-name="input,{name}"  data-modal-description="textarea,{description}">Edit project</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#project-delete" data-modal-id="input,{id}">Delete project</a>
                        <!--
                        <form method='POST' class='projects-delete'>
                            <input type='hidden' name='id' value='{id}'>
                            <button class="dropdown-item" type='submit'>Leave project</button>
                        </form>-->
                    </div>
                </div>

               
            </div>
        {/user.projects}
        <br><br><br><br><br><br>

    </template>
    <template data-name='layout'>@include('Nut::base')</template>
    <template data-name='sign-in'>@include('Nut::sign-in')</template>
    <template data-name='home'>@include('Nut::home')</template>
    <template data-name='project'>@include('Nut::project')</template>
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