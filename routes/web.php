<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LockScreen;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ExpenseReportsController;
use App\Http\Controllers\PerformanceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// ----------------------------- main dashboard ------------------------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('em/dashboard', [App\Http\Controllers\HomeController::class, 'emDashboard'])->name('em/dashboard');

// -----------------------------settings----------------------------------------//
Route::get('company/settings/page', [App\Http\Controllers\SettingController::class, 'companySettings'])->middleware('auth')->name('company/settings/page');
Route::get('roles/permissions/page', [App\Http\Controllers\SettingController::class, 'rolesPermissions'])->middleware('auth')->name('roles/permissions/page');
Route::post('roles/permissions/save', [App\Http\Controllers\SettingController::class, 'addRecord'])->middleware('auth')->name('roles/permissions/save');
Route::post('roles/permissions/update', [App\Http\Controllers\SettingController::class, 'editRolesPermissions'])->middleware('auth')->name('roles/permissions/update');
Route::post('roles/permissions/delete', [App\Http\Controllers\SettingController::class, 'deleteRolesPermissions'])->middleware('auth')->name('roles/permissions/delete');

// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// ----------------------------- lock screen --------------------------------//
Route::get('lock_screen', [App\Http\Controllers\LockScreen::class, 'lockScreen'])->middleware('auth')->name('lock_screen');
Route::post('unlock', [App\Http\Controllers\LockScreen::class, 'unlock'])->name('unlock');

// ------------------------------ register ---------------------------------//
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('register');

// ----------------------------- forget password ----------------------------//
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');

// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);

// ----------------------------- user profile ------------------------------//
Route::get('profile_user', [App\Http\Controllers\UserManagementController::class, 'profile'])->middleware('auth')->name('profile_user');
Route::post('profile/information/save', [App\Http\Controllers\UserManagementController::class, 'profileInformation'])->name('profile/information/save');

// ----------------------------- user userManagement -----------------------//
Route::get('userManagement', [App\Http\Controllers\UserManagementController::class, 'index'])->middleware('auth')->name('userManagement');
Route::post('user/add/save', [App\Http\Controllers\UserManagementController::class, 'addNewUserSave'])->name('user/add/save');
Route::post('search/user/list', [App\Http\Controllers\UserManagementController::class, 'searchUser'])->name('search/user/list');
Route::post('update', [App\Http\Controllers\UserManagementController::class, 'update'])->name('update');
Route::post('user/delete', [App\Http\Controllers\UserManagementController::class, 'delete'])->middleware('auth')->name('user/delete');
Route::get('activity/log', [App\Http\Controllers\UserManagementController::class, 'activityLog'])->middleware('auth')->name('activity/log');
Route::get('activity/login/logout', [App\Http\Controllers\UserManagementController::class, 'activityLogInLogOut'])->middleware('auth')->name('activity/login/logout');

// ----------------------------- search user management ------------------------------//
Route::post('search/user/list', [App\Http\Controllers\UserManagementController::class, 'searchUser'])->name('search/user/list');

// ----------------------------- form change password ------------------------------//
Route::get('change/password', [App\Http\Controllers\UserManagementController::class, 'changePasswordView'])->middleware('auth')->name('change/password');
Route::post('change/password/db', [App\Http\Controllers\UserManagementController::class, 'changePasswordDB'])->name('change/password/db');

// ----------------------------- job ------------------------------//
Route::get('form/job/list', [App\Http\Controllers\JobController::class, 'jobList'])->name('form/job/list');
Route::get('form/job/view', [App\Http\Controllers\JobController::class, 'jobView'])->name('form/job/view');

// ----------------------------- form employee ------------------------------//
Route::get('all/employee/card', [App\Http\Controllers\EmployeeController::class, 'cardAllEmployee'])->middleware('auth')->name('all/employee/card');
Route::get('all/employee/list', [App\Http\Controllers\EmployeeController::class, 'listAllEmployee'])->middleware('auth')->name('all/employee/list');
Route::post('all/employee/save', [App\Http\Controllers\EmployeeController::class, 'saveRecord'])->middleware('auth')->name('all/employee/save');
Route::post('all/employee/import', [App\Http\Controllers\EmployeeController::class, 'importRecord'])->middleware('auth')->name('all/employee/import');
Route::get('all/employee/view/edit/{employee_id}', [App\Http\Controllers\EmployeeController::class, 'viewRecord'])->middleware('auth');
Route::post('all/employee/update', [App\Http\Controllers\EmployeeController::class, 'updateRecord'])->middleware('auth')->name('all/employee/update');
Route::get('all/employee/delete/{employee_id}', [App\Http\Controllers\EmployeeController::class, 'deleteRecord'])->middleware('auth');
Route::post('all/employee/search', [App\Http\Controllers\EmployeeController::class, 'employeeSearch'])->name('all/employee/search');
Route::post('all/employee/list/search', [App\Http\Controllers\EmployeeController::class, 'employeeListSearch'])->name('all/employee/list/search');

