<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\ContactsFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreContactRequest;
use App\Http\Requests\V1\UpdateContactRequest;
use App\Http\Resources\V1\ContactCollection;
use App\Http\Resources\V1\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ContactsFilter();
        $queryItems = $filter->transform($request);

        $includeMemories = $request->query('includeMemories');

        $customers = Contact::where($queryItems);

        if ($includeMemories) {
            $customers = $customers->with('memories');
        }

        return new ContactCollection($customers->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        return new ContactResource(Contact::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        $includeMemories = request()->query('includeMemories');

        if ($includeMemories) {
            return new ContactResource($contact->loadMissing('memories'));
        }

        return new ContactResource($contact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $contact->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
