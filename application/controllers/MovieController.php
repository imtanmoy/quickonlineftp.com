<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Tanmoy
 * Date: 02-Feb-16
 * Time: 12:28 PM
 */
class MovieController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('MovieModel');
        $this->load->library('pagination');
        $this->load->library('session');
    }

    public function index()
    {
        $data['movie_list'] = $this->MovieModel->getallMovielist();
        $data['english'] = $this->MovieModel->getCategorywise('english', 10, 0);
        $data['hindi'] = $this->MovieModel->getCategorywise('hindi', 10, 0);
        $data['bangla'] = $this->MovieModel->getCategorywise('bangla', 10, 0);
        $data['tamil'] = $this->MovieModel->getCategorywise('tamil', 10, 0);
        $data['animation'] = $this->MovieModel->getCategorywise('animation', 10, 0);
        $data['Software'] = $this->MovieModel->getCategorywise('Software', 10, 0);
        $data['Games'] = $this->MovieModel->getCategorywise('Games', 10, 0);
        $data['tv'] = $this->MovieModel->indextv();

//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
//        die();
        $data['music']= $this->session->userdata('music');
        $this->load->view('movie/index', $data);


    }




    function showmovie($cname){

        $this->showmovielist($cname);

    }


    function showmovielist($cname,$no=0){

            $total_rows=$this->MovieModel->getsubCategorywisenorows($cname);


        


        $start_row=$this->uri->segment(4);


        if(trim($start_row)==''){
            $start_row=0;
        }else{
            $start_row=($start_row*12)-12;
        }


        $config['base_url'] = base_url()."movie/subcategory/".$cname."/";
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 12;
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 3;



        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First Page';
        $config['last_link'] = 'Last Page';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        $this->pagination->initialize($config);

        $data['pagination'] =$this->pagination->create_links();

        $data['cname']=$this->MovieModel->getsubCategoryname($cname);

        $data['movie_list'] = $this->MovieModel->getsubCategorywise($cname,$config['per_page'],$start_row);
        $data['tv_list']=null;
        $data['music']= $this->session->userdata('music');

        $this->load->view('movie/movielist',$data);
    }



    function showcatmovie($cname){



        $this->showcatmovielist($cname);

    }


    function showcatmovielist($cname,$no=0){

        if($cname=="EnglishSerial"||$cname=="HindiSerial"||$cname=="BanglaNatok"){
            $total_rows=$this->MovieModel->gettotalepisode($cname);
        }else{
            $total_rows=$this->MovieModel->getCategorywisenorows($cname);
        }




//        echo "<pre>";
//        print_r($total_rows);
//        echo "</pre>";
//        die();
//        echo $total_rows;
//        die();

        $start_row=$this->uri->segment(4);

        if(trim($start_row)==''){
            $start_row=0;
        }else{
            $start_row=($start_row*12)-12;
        }

        


        $config['base_url'] = base_url()."movie/category/".$cname."/";
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 12;
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = TRUE;
        //$config['num_links'] = $total_rows;
        $config['num_links'] = 3;



        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First Page';
        $config['last_link'] = 'Last Page';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        $this->pagination->initialize($config);

        $data['pagination'] =$this->pagination->create_links();

//        $data['cname']=$cname;
        $data['cname']=$this->MovieModel->getCategoryname($cname);


        if($cname=="EnglishSerial"||$cname=="HindiSerial"||$cname=="BanglaNatok"){
            $data['tv_list'] = $this->MovieModel->getCategorywiseep($cname,$config['per_page'],$start_row);
            $data['movie_list']=null;
        }else{
            $data['movie_list'] = $this->MovieModel->getCategorywise($cname,$config['per_page'],$start_row);
            $data['tv_list'] = null;
        }

    $data['music']= $this->session->userdata('music');

        $this->load->view('movie/movielist',$data);
    }


    function addMovie()
    {
        // database insert code
    }

    function getMovie($mid=null)
    {
        // database get code
        //$mid=$this->uri->segment(2);
        $data['music']= $this->session->userdata('music');

        $data['english'] = $this->MovieModel->getCategorywise('english', 10, 0);
        $data['hindi'] = $this->MovieModel->getCategorywise('hindi', 10, 0);
        $data['bangla'] = $this->MovieModel->getCategorywise('bangla', 10, 0);
        $data['tamil'] = $this->MovieModel->getCategorywise('tamil', 10, 0);
        $data['animation'] = $this->MovieModel->getCategorywise('animation', 10, 0);
        $data['Software'] = $this->MovieModel->getCategorywise('Software', 10, 0);
        $data['Games'] = $this->MovieModel->getCategorywise('Games', 10, 0);

        if($mid==null){
            show_404();
        }
        else{
           

            $data['movie']=$this->MovieModel->getMovie($mid);
            

            $this->load->view('movie/movie', $data);
            
        }



       
    }
    function gettv($mid=null)
    {
        $data['music']= $this->session->userdata('music');
        $data['english'] = $this->MovieModel->getCategorywise('english', 10, 0);
        $data['hindi'] = $this->MovieModel->getCategorywise('hindi', 10, 0);
        $data['bangla'] = $this->MovieModel->getCategorywise('bangla', 10, 0);
        $data['tamil'] = $this->MovieModel->getCategorywise('tamil', 10, 0);
        $data['animation'] = $this->MovieModel->getCategorywise('animation', 10, 0);
        $data['Software'] = $this->MovieModel->getCategorywise('Software', 10, 0);
        $data['Games'] = $this->MovieModel->getCategorywise('Games', 10, 0);
        if($mid==null){
            show_404();
        }
        else{

            $data['movie']=$this->MovieModel->getepisode($mid);
            //echo "<pre>"; print_r($data['movie']); echo"</pre>";

            $this->load->view('movie/movie', $data);
            //$this->load->view('movie_details', $data);
        }



        // $movie = $this->MovieModel->getMovie($mid);;
        //$this->load->view('movie_details', $movie);
    }


    function updateMovie()
    {
        // database update code
    }

    function deleteMovie()
    {
        // database delete code
    }

    function getsearch(){
        $data['music']= $this->session->userdata('music');
        $search=  $this->input->post('search');
        $result=$this->MovieModel->search($search);
        $tvresult=$this->MovieModel->tvsearch($search);

        if(count($result)>0){
//            $data['movie_search']=$result;
            $data['movie_search']=array_merge($result,$tvresult);

//            echo "<pre>";
//            print_r($data);
//            echo "</pre>";
//            die();

            $data['pagename']="Search Result For ".$search;
            $this->load->view('movie/findmovie', $data);
        }
        else{
            $data['pagename']="No Result result Found";
            $data['movie_search']=null;
            $this->load->view('movie/findmovie', $data);
        }
    }

    function search()
    {

        $search=  $this->input->post('search');
        $result=$this->MovieModel->search($search);
        if(count($result)>0){
            foreach ($result as $row){
                echo "<li class='sresult'> <a   href='" . base_url() . "movie/" . $row->mid . "'>" . $row->name . "</a></li>";
            }
        }
        $tvresult=$this->MovieModel->tvsearch($search);
        if(count($tvresult)>0){
            foreach ($tvresult as $row){
                echo "<li class='sresult'> <a   href='" . base_url() . "tv/seasonlist/" . $row->mid . "'>" . $row->name . "</a></li>";
            }
        }
    }
    function bdix(){
        $data['music']= $this->session->userdata('music');
        $data['bdix']=$this->MovieModel->getbdix();
        $this->load->view('movie/bdix',$data);
    }




    function serieslist(){

        $this->tvserieslist();

    }

    function tvserieslist($no = 0){
        $this->load->library('pagination');
        $total_rows = $this->MovieModel->totaltvseries();
        $start_row = $this->uri->segment(2);
        if (trim($start_row) == '') {
            $start_row = 0;
        }else{
            $start_row=($start_row*12)-12;
        }

//                    echo "<pre>";
//            print_r($start_row);
//            echo "</pre>";
//            die();

        $config['base_url'] = base_url() . "tvlist/";
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 12;
        $config['uri_segment'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 3;



        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First Page';
        $config['last_link'] = 'Last Page';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $data['cname'] = "English Tv Series";

        $data['tv'] = $this->MovieModel->tvseries($config['per_page'],$start_row);
        $data['tv_list']=null;
        $data['episodelist']=null;


        $data['music']= $this->session->userdata('music');
        $this->load->view('movie/serieslist', $data);

    }

    function seasonlist($tvid,$no=0){
        $this->load->library('pagination');
        $total_rows = $this->MovieModel->totalseason($tvid);
        $start_row = $this->uri->segment(4);
        if (trim($start_row) == '') {
            $start_row = 0;
        }else{
            $start_row=($start_row*6)-6;
        }

//                    echo "<pre>";
//            print_r($start_row);
//            echo "</pre>";
//            die();

        $config['base_url'] = base_url() . "tv/seasonlist/".$tvid."/";
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 6;
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 3;



        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First Page';
        $config['last_link'] = 'Last Page';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $cname = $this->MovieModel->gettvseriesbytvid($tvid);
        $data['cname']=$cname[0]->tvname;
        $data['tv'] =null;
        $data['episodelist'] =null;
        $data['tv_list']=$this->MovieModel->series($tvid, $config['per_page'],$start_row);


        $data['music']= $this->session->userdata('music');
        $this->load->view('movie/serieslist', $data);
    }

    function episodelist($srid,$no=0){
        $this->load->library('pagination');
        $total_rows = $this->MovieModel->totalepisode($srid);
        $start_row = $this->uri->segment(4);
        if (trim($start_row) == '') {
            $start_row = 0;
        }else{
            $start_row=($start_row*6)-6;
        }

//                    echo "<pre>";
//            print_r($start_row);
//            echo "</pre>";
//            die();

        $config['base_url'] = base_url() . "tv/episodelist/".$srid."/";
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 6;
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 3;



        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First Page';
        $config['last_link'] = 'Last Page';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $cname = $this->MovieModel->getseriesname($srid);
        $data['cname']=$cname[0]->srname;
        $data['tv'] =null;
        $data['tv_list'] =null;
        $data['episodelist']=$this->MovieModel->tvepisode($srid, $config['per_page'],$start_row);


        $data['music']= $this->session->userdata('music');
        $this->load->view('movie/serieslist', $data);
    }

        function music(){
        if($this->session->userdata('music')==0){
            $this->session->set_userdata('music',1);
        }else{
            $this->session->set_userdata('music',0);
        }

    }


}







