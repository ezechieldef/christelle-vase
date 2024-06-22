<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RdvCVController;
use App\Http\Controllers\RdvARVController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AttendusController;
use App\Http\Controllers\ElicitationController;
use App\Http\Controllers\TypePopulationController;
use App\Http\Controllers\AgentGestionnaireController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('theme-toggle', function () {
    if (session('theme')) {
        session()->forget('theme');
    } else {
        session(['theme' => 'dark']);
    }
    return back();
})->name('theme-toggle');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::redirect('/home', 'attendus')->name("home");
Route::redirect('/', 'attendus');

Route::middleware(['auth', 'update-last-login', 'permission:gerer users',])->group(function () {
    Route::resource("users", UserController::class);
    Route::post('users/{user_id}/roles', [UserController::class, 'storeRole'])->name('users.storeRole');
});
Route::middleware(['auth', 'update-last-login', 'permission:gerer roles'])->group(function () {
    Route::resource("roles", RoleController::class);
    Route::post('roles/{role}/permissions', [RoleController::class, 'storePermissions'])->name('roles.storePermissions');
});

Route::middleware(['auth', 'update-last-login', 'permission:gerer RDV'])->group(function () {
    Route::resource('rdv-a-r-vs', RdvARVController::class);
    Route::post('rdv-a-r-vs/import', [RdvARVController::class, 'import'])->name('rdv-a-r-vs.import');
    Route::resource('rdv-c-vs', RdvCVController::class);
    Route::post('rdv-c-vs/import', [RdvCVController::class, 'import'])->name('rdv-c-vs.import');
    Route::resource('elicitations', ElicitationController::class);
    Route::post('elicitations/import', [ElicitationController::class, 'import'])->name('elicitations.import');
    Route::get('downloadInvalidRows', [HomeController::class, 'downloadInvalidRows'])->name('downloadInvalidRows');
});
Route::middleware(['auth', 'update-last-login', 'role:Super-admin'])->group(function () {
    Route::resource('type-populations', TypePopulationController::class);
    Route::resource('agent-gestionnaires', AgentGestionnaireController::class);
    Route::post('agent-gestionnaires/{user_id}/patients', [AgentGestionnaireController::class, 'storePatients'])->name('agent-gestionnaires.storePatients');
    Route::get('agent-gestionnaires/destroy-patient/{patient_id}', [AgentGestionnaireController::class, 'destroyPatient'])->name('agent-gestionnaires.destroyPatient');
});

Route::middleware(['auth', 'update-last-login', 'role:Super-admin|Agent-gestionnaire'])->group(function () {
    Route::resource('patients', PatientController::class, ["only" => ["index", "show", "update"]]);
    Route::get('elicitations-public', [ElicitationController::class, 'public'])->name('elicitations.public');
    Route::resource('attendus', AttendusController::class, ["only" => ["index", "show", "update"]]);
});
