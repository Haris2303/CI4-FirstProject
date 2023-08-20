<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model
{
    protected $table = 'comics';
    protected $primaryKey = 'id_comic';
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'slug', 'author', 'publisher', 'cover'];

    // method find all or find where
    public function getData($slug = false) {
        // if slug is false then return all data,
        // but slug isn't false then return single data
        return ($slug === false) ? $this->findAll() : $this->where(['slug' => $slug])->first();
    }

    public function insertData(array $data): int {
        // initial variabel
        $title      = \htmlspecialchars($data['title']);
        $author     = \htmlspecialchars($data['author']);
        $publisher  = \htmlspecialchars($data['publisher']);
        $cover      = \htmlspecialchars($data['cover']);
        $slug       = \url_title($title, '-', true);

        // insert data
        $save = $this->save([
            "title" => $title,
            "slug" => $slug,
            "author" => $author,
            "publisher" => $publisher,
            "cover" => $cover
        ]);

        return ($save) ? 1 : 0;
    }

    public function updateData(array $data): int {
        // initial variabel
        $title      = \htmlspecialchars($data['title']);
        $author     = \htmlspecialchars($data['author']);
        $publisher  = \htmlspecialchars($data['publisher']);
        $cover      = \htmlspecialchars($data['cover']);
        $slug       = \url_title($title, '-', true);

        // insert data
        $save = $this->save([
            "id_comic" => $data['id'],
            "title" => $title,
            "slug" => $slug,
            "author" => $author,
            "publisher" => $publisher,
            "cover" => $cover
        ]);

        return ($save) ? 1 : 0;
    }
}
