<?php 
namespace Controller;
session_start();
require_once '../vendor/autoload.php';
use Models\Buyer;
use Utils\Validation;
use DateTime;

class BuyerController {

    public $buyer; 
    
    public function __construct() {
        $this->buyer = new Buyer();
    }

    // CREATE NEW BUYER
    public function create ($data){
        
        // Set the default timezone to Dhaka
        date_default_timezone_set('Asia/Dhaka');
        $now = new DateTime();
        $formattedDate = $now->format('Y-m-d');

 
        $buyer = $data['buyer'];
        $buyer_email = $data['buyer_email'];
        $amount = $data['amount'];
        $receipt_id = $data['receipt_id'];
        $items = $data['items'];
        $buyer_ip = $_SERVER['REMOTE_ADDR'];
        $note = $data['note'];
        $city = $data['city'];
        $phone = $data['phone'];
        $entry_by = $data['entry_by'];
        $entry_at = $formattedDate;

        $validate = new Validation();
        $result = $validate->dataValidation($data);

        if($result['errors']) {
            return $result;
        }
        else {
            $query = "INSERT INTO `buyers`(`buyer`, `buyer_email`, `amount`, `receipt_id`, `items`, `buyer_ip`, `note`, `city`, `phone`, `entry_by`, `entry_at`) VALUES ('$buyer', '$buyer_email', '$amount', '$receipt_id', '$items', '$buyer_ip', '$note', '$city', '$phone', '$entry_by', '$entry_at')";
            $result = $this->buyer->commonQuery($query);
            if($result) {
                $_SESSION['success'] = 'Buyer Added Success';
                header('Location: index.php'); 
            }
            else {
                $_SESSION['error'] = 'Buyer Added Fail';
            } 
        }

    }

    // GET ALL BUYERS
    public function getAllBuyer() {
        $query = "SELECT * from buyers ORDER BY ID DESC";
        $datas = $this->buyer->getData($query);
        return $datas;
    }

    // SEARCH BY BUYER NAME AND BUYER EMAIL
    public function searchBuyer($search) {
        $query = "SELECT * FROM buyers WHERE buyer LIKE '%$search%' OR buyer_email LIKE '%$search%' ";
        $result = $this->buyer->commonQuery($query);
        return $result;
    }

    // SEARCH BY BUYER ID
    public function searchBuyerById($search) {
        $query = "SELECT * FROM buyers WHERE id LIKE '%$search%' ";
        $result = $this->buyer->commonQuery($query);
        return $result;
    }

    // SEARCH BETWEEN START DATE AND ENDING DATE
    public function searchBuyerBetweenDate($from, $to) {
        $query = "SELECT * FROM `buyers` WHERE `entry_at` BETWEEN '$from' AND '$to'";
        $result = $this->buyer->commonQuery($query);
        return $result;
    }

    // DELETE BUYER DATA
    public function deleteBuyer($id) {
        $query = "DELETE FROM buyers WHERE id = $id";
        $this->buyer->commonQuery($query);
        $_SESSION['success'] = 'Buyer delete success';
        header('Location: index.php');
    }

    // SHOW SINGLE BUYER
    public function singleBuyer($id) {
        $query = "SELECT * FROM `buyers` WHERE id = $id";
        $result = $this->buyer->commonQuery($query); 
        return $result;
    }
    
    // UPDATE BUYER DATA
    public function updateBuyer($data, $id){
        
        // time settings
        date_default_timezone_set('Asia/Dhaka');
        $now = new DateTime();
        $formattedDate = $now->format('Y-m-d');

        // set data
        $buyer = $data['buyer'];
        $buyer_email = $data['buyer_email'];
        $amount = $data['amount'];
        $receipt_id = $data['receipt_id'];
        $items = $data['items'];
        $buyer_ip = $_SERVER['REMOTE_ADDR'];
        $note = $data['note'];
        $city = $data['city'];
        $phone = $data['phone'];
        $entry_by = $data['entry_by'];
        $entry_at = $formattedDate;

        $validate = new Validation();
        $result = $validate->dataValidation($data);

        if($result['errors']) {
            return $result;
        }
        else {
            $query = "UPDATE `buyers` SET `buyer`='$buyer',`buyer_email`='$buyer_email',`amount`='$amount',`receipt_id`='$receipt_id',`items`='$items',`buyer_ip`='$buyer_ip',`note`='$note',`city`='$city',`phone`='$phone',`entry_by`='$entry_by',`entry_at`='$entry_at' WHERE id=$id";
            
            $result = $this->buyer->commonQuery($query);
            if($result) {
                header('Location: index.php');
                $_SESSION['success'] = 'Buyer Update Success';
            }
            else {
                // header('Location: index.php');
                $_SESSION['error'] = 'Buyer update failed';
            }
        }
    }

}