// ----------------------------- profile employee ------------------------------//
Route::get('employee/profile/{rec_id}', [App\Http\Controllers\EmployeeController::class, 'profileEmployee'])->middleware('auth');


// ----------------------------- form holiday ------------------------------//
Route::get('form/holidays/new', [App\Http\Controllers\HolidayController::class, 'holiday'])->middleware('auth')->name('form/holidays/new');
Route::post('form/holidays/save', [App\Http\Controllers\HolidayController::class, 'saveRecord'])->middleware('auth')->name('form/holidays/save');
Route::post('form/holidays/update', [App\Http\Controllers\HolidayController::class, 'updateRecord'])->middleware('auth')->name('form/holidays/update');

// ----------------------------- form leaves ------------------------------//
Route::get('form/leaves/new', [App\Http\Controllers\LeavesController::class, 'leaves'])->middleware('auth')->name('form/leaves/new');
Route::get('form/leavesemployee/new', [App\Http\Controllers\LeavesController::class, 'leavesEmployee'])->middleware('auth')->name('form/leavesemployee/new');
Route::post('form/leaves/save', [App\Http\Controllers\LeavesController::class, 'saveRecord'])->middleware('auth')->name('form/leaves/save');
Route::post('form/leaves/edit', [App\Http\Controllers\LeavesController::class, 'editRecordLeave'])->middleware('auth')->name('form/leaves/edit');
Route::post('form/leaves/edit/delete', [App\Http\Controllers\LeavesController::class, 'deleteLeave'])->middleware('auth')->name('form/leaves/edit/delete');

// ----------------------------- form attendance  ------------------------------//
Route::get('form/leavesettings/page', [App\Http\Controllers\LeavesController::class, 'leaveSettings'])->middleware('auth')->name('form/leavesettings/page');
Route::get('attendance/page', [App\Http\Controllers\LeavesController::class, 'attendanceIndex'])->middleware('auth')->name('attendance/page');
Route::get('attendance/employee/page', [App\Http\Controllers\LeavesController::class, 'AttendanceEmployee'])->middleware('auth')->name('attendance/employee/page');
Route::get('form/shiftscheduling/page', [App\Http\Controllers\LeavesController::class, 'shiftScheduLing'])->middleware('auth')->name('form/shiftscheduling/page');
Route::get('form/shiftlist/page', [App\Http\Controllers\LeavesController::class, 'shiftList'])->middleware('auth')->name('form/shiftlist/page');

// ----------------------------- form payroll  ------------------------------//
Route::get('form/salary/page', [App\Http\Controllers\PayrollController::class, 'salary'])->middleware('auth')->name('form/salary/page');
Route::post('form/salary/save', [App\Http\Controllers\PayrollController::class, 'saveRecord'])->middleware('auth')->name('form/salary/save');
Route::post('form/salary/update', [App\Http\Controllers\PayrollController::class, 'updateRecord'])->middleware('auth')->name('form/salary/update');
Route::post('form/salary/delete', [App\Http\Controllers\PayrollController::class, 'deleteRecord'])->middleware('auth')->name('form/salary/delete');
Route::get('form/salary/view/{rec_id}', [App\Http\Controllers\PayrollController::class, 'salaryView'])->middleware('auth');
Route::get('form/payroll/items', [App\Http\Controllers\PayrollController::class, 'payrollItems'])->middleware('auth')->name('form/payroll/items');

