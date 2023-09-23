# Multi Tenancy 

## Theoretical questions

-- What is SaaS?\
-- SaaS stands for software as a service which is provided by third party and many users can use this service on a subscription basis. 

-- Does a SaaS-Webapp require the multi-database approach?\
-- No, it can be single database, anyway it depends on many factors such as the complexity of the app, the scalability and the business case itself. 


-- What is multi tenancy?\
-- Multi tenancy is a concept in software where a single software serves multiple clients.

-- Which multi tenancy approach would you use for our project? (single or multi-
database)?\
-- Single database approach.
___
## How you achieved multi-tenancy and how you separated the superadmin, merchant and user dashboard?

- Tenant Middleware: I created a middleware named "Tenant.php" located in the "App/Http/Middleware" directory. This middleware utilizes the "TenantService" to interact with the database and determine the tenant based on the subdomain of the incoming request. This information is then made globally accessible using a helper function called "tenant."

- Separation of Routes: I separated the routes for super admin, merchant, and user dashboards. Super admin routes are defined in the "web.php" file. Tenant-specific routes are placed in a separate file called "tenant.php." To ensure that the "Tenant" middleware is applied to the tenant routes, I registered these routes in the "RouteServiceProvider.php."

- Controller Organization: For the super admin dashboard, I created dedicated controllers located in the "Controllers/Admin" directory. These controllers handle super admin-specific functionality. Similarly, for the tenant dashboard, I organized controllers in the "Controllers/Tenant" directory to manage tenant-specific tasks.

- View Organization: To maintain clarity and separation, I stored views for the super admin dashboard in the "resources/js/Pages/Admin" directory. Tenant-specific views are stored in the "resources/js/Pages/Tenant" directory. This separation of views helps ensure that the user interfaces for super admin and tenants remain distinct.

- Permissions Management: I also utilized Spatie Permissions to manage user roles, enabling the identification of super admins, merchants, and users. This role management system played a crucial role in segregating user access and responsibilities within the application.
___
##  Credentials of the superadmin, 2 merchants and 1 user

| Role | Email | Password | domain
| ------ | ------ | ------ | ------
| Super Admin | super_admin@test.com | 123123123 | base_domain.test
| Merchant | tenant_merchant_1@test.com | 12312313| tenant_1.base_domain.test
| Merchant | tenant_merchant_2@test.com | 123123123 | tenant_2.base_domain.test
| User | tenant_user_30_95@test.com | 12312312 | tenant_30.base_domain.test
___
## Installation instructions
To set up the project, please follow these steps:
- 1- Ensure that your PHP version at least is “8.1”. 
- 2- Open the project and navigate to the project's root directory in a new terminal.
- 3- Run the command "composer install" to install the project dependencies.
- 4- Copy the ".env.example" file in the root directory of the project and rename it to ".env". 
- 5- Generate a key for the application by running the command "php artisan key:generate".
- 6- Make sure to provide the base domain for "BASE_DOMAIN" key in your ".env" file ex:"multi-tenancy.test".
- 7- Create a database on your local machine and copy its name.
- 8- Open the ".env" file and locate the "DB_DATABASE" paste the database name as the value for this key.
- 9- Double-check the database configuration values in the ".env" file to ensure they match your local database configuration.
- 10- Migrate the database tables and seed data by executing the command "php artisan migrate --seed".
- 11- Run "npm install" Command to install the node modules, please make sure that your node version is 16.
- 12- Run "npm run build".
- 11- To run the project, use the command "php artisan serve". If you are using Valet, you can access the project via the domain “http://project-name.test". 
- 12- At this point, the project shouldbe running correctly on your machine.
