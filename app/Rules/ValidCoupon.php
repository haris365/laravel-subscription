<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Laravel\Cashier\Cashier;

use Stripe\Coupon as StripeCoupon;
use Stripe\Exception\InvalidRequestException;

class ValidCoupon implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

     protected $messages;
    public function __construct()
    {
       
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            $stripe = new \Stripe\StripeClient( config('cashier.secret') );
            $coupon = $stripe->coupons->retrieve($value, []);

            if( !$coupon->valid )
            {
                $this->message = "Coupon Expired!";
                return false;
            }           

        } catch(InvalidRequestException $e)
        {
            $this->message = "Coupon does not exist!";
            return false;

        }
        return true;           
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
