<?php

namespace App\Controllers;

class Comic extends BaseController {

    public function index(): string
    {
        $data['title'] = 'Comics';

        return view('comic/index', $data);
    }

}