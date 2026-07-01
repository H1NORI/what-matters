<?php

use App\Ai\Agents\MemoryAnalysisAgent;
use App\Http\Controllers\Api\V1\ContactController;
use App\Http\Controllers\Api\V1\FactController;
use App\Http\Controllers\Api\V1\MemoryController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Laravel\Ai\Responses\AgentResponse;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// Route::post('ai', function () {
//     (new MemoryAnalysisAgent)
//         ->queue('She really wanted to taste thac cake called Whoopie Pie, she told me that whan she was younger she ate it a lot. Also she mentioned that she is a fan of Celtics and Lakers')
//         ->then(function (AgentResponse $response) {
            
//         })
//         ->catch(function (Throwable $e) {});

//     return true;
// });

// Route::post('ai', function () {
//     $response = (new MemoryAnalysisAgent)
//         ->prompt('She really wanted to taste thac cake called Whoopie Pie, she told me that whan she was younger she ate it a lot. Also she mentioned that she is a fan of Celtics and Lakers');

//     return $response;
// });

Route::prefix('v1')->group(function () {

    Route::apiResource('contacts', ContactController::class);

    Route::apiResource('memories', MemoryController::class);

    Route::apiResource('facts', FactController::class);
});
