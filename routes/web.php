<?php
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// routes/web.php

Route::get('/', 'FeedbackController@index')->name('feedback.index');
Route::get('feedback/create', 'FeedbackController@create')->name('feedback.create')->middleware('auth');
Route::post('feedback', 'FeedbackController@store')->name('feedback.store')->middleware('auth');
Route::post('feedback/{feedbackId}/comments', 'CommentController@store')->name('comments.store')->middleware('auth');
Route::post('/feedbacks/{id}/vote', [FeedbackController::class, 'vote'])->name('feedbacks.vote')->middleware('auth');
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::delete('users/{id}', 'AdminController@destroyUser')->name('admin.destroy_user');
    Route::delete('feedback/{id}', 'AdminController@destroyFeedback')->name('admin.destroy_feedback');
    Route::post('comments/{commentId}/toggle', 'AdminController@toggleCommentStatus')->name('admin.toggle_comment_status');
    Route::patch('/admin/feedbacks/{id}/enable-comments', 'AdminController@enableFeedbackComments')->name('admin.feedback.enable-comments');
    Route::patch('/admin/feedbacks/{id}/disable-comments', 'AdminController@disableFeedbackComments')->name('admin.feedback.disable-comments');
   
});

Auth::routes();

