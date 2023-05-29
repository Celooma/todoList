# Task Management Application Documentation

This documentation provides an overview of the Task Management application, explaining its features, functionality, and usage instructions.

## 1. Introduction
------------------
## 2. Installation
------------------
## 3. Routes
------------------

### 3.1. Login Routes ("/login")

+ Middleware: guest (applies to all routes in the group)
### 3.1.1 Create Route
+ HTTP Method: GET
+ Description: Renders the "Login" page.
+ Controller Method: AuthenticatedSessionController@create


### 3.1.2 Store Route
+ HTTP Method: POST
+ Description: Login user.
+ Controller Method: AuthenticatedSessionController@store


### 3.1. Register Routes ("/register")

+ Middleware: guest (applies to all routes in the group)
### 3.1.1 Create Route
+ HTTP Method: GET
+ Description: Renders the "registration" page.
+ Controller Method: RegisteredUserController@create

### 3.1.2 Store Route
+ HTTP Method: POST
+ Description: Register a new user.
+ Controller Method: RegisteredUserController@store

### 1.1. Register Route ("/register")
+ HTTP Method: GET
+ Description: Renders the "Registration" page.
+ Controller Method: AuthenticatedSessionController@create

### 2. Root Route ("/")

+ HTTP Method: GET
+ Description: Renders the "Welcome" page with information about the application.
+ Data Passed:
  * canLogin - Boolean indicating whether the login route is available.
  * canRegister - Boolean indicating whether the registration route is available.
  * laravelVersion - String representing the Laravel framework version.
phpVersion - String representing the PHP version.



### 2. Task Routes ("/tasks")

+ Middleware: auth (applies to all routes in the group)
###  3.1. Index Route

+ HTTP Method: GET
+ Description: Renders the tasks index page.
+ Controller Method: TaskController@index

### 3.2. Store Route

+ HTTP Method: POST
+ Description: Handles the creation of a new task.
+ Controller Method: TaskController@store
### 3.3. Update Route

+ HTTP Method: PATCH
+ Description: Handles the update of an existing task.
+ Controller Method: TaskController@update

### 3.4. Destroy Route

+ HTTP Method: DELETE
+ Description: Handles the deletion of a task.
+ Controller Method: TaskController@destroy

