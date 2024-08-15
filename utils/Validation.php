<?php 

 

class Validation {


    // count bangla workd
    public function countBengaliWords($string) {
        $pattern = '/[\x{0980}-\x{09FF}]+/u';
        if (preg_match_all($pattern, $string, $matches)) {
            return count($matches[0]);
        } else {
            return 0;
        }
    }

    // validation settings
    public function dataValidation($data) {
          // validation
          $errors = [];
          $values = [
              'amount' => '',
              'buyer' => '',
              'receipt_id' => '',
              'items' => '',
              'buyer_email' => '',
              'note' => '',
              'city' => '',
              'phone' => '',
              'entry_by' => ''
          ];
  
          if (empty($data['buyer'])) {
              $errors['buyer'] = "Buyer name is required.";
          } 
          else {
              $values['buyer'] = $data['buyer']; 
          }
  
          if (empty($data["buyer_email"])) {
              $errors['buyer_email'] = "Email is required";
          } 
          else {
              $email = $data['buyer_email']; 
              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $errors['buyer_email'] = "A valid email address is required";
              }
              $values['buyer_email'] = $data['buyer_email']; 
          }
          if (empty($data['amount']) || !is_numeric($data['amount'])) {
              $errors['amount'] = "A valid amount is required.";
          }else {
              $values['amount'] = $data['amount']; 
          } 
          if (empty($data['receipt_id'])) {
              $errors['receipt_id'] = "Receipt ID is required.";
          }else {
              $values['receipt_id'] = $data['receipt_id']; 
          }
          if (empty($data['items'])) {
              $errors['items'] = "Items field is required.";
          }else {
              $values['items'] = $data['items']; 
          }
          
          if (empty($data['note'])) {
              $errors['note'] = "Note field is required.";
  
          }else {
              $wordCount = str_word_count($data['note']);
              if($wordCount > 30 || $this->countBengaliWords($data['note']) > 30) {
                  $errors['note'] = "Note must not be 30 words long";
              } 
 
              $values['note'] = $data['note']; 
          }
          
          if (empty($data['city'])) {
              $errors['city'] = "City is required.";
          }else {
              $values['city'] = $data['city']; 
          }  
          if (empty($data["phone"])) {
              $errors['phone'] = "Phone number is required";
          } 
          else {
              $phone = $data['phone']; 
              if (preg_match('/^[0-9]{10,15}$/', $data['phone'])) {
                  $errors['phone'] = "A valid phone number is required";
              }
              $values['phone'] = $data['phone']; 
          }
          if (empty($data['entry_by'])) {
              $errors['entry_by'] = "Entry by is required.";
          } else {
              $values['entry_by'] = $data['entry_by']; 
          }
          
          if (!empty($errors)) {
              return ['errors' => $errors, 'values' => $values];
          } 
    }


}