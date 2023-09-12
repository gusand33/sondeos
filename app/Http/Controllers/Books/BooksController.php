<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Books\Books;
use App\Models\Books\BooksGender;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:books-listado', ['only' => ['index']]);
        $this->middleware('permission:books-ver', ['only' => ['show']]);
        $this->middleware('permission:books-crear', ['only' => ['create']]);
        $this->middleware('permission:books-editar', ['only' => ['edit']]);
        $this->middleware('permission:books-deshabilitar', ['only' => ['destroy']]);
    }
  
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $books=Books::where("is_active", true)->orderBy("id","DESC")->paginate(10);

       return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genders=BooksGender::pluck('name', 'id');

        return view('books.create', compact('genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'price' => 'numeric|min:0',
                'publication_date' => 'required|date',
                'gender_id'=>'required'
            ]);

            $book=Books::create($request->all());

            return redirect()->route('books.index')->with('success', 'El Libro se creo Correctamente');

        }catch(\Exception $e){
            return redirect()->route('books.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book=Books::findOrFail($id);
        $genders=BooksGender::pluck('name', 'id');
        return view('books.show', compact('book','genders'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book=Books::findOrFail($id);
        $genders=BooksGender::pluck('name', 'id');
        return view('books.edit', compact('book', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'price' => 'numeric|min:0',
                'publication_date' => 'required|date',
                'gender_id'=>'required'
            ]);

            $book=Books::findOrFail($id);
            $book->update($request->all());

            return redirect()->route('books.index')->with('success', 'El Libro Edito Correctamente');

        }catch(\Exception $e){
            return redirect()->route('books.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $book=Books::findOrFail($id);
            $book->is_active=false;
            $book->save();

            return redirect()->route('books.index')->with('success', 'El Libro se elimino Correctamente');
    }catch(\Exception $e){
            return redirect()->route('books.index')->with('error', $e->getMessage());
        }
    }
}
