<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    // GET /api/agents
    public function index()
    {
        $agents = Agent::paginate(10);

        return response()->json([
            'message' => 'Agents fetched successfully',
            'data' => $agents
        ]);
    }
    public function create()
    {
        return view('create-agent');
    }

    // GET /api/agents/{id}
    public function show($id)
    {
        $agent = Agent::with('properties')->find($id);

        if (!$agent) {
            return response()->json([
                'message' => 'Agent not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Agent fetched successfully',
            'data' => $agent
        ]);
    }

    // POST /api/agents
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:agents,email',
            'phone' => 'required|string|max:20'
        ]);

        $agent = Agent::create($validated);
        if($request->wantsJson()){
        return response()->json([
            'message' => 'Agent created successfully',
            'data' => $agent
        ], 201);
    }
    return redirect()->back()->with('success', 'Agent created successfully!');
    }
}
