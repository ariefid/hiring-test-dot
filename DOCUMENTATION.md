## Route Documentation

GET /authentication/login : Display a login form.
POST /authentication/login : Validate a login form.

GET /authentication/logout : Logout current user.

GET /authentication/not-verified : Validate unverified user.

GET /authentication/register : Display a register form.
POST /authentication/register : Validate a register form.

GET /user/change-password : Display a current user change password form.
PUT /user/change-password : Update current user password.

GET /dashboard : Display a list public todo.

GET /dashboard/todos : Display a list current user owned todo.
POST /dashboard/todos : Store current user owned todo.
GET /dashboard/todos/create : Display a create todo form.
GET /dashboard/todos/{id} : Show current user owned todo by id.
PUT /dashboard/todos/{id} : Update current user owned todo by id.
DELETE /dashboard/todos/{id} : Delete current user owned todo by id.
GET /dashboard/todos/{id}/edit : Display a edit form current user owned todo by id.
