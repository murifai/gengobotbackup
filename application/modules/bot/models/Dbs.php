<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbs extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


  function reset($target,$data){
      $this->db->get($target);
      $db=$this->db->update($target,$data);
      if ($this->db->affected_rows()>0) {
      return true;
      }else{
      return false;
      }
  }
  //insert data ke tabel
  function insert($data,$to){
    $insert = $this->db->insert($to, $data);
    if ($this->db->affected_rows()>0) {
      return true;
      }else{
      return false;
      }
  }

  //mengambil berdasarkan data userid
  function getdata($where,$from){
    $this->db->where($where);
    $db=$this->db->get($from);
    return $db;
  }
//INDONESIA
  function getdata_frompadanan($keyword){
    $sql="SELECT * FROM `bunpoudb` where `padanan` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_frombunpou($keyword){
    $sql="SELECT * FROM `bunpoudb` where `bunpou` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_frombunpou4($keyword){
    $sql="SELECT * FROM `bunpoudb` where `level`= 'n4' AND `bunpou` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_frompadanan4($keyword){
    $sql="SELECT * FROM `bunpoudb` where `level`= 'n4' AND `padanan` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_frombunpou5($keyword){
    $sql="SELECT * FROM `bunpoudb` where `level`= 'n5' AND `bunpou` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_frompadanan5($keyword){
    $sql="SELECT * FROM `bunpoudb` where `level`= 'n5' AND `padanan` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_frombunpou3($keyword){
    $sql="SELECT * FROM `bunpoudb` where `level`= 'n3' AND `bunpou` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_frompadanan3($keyword){
    $sql="SELECT * FROM `bunpoudb` where `level`= 'n3' AND `padanan` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_frombunpou2($keyword){
    $sql="SELECT * FROM `bunpoudb` where `level`= 'n2' AND `bunpou` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_frompadanan2($keyword){
    $sql="SELECT * FROM `bunpoudb` where `level`= 'n2' AND `padanan` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_frombunpou1($keyword){
    $sql="SELECT * FROM `bunpoudb` where `level`= 'n1' AND `bunpou` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_frompadanan1($keyword){
    $sql="SELECT * FROM `bunpoudb` where `level`= 'n1' AND `padanan` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }

  function getindexbpn5(){
    $sql="SELECT GROUP_CONCAT(`bunpou`) as `bunpou` FROM `bunpoudb` WHERE `level` = 'n5'";
    return $this->db->query($sql);
  }
  function getindexpdn5(){
    $sql="SELECT GROUP_CONCAT(`padanan`) as `padanan` FROM `bunpoudb` WHERE `level` = 'n5'";
    return $this->db->query($sql);
  }
  function getindexpdn5_en(){
    $sql="SELECT GROUP_CONCAT(`padanan`) as `padanan` FROM `bunpou_en` WHERE `level` = 'n5'";
    return $this->db->query($sql);
  }
  function getindexbpn4(){
    $sql="SELECT GROUP_CONCAT(`bunpou`) as `bunpou` FROM `bunpoudb` WHERE `level` = 'n4'";
    return $this->db->query($sql);
  }
  function getindexpdn4(){
    $sql="SELECT GROUP_CONCAT(`padanan`) as `padanan` FROM `bunpoudb` WHERE `level` = 'n4'";
    return $this->db->query($sql);
  }
  function getindexpdn4_en(){
    $sql="SELECT GROUP_CONCAT(`padanan`) as `padanan` FROM `bunpou_en` WHERE `level` = 'n4'";
    return $this->db->query($sql);
  }

  function getindexbpn3(){
    $sql="SELECT GROUP_CONCAT(`bunpou`) as `bunpou` FROM `bunpoudb` WHERE `level` = 'n3'";
    return $this->db->query($sql);
  }
  function getindexpdn3(){
    $sql="SELECT GROUP_CONCAT(`padanan`) as `padanan` FROM `bunpoudb` WHERE `level` = 'n3'";
    return $this->db->query($sql);
  }

  function getindexbpn2(){
    $sql="SELECT GROUP_CONCAT(`bunpou`) as `bunpou` FROM `bunpoudb` WHERE `level` = 'n2'";
    return $this->db->query($sql);
  }
  function getindexpdn2(){
    $sql="SELECT GROUP_CONCAT(`padanan`) as `padanan` FROM `bunpoudb` WHERE `level` = 'n2'";
    return $this->db->query($sql);
  }

  function getindexbpn1(){
    $sql="SELECT GROUP_CONCAT(`bunpou`) as `bunpou` FROM `bunpoudb` WHERE `level` = 'n1'";
    return $this->db->query($sql);
  }
  function getindexpdn1(){
    $sql="SELECT GROUP_CONCAT(`padanan`) as `padanan` FROM `bunpoudb` WHERE `level` = 'n1'";
    return $this->db->query($sql);
  }



  function getindexbp(){
    $sql="SELECT GROUP_CONCAT(`bunpou`) as `bunpou` FROM `bunpoudb`";
    return $this->db->query($sql);
  }
  function getindexpd(){
    $sql="SELECT GROUP_CONCAT(`padanan`) as `padanan` FROM `bunpoudb`";
    return $this->db->query($sql);

  }

  function getindexpd_en(){
    $sql="SELECT GROUP_CONCAT(`padanan`) as `padanan` FROM `bunpou_en`";
    return $this->db->query($sql);

  }
  //   fungsi quiz

  function getnosoal($idsoal){
    $sql="SELECT * FROM `soaln5` WHERE `nosoal`=$idsoal";
    return $this->db->query($sql);
  }
  
  function getnosoal4($idsoal){
    $sql="SELECT * FROM `soaln4` WHERE `nosoal`=$idsoal";
    return $this->db->query($sql);
  }
  function getnosoal5($idsoal){
    $sql="SELECT * FROM `soaln5` WHERE `nosoal`=$idsoal";
    return $this->db->query($sql);
  }
  function getnosoal3($idsoal){
    $sql="SELECT * FROM `soaln3` WHERE `nosoal`=$idsoal";
    return $this->db->query($sql);
  }


  //ENGLISH
function getdata_frompadanan_en($keyword){
    $sql="SELECT * FROM `bunpou_en` where `padanan` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_frombunpou_en($keyword){
    $sql="SELECT * FROM `bunpou_en` where `bunpou` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_frombunpou4_en($keyword){
    $sql="SELECT * FROM `bunpou_en` where `level`= 'n4' AND `bunpou` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_frompadanan4_en($keyword){
    $sql="SELECT * FROM `bunpou_en` where `level`= 'n4' AND `padanan` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_frombunpou5_en($keyword){
    $sql="SELECT * FROM `bunpou_en` where `level`= 'n5' AND `bunpou` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_frompadanan5_en($keyword){
    $sql="SELECT * FROM `bunpou_en` where `level`= 'n5' AND `padanan` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }


//   fungsi quiz

  function getnosoal_en($idsoal){
    $sql="SELECT * FROM `soaln5en` WHERE `nosoal`=$idsoal";
    return $this->db->query($sql);
  }
  
  function getnosoal4_en($idsoal){
    $sql="SELECT * FROM `soaln4en` WHERE `nosoal`=$idsoal";
    return $this->db->query($sql);
  }
  function getnosoal5_en($idsoal){
    $sql="SELECT * FROM `soaln5en` WHERE `nosoal`=$idsoal";
    return $this->db->query($sql);
  }

  function gettotal($userId){
      $sql="SELECT score1,score2,score3,score4,score5,score6,score7,score8,score9,score10,score11,score2,score13,score14,score15,score16,score17,score18,score19,score20 (score1+score2+score3+score4+score5+score6+score7+score8+score9+score10+score11+score12+score13+score14+score15+score16+score17+score18+score19+score20) as total FROM quiz";
      return $this->db->query($sql);
  }
//quiz

public function updateQuizSession($userId, $data) {
  $this->db->where('userid', $userId);
  if ($this->db->update('quiz', $data)) {
      log_message('debug', "Session data updated successfully for user: {$userId}");
      return true;
  } else {
      log_message('error', "Failed to update session data for user: {$userId}");
      log_message('error', "DB Error: " . print_r($this->db->error(), true));
      return false;
  }
}

public function getSessionState($userId) {
  $this->db->where('userid', $userId);
  $query = $this->db->get('quiz');
  if ($query->num_rows() > 0) {
      return $query->row_array();
  }
  return null;
}

public function endSession($userId) {
  $data = ['session_state' => 'inactive'];
  $this->db->where('userid', $userId);
  return $this->db->update('quiz', $data);
}


// Fetch a random question for a specific level
public function getRandomQuestionByTableName($tableName) {
  $this->db->order_by('rand()');
  $this->db->limit(1);
  $query = $this->db->get($tableName);
  if ($query->num_rows() > 0) {
      return $query->row();
  } else {
      return null;
  }
}


private function logDebug($message) {
  $filepath = APPPATH . 'logs/quiz_debug.log';  // Ensure directory is writable
  $logMessage = '[' . date('Y-m-d H:i:s') . '] ' . $message . "\n";
  file_put_contents($filepath, $logMessage, FILE_APPEND);
}

public function updateCurrentQuestion($userId, $questionId) {
  $data = ['current_question' => $questionId];
  $this->db->where('userid', $userId);
  if (!$this->db->update('quiz', $data)) {
      log_message('error', "Failed to update current question for user: {$userId}");
      return false;
  }
  return true;
}

// Set the current question for a user in the user_quiz_state table 
// Update the current question for a user
public function setCurrentQuestion($userId, $questionId) {
  $data = ['current_question' => $questionId];
  $this->db->where('userid', $userId);
  return $this->db->update('quiz', $data); // Assuming 'quiz' is the correct table
}


public function getTableForLevel($level) {
  switch($level) {
      case 'N1': return 'soaln1';
      case 'N2': return 'soaln2';
      case 'N3': return 'soaln3';
      case 'N4': return 'soaln4';
      case 'N5': return 'soaln5';
      default: return null; // or handle error
  }
}
// Get the current question for a user
public function getCurrentQuestion($userId, $level) {
  // Determine the table based on the level
  $tableName = $this->getTableForLevel($level);
  if (!$tableName) {
      log_message('error', "Invalid table name provided for level: {$level}");
      return null;
  }

  $this->db->select('q.*');
  $this->db->from('quiz u');
  $this->db->join($tableName . ' q', 'u.current_question = q.nosoal', 'left');
  $this->db->where('u.userid', $userId);
  $query = $this->db->get();

  if ($query->num_rows() > 0) {
      return $query->row();
  } else {
      log_message('error', "Failed to retrieve current question for user: {$userId}");
      return null;
  }
}


// Update user score
function updateUserScore($userId, $scoreToAdd) {
  $this->db->set('quiz_score', 'quiz_score + '.$scoreToAdd, FALSE);
  $this->db->where('userid', $userId);
  $this->db->update('quiz'); // Assumes a score field in the user_quiz_state table
}

// Save the final score at the end of a quiz session
public function saveFinalScore($userId, $score) {
  $data = ['final_score' => $score];
  $this->db->where('userid', $userId);
  $this->db->update('quiz', $data);
  return $this->db->affected_rows() > 0;
}

// Reset user session for a new quiz
function resetUserSession($userId, $level) {
  $data = ['current_question' => null, 'quiz_score' => 0, 'jlptlevel' => $level, 'session_state' => 'active'];
  $this->db->where('userid', $userId);
  if (!$this->db->update('quiz', $data)) {
      log_message('error', "DB Error: " . print_r($this->db->error(), true));
      return false;
  }
  return true;
}



public function getUserScore($userId) {
  $this->db->select('quiz_score');
  $this->db->from('quiz');
  $this->db->where('userid', $userId);
  $query = $this->db->get();
  if ($query->num_rows() > 0) {
      return $query->row()->quiz_score;
  }
  return 0;
}


//quiz end

//KAMUS
  function getdata_fromkamusengineerjp($keyword){
    $sql="SELECT * FROM `kamus` where `kategori`= 'engineer' AND `bajep` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }function getdata_fromkamusitjp($keyword){
    $sql="SELECT * FROM `kamus` where `kategori`= 'it' AND `bajep` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getdata_fromkamusengineerindo($keyword){
    $sql="SELECT * FROM `kamus` where `kategori`= 'engineer' AND `dariindo` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }function getdata_fromkamusitindo($keyword){
    $sql="SELECT * FROM `kamus` where `kategori`= 'it' AND `dariindo` LIKE '%$keyword%'";
    return $this->db->query($sql);
  }
  function getindexengindo(){
    $sql="SELECT GROUP_CONCAT(`dariindo`) as `dariindo` FROM `kamus` WHERE `kategori` = 'engineer'";
    return $this->db->query($sql);
  }
  function getindexengjp(){
    $sql="SELECT GROUP_CONCAT(`bajep`) as `bajep` FROM `kamus` WHERE `kategori` = 'engineer'";
    return $this->db->query($sql);
  }
  function getindexitindo(){
    $sql="SELECT GROUP_CONCAT(`dariindo`) as `dariindo` FROM `kamus` WHERE `kategori` = 'it'";
    return $this->db->query($sql);
  }
  function getindexitjp(){
    $sql="SELECT GROUP_CONCAT(`bajep`) as `bajep` FROM `kamus` WHERE `kategori` = 'it'";
    return $this->db->query($sql);
  }

  function getdata_kamusengineer(){
    $sql="SELECT * FROM `kamus` where `kategori`= 'engineer'";
    return $this->db->query($sql);
  }



   function getAllData($table){
    return $this->db->get($table);
  }



  //fungsi untuk mengambil lokasi terdekat berdasarkan longitude latitude di parameter
  function getdistance($kilo,$lat,$lng,$userid,$session1,$session2){
      $this->db->select("*, ( 6371 * acos( cos( radians($lat) ) * cos( radians( cur_lat ) ) * cos( radians( cur_long ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( cur_lat ) ) ) ) AS distance");
        $this->db->having('distance <= ' . $kilo);
        $this->db->order_by('distance');
        $this->db->limit(20, 0);
        $this->db->where('userid !=', $userid);
        $this->db->where('flag !=', $session1);
        $this->db->where('flag !=', $session2);
        $this->db->where('cur_order', null);
        $this->db->where('cur_help', null);
        $db=$this->db->get('donatur');
        return $db;
  }

  function getevent($kilo,$lat,$lng){
      $this->db->select("*, ( 6371 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) AS distance");
        $this->db->having('distance <= ' . $kilo);
        $this->db->order_by('distance');
        $this->db->limit(20, 0);
        $db=$this->db->get('event');
        return $db;
  }


  //fungsi untuk update field berdasarkan userid
  function update($where,$data,$to){
    $this->db->where($where);
    $db=$this->db->update($to,$data);
    if ($this->db->affected_rows()>0) {
      return true;
      }else{
      return false;
      }
      
      
  }
  
  function updatescore($data,$to){
    $db=$this->db->update($to,$data);
    if ($this->db->affected_rows()>0) {
      return true;
      }else{
      return false;
      }
      
      
  }

  function leaderboard(){
      $sql = "SELECT * FROM `quiz` ORDER BY `quiz`.`totalscore` DESC LIMIT 1";
      return $this->db->query($sql);
    }



}
