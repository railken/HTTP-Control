var App = new Application();

App.set('syncing', false);

function config(name)
{
    return configs[name];
}

function reload()
{   
    // Close all modals
    $('.modal.in').modal('hide');
    
    // Reload route
    App.get('router')._lastRouteResolved = null;
    App.get('router').resolve();

    $('.modal-backdrop.fade.in').remove();
    
}

$(document).ready(function(){

    App.set('api', new Api());
    App.get('api').setUrl(config('api_url'));
    App.set('flash', new Flash());

    App.set('side-left-width', new CookieStorage("side-left-width"));

    App.init();


    App.addListener('loaded', function() {
        toggle.reload();
    });


});

var LoaderServiceProvider = function() {
    this.name = 'loader';
    this.initialize = function(self, next) {

        App.get('router').resolve();
        $('.page-loader').remove();
        next();
    };
}

var AuthenticatedServiceProvider = function() {

    // This will handle redirect for guest user

    this.name = 'authenticated';
    this.initialize = function(self, next) {

        if (!App.get('user')) {

            App.get('router').navigate('/sign-in');
            

        }
        next();
    };
};



$('body').on("click", "[data-navigo]", function(e) {
    e.preventDefault();
    $('[data-navigo].selected').removeClass('selected');
    $(this).addClass('selected');
    App.get('router').navigate($(this).attr('href'));
});

App.addProviders([
    AuthServiceProvider,
    RouteServiceProvider,
    AuthenticatedServiceProvider,
    LoaderServiceProvider,
]);