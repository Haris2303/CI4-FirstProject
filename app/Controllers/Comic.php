<?php

namespace App\Controllers;

class Comic extends BaseController {

    protected $comicModel;
    
    public function __construct()
    {
        $this->comicModel = new \App\Models\ComicModel();
    }

    public function index(): string
    {
        $data['title'] = 'Comics';
        $data['comics'] = $this->comicModel->findAll();

        return view('comic/index', $data);
    }

    public function detail($slug): string {
        $data['title'] = "Detail Comic";
        $data['comic'] = $this->comicModel->getData($slug);
        return view('comic/detail', $data);
    }

}