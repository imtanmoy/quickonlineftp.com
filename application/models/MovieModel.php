<?php

/**
 * Created by PhpStorm.
 * User: Tanmoy
 * Date: 02-Feb-16
 * Time: 12:52 PM
 */
class MovieModel extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }

    function getallMovielist()
    {
        //$query = $this->db->get('movie');
        $sql = "(SELECT movie.mid AS mid, movie.name as name, movie.poster as poster,movie.datetime as indate, 1 AS xxx FROM movie ORDER by movie.mid DESC)
                UNION
                (SELECT tvepisode.epid as mid, tvepisode.name AS name, series.srposter AS poster, tvepisode.epdatetime AS indate, 2 as xxx FROM tvepisode INNER JOIN series on series.srid=tvepisode.srid ORDER BY tvepisode.epid DESC) ORDER BY indate DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getMovie($mid)
    {
        $sql = "SELECT movie.mid, movie.name ,movie.cid, movie.poster, movie.status, movie.link, category.cname FROM movie INNER JOIN category On category.cid=movie.cid WHERE mid = ?";
        $query = $this->db->query($sql, array($mid));
        return $query->result();
    }
    function getallmovie(){
        $sql = "SELECT movie.mid, movie.name ,movie.cid, movie.poster, movie.link, category.cname FROM movie INNER JOIN category On category.cid=movie.cid ORDER BY mid DESC ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function insertMovie($data)
    {
        $this->db->insert('movie', $data);
    }
    function deletemovie($mid){
        $this->db->where('mid', $mid);
        $this->db->delete('movie');
    }


    function getCategory()
    {
        $sql = "SELECT * FROM category";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getSubCategory($cid)
    {
        $sql = "SELECT * FROM subcategory WHERE cid=$cid";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getCategorywise($cname, $limit, $start)
    {
        $sql = "SELECT movie.mid, movie.name , movie.poster, movie.status, movie.link FROM movie  WHERE cid = (SELECT cid FROM category WHERE cname= ?) ORDER BY mid DESC LIMIT $start,$limit";
        $query = $this->db->query($sql, array($cname));
        return $query->result();
    }

    function getCategorywisenorows($cname)
    {
        $sql = "SELECT * FROM movie  WHERE cid = (SELECT cid FROM category WHERE cname= ?)";
        $query = $this->db->query($sql, array($cname));
        return $query->num_rows();
    }


    function getsubCategorywise($cname, $limit, $start)
    {
        $sql = "SELECT movie.mid, movie.name , movie.poster, movie.status, movie.link FROM movie  WHERE scid = (SELECT scid FROM subcategory WHERE scid= ?) LIMIT $start,$limit";
        $query = $this->db->query($sql, array($cname));
        return $query->result();
    }

    function getsubCategorywisenorows($cname)
    {
        $sql = "SELECT * FROM movie  WHERE scid = (SELECT scid FROM subcategory WHERE scid= ?)";
        $query = $this->db->query($sql, array($cname));
        return $query->num_rows();
    }

    function getCategoryname($cname){
        $sql = "SELECT fullname AS catname FROM category  WHERE cname = '".$cname."'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function getsubCategoryname($cname){
        $sql = "SELECT scname AS catname FROM subcategory  WHERE scid = '".$cname."'";
        $query = $this->db->query($sql);
        return $query->result();
    }



    public function search($name){
//        $this->db->like('name',$name,'both');
//        return $this->db-get('movie')->result();
        $sql = "SELECT movie.name as name, movie.mid as mid, movie.poster FROM movie WHERE name like '%".$name."%' ORDER BY mid DESC LIMIT 5";
//        $sql = "SELECT * FROM movie WHERE name like '%masti%' ORDER BY mid DESC LIMIT 5";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getalltvseries(){
        $sql = "SELECT * FROM tvseries";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function addtvseries($data){
        $this->db->insert('tvseries', $data);
    }

    function gettvseries($tvname){
        $sql = "SELECT * FROM tvseries WHERE tvid='".$tvname."'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function gettvseriesbyid($tvid){
        $sql = "SELECT * FROM tvseries WHERE tvid='$tvid'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function gettvseriesid($tvname){
        $sql = "SELECT tvid FROM tvseries WHERE tvname='".$tvname."'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function deletetv($tvid){
        $this->db->where('tvid', $tvid);
        $this->db->delete('tvepisode');
        $this->db->where('tvid', $tvid);
        $this->db->delete('series');
        $this->db->where('tvid', $tvid);
        $this->db->delete('tvseries');
    }
    function getallseasons($tvid){
        $sql = "SELECT * FROM series WHERE tvid=$tvid";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function addseason($data){
        $this->db->insert('series', $data);
        return $this->db->insert_id();
    }
    function getseason($srid){
        $sql = "SELECT * FROM series WHERE srid=$srid";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function deleteseason($srid){
        $this->db->where('srid', $srid);
        $this->db->delete('tvepisode');
        $this->db->where('srid', $srid);
        $this->db->delete('series');
    }
    function gettvseriesbysrid($srid){
        $sql = "SELECT tvseries.tvid FROM tvseries  WHERE tvid = (SELECT tvid FROM series WHERE srid= ?)";
        $query = $this->db->query($sql, array($srid));
        return $query->result();
    }

    function allepisode($srid){
        $sql = "SELECT * FROM tvepisode WHERE srid=$srid";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function tvseriesbysrid($srid){
        $sql = "SELECT tvid FROM series WHERE srid=$srid";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function addepisode($data){
        $this->db->insert('tvepisode', $data);
    }

    function getepisode($epid){
        $sql = "SELECT tvepisode.epid, tvepisode.srid, tvepisode.name As name, tvepisode.link, series.srposter AS poster, series.srname AS cname, tvseries.tvname, 3 AS cid FROM tvepisode INNER JOIN series On series.srid=tvepisode.srid INNER JOIN tvseries on tvseries.tvid=tvepisode.tvid WHERE tvepisode.epid= ?";
        $query = $this->db->query($sql, array($epid));
        return $query->result();
    }

    function gettotalepisode($cname){
        $sql = "SELECT * FROM tvepisode  WHERE cid = (SELECT cid FROM category WHERE cname= ?)";
        $query = $this->db->query($sql, array($cname));
        return $query->num_rows();
    }
    function deleteepisode($epid){
        $this->db->where('epid', $epid);
        $this->db->delete('tvepisode');
    }
    function getseasonbyepid($epid){
        $sql = "SELECT tvepisode.srid FROM tvepisode  WHERE epid = ?";
        $query = $this->db->query($sql, array($epid));
        return $query->result();
    }
    public function tvsearch($name){
//        $this->db->like('name',$name,'both');
//        return $this->db-get('movie')->result();
        $sql = "SELECT tvseries.tvname as name, tvseries.tvid as mid, tvseries.tvposter AS poster FROM tvseries WHERE tvseries.tvname like '%".$name."%' ORDER BY mid DESC LIMIT 5";
//        $sql = "SELECT * FROM movie WHERE name like '%masti%' ORDER BY mid DESC LIMIT 5";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getCategorywiseep($cname, $limit, $start)
    {
        $sql = "SELECT tvepisode.epid As mid, tvepisode.name, tvepisode.link , series.srposter AS poster FROM tvepisode INNER JOIN series ON series.srid=tvepisode.srid WHERE tvepisode.cid = (SELECT cid FROM category WHERE cname= ?) ORDER BY mid DESC LIMIT $start,$limit";
        $query = $this->db->query($sql, array($cname));
        return $query->result();
    }
    function addbdix($data){
        $this->db->insert('bdix', $data);
    }
    function getbdix(){
        $sql = "SELECT * FROM bdix";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function updatenotice($data){
        $this->db->where('nid', 1);
        $this->db->update('notice', $data);
    }
    function getnotice(){
        $sql = "SELECT notice FROM notice WHERE nid=1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function deletebdix($bid){
        $this->db->where('bid', $bid);
        $this->db->delete('bdix');
    }
    function updatemovie($mid,$data){
        $this->db->where('mid', $mid);
        $this->db->update('movie', $data);
    }
    function updateepisode($epid,$data){
        $this->db->where('epid', $epid);
        $this->db->update('tvepisode', $data);
    }

    function totaltvseries(){
        $sql = "SELECT * FROM tvseries ORDER BY tvid DESC";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    function tvseries($limit, $start){
        $sql = "SELECT * FROM tvseries ORDER BY tvid DESC LIMIT $start,$limit";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function totalseason($tvid){
        $sql = "SELECT * FROM series WHERE tvid=$tvid";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function gettvseriesbytvid($tvid){
        $sql = "SELECT tvname FROM tvseries WHERE tvid=$tvid";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function series($tvid, $limit, $start){
        $sql = "SELECT * FROM series WHERE tvid=$tvid ORDER BY srid DESC LIMIT $start,$limit";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function totalepisode($srid){
        $sql = "SELECT epid FROM tvepisode WHERE srid=$srid";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function tvepisode($srid, $limit, $start){
        $sql = "SELECT *, series.srposter FROM tvepisode INNER JOIN series ON series.srid=tvepisode.srid WHERE tvepisode.srid=$srid ORDER BY epid DESC LIMIT $start,$limit";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getseriesname($srid){
        $sql = "SELECT srname FROM series WHERE srid=$srid";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function indextv(){
        $sql = "SELECT *, series.srposter FROM tvepisode INNER JOIN series ON series.srid=tvepisode.srid ORDER BY epid DESC LIMIT 0,4";
        $query = $this->db->query($sql);
        return $query->result();   
    }





}