<?php

namespace App\Controllers;

use Framework\Database;

class ListingController {
    protected $db;    

    public function __construct()  {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * index function
     *
     * @return void
     */
    public function index() {
       $listings = $this->db->query('SELECT * FROM listings')->fetchAll();

        loadView('listings/index', [
            'listings' => $listings
        ]);
    }

    /**
     * show the create form
     *
     * @return void
     */
    public function create(){
        loadView('listings/create');
    }

    /**
     * show a sinlge listing
     *
     * @return void
     */
    public function show($params){
        $id = $params['id'] ?? '';


        $queryParams = [
            'id' => $id
        ];

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $queryParams)->fetch();

        //Check if listing exits
        if(!$listing) {
            ErrorController::notFound('Listing not found');
            return;
        }

        loadView('listings/show', ['listing' => $listing ]);
    }
}