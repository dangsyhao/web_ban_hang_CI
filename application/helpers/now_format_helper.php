<?php


//Thiet lap dinh dang thoi gian 

function now_format()
{
	$fomat_date= "%d-%m-%Y";
	$now=now();
	
	return mdate($fomat_date,$now);
}
