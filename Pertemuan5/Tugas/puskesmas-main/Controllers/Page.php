<?php

class Page
{
    public $title;
    public $file;

    public function __construct($title, $file)
    {
        $this->title = $title;
        $this->file = $file;
    }

    /**
     * Function call
     * berfungsi untuk menarik file untuk ditampilkan
     */

    public function call()
    {
        $file = $this->file;
        $title = $this->title;
        include_once('Layouts/app.php');
    }
}
