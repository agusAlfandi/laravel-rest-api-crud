<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\createTodo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return response()->json([
            'message' => 'Get todo successfully',
            'data' => $todos
        ], 200);
    }

    public function detail($id)
    {
        $todo = Todo::findOrFail($id);

        return response()->json([
            'message' => 'Success get data todo by id',
            'data' => $todo
        ]);
    }

    public function store(createTodo $request)
    {
        $validated = $request->validated();
        $todo = Todo::create($validated);
        $todo->refresh();

        return response()->json([
            'message' => 'Todo created successfully',
            'data' => $todo
        ], 201);
    }

    public function update(createTodo $request, $id)
    {
        $validated = $request->validated();
        $Todo = Todo::findOrFail($id);
        $Todo->update($validated);

        return response()->json([
            'message' => 'Update todo successfully',
            'data' => $Todo
        ], 200);
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return response()->json([
            'message' => 'Delete todo successfully',
            'data' => $todo
        ], 200);
    }
}
