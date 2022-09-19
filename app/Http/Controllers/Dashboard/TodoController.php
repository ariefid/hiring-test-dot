<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\TodoState;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreTodoRequest;
use App\Http\Requests\Dashboard\UpdateTodoRequest;
use App\Models\Todo;
use App\Models\User;

class TodoController extends Controller
{
    /**
     * Display a listing of the todos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $title = 'Todo Application';
        $todos = Todo::query()->whereUserId(auth()->user()->id)->cursorPaginate();

        return response()->view('dashboard.todos.index', compact('title', 'todos'));
    }

    /**
     * Show the form for creating a new todo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): \Illuminate\Http\Response
    {
        $title = 'Create Todo';
        $todoState = TodoState::cases();

        return response()->view('dashboard.todos.create', compact('title', 'todoState'));
    }

    /**
     * Store a newly created todo in storage.
     *
     * @param  StoreTodoRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTodoRequest $request): \Illuminate\Http\RedirectResponse
    {
        $todo = User::find($request->user()->id);

        $todo->todos()->create($request->only([
            'name',
            'description',
            'is_private',
            'state',
        ]));

        return redirect()->back()->with(['successMessage' => 'Todo has been created.']);
    }

    /**
     * Display the specified todo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): \Illuminate\Http\Response
    {
        $todo = Todo::query()->whereUserId(auth()->user()->id)->whereUuid($id)->firstOrFail();
        $title = 'Show Todo : '.$todo->title;

        return response()->view('dashboard.todos.show', compact('todo', 'title'));
    }

    /**
     * Show the form for editing the specified todo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): \Illuminate\Http\Response
    {
        $todo = Todo::query()->whereUserId(auth()->user()->id)->whereUuid($id)->firstOrFail();

        $title = 'Edit Todo : '.$todo->title;

        $todoState = TodoState::cases();

        return response()->view('dashboard.todos.edit', compact('todo', 'title', 'todoState'));
    }

    /**
     * Update the specified todo in storage.
     *
     * @param  UpdateTodoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTodoRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $todo = Todo::query()->whereUserId($request->user()->id)->whereUuid($id)->firstOrFail();

        $todo->update($request->only([
            'name',
            'description',
            'is_private',
            'state',
        ]));

        return redirect()->back()->with(['successMessage' => 'Todo has been updated.']);
    }

    /**
     * Remove the specified todo from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $todo = Todo::query()->whereUserId(auth()->user()->id)->whereUuid($id)->firstOrFail();

        $todo->delete();

        return redirect()->back()->with(['successMessage' => 'Todo has been deleted.']);
    }
}
