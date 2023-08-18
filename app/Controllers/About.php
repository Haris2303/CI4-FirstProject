<?php

namespace App\Controllers;

class About extends BaseController {

    public function index(): string {
        
        $data['title'] = 'About';
        
        return view('about/index', $data);
    }

}