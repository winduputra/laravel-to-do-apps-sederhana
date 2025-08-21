<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Todo::query();
        
        // Pencarian
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        // Filter berdasarkan kategori
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
        
        // Filter berdasarkan status
        if ($request->has('status')) {
            if ($request->status === 'completed') {
                $query->where('completed', true);
            } elseif ($request->status === 'pending') {
                $query->where('completed', false);
            }
        }
        
        // Pengurutan
        $sortField = $request->sort ?? 'created_at';
        $sortDirection = $request->direction ?? 'desc';
        
        $allowedSorts = ['title', 'created_at', 'deadline', 'category'];
        if (in_array($sortField, $allowedSorts)) {
            $query->orderBy($sortField, $sortDirection);
        } else {
            $query->latest();
        }
        
        $todos = $query->get();
        
        // Daftar kategori untuk filter
        $categories = Todo::distinct()->pluck('category')->filter()->toArray();
        
        return view('todos.index', compact('todos', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => false,
        ]);

        return redirect()->route('todos.index')->with('success', 'Tugas berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed'),
        ]);

        return redirect()->route('todos.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Tugas berhasil dihapus!');
    }
}
