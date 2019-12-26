<?php

class Cart
{
	public $items = [];
	public $totalQty = 0;
	public $totalPrice = 0;
	public $promtPrice = 0;
    
	public function __construct($oldCart=null){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
			$this->promtPrice = $oldCart->promtPrice;
		}
	}
	
	public function add($item, $qty=1){ 
		// if($item->promotion_price == 0){
		// 	$item->promotion_price = $item->value;
		// }
		$giohang = [
			'qty'=> 0, 
			'price' => $item->value, 
			'discountPrice'=>($item->value - ($item->value * $item->percent_sale)), 
			'item' => $item
		]; 
		if($this->items){
			if(array_key_exists($item->product_code, $this->items)){
				$giohang = $this->items[$item->product_code];
			}
        }
        
		$giohang['qty'] =  $giohang['qty'] + $qty;
		$giohang['price'] = $item->value;
		$giohang['discountPrice'] = ($item->value - ($item->value * $item->percent_sale));

		$this->items[$item->product_code] = $giohang;
		$this->totalQty = $this->totalQty + $qty;
		$this->totalPrice = $this->totalPrice + $qty*$giohang['item']->value;
		$this->promtPrice = $this->promtPrice + $qty*(($giohang['item']->value - ($giohang['item']->value * $giohang['item']->percent_sale)));
		
	}
	
	//update
	public function update($item, $qty=1){
		// if($item->promotion_price == 0){
		// 	$item->promotion_price = $item->value;
		// }
		$giohang = [
			'qty'=>$qty, 
			'price' => $item->value, 
			'discountPrice'=>$item->value - ($item->value * $item->percent_sale), 
			'item' => $item
		];
		$id = $item->product_code;
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$this->totalPrice -= $this->items[$id]['price'];
				$this->promtPrice -= $this->items[$id]['discountPrice'];
				$this->totalQty -= $this->items[$id]['qty'];
			}
		}
		$giohang['price'] = $item->value;
		$giohang['discountPrice'] = ($item->value - ($item->value * $item->percent_sale));

		$this->items[$id] = $giohang;
		$this->totalQty = $this->totalQty + $qty;
		$this->totalPrice = $this->totalPrice + ($giohang['item']->value)*$qty;
		$this->promtPrice = $this->promtPrice + ($giohang['item']->value - ($giohang['item']->value * $giohang['item']->percent_sale))*$qty;
    }
    
	//xóa 1
	public function reduceByOne($id){ 
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']->value;
		$this->items[$id]['discountPrice'] -= ($this->items[$id]['item']->value - ($this->items[$id]['item']->value * $this->items[$id]['item']->percent_sale));
		$this->totalQty--;
		$this->totalPrice = ($this->totalPrice - $this->items[$id]['item']->value);
		$this->promtPrice = ($this->promtPrice - ($this->items[$id]['item']->value - ($this->items[$id]['item']->value * $this->items[$id]['item']->percent_sale)));
		
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	
	//xóa sản phẩm khỏi cart
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -=  ($this->items[$id]['item']->value * $this->items[$id]['qty']);
		$this->promtPrice -= ($this->items[$id]['item']->value - ($this->items[$id]['item']->value * $this->items[$id]['item']->percent_sale))* $this->items[$id]['qty'];	
	//	$this->promtPrice -=  ($this->items[$id]['item']->value * $this->items[$id]['item']->percent_sale);		
		unset($this->items[$id]);
	}
	
	
}


?>