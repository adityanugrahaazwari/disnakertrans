<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\JobVacancyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil/visi-misi', [HomeController::class, 'vision'])->name('profile.vision');
Route::get('/profil/sejarah', [HomeController::class, 'history'])->name('profile.history');
Route::get('/profil/struktur-organisasi', [HomeController::class, 'structure'])->name('profile.structure');
Route::get('/profil/maklumat-pelayanan', [HomeController::class, 'maklumat'])->name('profile.maklumat');
Route::get('/berita', [HomeController::class, 'allPosts'])->name('posts.index');
Route::get('/berita/{slug}', [HomeController::class, 'showPost'])->name('posts.show');

// Bidang Routes
Route::get('/bidang/hubungan-industrial', [HomeController::class, 'industrialRelations'])->name('departments.hi');
Route::get('/bidang/tenaga-kerja', [HomeController::class, 'laborForce'])->name('departments.tk');
Route::get('/bidang/pelatihan', [HomeController::class, 'trainingDept'])->name('departments.training');

// Publication/Lists Routes
Route::get('/lowongan-kerja', [HomeController::class, 'allJobs'])->name('jobs.index');
Route::get('/lowongan-kerja/{id}', [HomeController::class, 'showJob'])->name('jobs.show');
Route::get('/pelatihan', [HomeController::class, 'allTrainings'])->name('trainings.index');
Route::get('/unduhan', [HomeController::class, 'downloads'])->name('downloads.index');

Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

// Authentication Routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Akun Saya
    Route::get('/account/password', [\App\Http\Controllers\AccountController::class, 'password'])->name('admin.account.password');
    Route::post('/account/password', [\App\Http\Controllers\AccountController::class, 'updatePassword'])->name('admin.account.password.update');

    // Profil Dinas
    Route::prefix('profile')->name('admin.profile.')->group(function () {
        Route::get('/vision', [ProfileController::class, 'vision'])->name('vision');
        Route::post('/vision', [ProfileController::class, 'updateVision'])->name('vision.update');
        Route::get('/history', [ProfileController::class, 'history'])->name('history');
        Route::post('/history', [ProfileController::class, 'updateHistory'])->name('history.update');
        Route::get('/contact', [ProfileController::class, 'contact'])->name('contact');
        Route::post('/contact', [ProfileController::class, 'updateContact'])->name('contact.update');
        Route::get('/footer', [ProfileController::class, 'footer'])->name('footer');
        Route::post('/footer', [ProfileController::class, 'updateFooter'])->name('footer.update');
        Route::get('/greeting', [ProfileController::class, 'greeting'])->name('greeting');
        Route::post('/greeting', [ProfileController::class, 'updateGreeting'])->name('greeting.update');
        Route::get('/complaint', [ProfileController::class, 'complaint'])->name('complaint');
        Route::post('/complaint', [ProfileController::class, 'updateComplaint'])->name('complaint.update');
        Route::get('/maklumat', [ProfileController::class, 'maklumat'])->name('maklumat');
        Route::post('/maklumat', [ProfileController::class, 'updateMaklumat'])->name('maklumat.update');

        // Struktur Organisasi (Manajemen Pegawai)
        Route::resource('structure', EmployeeController::class)->names('structure');
    });

    // Berita
    Route::resource('posts', PostController::class)->names('admin.posts');

    // Hero Section (Singleton Management)
    Route::get('heroes', [\App\Http\Controllers\HeroController::class, 'index'])->name('admin.heroes.index');
    Route::post('heroes', [\App\Http\Controllers\HeroController::class, 'update'])->name('admin.heroes.update');

    Route::resource('categories', \App\Http\Controllers\CategoryController::class)->names('admin.categories');
    Route::resource('training-categories', \App\Http\Controllers\TrainingCategoryController::class)->names('admin.training-categories');
    Route::resource('tags', \App\Http\Controllers\TagController::class)->names('admin.tags');

    // Program & Layanan
    Route::resource('trainings', TrainingController::class)->names('admin.trainings');
    Route::resource('services', \App\Http\Controllers\ServiceController::class)->names('admin.services');
    Route::resource('departments', \App\Http\Controllers\DepartmentController::class)->names('admin.departments');
    Route::resource('career-steps', \App\Http\Controllers\CareerStepController::class)->names('admin.career-steps');

    // Lowongan Kerja
    Route::resource('job-vacancies', JobVacancyController::class)->names('admin.job-vacancies');
    Route::delete('job-vacancies/images/{image}', [JobVacancyController::class, 'destroyImage'])->name('admin.job-vacancies.images.destroy');

    // Pesan & Pengaduan
    Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy'])->names('admin.messages');

    // Manajemen User
    Route::resource('users', UserController::class)->names('admin.users');

    // Manajemen RBAC (Roles)
    Route::resource('roles', \App\Http\Controllers\RoleController::class)->names('admin.roles');

    // Manajemen Permission
    Route::resource('permissions', \App\Http\Controllers\PermissionController::class)->names('admin.permissions');
    Route::resource('permission-groups', \App\Http\Controllers\PermissionGroupController::class)->names('admin.permission-groups');

    // Manajemen Menu Dinamis
    Route::resource('menus', \App\Http\Controllers\MenuController::class)->names('admin.menus');
});