// ----------------------------- reports  ------------------------------//
Route::get('form/expense/reports/page', [App\Http\Controllers\ExpenseReportsController::class, 'index'])->middleware('auth')->name('form/expense/reports/page');
Route::get('form/invoice/reports/page', [App\Http\Controllers\ExpenseReportsController::class, 'invoiceReports'])->middleware('auth')->name('form/invoice/reports/page');
Route::get('form/invoice/view/page', [App\Http\Controllers\ExpenseReportsController::class, 'invoiceView'])->middleware('auth')->name('form/invoice/view/page');
Route::get('form/daily/reports/page', [App\Http\Controllers\ExpenseReportsController::class, 'dailyReport'])->middleware('auth')->name('form/daily/reports/page');
Route::get('form/leave/reports/page', [App\Http\Controllers\ExpenseReportsController::class, 'leaveReport'])->middleware('auth')->name('form/leave/reports/page');

// ----------------------------- performance  ------------------------------//
Route::get('form/performance/indicator/page', [App\Http\Controllers\PerformanceController::class, 'index'])->middleware('auth')->name('form/performance/indicator/page');
Route::get('form/performance/page', [App\Http\Controllers\PerformanceController::class, 'performance'])->middleware('auth')->name('form/performance/page');
Route::get('form/performance/appraisal/page', [App\Http\Controllers\PerformanceController::class, 'performanceAppraisal'])->middleware('auth')->name('form/performance/appraisal/page');
Route::post('form/performance/indicator/save', [App\Http\Controllers\PerformanceController::class, 'saveRecordIndicator'])->middleware('auth')->name('form/performance/indicator/save');
Route::post('form/performance/indicator/delete', [App\Http\Controllers\PerformanceController::class, 'deleteIndicator'])->middleware('auth')->name('form/performance/indicator/delete');
Route::post('form/performance/indicator/update', [App\Http\Controllers\PerformanceController::class, 'updateIndicator'])->middleware('auth')->name('form/performance/indicator/update');

Route::post('form/performance/appraisal/save', [App\Http\Controllers\PerformanceController::class, 'saveRecordAppraisal'])->middleware('auth')->name('form/performance/appraisal/save');
Route::post('form/performance/appraisal/update', [App\Http\Controllers\PerformanceController::class, 'updateAppraisal'])->middleware('auth')->name('form/performance/appraisal/update');
Route::post('form/performance/appraisal/delete', [App\Http\Controllers\PerformanceController::class, 'deleteAppraisal'])->middleware('auth')->name('form/performance/appraisal/delete');

// ----------------------------- training  ------------------------------//
Route::get('form/training/list/page', [App\Http\Controllers\TrainingController::class, 'index'])->middleware('auth')->name('form/training/list/page');
Route::post('form/training/save', [App\Http\Controllers\TrainingController::class, 'addNewTraining'])->middleware('auth')->name('form/training/save');
Route::post('form/training/delete', [App\Http\Controllers\TrainingController::class, 'deleteTraining'])->middleware('auth')->name('form/training/delete');
Route::post('form/training/update', [App\Http\Controllers\TrainingController::class, 'updateTraining'])->middleware('auth')->name('form/training/update');

// ----------------------------- trainers  ------------------------------//
Route::get('form/trainers/list/page', [App\Http\Controllers\TrainersController::class, 'index'])->middleware('auth')->name('form/trainers/list/page');
Route::post('form/trainers/save', [App\Http\Controllers\TrainersController::class, 'saveRecord'])->middleware('auth')->name('form/trainers/save');
Route::post('form/trainers/update', [App\Http\Controllers\TrainersController::class, 'updateRecord'])->middleware('auth')->name('form/trainers/update');
Route::post('form/trainers/delete', [App\Http\Controllers\TrainersController::class, 'deleteRecord'])->middleware('auth')->name('form/trainers/delete');

// ----------------------------- training type  ------------------------------//
Route::get('form/training/type/list/page', [App\Http\Controllers\TrainingTypeController::class, 'index'])->middleware('auth')->name('form/training/type/list/page');
Route::post('form/training/type/save', [App\Http\Controllers\TrainingTypeController::class, 'saveRecord'])->middleware('auth')->name('form/training/type/save');
Route::post('form//training/type/update', [App\Http\Controllers\TrainingTypeController::class, 'updateRecord'])->middleware('auth')->name('form//training/type/update');
Route::post('form//training/type/delete', [App\Http\Controllers\TrainingTypeController::class, 'deleteTrainingType'])->middleware('auth')->name('form//training/type/delete');

