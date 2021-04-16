<?php

namespace App\Models;

use App\Http\Controllers\BookController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Author extends Model
{
    
    public static function new()
    {
        return new self;
    }

    public static function orderAuthors($request, $sorting) {
        $authorsFiltered = Author::orderBy($sorting[0], $sorting[1])->paginate(9);
        return $authorsFiltered->appends(['sort' => $request->sort]);
    }

    public function saveAuthor(Request $authorData)
    {

        $file = $authorData->file('author_picture');
        if (!empty($file)) {
            $name = rand(100000000, 999999999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/author'), $name);
            $this->picture = url("/img/author/{$name}");
        }

        $this->name = $authorData->author_name;
        $this->surname = $authorData->author_surname;
        $this->save();
    }
    
    public function getBooks()
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }

    public static function removePicture($picData) {
        $addedLink = url("/img/");
        $imgName = str_replace($addedLink, '', $picData->picture);
        if (file_exists(public_path('img') . '/' . $imgName) && is_file(public_path('img') . '/' . $imgName)) {
            unlink(public_path('img') . '/' . $imgName);
        };
    }

    public function deleteAuthor($author)
    {
        if ($this->getBooks->count() > 0) {
            return redirect()->back()->withErrors("Author $author->name $author->surname cannot be deleted because it has books assigned");
        }
        $this->removePicture($author);
        $this->delete();
    }
}
