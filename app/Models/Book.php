<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    
    public static function new(){
        return new self;
    }
    public static function orderFilter($request,$sorting) {
        $booksFiltered = self::where('author_id', $request->filter_by)->orderBy($sorting[0], $sorting[1])->paginate(9);
        return $booksFiltered->appends(['sort' => $request->sort, 'author_id' => $request->filter_by]);
    }
    public static function filterBooks($request) {
        $booksFiltered = self::where('author_id', $request->filter_by)->paginate(9);
        return $booksFiltered->appends(['author_id' => $request->filter_by]); 
    }
    public static function orderBooks($request, $sorting) {
        $booksFiltered = self::orderBy($sorting[0], $sorting[1])->paginate(9);
        return $booksFiltered->appends(['sort' => $request->sort]);
    }

    public function bookSave($bookData){

        $this->title = $bookData->book_title;
        $this->isbn = $bookData->book_isbn;
        $this->pages = $bookData->book_pages;
        $this->short_description = $bookData->book_description;
        $this->author_id = $bookData->author_id;
        $this->save();        
    }
    
    public function getAuthor(){
        return $this->belongsTo(Author::class,'author_id','id');
    }
}
