<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [
        'title' => 'Apex-MVC',
        'description' => 'A professional social network platform developed by Aseel Al-Suwaidi and the creative team: Amjad Sadiq, Hossam Mustafa, Aboudi Al-Obaidi, and Ahmed Abdullah.'
    ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
    'title' => 'About Us',
    'description' => 'Apex-MVC is a sophisticated framework developed by Aseel Al-Suwaidi and his professional team: Amjad, Hossam, Aboudi, and Ahmed.'
];

      $this->view('pages/about', $data);
    }
  }