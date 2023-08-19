<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model
{
    protected $table = 'comics';
    protected $primaryKey = 'id_comic';
    protected $useTimestamps = true;

    // method find all or find where
    public function getData($slug = false) {
        // if slug is false then return all data,
        // but slug isn't false then return single data
        return ($slug === false) ? $this->findAll() : $this->where(['slug' => $slug])->first();
    }
}
