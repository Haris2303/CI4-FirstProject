<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class Comic extends BaseController
{
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

    public function detail($slug): string
    {
        $data['title'] = "Detail Comic";
        $data['comic'] = $this->comicModel->getData($slug);
        return view('comic/detail', $data);
    }

    public function create(): string
    {
        $data = [
            "title" => "Tambah Data",
            "validation" => \Config\Services::validation()
        ];

        return view('/comic/create', $data);
    }

    //____________________________________________________________________________________________

    public function insert(): RedirectResponse
    {
        $data = $this->request->getPost();
        $validation = \Config\Services::validation();

        // check validation
        if (!$this->validate([
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
        \session()->setFlashdata('flash', 'Data berhasil ditambahkan');

        return redirect()->to('comics');
    }

    public function update($slug): string
    {
        $data = [
            'title' => "Ubah Data Comic",
            'comic' => $this->comicModel->getData($slug)
        ];

        return view('comic/update', $data);
    }

    public function delete($id): RedirectResponse
    {
        $this->comicModel->delete($id);
        \session()->setFlashdata('flash', 'Data berhasil dihapus');
        return \redirect()->to('/comics');
    }

    public function change(): RedirectResponse
    {
        $data = $this->request->getPost();
        $validation = \Config\Services::validation();

        // rules title
        $rowTitle = $this->comicModel->getData($data['slug'])['title'];
        $rulesTitle = ($data['title'] === $rowTitle) ? 'required' : 'required|is_unique[comics.title]';

        // check validation
        if (!$this->validate([
            'title' => [
                'rules' => $rulesTitle,
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

        $this->comicModel->updateData($data);
        \session()->setFlashdata('flash', 'Data berhasil diubah');

        return redirect()->to('/comics');
    }
}
