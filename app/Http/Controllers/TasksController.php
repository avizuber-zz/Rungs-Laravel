<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\User;
use App\Project;
use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TasksController extends Controller {
 

	public function __construct()
	{
		$this->middleware('auth');
	}

	protected $rules = [
		'name' => ['required', 'min:3'],
		'slug' => ['required'],
		'description' => ['required'],
	];

	/**
	 * Display a listing of the resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function index(User $user, Project $project)
	{
		return view('tasks.index', compact('user', 'project'));
	}
 
	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function create(USer $user, Project $project)
	{
		return view('tasks.create', compact('user', 'project'));
	}
 
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function store(User $user, Project $project, Request $request)
	{
		$this->validate($request, $this->rules);

		$input = Input::all();
		$input['project_id'] = $project->id;
		Task::create( $input );
	
		return Redirect::route('users.projects.show', [$user->username, $project->slug])->with('message', 'Task created.');
	}
 
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
	public function show(User $user, Project $project, Task $task)
	{
		return view('tasks.show', compact('user', 'project', 'task'));
	}
 
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
	public function edit(User $user, Project $project, Task $task)
	{
		return view('tasks.edit', compact('user', 'project', 'task'));
	}
 
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
	public function update(User $user, Project $project, Task $task, Request $request)
	{
		$this->validate($request, $this->rules);

		$input = array_except(Input::all(), '_method');
		$task->update($input);
	
		return Redirect::route('users.projects.tasks.show', [$user->username, $project->slug, $task->slug])->with('message', 'Task updated.');
	}
 
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
	public function destroy(User $user, Project $project, Task $task)
	{
		$task->delete();
	
		return Redirect::route('users.projects.show', [\Auth::user()->username, $project->slug])->with('message', 'Task deleted.');
	}
 
}
