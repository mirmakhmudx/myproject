<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AdminTeacherController;
use App\Http\Controllers\AdminCourseController;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard.page');
//course page
    Route::get('/admin/dashboard/add/course/page', [AdminCourseController::class, 'addCoursePage'])->name('addCourse.page');
    Route::get('/admin/dashboard/all/course/page', [AdminCourseController::class, 'allCoursePage'])->name('allCourse.page');
    Route::post('/admin/dashboard/add/course/post', [AdminCourseController::class, 'addCoursePost'])->name('addCourse.post');
//news page
    Route::get('/admin/dashboard/add/news/page', [AdminNewsController::class, 'addNewsPage'])->name('addNews.page');
    Route::get('/admin/dashboard/all/news/page', [AdminNewsController::class, 'allNewsPage'])->name('allNews.page');
    Route::post('/admin/dashboard/add/news/post', [AdminNewsController::class, 'addNewsPost'])->name('addNews.post');
//teacher page
    Route::get('/admin/dashboard/add/teacher/page', [AdminTeacherController::class, 'addTeacherPage'])->name('addTeacher.page');
    Route::get('/admin/dashboard/all/teacher/page', [AdminTeacherController::class, 'allTeacherPage'])->name('allTeacher.page');
    Route::post('/admin/dashboard/add/teacher/post', [AdminTeacherController::class, 'addTeacherPost'])->name('addTeacher.post');
//edit page course
    Route::get('/admin/dashboard/course/edit/page{id}', [AdminCourseController::class, 'EditPage'])->name('EditCourse.page');
    Route::post('/admin/dashboard/course/edit/post', [AdminCourseController::class, 'EditPost'])->name('EditCourse.post');
//edit page news
    Route::get('/admin/dashboard/news/edit/page{id}', [AdminNewsController::class, 'EditNewsPage'])->name('EditNews.page');
    Route::post('/admin/dashboard/cnews/edit/post', [AdminNewsController::class, 'EditNewsPost'])->name('EditNews.post');
//edit page teachers
    Route::get('/admin/dashboard/teachers/edit/page{id}', [AdminTeacherController::class, 'EditTeacherPage'])->name('EditTeacher.page');
    Route::post('/admin/dashboard/teachers/edit/post', [AdminTeacherController::class, 'EditTeacherPost'])->name('EditTeacher.post');
//delete page course
    Route::get('/admin/dashboard/course/delete/{id}', [AdminCourseController::class, 'DeleteCoursePost'])->name('DeleteCourse.post');
    Route::get('/admin/dashboard/news/delete/{id}', [AdminNewsController::class, 'DeleteNewsPost'])->name('DeleteNews.post');
    Route::get('/admin/dashboard/teacher/delete/{id}', [AdminTeacherController::class, 'DeleteTeacherPost'])->name('DeleteTeacher.post');
});

//Web
Route::get('/', [PageController::class, 'homePage'])->name('home.page');
Route::get('/about', [PageController::class, 'aboutPage'])->name('about.page');
Route::get('/contact', [PageController::class, 'contactPage'])->name('contact.page');
Route::get('/gallery', [PageController::class, 'galleryPage'])->name('gallery.page');
Route::get('/news', [PageController::class, 'newsPage'])->name('news.page');
Route::get('/staff', [PageController::class, 'staffPage'])->name('staff.page');
//Login
Route::get('/login', [AdminController::class, 'loginPage'])->name('login.page');
Route::post('/login/chek', [AdminController::class, 'loginChek'])->name('login.chek');
Route::get('/register', [AdminController::class, 'registerPage'])->name('register.page');
Route::post('/register', [AdminController::class, 'registerPost'])->name('register.post');
//Logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
