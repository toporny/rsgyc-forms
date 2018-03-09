<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>West Bight Marina Berthing Application Form</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/parsley.css" rel="stylesheet">
    <link href="css/parsley_my.css" rel="stylesheet">
    <link href="css/loader.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
  	<script src="js/parsley.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed. TO do: only modal include -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    <script type="text/javascript">

      var loaprice = 195;
      var publishableKey = 'pk_test_a7m5Q91it7KYngnGnfw2smDY';
      Stripe.setPublishableKey(publishableKey);

      function isNumeric(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
      }

      function change_price(obj) {
        if (isNumeric(obj)) {
          $('#form_loa_sum').val((obj*loaprice).toFixed(2) + ' €');
          $('#submit_id').val('SUBMIT and PAY ('+(obj*loaprice).toFixed(2)+' €)')
        }
        else {
          $('#form_loa_sum').val('0');
          $('#submit_id').val('SUBMIT and PAY')
        }

      }

    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

	<div class="col-sm-8 text-left"> 
		<div class="panel-body">

			<form id="demo-form" action="" method="POST" data-parsley-validate="">
        <input id="stripeToken_id" type="hidden" name="stripeToken" value="">
        <h2>West Bight Marina Berthing Application Form</h2>
        <p>Please complete all details below to apply for West Bight Marina Berthing.</p>
        <p>A ferry service between the Club pontoon and the West Bight of the marina will be available from lift-in until Lift Out. This will be the only point of access to the West Bight for RSGYC boats and a substantially improved service of boat access is anticipated. West Bight Details Mooring rates: Mid-April – Mid October LOA (meters) x €195</p>
        <ul>
          <li>Boats will be allocated a specific berth on the Marina West Bight</li>
          <li>Boats up to 40ft can be accommodated</li>
          <li>Launch service to and from the RSGYC only</li>
        </ul>
        <p>Launch Service Details:</p>
        <ul>
          <li>Launch service 7 – days a week from Lift In to Lift Out.</li>
          <li>Launch service will run every 30min departing the RSGYC with a pickup/ drop-off location on the West Bight marina.</li>
          <li>Launch service will run every 15 minutes on race days.</li>
          <li>Launches can be hailed on VHF Ch. 33/ M1 or by contacting the Boathouse on 086 734 5413</li>
        </ul>
        <p>Berths can only be reserved by RSGYC members through the RSGYC Sailing Office</p>
        <p>Please use the Comments box as required. Feedback on last year’s West Bight Berthing is most welcome and appreciated.</p>

      	<h3>Boat Details</h3>

        <div class="row">
          <div class="col-xs-6">
            <label for="form_boat_name">Boat Name * :</label>
            <input maxlength="50" id="form_boat_name_id" type="text" class="form-control" name="form_boat_name" required="">
          </div>
          <div class="col-xs-6">
            <label for="form_boat_name">Boat Manufacturer * :</label>
            <input maxlength="30" id="form_boat_manufacturer_id" type="text" class="form-control" name=" " required="">
          </div>
        </div>

        <div class="row">
          <div class="col-xs-4">
            <label for="form_loa">Length over all * :</label>
            <input id="form_loa_id" type="text" class="form-control" name="form_loa" required="" data-parsley-max="99" data-parsley-min="2" minlength="1" maxlength="5" onchange="change_price(this.value)">
          </div>

          <div class="col-xs-4">
            <label for="form_boat_type">Price:</label>
            <input id="form_loa_sum" type="text" disabled="disabled" class="form-control" name="form_loa_sum" value="0€">
          </div>          
          <div class="col-xs-4">
            <label for="form_boat_type">Boat Type * :</label>
            <input maxlength="30" id="form_boat_type_id" type="text" class="form-control" name="form_boat_type" required="">
          </div>
        </div>

        <p style="margin-top:10px">
          <label for="form_comments">Comments (optional):</label>
          <textarea maxlength="250" id="form_comments_id" class="form-control" name="form_comments"></textarea>
        </p>

        <h3>Member info</h3>

        <label for="form_name">Name * :</label>
        <input maxlength="30" id="form_name1_id" type="text" class="form-control" name="form_name1" required="">

        <label for="form_memberShipNumber1">Membership Number * :</label>
        <input maxlength="30" id="form_memberShipNumber1_id" type="text" class="form-control" name="form_memberShipNumber1" required="">

        <label for="form_mobileNumber1">Mobile * :</label>
        <input maxlength="30" id="form_mobileNumber1_id" type="tel" class="form-control" name="form_mobileNumber1" required="">

        <label for="form_email1">Email * :</label>
        <input maxlength="30" id="form_email1_id" type="email" class="form-control" name="form_email1" data-parsley-trigger="change" required="">


        <div id="additional_owner_2_info" style="display:none">
          <h3>Additional Owner 2 Info</h3>
          <label for="form_name">Name * :</label>
          <input maxlength="30" id="form_name2_id" type="text" class="form-control additional_owner_2_info_class" name="form_name2">
          <label for="form_memberShipNumber2">Membership Number * :</label>
          <input maxlength="30" id="form_memberShipNumber2_id" type="text" class="form-control additional_owner_2_info_class" name="form_memberShipNumber2">
          <label for="form_mobileNumber2">Mobile * :</label>
          <input maxlength="30" id="form_mobileNumber2_id" type="tel" class="form-control additional_owner_2_info_class" name="form_mobileNumber2">
          <label for="form_email2">Email * :</label>
          <input maxlength="30" id="form_email2_id" type="email" class="form-control additional_owner_2_info_class" name="form_email2" data-parsley-trigger="change">
        </div>


        <div id="additional_owner_3_info" style="display:none">
          <h3>Additional Owner 3 Info</h3>
          <label for="form_name">Name * :</label>
          <input maxlength="30" id="form_name3_id" type="text" class="form-control additional_owner_3_info_class" name="form_name3" >
          <label for="form_memberShipNumber3">Membership Number * :</label>
          <input maxlength="30" id="form_memberShipNumber3_id" type="text" class="form-control additional_owner_3_info_class" name="form_memberShipNumber3">
          <label for="form_mobileNumber3">Mobile * :</label>
          <input maxlength="30" id="form_mobileNumber3_id" type="tel" class="form-control additional_owner_3_info_class" name="form_mobileNumber3">
          <label for="form_email3">Email * :</label>
          <input maxlength="30" id="form_email3_id" type="email" class="form-control additional_owner_3_info_class" name="form_email3" data-parsley-trigger="change">
        </div>

        <button style="margin-top:10px;" type="button" onclick="toggleOwner23(this,2)" class="btn btn-success btn-xs">add Additional Owner 2</button>
        <button style="margin-top:10px;" type="button" onclick="toggleOwner23(this,3)" class="btn btn-success btn-xs">add Additional Owner 3</button>

        <p style="margin-top:10px">
          <label for="insurance_details">Insurance Details:</label>
          <textarea maxlength="160" required="" id="insurance_details_id" class="form-control" name="insurance_details" placeholder="Type here: Insurance Company Name/Policy no./Renewal Date"></textarea>
        </p>

        <div class="alert alert-warning" role="alert">
          <h3 style="margin-top:5px">Declaration:</h3>
          <ul style="padding-left: 10px;">
            <li>I/We hold adequate insurance against third party liability  for any one accident or series of accidents arising from any one occurrence for the period it is parked/moored/stored/ present on the Club's property.</li>
            <li>I/We acknowledge and agree that my/our boat will be parked/moored/stored/ present absolutely at my/our own risk, and I/We hereby indemnify the Royal St. George Yacht Club, its trustees, officers, staff and members against any loss or damage, accident, claim, injury or mishap arising from the use of Club Marinas, Storage Space, Crane, Pontoons or Members' facilities which shall be at my/our own personal risk. </li>
            <li>I/We warrant that my/ our boat is in a substantially good state of repair and in all respects the boat, her gear and equipment is in appropriate and safe condition to be parked/ moored/ stored/ present on the Club's property.</li>
            <li>I/We confirm the boat detailed is my/our property and accept that while availing of Club facilities I/we shall be responsible for the management and control of the vessel and the conduct of its crew.</li>
            <li>I/We confirm we have read, understand and accept the terms and conditions attaching to this application.</li>
          </ul>
        </div>

        <p>
          <input required="" type="checkbox" id="terms_and_conditions_id" name="terms_and_conditions" value="accept">I accept the declaration (terms and conditions)
        </p>

        <label for="form_parentName">Card Holder's Name * :</label>
        <input maxlength="30" id="cardholdername_id" type="text" name="cardholdername" maxlength="70" class="form-control" required="">

        <label for="form_parentName">Card Number * :</label>
        <input maxlength="18" id="cardnumber_id" type="text" name="cardnumber" maxlength="16" data-parsley-minlength="3" class="form-control" required="">

        <!-- Expiry-->
        <label for="form_card_expiry_date">Card Expiry Date & CVV * :</label>

        <div class="row">
          <div class="col-xs-4">
            <select id="exp_month_id" name="exp_month" data-stripe="exp-month" class="stripe-sensitive required form-control">
              <option value="" selected="selected">Month exp.</option>
              <?php 
                for($m=1; $m<=12; $m++){ 
                  $month = date("F",mktime(0,0,0,$m,1,2000)); 
                  print '<option value="'.sprintf("%'.02d", $m).'">'.$month."</option>\n";
                } 
              ?>
            </select>
          </div>
          <div class="col-xs-4">
            <select id="exp_year_id" name="exp_year" data-stripe="exp-year" class="stripe-sensitive required form-control">
              <option value="">Year exp.</option>
              <?php
                for($i=0; $i<=25; $i++) {
                print '<option value="'.(date("Y")+$i).'">'.(date("Y")+$i)."</option>\n";
              } ?>
            </select>
          </div>
          <div class="col-xs-4">
            <input type="text" id="cvv_id" name="cvv" placeholder="CVV" maxlength="3" data-parsley-minlength="3" data-parsley-type="number" required class="card-cvc form-control">
          </div>
        </div>

