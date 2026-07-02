<?php

namespace App\Services;

use App\Ai\Agents\MemoryAnalysisAgent;
use App\Http\Resources\V1\MemoryResource;
use App\Models\Fact;
use App\Models\Memory;

class MemoryAnalysisService
{

    public static function analyzeAsync(Memory $memory)
    {
        (new MemoryAnalysisAgent)
            ->queue($memory->content)
            ->then(function ($response) use ($memory) {
                if (isset($response['facts'])) {
                    foreach ($response['facts'] as $fact) {

                        Fact::create([
                            'memory_id' => $memory->id,
                            'type' => $fact['type'],
                            'attribute' => $fact['attribute'],
                            'value' => $fact['value'],
                        ]);
                    }
                }
            })
            ->catch(function ($e) use ($memory) {
                logger()->error('Memory analysis with AI failed', [
                    'memory' => new MemoryResource($memory),
                    'error' => $e->getMessage(),
                ]);
            });
    }
}
