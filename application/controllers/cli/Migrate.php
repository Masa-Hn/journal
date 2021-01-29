<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Migrate
 *
 * @property CI_Migration $migration
 */
class Migrate extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!is_cli()) {
            exit('No direct script access allowed');
        }
    }

    public function index()
    {
        $this->load->library('migration');

        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        }
    }

}