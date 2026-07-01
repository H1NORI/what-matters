<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\FactsFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreFactRequest;
use App\Http\Requests\V1\UpdateFactRequest;
use App\Http\Resources\V1\FactCollection;
use App\Http\Resources\V1\FactResource;
use App\Models\Fact;
use Illuminate\Http\Request;

class FactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new FactsFilter();
        $queryItems = $filter->transform($request);

        $facts = Fact::where($queryItems);

        return new FactCollection($facts->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFactRequest $request)
    {
        return new FactResource(Fact::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Fact $fact)
    {
        return new FactResource($fact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFactRequest $request, Fact $fact)
    {
        $fact->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fact $fact)
    {
        //
    }
}