Route::group(['prefix' => 'Organization', 'as' => 'Org.', 'middleware' => ['auth']], function () {

    // COMPANY SETTING START
    Route::get('/company','Organization\CompanyController@index')->name('company');
    Route::get('/company/create','Organization\CompanyController@create');
    Route::post('/company','Organization\CompanyController@store');
    Route::get('/company/{id}','Organization\CompanyController@show');
    Route::get('/company/{id}/edit','Organization\CompanyController@edit');
    Route::put('/company/{id}','Organization\CompanyController@update');
    Route::delete('/company/{id}','Organization\CompanyController@destroy');
    // COMPANY SETTING END

    // EMPLOYMENT TYPE START
    Route::get('/employmentType','Organization\EmploymentTypeController@index')->name('employmentType');
    Route::get('/employmentType/create','Organization\EmploymentTypeController@create');
    Route::post('/employmentType','Organization\EmploymentTypeController@store');
    Route::get('/employmentType/{id}','Organization\EmploymentTypeController@show');
    Route::get('/employmentType/{id}/edit','Organization\EmploymentTypeController@edit');
    Route::put('/employmentType/{id}','Organization\EmploymentTypeController@update');
    Route::delete('/employmentType/{id}','Organization\EmploymentTypeController@destroy');
    // EMPLOYMENT TYPE END

    // GRADE START
    Route::get('/grade','Organization\GradeController@index')->name('grade');
    Route::get('/grade/create','Organization\GradeController@create');
    Route::post('/grade','Organization\GradeController@store');
    Route::get('/grade/{id}','Organization\GradeController@show');
    Route::get('/grade/{id}/edit','Organization\GradeController@edit');
    Route::put('/grade/{id}','Organization\GradeController@update');
    Route::delete('/grade/{id}','Organization\GradeController@destroy');
    // GRADE END

    // RANK START
    Route::get('/rank','Organization\RankController@index')->name('rank');
    Route::get('/rank/create','Organization\RankController@create');
    Route::post('/rank','Organization\RankController@store');
    Route::get('/rank/{id}','Organization\RankController@show');
    Route::get('/rank/{id}/edit','Organization\RankController@edit');
    Route::put('/rank/{id}','Organization\RankController@update');
    Route::delete('/rank/{id}','Organization\RankController@destroy');
    // RANK END

    // JOB CLASS START
    Route::get('/jobClass','Organization\JobClassController@index')->name('jobClass');
    Route::get('/jobClass/create','Organization\JobClassController@create');
    Route::post('/jobClass','Organization\JobClassController@store');
    Route::get('/jobClass/{id}','Organization\JobClassController@show');
    Route::get('/jobClass/{id}/edit','Organization\JobClassController@edit');
    Route::put('/jobClass/{id}','Organization\JobClassController@update');
    Route::delete('/jobClass/{id}','Organization\JobClassController@destroy');
    // JOB CLASS END

    // ORGANIZATION LEVEL START
    Route::get('/organizationLevel','Organization\OrganizationLevelController@index')->name('organizationLevel');
    Route::get('/organizationLevel/create','Organization\OrganizationLevelController@create');
    Route::post('/organizationLevel','Organization\OrganizationLevelController@store');
    Route::get('/organizationLevel/{id}','Organization\OrganizationLevelController@show');
    Route::get('/organizationLevel/{id}/edit','Organization\OrganizationLevelController@edit');
    Route::put('/organizationLevel/{id}','Organization\OrganizationLevelController@update');
    Route::delete('/organizationLevel/{id}','Organization\OrganizationLevelController@destroy');
    // ORGANIZATION LEVEL END

    // ORGANIZATION STRUCTURE START
    Route::get('/organizationStructure','Organization\OrganizationStructureController@index')->name('organizationStructure');
    Route::get('/organizationStructure/create','Organization\OrganizationStructureController@create');
    Route::post('/organizationStructure','Organization\OrganizationStructureController@store');
    Route::get('/organizationStructure/{id}','Organization\OrganizationStructureController@show');
    Route::get('/organizationStructure/{id}/edit','Organization\OrganizationStructureController@edit');
    Route::put('/organizationStructure/{id}','Organization\OrganizationStructureController@update');
    Route::delete('/organizationStructure/{id}','Organization\OrganizationStructureController@destroy');
    // ORGANIZATION STRUCTURE END

    // JOB LEVEL START
    Route::get('/jobLevel','Organization\JobLevelController@index')->name('jobLevel');
    Route::get('/jobLevel/create','Organization\JobLevelController@create');
    Route::post('/jobLevel','Organization\JobLevelController@store');
    Route::get('/jobLevel/{id}','Organization\JobLevelController@show');
    Route::get('/jobLevel/{id}/edit','Organization\JobLevelController@edit');
    Route::put('/jobLevel/{id}','Organization\JobLevelController@update');
    Route::delete('/jobLevel/{id}','Organization\JobLevelController@destroy');
    // JOB LEVEL END

    // POSITION START
    Route::get('/position','Organization\PositionController@index')->name('position');
    Route::get('/position/create','Organization\PositionController@create');
    Route::post('/position','Organization\PositionController@store');
    Route::get('/position/{id}','Organization\PositionController@show');
    Route::get('/position/{id}/edit','Organization\PositionController@edit');
    Route::put('/position/{id}','Organization\PositionController@update');
    Route::delete('/position/{id}','Organization\PositionController@destroy');
    // POSITION END

    // WORK LOCATION START
    Route::get('/workLocation','Organization\WorkLocationController@index')->name('workLocation');
    Route::get('/workLocation/create','Organization\WorkLocationController@create');
    Route::post('/workLocation','Organization\WorkLocationController@store');
    Route::get('/workLocation/{id}','Organization\WorkLocationController@show');
    Route::get('/workLocation/{id}/edit','Organization\WorkLocationController@edit');
    Route::put('/workLocation/{id}','Organization\WorkLocationController@update');
    Route::delete('/workLocation/{id}','Organization\WorkLocationController@destroy');
    // WORK LOCATION END

});

