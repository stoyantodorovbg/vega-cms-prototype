<a href="https://vegacms.com/">VEGA CMS PHP Package</a>

This project is build on top of Laravel. 
It provides usable these functionalities:
 - Administration user interface. 
 - Automated creation of routes with authorizations.
 - Reusable model search service.
 - File manage service.
 - Functionality for using locales.
 - Functionality for manage phrases.
 - UI menu builder.
 - UI page builder.
 - Smart presentation of data through Vue components.
 - Tests
 
Installation: 
composer create-project stoyantodorovbg/vega-cms

Commands:
 - Generate a group:
    php artisan generate:group {title} {--description=} 
 
 - Destroy a group:
    php artisan destroy:group {title}   
 
 - Generate a route: 
    php artisan generate:route {url} {method} {action} {name} {route_type=web} {action_type=front}   
 
 - Destroy a route:
    php artisan destroy:route {name}
    
 - Make the route accessible for the group members:
    php artisan attach:route-to-group {name} {title}
    
 - Remove route accessibility for the group members:
    php artisan detach:route-from-group {name} {title} 
