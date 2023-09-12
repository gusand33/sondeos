<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Books\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books=Books::where("is_active", true)->orderBy("id","DESC")->paginate(20);
        return response()->json($books);
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

            return response()->json(['status'=>true, 'message' => 'El Libro se creo Correctamente'], 201);

        }catch(\Exception $e){
            return response()->json(['status'=>false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book=Books::with('gender')->findOrFail($id);
        return response()->json($book);
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

            return response()->json(['status'=>true,'message' => 'El Libro Edito Correctamente'], 200);
        }catch(\Exception $e){
            return response()->json(['status'=>false, 'message' => $e->getMessage()], 500);
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

            return response()->json(['status'=>true,'message' => 'El Libro se elimino Correctamente'], 200);
        }catch(\Exception $e){
            return response()->json(['status'=>false,'message' => $e->getMessage()], 500);
        }
    }
    
}
