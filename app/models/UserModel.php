<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UserModel
 * 
 * Automatically generated via CLI.
 */
class UserModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

     public function getPaginated($limit, $offset) {
        return $this->db->table($this->table)
                        ->limit($limit, $offset)
                        ->get()
                        ->result_array();
    }

    
    public function countAllUsers() {
        return $this->db->table($this->table)->count_all_results();
    }
}