<?php
/*
*	Coupon_OrderExtension extends Order
*/
class Coupon_OrderExtension extends DataExtension {
	public static $db = array(
		'CouponCode' => 'Varchar'
	);

	// extend the after payment
	function onAfterPayment(){
		// Associate the coupon with a user to prevent mulitple use
		$mod = CouponModification::get()->filter(array('OrderID' => $this->owner->ID))->first();//$this->owner->Modifications()->exclude(array('CouponID' => null))->first();
		$customer = $this->owner->Member();

		if($mod && $mod->exists()){
			$coupon = Coupon::get()->filter(array('ID' => $mod->CouponID))->first();
			if($coupon && $coupon->exists()){
				$customer->Coupons()->add($coupon);
				$customer->write();
			}
		}
	}
}
