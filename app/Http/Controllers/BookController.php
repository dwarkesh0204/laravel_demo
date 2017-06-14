<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use Validator;
use Illuminate\Support\Facades\DB;
use Session;

class BookController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// $authors = DB::table('authors')->get();
		$books        = Book::all();
		$authors      = Author::all(['id', 'author_name'])->toArray();
		$authorsArray = Author::getAuthorsArray($authors);

		return view('books.list')->with(compact('books', 'authorsArray'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$authors      = Author::all(['id', 'author_name'])->toArray();
		$authorsArray = Author::getAuthorsArray($authors);

		return view('books.create')->with(compact('authorsArray'));
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
			'book_name'  => 'required',
			'book_price' => 'required',
		]);

		if ($validator->fails()) {
			echo "string";die;
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
			$book = Book::create($data);

			Session::flash('flash_message', 'Book has been successfully saved.');
			Session::flash('alert-class', 'alert-success');

			if ($task == 'save') {
				return redirect()->back();
			}
			elseif ($task == 'saveclose') {
				return redirect('admin/book');
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
		$book   = Book::findOrFail($id);
		$author = Book::find($id)->author;

		return view('books.show')->with(compact('book', 'author'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$book         = Book::findOrFail($id);
		$authors      = Author::all(['id', 'author_name'])->toArray();
		$authorsArray = Author::getAuthorsArray($authors);

		return view('books.edit')->with(compact('book', 'authorsArray'));
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
		$book = Book::findOrFail($id);

		$data = $request->except(['_token']);
		$task = $request->get('task');
		$data = $request->except(['_token', 'task']);

		$validator = Validator::make($data, [
			'book_name'  => 'required',
			'book_price' => 'required',
		]);

		$book->fill($data)->save();
		Session::flash('flash_message', 'Book successfully updated.');
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
		$book = Book::findOrFail($id);
		$book->delete();
		Session::flash('flash_message', 'Book successfully deleted!');
		Session::flash('alert-class', 'alert-success');

		//return redirect()->route('authors.index')->with('Success', 'Book successfully deleted!');
		return redirect()->back();
	}
}