Route::group(['prefix' => 'LeaveAdministration', 'as' => 'Leave.', 'middleware' => ['auth']], function () {

    // LEAVE TYPE SETTING START
    Route::get('/leaveTypeSetting','LeaveAdministration\LeaveTypeSettingController@index')->name('leaveTypeSetting');
    Route::get('/leaveTypeSetting/create','LeaveAdministration\LeaveTypeSettingController@create');
    Route::post('/leaveTypeSetting','LeaveAdministration\LeaveTypeSettingController@store')->name('store_leaveTypeSetting');
    Route::get('/leaveTypeSetting/{id}','LeaveAdministration\LeaveTypeSettingController@show');
    Route::get('/leaveTypeSetting/{id}/edit','LeaveAdministration\LeaveTypeSettingController@edit');
    Route::put('/leaveTypeSetting/{id}','LeaveAdministration\LeaveTypeSettingController@update');
    Route::delete('/leaveTypeSetting/{id}','LeaveAdministration\LeaveTypeSettingController@destroy');
    // LEAVE TYPE SETTING END

    // MASS LEAVE PERIOD START
    Route::get('/massLeavePeriod','LeaveAdministration\MassLeavePeriodController@index')->name('massLeavePeriod');
    Route::get('/massLeavePeriod/create','LeaveAdministration\MassLeavePeriodController@create');
    Route::post('/massLeavePeriod','LeaveAdministration\MassLeavePeriodController@store');
    Route::get('/massLeavePeriod/{id}','LeaveAdministration\MassLeavePeriodController@show');
    Route::get('/massLeavePeriod/{id}/edit','LeaveAdministration\MassLeavePeriodController@edit');
    Route::put('/massLeavePeriod/{id}','LeaveAdministration\MassLeavePeriodController@update');
    Route::delete('/massLeavePeriod/{id}','LeaveAdministration\MassLeavePeriodController@destroy');
    // MASS LEAVE PERIOD END

    // GENERATE ELB START
    Route::get('/generateELB','LeaveAdministration\GenerateELBController@index')->name('generateELB');
    Route::get('/generateELB/create','LeaveAdministration\GenerateELBController@create');
    Route::post('/generateELB','LeaveAdministration\GenerateELBController@store');
    Route::get('/generateELB/{id}','LeaveAdministration\GenerateELBController@show');
    Route::get('/generateELB/{id}/edit','LeaveAdministration\GenerateELBController@edit');
    Route::put('/generateELB/{id}','LeaveAdministration\GenerateELBController@update');
    Route::delete('/generateELB/{id}','LeaveAdministration\GenerateELBController@destroy');
    // GENERATE ELB END

    // EMPLOYEE LEAVE BALANCE START
    Route::get('/employeeLeaveBalance','LeaveAdministration\EmployeeLeaveBalanceController@index')->name('employeeLeaveBalance');
    Route::get('/employeeLeaveBalance/create','LeaveAdministration\EmployeeLeaveBalanceController@create');
    Route::post('/employeeLeaveBalance','LeaveAdministration\EmployeeLeaveBalanceController@store');
    Route::get('/employeeLeaveBalance/{id}','LeaveAdministration\EmployeeLeaveBalanceController@show');
    Route::get('/employeeLeaveBalance/{id}/edit','LeaveAdministration\EmployeeLeaveBalanceController@edit');
    Route::put('/employeeLeaveBalance/{id}','LeaveAdministration\EmployeeLeaveBalanceController@update');
    Route::delete('/employeeLeaveBalance/{id}','LeaveAdministration\EmployeeLeaveBalanceController@destroy');
    // EMPLOYEE LEAVE BALANCE END

    // EMPLOYEE MASS LEAVE START
    Route::get('/employeeMassLeave','LeaveAdministration\EmployeeMassLeaveController@index')->name('employeeMassLeave');
    Route::get('/employeeMassLeave/create','LeaveAdministration\EmployeeMassLeaveController@create');
    Route::post('/employeeMassLeave','LeaveAdministration\EmployeeMassLeaveController@store');
    Route::get('/employeeMassLeave/{id}','LeaveAdministration\EmployeeMassLeaveController@show');
    Route::get('/employeeMassLeave/{id}/edit','LeaveAdministration\EmployeeMassLeaveController@edit');
    Route::put('/employeeMassLeave/{id}','LeaveAdministration\EmployeeMassLeaveController@update');
    Route::delete('/employeeMassLeave/{id}','LeaveAdministration\EmployeeMassLeaveController@destroy');
    // EMPLOYEE MASS LEAVE END

    // LEAVE REQUEST START
    Route::get('/leaveRequest','LeaveAdministration\LeaveRequestController@index')->name('leaveRequest');
    Route::get('/leaveRequest/create','LeaveAdministration\LeaveRequestController@create');
    Route::post('/leaveRequest','LeaveAdministration\LeaveRequestController@store');
    Route::get('/leaveRequest/{id}','LeaveAdministration\LeaveRequestController@show');
    Route::get('/leaveRequest/{id}/edit','LeaveAdministration\LeaveRequestController@edit');
    Route::put('/leaveRequest/{id}','LeaveAdministration\LeaveRequestController@update');
    Route::delete('/leaveRequest/{id}','LeaveAdministration\LeaveRequestController@destroy');
    // LEAVE REQUEST END

    // LEAVE REQUEST HRSS START
    Route::get('/leaveRequestHRSS','LeaveAdministration\LeaveRequestHRSSController@index')->name('leaveRequestHRSS');
    Route::get('/leaveRequestHRSS/create','LeaveAdministration\LeaveRequestHRSSController@create');
    Route::post('/leaveRequestHRSS','LeaveAdministration\LeaveRequestHRSSController@store');
    Route::get('/leaveRequestHRSS/{id}','LeaveAdministration\LeaveRequestHRSSController@show');
    Route::get('/leaveRequestHRSS/{id}/edit','LeaveAdministration\LeaveRequestHRSSController@edit');
    Route::put('/leaveRequestHRSS/{id}','LeaveAdministration\LeaveRequestHRSSController@update');
    Route::delete('/leaveRequestHRSS/{id}','LeaveAdministration\LeaveRequestHRSSController@destroy');
    // LEAVE REQUEST HRSS END

    // CASHOUT LEAVE CALCULATION START
    Route::get('/cashOutLeaveCalculation','LeaveAdministration\CashOutLeaveCalculationController@index')->name('cashOutLeaveCalculation');
    Route::get('/cashOutLeaveCalculation/create','LeaveAdministration\CashOutLeaveCalculationController@create');
    Route::post('/cashOutLeaveCalculation','LeaveAdministration\CashOutLeaveCalculationController@store');
    Route::get('/cashOutLeaveCalculation/{id}','LeaveAdministration\CashOutLeaveCalculationController@show');
    Route::get('/cashOutLeaveCalculation/{id}/edit','LeaveAdministration\CashOutLeaveCalculationController@edit');
    Route::put('/cashOutLeaveCalculation/{id}','LeaveAdministration\CashOutLeaveCalculationController@update');
    Route::delete('/cashOutLeaveCalculation/{id}','LeaveAdministration\CashOutLeaveCalculationController@destroy');
    // CASHOUT LEAVE CALCULATION END

});