<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\User;
use App\Project;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ArticlesController extends Controller {
 

	public function __construct()
	{
		$this->middleware('auth');
	}

	protected $rules = [
		'title' => ['required', 'min:3'],
		'slug' => ['required'],
		'body' => ['required'],
	];

	/**
	 * Display a listing of the resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function index(User $user, Project $project)
	{
		return view('articles.index', compact('user', 'project'));
	}
 
	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function create(USer $user, Project $project)
	{
		return view('articles.create', compact('user', 'project'));
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
		Article::create( $input );
	
		return Redirect::route('users.projects.show', [$user->username, $project->slug])->with('message', 'Entry created.');
	}
 
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Article    $article
	 * @return Response
	 */
	public function show(User $user, Project $project, Article $article)
	{
		return view('articles.show', compact('user', 'project', 'article'));
	}
 
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Article    $article
	 * @return Response
	 */
	public function edit(User $user, Project $project, Article $article)
	{
		return view('articles.edit', compact('user', 'project', 'article'));
	}
 
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Article    $article
	 * @return Response
	 */
	public function update(User $user, Project $project, Article $article, Request $request)
	{
		$this->validate($request, $this->rules);

		$input = array_except(Input::all(), '_method');
		$article->update($input);
	
		return Redirect::route('users.projects.articles.show', [$user->username, $project->slug, $article->slug])->with('message', 'Entry updated.');
	}
 
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Article    $article
	 * @return Response
	 */
	public function destroy(User $user, Project $project, Article $article)
	{
		$article->delete();
	
		return Redirect::route('users.projects.show', [\Auth::user()->username, $project->slug])->with('message', 'Entry deleted.');
	}
 
}
