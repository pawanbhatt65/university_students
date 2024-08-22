
# University Students Portal

This project is a University Students Portal that features a comprehensive list of students, displaying their names, class, class teacher names, along with options to edit or delete student records. It also allows the addition of new students to the university. Additionally, a separate page lists all the teachers. The portal includes signup and login functionality specifically for the admin. 

Some of the key dependencies are mentioned below, but for a complete list, please refer to the composer.json file:

```bash
    "php": "^8.1",
    "laravel/framework": "^10.0",
```

## Technical Documentation

## Homepage

Upon visiting the portal, users are presented with a list of students featuring search, sorting, and pagination capabilities. Each page displays up to 50 students.

```bash
Homepage: Route::get('/', [StudentController::class, 'homepage'])->name('homepage');
```
Functionality: The student list is generated using Yajra Datatables. Search functionality allows users to search for students by name only.

## Search Functionality
To fetch and search through the student data:

```bash
Search Route: Route::get('/students/data', [StudentController::class, 'getStudentData'])->name('students.data');
```

## Edit Student
Clicking the "Edit" button takes the user to the student edit page, where they can update the student's details.
```bash
Page route: Route::get('/edit-student', [StudentController::class, 'editStudent'])->name('editStudent');
```
```bash
Update route: Route::post('/student/update-student', [StudentController::class, 'updateStudent'])->name('student.updateStudent');
```

Functionality: The student update form is prefilled with the current student data, allowing for easy updates.
Delete Student

## To delete a student record:
When clicking the delete button, a confirmation popup will appear with two options: "Yes, Delete It" and "No, Cancel." If "No, Cancel" is clicked, the student will not be deleted. If "Yes, Delete It" is clicked, the student will be soft deleted. This means that the student's record is not permanently removed and can be retrieved later if needed.
 
```bash
Delete Route: Route::post('/deleteStudent', [StudentController::class, 'deleteStudent'])->name('deleteStudent');
```

## Add a New Student
Clicking the "Add Student" button opens a form to add a new student.
```bash
Add Student Page: Route::get('/add-student', [StudentController::class, 'addStudent'])->name('addStudent');
```
```bash
Add Student Route: Route::post('/store-student', [StudentController::class, 'storeStudent'])->name('student.storeStudent');
```
Functionality: This feature allows users to input and submit details for a new student, which will then be added to the student list.


## Teachers

The Teachers page displays a list of teachers with sorting, searching, and pagination features. Each page shows up to 50 teachers.

```bash
Teachers Page: Route::get('/teachers', [TeacherController::class, 'teachers'])->name('teachers');
```
```bash
Teachers list: Route::get('/teachers/data', [TeacherController::class, 'getTeacherData'])->name('teachers.data');
```

## Admin
We have added "Sign Up" and "Login" features for the admin. These functionalities allow the creation of an admin account and provide a secure login mechanism.

## Sign Up
Admin can create an account by providing their name, email, password, and confirmation of the password. Both frontend and backend validations ensure the data is correctly formatted. Any errors during the process will be displayed below the form.
```base
SignUp Route: Route::get('/sign-up', [AdminController::class, 'signUp'])->name('signUp'); 
```
```base
Store data: Route::post('/store-admin', [AdminController::class, 'storeAdmin'])->name('storeAdmin');
```
Upon successful account creation, the admin is redirected to the login page.

## Log In
Admin can log in using their email and password. The credentials are checked against the database using Laravel’s Auth method.
```base
Route::get('/log-in', [AdminController::class, 'login'])->name('login');
```
```base
Route::post('/login-admin', [AdminController::class, 'loginAdmin'])->name('loginAdmin');
```
If the credentials are correct, the admin is redirected to the dashboard.
```base
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
```

In the dashboard, the admin has access to a logout button, which ends their session when clicked.
```base
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
```