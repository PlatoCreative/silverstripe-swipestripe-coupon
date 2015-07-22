<?php
/*
*	Coupon_CustomerExtension extends Customer
*/
class Coupon_CustomerExtension extends DataExtension {
	public static $db = array(
	);

	public static $has_one = array(
	);

	public static $has_many = array(
	);

	public static $many_many = array(
		'Coupons' => 'Coupon'
	);

	public function updateCMSFields(FieldList $fields){
		return $fields;
	}
}
