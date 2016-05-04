<?php
/**
 * Created by PhpStorm.
 * User: Tanmoy
 * Date: 02-Feb-16
 * Time: 6:40 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');


class UploaderController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('MovieModel');
        $this->load->helper('date');
    }

    function index()
    {
        $this->load->view('upload/index');
    }

    function login(){
        $this->load->view('upload/login');
    }

}