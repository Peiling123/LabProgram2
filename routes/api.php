<?php

use App\Http\Controllers\YyhController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SxqController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('YyhAdminLogin',[YyhController::class,'YyhAdminLogin']);//登录管理员
Route::post('YyhUserregisters',[YyhController::class,'YyhUserregisters']);//登录管理员
Route::post('OssUpdate',[YyhController::class,'OssUpdate']);//上传视频
Route::post('YyhAdminregister',[YyhController::class,'YyhAdminregister']);//登录管理员
Route::middleware('jwt.role:admins')->prefix('admin')->group(function () {
    Route::post('logoutUser',[YyhController::class,'logoutUser']);//登出用户
});
//Route::post('admin/innovationStar', [SxqController::class, 'innovationStar']);

Route::post('/approve-innovation-star', [SxqController::class, 'approveInnovationStar']);

Route::post('admin/approveInnovationStar', [SxqController::class, 'approveInnovationStar']);


Route::post('admin/innovationStar', [SxqController::class, 'innovationStar']);



Route::post('/approve-innovation-star', [SxqController::class, 'approveInnovationStar']);
Route::post('/user/addInnovationStar', [SxqController::class, 'addInnovationStar']);
Route::post('/add-innovation-star', [\App\Http\Controllers\SxqController::class, 'addInnovationStar']);

use Illuminate\Support\Facades\DB;

Route::post('/user/addInnovationStar', [SxqController::class, 'useraddInnovationStar']);
Route::get('/test-database', function () {
    try {
        $results = DB::select('select * from innovation_star_registrations');
        dd($results);
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
});




