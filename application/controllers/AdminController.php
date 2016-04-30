<?php
/**
 * Created by PhpStorm.
 * User: Tanmoy
 * Date: 02-Feb-16
 * Time: 6:40 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');


class AdminController extends CI_Controller
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
        $this->load->view('admin/admin.php');
    }


    function upload()
    {
        $data['category'] = $this->MovieModel->getCategory();
        $this->load->view('admin/upload', $data);
    }

    function getsubcategory()
    {
        $this->load->view('admin/get_subcategory.php');
    }

    function insert()
    {

        $this->upload_path = "./posters/";


//       $scategory = $this->input->post('scategory');
//
//        if($scategory==null){
//
//        }


        if (isset($_POST) && $_POST['submit'] == 'Submit') {

            if ($this->input->post('status') == "New") {
                $status = 1;
            } else {
                $status = 0;
            }

            $this->poster_name = $_FILES["poster"]["name"];
//            $this->tmp_poster = $_FILES["poster"]["tmp_name"];
            $date = date('Y-m-d H:i:s');

            $type = explode('.', $_FILES["poster"]["name"]);
            $type = $type[count($type) - 1];

            $data = array('name' => $this->input->post('name'),
                'cid' => $this->input->post('category'),
                'scid' => $this->input->post('scategory'),
                'poster' => $this->poster_name,
                'status' => $status,
                'datetime' => $date,
                'link' => $this->input->post('link'));

            $this->MovieModel->insertMovie($data);

            //@move_uploaded_file($this->tmp_poster, $this->upload_path . $this->poster_name);

            if (in_array($type, array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG'))) {
                if (is_uploaded_file($_FILES['poster']['tmp_name'])) {

                    move_uploaded_file($_FILES['poster']['tmp_name'], $this->upload_path . $this->poster_name);
                }
            }


            redirect('admin/allmovie'); // back to the add form
        } else {
            redirect('admin/uoload');
        }

    }

    function allmovie(){
        $data['allmovies'] = $this->MovieModel->getallmovie();
        $this->load->view('admin/allmovie', $data);
    }

    function deletemovie($mid){
        $this->MovieModel->deletemovie($mid);
        redirect('admin/allmovie');
    }
    function alltvseries()
    {
        $data['tvseries'] = $this->MovieModel->getalltvseries();
        $this->load->view('admin/alltvseries', $data);
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
    }

    function tvseries()
    {
        $this->load->view('admin/tvseries_add');
    }

    function tvseriesinsert()
    {

        $this->upload_path = "./posters/";


        if (isset($_POST) && $_POST['submit'] == 'Submit') {


            $this->poster_name = $_FILES["poster"]["name"];
//            $this->tmp_poster = $_FILES["poster"]["tmp_name"];
            $date = date('Y-m-d H:i:s');

            $type = explode('.', $_FILES["poster"]["name"]);
            $type = $type[count($type) - 1];

            $data = array('tvname' => $this->input->post('name'),
                'tvposter' => $this->poster_name,
                'tvdatetime' => $date);

            $this->MovieModel->addtvseries($data);
            if (is_uploaded_file($_FILES['poster']['tmp_name'])) {

                move_uploaded_file($_FILES['poster']['tmp_name'], $this->upload_path . $this->poster_name);
            }
            //$tvid = $this->MovieModel->gettvseries($this->input->post('name'));
            redirect('admin/alltvseries');

            //@move_uploaded_file($this->tmp_poster, $this->upload_path . $this->poster_name);


            //  redirect('admin/addseason'); // back to the add form
        } else {
            redirect('admin/tvseries');
        }

    }

    function tvupload()
    {
        $this->load->view('admin/tvupload');
    }

    function addseason($tvid)
    {
        $data['tvseries'] = $this->MovieModel->gettvseriesbyid($tvid);
        $this->load->view('admin/addseason', $data);
//        echo "<pre>";
//        print_r($tvid);
//        echo "</pre>";
    }

    function allseason($tvid)
    {
        $data['tvseries'] = $this->MovieModel->gettvseries($tvid);
        $data['seasons'] = $this->MovieModel->getallseasons($tvid);
        $this->load->view('admin/allseason', $data);
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
    }

    function allseasonbyid($tvname)
    {
        $data['tvseries'] = $this->MovieModel->gettvseries($tvname);
        $tvid = $this->MovieModel->gettvseriesid($tvname);
        $data['seasons'] = $this->MovieModel->getallseasons($tvid[0]->tvid);
        $this->load->view('admin/allseason', $data);
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
    }

    function seasoninsert()
    {

        $this->upload_path = "./posters/";


        if (isset($_POST) && $_POST['submit'] == 'Submit') {


            $this->poster_name = $_FILES["poster"]["name"];
//            $this->tmp_poster = $_FILES["poster"]["tmp_name"];
            $date = date('Y-m-d H:i:s');

            $data = array('srname' => $this->input->post('name'),
                'srposter' => $this->poster_name,
                'srdatetime' => $date,
                'tvid' => $this->input->post('tvid'));

            if ($tvid = $this->MovieModel->addseason($data)) {
                if (is_uploaded_file($_FILES['poster']['tmp_name'])) {

                    move_uploaded_file($_FILES['poster']['tmp_name'], $this->upload_path . $this->poster_name);
                }
                //$tvid = $this->MovieModel->gettvseries($this->input->post('name'));
                redirect('admin/allseason/' . $this->input->post('tvid'));
//                        echo "<pre>";
//        print_r($tvid);
//        echo "</pre>";

            }
        } else {
            redirect('admin/tvseries');
        }

    }

    function allepisode($srid)
    {
        $tvid = $this->MovieModel->tvseriesbysrid($srid);
        $data['tvseries'] = $this->MovieModel->gettvseriesbyid($tvid[0]->tvid);
        $data['seasons'] = $this->MovieModel->getseason($srid);
        $data['episode'] = $this->MovieModel->allepisode($srid);
        $this->load->view('admin/allepisode', $data);

    }

    function addepisode($srid)
    {
        $tvid = $this->MovieModel->tvseriesbysrid($srid);
        $data['tvseries'] = $this->MovieModel->gettvseriesbyid($tvid[0]->tvid);
        $data['seasons'] = $this->MovieModel->getseason($srid);
        $this->load->view('admin/addepisode', $data);
    }

    function episodeinsert()
    {
        if (isset($_POST) && $_POST['submit'] == 'Submit') {
            $date = date('Y-m-d H:i:s');
            $data = array(
                'name' => $this->input->post('name'),
                'tvid' => $this->input->post('tvid'),
                'cid' => 8,
                'srid' => $this->input->post('srid'),
                'epdatetime' => $date,
                'link' => $this->input->post('link'));
            $this->MovieModel->addepisode($data);
            redirect('admin/allepisode/' . $this->input->post('srid'));

        }
    }
    function bdix(){
        $this->load->view('admin/bdix');
    }
    function bdixinsert(){
        $this->upload_path = "./posters/bdix/";
        if (isset($_POST) && $_POST['submit'] == 'Submit') {


            $this->poster_name = $_FILES["poster"]["name"];

            $data = array(
                'bdix_name' => $this->input->post('name'),
                'bdix_image' => $this->poster_name,
                'bdix_link' => $this->input->post('link'));

             $this->MovieModel->addbdix($data);
                if (is_uploaded_file($_FILES['poster']['tmp_name'])) {

                    move_uploaded_file($_FILES['poster']['tmp_name'], $this->upload_path . $this->poster_name);
                }
                //$tvid = $this->MovieModel->gettvseries($this->input->post('name'));
                redirect('movie/bdix');


        } else {
            redirect('admin/bdix');
        }
    }
    function tvseries_delete($tvid){
        $this->MovieModel->deletetv($tvid);
        redirect('admin/alltvseries');
    }
    function deleteseason($srid){
        $tvid=$this->MovieModel->gettvseriesbysrid($srid);
        $this->MovieModel->deleteseason($srid);
        redirect('admin/allseason/'.$tvid[0]->tvid);
    }

    function deleteepisode($epid){
        $srid=$this->MovieModel->getseasonbyepid($epid);
        $this->MovieModel->deleteepisode($epid);
        redirect('admin/allepisode/'.$srid[0]->srid);
    }
    function notice(){
        $data['notice']=$this->MovieModel->getnotice();
        $this->load->view('admin/notice',$data);
    }
    function noticeupdate(){
        if (isset($_POST) && $_POST['submit'] == 'Submit') {
            $data = array(
                'notice' => $this->input->post('notice'),
                );
            $this->MovieModel->updatenotice($data);
            redirect('admin/notice');
        } else {
            redirect('admin/notice');
        }
    }
    function allbdix(){
        $data['bdix']=$this->MovieModel->getbdix();
        $this->load->view('admin/allbdix',$data);
    }

    function deletebdix($bid){
        $this->MovieModel->deletebdix($bid);
        redirect('admin/allbdix');
    }


    function editmovie($mid)
    {
        $data['movie'] = $this->MovieModel->getMovie($mid);
        $this->load->view('admin/editmovie', $data);
    }

    function updatemovie()
    {
        $mid = $this->input->post('mid');
        $movie = $this->MovieModel->getMovie($mid);
        foreach ($movie as $key) {
            $name = $key->name;
            $poster = $key->poster;
            $link = $key->link;
        }


//       echo $newname."<br>";
//       echo $newlink."<br>";
//       echo $newposter."<br>";
        $this->delete_path = "./posters/";
        $this->upload_path = "./posters/";

        if (isset($_POST) && $_POST['submit'] == 'Submit') {
            if (empty($this->input->post('name'))) {
                $newname = $name;
            } else {
                $newname = $this->input->post('name');
            }
            if (empty($this->input->post('link'))) {
                $newlink = $link;
            } else {
                $newlink = $this->input->post('link');
            }
            if (empty($_FILES['poster']['name'])) {
                $newposter = $poster;
            } else {
                $newposter = $_FILES["poster"]["name"];
                unlink($this->delete_path . $poster);
            }

            $data = array('name' => $newname,
                'poster' => $newposter,
                'link' => $newlink);

            $this->MovieModel->updatemovie($mid, $data);
            if (is_uploaded_file($_FILES['poster']['tmp_name'])) {

                move_uploaded_file($_FILES['poster']['tmp_name'], $this->upload_path . $newposter);
            }
            redirect('admin/allmovie');


        }


    }

    function editepisode($epid)
    {
        $data['episode'] = $this->MovieModel->getepisode($epid);
        $this->load->view('admin/editepisode', $data);
    }

    function updateepisode()
    {
        $tvid = $this->input->post('mid');
        $movie = $this->MovieModel->getepisode($tvid);
        foreach ($movie as $key) {
            $name = $key->name;
            $link = $key->link;
            $srid =$key->srid;
        }


        if (isset($_POST) && $_POST['submit'] == 'Submit') {
            if (empty($this->input->post('name'))) {
                $newname = $name;
            } else {
                $newname = $this->input->post('name');
            }
            if (empty($this->input->post('link'))) {
                $newlink = $link;
            } else {
                $newlink = $this->input->post('link');
            }

//            echo $newname . "<br>";
//            echo $tvid . "<br>";
//            echo $newlink . "<br>";

            $data = array('name' => $newname,
                'link' => $newlink);

//            print_r($data);
//
            $this->MovieModel->updateepisode($tvid,$data);
            redirect('admin/allepisode/'.$srid);


        }
    }


}