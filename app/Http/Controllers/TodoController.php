<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\createTodo;
use App\Http\Resources\TodoResource;

class TodoController extends Controller
{
    public function index()
    {
        return TodoResource::collection(Todo::all());
    }

    public function detail($id)
    {
        return new TodoResource(Todo::findOrFail($id));
    }

    public function store(createTodo $request)
    {
        $validated = $request->validated();
        $todo = Todo::create($validated);
        $todo->refresh();

        return response()->json([
            'message' => 'Todo created successfully',
            'data' => new TodoResource($todo)
        ], 201);
    }

    public function update(createTodo $request, $id)
    {
        $validated = $request->validated();
        $Todo = Todo::findOrFail($id);
        $Todo->update($validated);

        return response()->json([
            'message' => 'Update todo successfully',
            'data' => new TodoResource($Todo)
        ], 200);
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return response()->json([
            'message' => 'Delete todo successfully',
        ], 200);
    }
}
