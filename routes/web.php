<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


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
    return view('index');
});

Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');


Route::get('/nilai-siswa', function () {
    return view('nilai-siswa');
});

Route::post('/hitung-grade', function (Request $request) {
    $mahasiswa = $request->mahasiswa;
    $grades = [];

    foreach ($mahasiswa as $data) {
        $quiz = isset($data['quiz']) ? $data['quiz'] : 0;
        $assignment = isset($data['assignment']) ? $data['assignment'] : 0;
        $attendance = isset($data['attendance']) ? $data['attendance'] : 0;
        $practice = isset($data['practice']) ? $data['practice'] : 0;
        $final_exam = isset($data['final_exam']) ? $data['final_exam'] : 0;
    
        $average = ($quiz + $assignment + $attendance + $practice + $final_exam) / 5;
    
        if ($average <= 65) {
            $grade = 'D';
        } elseif ($average <= 75) {
            $grade = 'C';
        } elseif ($average <= 85) {
            $grade = 'B';
        } else {
            $grade = 'A';
        }
    
        $grades[] = [
            'nama' => $data['nama'],
            'nilai' => $average,
            'grade' => $grade,
            'quiz' => $quiz,
            'assignment' => $assignment,
            'attendance' => $attendance,
            'practice' => $practice,
            'final_exam' => $final_exam,
            
        ];
    }
    

    return view('hasil-grade')->with('grades', $grades);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
