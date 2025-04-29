<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Resources\PropertyResource;

class PropertyController extends Controller
{
    // List all properties with pagination, sorting, filtering
    public function index(Request $request)
    {
        $query = Property::query();

        // Filter by agent_id if provided
        if ($request->has('agent_id')) {
            $query->where('agent_id', $request->agent_id);
        }

        // Sort by price if provided
        if ($request->sort == 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort == 'price_desc') {
            $query->orderBy('price', 'desc');
        }

        // Paginate results (10 per page)
        $properties = $query->paginate(10);

        return PropertyResource::collection($properties);
    }

    // View a single property by ID
    public function show($id)
    {
        $property = Property::find($id);

        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        return new PropertyResource($property);
    }

    // Create a new property
    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image_urls' => 'nullable',
            'agent_id' => 'required|exists:agents,id',
        ]);

        $property = Property::create($validated);

        return new PropertyResource($property);
    }
}
