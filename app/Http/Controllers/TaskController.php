<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
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
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
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
        $request->validate([
            'project_id' => 'required',
        ]);

        $task = new Task($request->all());
        $task->save();

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        return view('tasks.update', [
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
        $request->validate([
            'project_id' => 'required',
        ]);

        $request->request->remove("_token");

        $task->update($request->all());

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
     * @param $search
     * @return \Illuminate\Http\JsonResponse
     */
    public function projects(Request $request) {
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
}