<?php
//      <input id="fill_the_form" type="button" class="btn btn-default" value="fill the form (debug version)"><br>
?>

      <div id="myModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body" id="modal_body_id">
            </div>
            <!-- dialog buttons -->
            <div class="modal-footer"><button type="button" data-dismiss="modal" class="btn btn-primary">CLOSE</button></div>
          </div>
        </div>
      </div>
      <br>
      <input id="submit_id" type="submit" name="submit-button" class="btn btn-primary" value="SUBMIT and PAY">
   
      <span class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </span>

    </form>
	</div>

  <script type="text/javascript">

<?php
/*
    function filltheform() {
      $('#form_boat_name_id').val('royalmarineboat');
      $('#form_boat_manufacturer_id').val('stocznia gdanska');
      $('#form_loa_id').val('2');
      $('#form_boat_type_id').val('arrow');
      $('#form_comments_id').val('some comments, some comments.');
      $('#form_name1_id').val('Marek Szyszko');
      $('#form_memberShipNumber1_id').val('1234243234234');
      $('#form_mobileNumber1_id').val('+353861055707');
      $('#form_email1_id').val('toporny@tlen.pl');
      $('#insurance_details_id').val('werwerwer');    
      $('#terms_and_conditions_id').prop("checked", true);
      $('#cardholdername_id').val('Marek Szyszko'); 
      $('#cardnumber_id').val('4242424242424242'); 
      $('#exp_month_id').val('12'); 
      $('#exp_year_id').val('2019'); 
      $('#cvv_id').val('123'); 
    }
   
    $('#fill_the_form').click(function() {
      filltheform();
    }); 
*/    
?>


    function stripeResponseHandler(status, response) {
      if (response.error) {
        alert(response.error.message);
      } else {
        var form$ = $("#demo-form");
        // token contains id, last4, and card type
        var token = response['id'];
        $('#stripeToken_id').val(token);
        //form$.get(0).submit();
        data = {
          stripeToken            : $('#stripeToken_id').val(),
          form_boat_name         : $('#form_boat_name_id').val(),
          form_boat_manufacturer : $('#form_boat_manufacturer_id').val(),
          form_loa               : $('#form_loa_id').val(),
          form_boat_type         : $('#form_boat_type_id').val(),
          form_comments          : $('#form_comments_id').val(),
          form_name1             : $('#form_name1_id').val(),
          form_memberShipNumber1 : $('#form_memberShipNumber1_id').val(),
          form_mobileNumber1     : $('#form_mobileNumber1_id').val(),
          form_email1            : $('#form_email1_id').val(),
          form_name2             : $('#form_name2_id').val(),
          form_memberShipNumber2 : $('#form_memberShipNumber2_id').val(),
          form_mobileNumber2     : $('#form_mobileNumber2_id').val(),
          form_email2            : $('#form_email2_id').val(),
          form_name3             : $('#form_name3_id').val(),
          form_memberShipNumber3 : $('#form_memberShipNumber3_id').val(),
          form_mobileNumber3     : $('#form_mobileNumber3_id').val(),
          form_email3            : $('#form_email3_id').val(),
          insurance_details      : $('#insurance_details_id').val()
        };

        $.ajax({
          url: "post.php",
          data: data,
          type: "POST",
          dataType: "json",   
          contentType: "text/plain",
          success:function(data)
          {
            $('#myModal').modal('show');
            $('.spinner').hide();
            $('#submit_id').removeAttr('disabled');
            if ((data.status == 1) || (data.status == -1)) {
              $('#modal_body_id').html(data.data_string);
            }
          },
          error:function(jqXHR,textStatus,errorThrown)
          {
            console.log('jqXHR', jqXHR);
            console.log('textStatus', textStatus);
            console.log('errorThrown', errorThrown);
            $('.spinner').hide();
            $('#submit_id').removeAttr('disabled');
            var data_string = '<div class="alert alert-danger"><strong>ERROR!</strong> Problem with sending money. </div>';
            $('#modal_body_id').html(data_string);
            $('#myModal').modal('show');
          }
        });
      }
    }


    $("#demo-form").submit(function(event) {
      var instance = $('#demo-form').parsley();
      if (instance.isValid()) {
        $('#submit_id').attr('disabled', 'disabled');
        $('.spinner').show();

        Stripe.createToken({
          number: $('#cardnumber_id').val(),
          cvc: $('#cvv_id').val(),
          exp_month: $('#exp_month_id').val(), 
          exp_year: $('#exp_year_id').val()
        }, stripeResponseHandler);          
      }
      return false; // submit from callback
    });
  </script>
  </body>
</html>
