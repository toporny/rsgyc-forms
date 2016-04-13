<?php
header('Access-Control-Allow-Origin: *');

error_reporting(E_ALL & ~E_WARNING);

define("PUBLISHABLEKEY", "pk_test_a7m5Q91it7KYngnGnfw2smDY"); // my TEST
define("APIKEY", "sk_test_fajggt5xELGUyOe3m8ktp6sI"); // my TEST

define("LOAPRICE", 170);
require 'lib/bower_components/stripe/init.php';

//         lib\bower_components\stripe\init.php
/*
Fatal error: require(): Failed opening required 'C:\Users\uzytkownik\development\rsgyc-forms\public_html\lib\bower_components\stripe/lib/Util/AutoPagingIterator.php' (include_path='.;C:\xampp\php\PEAR') in C:\Users\uzytkownik\development\rsgyc-forms\public_html\lib\bower_components\stripe\init.php on line 7
*/

if(isset($HTTP_RAW_POST_DATA)) {
  parse_str($HTTP_RAW_POST_DATA, $arrPOST); 
  if (strlen($arrPOST['stripeToken']) > 5) {
    $ret = doCharge ($arrPOST);
    print json_encode($ret);
    exit;
  }
  $error = '<div class="alert alert-danger"><strong>Error!</strong> Unexpected error. </div>';
  $status = -1;
  print json_encode(array('status'=>$status, 'data_string'=>$data_string));
}

// END


function doCharge ($arrPOST) {

  \Stripe\Stripe::setApiKey(APIKEY);

  $error = ''; $success = '';
  try {
    if (!isset($arrPOST['stripeToken'])) throw new Exception("The Stripe Token was not generated correctly");

    $meta_data = array('a_form name' => 'WEST BIGHT MARINA BERTHING APPLICATION FORM',
                       'b_boat name' => $arrPOST['form_boat_name'],
                       'c_boat manufacturer' => $arrPOST['form_boat_manufacturer'],
                       'd_Length over all' => $arrPOST['form_loa'] . ' ('.($arrPOST['form_loa']*LOAPRICE).'€)',
                       'e_boat type' => $arrPOST['form_boat_type'],
                       'f_comments optional' => $arrPOST['form_comments'],
                       'g_name 1' => $arrPOST['form_name1'],
                       'h_membership no 1' => $arrPOST['form_memberShipNumber1'],
                       'i_mobile number 1' => $arrPOST['form_mobileNumber1'],
                       'j_email 1' => $arrPOST['form_email1'],
                       'k_insurance details' => $arrPOST['insurance_details']
                      );

    if(strlen($arrPOST['form_name2'])>2) {
      $meta_data = array_merge($meta_data, 
                    array(
                       'l_name 2' => $arrPOST['form_name2'],
                       'm_membership no 2' => $arrPOST['form_memberShipNumber2'],
                       'n_mobile number 2' => $arrPOST['form_mobileNumber2'],
                       's_email 2' => $arrPOST['form_email2']
                       )
      );
    }

    if(strlen($arrPOST['form_name3'])>2) {
      $meta_data = array_merge($meta_data, 
                    array(
                       'u_name 3' => $arrPOST['form_name3'],
                       'w_membership no 3' => $arrPOST['form_memberShipNumber3'],
                       'x_mobile number 3' => $arrPOST['form_mobileNumber3'],
                       'y_email 3' => $arrPOST['form_email3']
                       )
      );
    }

    $stripe_data =  
                  array("amount" => $arrPOST['form_loa']*LOAPRICE*100,
                         "currency" => "eur",
                         "card" => $arrPOST['stripeToken'],
                         "metadata" => $meta_data,
                         "receipt_email" => $arrPOST['form_email1'],
                         "description" => $arrPOST['form_email1']
                      );
    if ( ($arrPOST['form_loa']>=2) && ($arrPOST['form_loa']<=99) ) {
      \Stripe\Charge::create($stripe_data);
      $data_string = '<div class="alert alert-success"><strong>Success!</strong> Your payment was successful. </div>';
      $status = 1;

		  $filesave = print_r($stripe_data , true); // $results now contains output from print_r
		  $filename = 'saved_'.date('Y-m-d_hia').'.txt';
		  file_put_contents($filename, print_r($filesave, true));

      return array('status'=>$status, 'data_string'=>$data_string);
    }
    else
    {
      $error = '<div class="alert alert-danger"><strong>Error!</strong> Unexpected error. </div>';
      $status = -1;
      return array('status'=>$status, 'data_string'=>$data_string);
    }
  }
  catch (Exception $e) {
    $error = '<div class="alert alert-danger"><strong>Error!</strong> '.$e->getMessage().'  </div>';
    $status = -1;
    return array('status'=>$status, 'data_string'=>$data_string);
  }
}

