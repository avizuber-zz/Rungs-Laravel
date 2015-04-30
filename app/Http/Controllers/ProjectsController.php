<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\User;
use App\Project;
use App\Http\Requests;
use App\Http\Requests\ProjectRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ProjectsController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}


	protected $rules = [
		'name' => ['required', 'min:3'],
		'days' => ['required'],
		'slug' => ['required'],
	];


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$projects = Project::owned()->get();

		foreach ($projects as $key => $loop)
		{
			$loop->rightNow = Carbon::now()->diffInDays(new Carbon($loop->endDay));
		}

		return view('projects.index', compact('projects'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ProjectRequest $request)
	{
		$this->validate($request, $this->rules);

		$this->createProject($request);
	 
		return Redirect::route('users.projects.index', \Auth::user()->username)->with('message', 'Project created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(User $user, Project $project)
	{

		$rightNow = Carbon::now()->diffInDays($project->endDay);

		return view('projects.show', compact('user', 'project', 'rightNow'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(User $user, Project $project)
	{
		return view('projects.edit', compact('project'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(User $user, Project $project, ProjectRequest $request)
	{
		$this->validate($request, $this->rules);

		$input = array_except(Input::all(), '_method');
		$project->update($input);
	
		return Redirect::route('users.projects.show', [\Auth::user()->username, $project->slug])->with('message', 'Project updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(User $user, Project $project)
	{
		$project->delete();

		return Redirect::route('users.projects.index', \Auth::user()->username)->with('message', 'Project deleted.');
	}

	private function createProject(ProjectRequest $request) {

		$project = new Project($request->all());

		\Auth::user()->projects()->save($project);

		return $project;

	}

}
