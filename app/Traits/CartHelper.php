<?php
namespace App\Traits;

trait CartHelper
{
   public function cart_subtotal($cart){
       $sum = 0;
       foreach($cart as $item){
            $sum += $item->sum();
        }
       return $this->format_price($sum);
   }

   public function format_price($input)
   {
       return number_format((float)$input, 2, config("app.shop.decimal_separator"), config("app.shop.thousand_separator"));
   }
}

