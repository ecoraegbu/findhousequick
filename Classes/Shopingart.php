<?php
class Shoppingcart {
  private $connection;
  private $cart;

  public function __construct() {
    // Start the session for the cart
    Session::put('cart', array());

    // Get the database instance
    $this->connection = Database::getInstance();

    // Get the current cart contents
    $this->cart = Session::get('cart');
  }

  /**
   * Add a product to the cart or update its quantity if it already exists
   * @param string $product_name The name of the product to add to the cart
   * @param float $price The price of the product
   * @param int $quantity The quantity of the product to add (default: 1)
   */
  public function add_to_cart($product_name, $price, $quantity = 1) {
    // If the product is already in the cart, update the quantity
    if(isset($this->cart[$product_name])) {
      $this->cart[$product_name]['quantity'] += $quantity;
    } else { // Otherwise, add the product to the cart
      $this->cart[$product_name] = array(
        'price' => $price,
        'quantity' => $quantity
      );
    }

    // Update the cart contents in the session
    Session::put('cart', $this->cart);
  }

  /**
   * Remove a product from the cart or update its quantity if specified
   * @param string $product_name The name of the product to remove from the cart
   * @param int|null $quantity The quantity to remove (default: null = remove product entirely)
   */
  public function remove_from_cart($product_name, $quantity = null) {
    // If the product is in the cart, update the quantity or remove the product entirely
    if(isset($this->cart[$product_name])) {
      if($quantity === null || $this->cart[$product_name]['quantity'] <= $quantity) {
        unset($this->cart[$product_name]);
      } else {
        $this->cart[$product_name]['quantity'] -= $quantity;
      }
    } else { // Otherwise, the product is not in the cart
      return;
    }

    // Update the cart contents in the session
    Session::put('cart', $this->cart);
  }

  /**
   * Remove all products from the cart
   */
  public function empty_cart() {
    // Set the cart to an empty array
    $this->cart = array();

    // Update the cart contents in the session
    Session::put('cart', $this->cart);
  }

  /**
   * Calculate the total price of all products in the cart
   * @return float The total price of all products in the cart
   */
  public function get_cart_total() {
    // Calculate the total price of all products in the cart
    $total = 0;
    foreach ($this->cart as $product_name => $product_details) {
      $total += $product_details['price'] * $product_details['quantity'];
    }

    return $total;
  }

  /**
   * Get the current contents of the cart
   * @return array The current contents of the cart
   */
  public function get_cart_contents() {
    return $this->cart;
  }
  /**
* Get the total number of products in the cart
* @return int The total number of products in the cart
*/
public function get_cart_count() {
  // Get the current cart contents
  $cart = Session::get('cart');

  // Calculate the total number of products in the cart
  $count = 0;
  foreach ($cart as $product_details) {
      $count += $product_details['quantity'];
  }

  return $count;
}

/**
* Get the quantity of a specific product in the cart
* @param string $product_name The name of the product to get the quantity of
* @return int|null The quantity of the product in the cart, or null if it is not in the cart
*/
public function get_product_quantity($product_name) {
  // Get the current cart contents
  $cart = Session::get('cart');

  // If the product is in the cart, return its quantity
  if (isset($cart[$product_name])) {
      return $cart[$product_name]['quantity'];
  } else { // Otherwise, the product is not in the cart
      return null;
  }
}

/**
* Get the subtotal (price x quantity) of a specific product in the cart
* @param string $product_name The name of the product to get the subtotal of
* @return float|null The subtotal of the product in the cart, or null if it is not in the cart
*/
public function get_product_subtotal($product_name) {
  // Get the current cart contents
  $cart = Session::get('cart');

  // If the product is in the cart, calculate and return its subtotal
  if (isset($cart[$product_name])) {
      $product_details = $cart[$product_name];
      return $product_details['price'] * $product_details['quantity'];
  } else { // Otherwise, the product is not in the cart
      return null;
  }
}
/**
 * Get the count of unique items in the cart
 * @return int The count of unique items in the cart
 */
public function get_unique_item_count() {
  // Get the current cart contents
  $cart = Session::get('cart');

  // Get the count of unique items in the cart
  $unique_items = array_keys($cart);
  $count = count($unique_items);

  return $count;
}

}
?>

