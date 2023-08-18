<?php

namespace App\Controllers;

class Contact extends BaseController {

    public function index(): string {

        $data['title'] = 'Contact';

        return view('contact/index', $data);

    }

}