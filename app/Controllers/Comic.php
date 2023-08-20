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

    public function create(): string {
        $data = [
            "title" => "Tambah Data",
            "validation" => \Config\Services::validation()
        ];

        return view('comic/create', $data);
    }

    //____________________________________________________________________________________________

    public function insert() {
        $data = $this->request->getPost();
        $validation = \Config\Services::validation();
        
        // check validation
        if(!$this->validate([
            'title' => [
                'rules' => 'required|is_unique[comics.title]',
                'errors' => [
                    'required' => 'Kolom judul wajib diisi.',
                    'is_unique' => 'Judul sudah terdaftar.'
                ]
            ],
            'author' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom penulis wajib diisi.'
                ]
            ],
            'publisher' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom penerbit wajib diisi.'
                ]
            ]
        ])) {
            return \redirect()->to('comic/create')->withInput()->with('validation', $validation);
        }

        $this->comicModel->insertData($data);
        return redirect()->to('/comics');
        
    }

}