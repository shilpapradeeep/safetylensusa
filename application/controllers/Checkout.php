<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller 
{
	
  function to_paypal()
    {
    	$amount = $this->input->post('amount');
    	$resArray= $this->getAccessToken();
    	if(!empty($resArray['access_token']))
    	{
    		
    		$url= "https://api-m.sandbox.paypal.com/v2/checkout/orders";           
             $req = curl_init($url);
             $token = $resArray['access_token'];
            // curl_setopt($req, CURLOPT_HTTPHEADER, array(
            //     'Content-Type: application/json',
            //     'Authorization: Bearer '.$token,
               
            // ));
          curl_setopt($req, CURLOPT_HTTPHEADER , array("Content-Type: application/json", "Authorization: Bearer ".$token));
            $jsonData = '{
						  "intent": "CAPTURE",
						  "purchase_units": [
						    {
						      "amount": {
						        "currency_code": "USD",
						        "value": '.$amount.'
						      }
						    }
						  ]
						}';
        
           


            //Encode the array into JSON.
           // $jsonDataEncoded = http_build_query($jsonData);
            //set other curl options        
            curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($req, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($req, CURLOPT_TIMEOUT, 30);
           
            $http_method = 'POST';
            //set http method in curl
            curl_setopt($req, CURLOPT_CUSTOMREQUEST, $http_method);
            curl_setopt($req, CURLOPT_POST, true);
            curl_setopt($req, CURLOPT_POSTFIELDS, $jsonData);
            //make sure incoming payload is good to go, set it
            
    
            $raw = curl_exec($req);
            $array=json_decode($raw, true); 
            $this->checkCheckoutResponse($array);

    	}
            
    }
    function getAccessToken()
    {
    	$PAYPAL_CLIENT_ID = $this->config->item('client_id');
    	$PAYPAL_SECRET = $this->config->item('secret_key');
    	$curl = curl_init();
	    curl_setopt_array($curl, array(
	    CURLOPT_URL => "https://api.sandbox.paypal.com/v1/oauth2/token",
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_ENCODING => "",
	    CURLOPT_MAXREDIRS => 10,
	    CURLOPT_TIMEOUT => 30,
	    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	    CURLOPT_CUSTOMREQUEST => "POST",
	    CURLOPT_USERPWD => $PAYPAL_CLIENT_ID.":".$PAYPAL_SECRET,
	    CURLOPT_POSTFIELDS => "grant_type=client_credentials",
	    CURLOPT_HTTPHEADER => array(
	    "Accept: application/json",
	    "Accept-Language: en_US"
	    ),
	    ));

	    $result= curl_exec($curl);
		
	    $array=json_decode($result, true); 
	    $token=$array['access_token'];
	    return $array;
	   
    }
    function checkCheckoutResponse($res)
    {
        if(!empty($res))
        {
            if($res['status']==='CREATED')
            {
                $id = $res['id'];
                $links = $res['links'];
                $url = $links[1];
                if($this->session->userdata('l_uid'))
                {
                    $data['id'] = sec($id);
                }
                else
                {
                    $data['address'] = $this->session->userdata("cart_address");
                    $data['id'] = sec($id);
                    $data['link'] = $url;
                    $this->session->set_userdata('user_checkout',$data);
                    if($this->session->userdata('user_checkout'))
                    {
                        $result['res'] = 1;
                        $result['link'] = $url;
                    }

                }
            }
        }
        else
        {
            $result['res'] = 0;
            $result['msg'] = 'Something went wrong';
        }
        echo json_encode($result);
    }
}