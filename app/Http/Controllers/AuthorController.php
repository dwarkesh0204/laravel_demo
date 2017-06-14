<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Session;

class AuthorController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// $authors = DB::table('authors')->get();
		$authors = Author::all();
		return view('authors.list')->with(compact('authors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('authors.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$data = $request->except(['_token']);
		$task = $request->get('task');
		$data = $request->except(['_token', 'task']);

		$validator = Validator::make($data, [
			'author_name' => 'required',
			'email'       => 'required|unique:authors,email',
		]);

		if ($validator->fails()) {
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}
		else{
			/*$data = [
				'author_name' => $request->get('name'),
				'description' => $request->get('description'),
				'status'      => $request->get('status'),
				'email'       => $request->get('email')
			];*/
			$author = Author::create($data);

			Session::flash('flash_message', 'Author has been successfully saved.');
			Session::flash('alert-class', 'alert-success');

			if ($task == 'save') {
				return redirect()->back();
			}
			elseif ($task == 'saveclose') {
				return redirect('admin/author');
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$author = Author::findOrFail($id);
		$books  = Author::find($id)->books;

		// return view('authors.show')->withTask($author);
		return view('authors.show')->with(compact('author', 'books'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$author = Author::findOrFail($id);

		return view('authors.edit')->with(compact('author'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$author = Author::findOrFail($id);

		$data = $request->except(['_token']);
		$task = $request->get('task');
		$data = $request->except(['_token', 'task']);

		$validator = Validator::make($data, [
			'author_name' => 'required',
			'email'       => 'required|unique:authors,email',
		]);

		$author->fill($data)->save();
		Session::flash('flash_message', 'Author successfully updated.');
		Session::flash('alert-class', 'alert-success');

		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$author = Author::findOrFail($id);
		$author->delete();
		Session::flash('flash_message', 'Author successfully deleted!');
		Session::flash('alert-class', 'alert-success');

		//return redirect()->route('authors.index')->with('Success', 'Author successfully deleted!');
		return redirect()->back();
	}
}
