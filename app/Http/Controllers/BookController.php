<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookDestroyRequest;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Book[]|Collection
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookStoreRequest $request
     * @return Builder|Model
     */
    public function store(BookStoreRequest $request)
    {
        return Book::query()->create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Builder|Builder[]|Collection|Model
     */
    public function show(int $id)
    {
        return Book::query()->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BookUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(BookUpdateRequest $request, int $id)
    {
        $book = Book::query()->findOrFail($id);
        $book->fill($request->except(['book_id']));
        $book->save();

        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BookDestroyRequest $request
     * @param int $id
     * @return Response
     * @throws \Exception
     */
    public function destroy(BookDestroyRequest $request, int $id)
    {
        $book = Book::query()->findOrFail($id);

        if($book->delete()) {
            return response(null, 204);
        }
    }
}
