<?php

function formatAmount($amount){
	if ( strpos( $amount, "." ) !== false ) {
		return 'Rs.'.' '.number_format($amount,2,".",",");
    }
	return 'Rs.'.' '.number_format($amount,0,".",",");
}
function formatAmountKw($amount){
	if ( strpos( $amount, "." ) !== false ) {
		return number_format($amount,2,".","").' '.'kW';
    }
	return number_format($amount,0,".","").' '.'kW'; 
}

function generateRandomString($length = 12) {
	$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}