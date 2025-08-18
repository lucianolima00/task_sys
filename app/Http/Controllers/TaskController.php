<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('tasks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $task = new Task();

        return view('tasks.create', [
            'task' => $task
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'priority' => ['required', 'integer', 'min:0'],
        ]);

        $task = Task::create($validated);
        $task->save();

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'priority' => ['required', 'integer', 'min:0'], // must be number >= 0
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function data(Request $request): JsonResponse
    {
        $query = Task::with('project')->select('name','priority','project_id','created_at');

        if ($request->has('project_id') && $request->project_id != '') {
            $query->where('project_id', $request->project_id);
        }

        $tasks = $query->get()->map(function ($task) {
            return [
                'name' => $task->name,
                'priority' => $task->priority,
                'project' => $task->project ? $task->project->name : '-',
                'created_at' => $task->created_at->format('Y-m-d H:i:s')
            ];
        });

        return response()->json($tasks);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function projects(Request $request): JsonResponse
    {
        $data = [];

        if ($request->search) {
            $items = Project::orderby("name","asc")
                ->select('id','name')
                ->where('name', 'ilike', '%' . $request->search . '%')
                ->get();
        } else {
            $items = Project::orderby("name","asc")->get();
        }

        foreach ($items as $item) {
            $data[] = [
                'id' => $item->id, 'text' => $item->name
            ];
        }

        return response()->json($data);

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function reorder(Request $request): JsonResponse
    {
        foreach ($request->updates as $update) {
            \App\Models\Task::where('id', $update['id'])
                ->update(['priority' => $update['priority']]);
        }

        return response()->json(['success' => true]);
    }
}
