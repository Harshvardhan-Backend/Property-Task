<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Resources\AgentResource;

class AgentController extends Controller
{
    /**
     * List all agents with pagination (10 per page)
     */
    public function index()
    {
        $agents = Agent::paginate(10); // Paginate 10 agents per page

        return AgentResource::collection($agents);
    }

    /**
     * Show a single agent by ID
     */
    public function show($id)
    {
        $agent = Agent::find($id);

        if (!$agent) {
            return response()->json([
                'message' => 'Agent not found'
            ], 404);
        }

        return new AgentResource($agent);
    }
}
