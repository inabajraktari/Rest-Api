<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Agents;
use App\Http\Requests\ShipmentsAgentsRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\AgentsResource;
use App\Http\Resources\v1\AgentsCollection;
use Illuminate\Http\Request;
use App\Filters\v1\AgentsFilter;
use App\Http\Requests\v1\StoreAgentsRequest;
use App\Http\Requests\v1\UpdateAgentsRequest;


class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new AgentsFilter();
        $filterItems = $filter->transform($request);

        $includeShipments = $request->query('includeShipments');

        $agents = Agents::where($filterItems);
        
        if($includeShipments){
            $agents = $agents->with('shipments');
        }
            return new AgentsCollection($agents->paginate()->appendds($request->query()));

    }

    /**
     * Show the form for creating a new resource.
     */
   
    public function store(StoreAgentsRequest $request)
    {
        return new AgentsResource(Agents::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Agents $agents)
    {
        $includeShipments = request()->query('includeShipments');
        if($includeShipments){
            return new AgentsResource($agents->loadMissing('shipments'));
        }
        return new AgentsResource($agents);
    }

    /**
     * Show the form for editing the specified resource.
     */
   
    public function update(UpdateAgentsRequest $request, Agents $agents)
    {
        $agents->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agents $agents)
    {
        //
    }
}
