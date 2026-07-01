<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Memory;
use App\Filters\V1\MemoriesFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreMemoryRequest;
use App\Http\Requests\V1\UpdateMemoryRequest;
use App\Http\Resources\V1\MemoryCollection;
use App\Http\Resources\V1\MemoryResource;
use Illuminate\Http\Request;

class MemoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new MemoriesFilter();
        $queryItems = $filter->transform($request);

        $customers = Memory::where($queryItems);

        return new MemoryCollection($customers->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemoryRequest $request)
    {
        return new MemoryResource(Memory::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Memory $memory)
    {
        return new MemoryResource($memory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemoryRequest $request, Memory $memory)
    {
        $memory->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Memory $memory)
    {
        //
    }
}
