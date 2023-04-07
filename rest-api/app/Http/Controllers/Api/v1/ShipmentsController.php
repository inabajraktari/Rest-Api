<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Shipments;
use App\Http\Requests\UpdateShipmentsRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ShipmentsResource;
use App\Http\Resources\v1\ShipmentsCollection;
use App\Filters\v1\ShipmentsFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Requests\StoreShipmentsRequest;
use App\Http\Requests\BulkStoreShipmentsRequest;




class ShipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ShipmentsFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new ShipmentsCollection(Shipments::paginate());
        } else {
            $shipments = Shipments::where($queryItems)->paginate();
            return new ShipmentsCollection($shipments->appendds($request->query()));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    public function bulkStore(BulkStoreShipmentsRequest $request) {
        $bulk = collect($request->all())->map(function($arr, $key){
            return Arr::except($arr, ['agentsId', 'status', 'type']);
        });

        Shipments::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipments $shipments)
    {
        return new ShipmentsResource($shipments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipments $shipments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShipmentsRequest $request, Shipments $shipments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipments $shipments)
    {
        //
    }
}
