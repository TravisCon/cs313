<?php
class Item 
{
    public $name = 'plantDefault';
    public $price = 0.0;
    public $quantity = 0;
    public $photoURL = "../photos/plants/plant_default.png";
    public $description = '';
                
    function __construct(){
        $argv = func_get_args();
        switch(func_num_args()) {
            case 3:
                self::__construct2($argv[0], $argv[1], $argv[2] );
            case 4:
                self::__construct3($argv[0], $argv[1], $argv[2],       $argv[3]); 
        }   
    }   
                    
    function __construct2($name, $price, $photo){
        $this->name = $name;
        $this->price = $price;
        $this->photoURL = $photo;
    }
                
    function __construct3($name, $price, $photo, $description){
        $this->name = $name;
        $this->price = $price;
        $this->photoURL = $photo;
        $this->description = $description;
    }
                
    public function displayBrowse(){
        echo '<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 item"><div        id="item">';
        echo '<form action="updateCart.php" method="get">';
        echo '<img class="img-responsive" src="'.$this->photoURL.'">';
        if (!($this->description == "")){
            echo '<p id="description" hidden>'.$this->description.'</p>';
        }
        echo '<h2 id="plant_title">'.$this->name."</h2>";
        printf('<h2 id="price">$%.2f</h2>', $this->price);
        echo '<h2 id="quantity">Quantity: 
        <input type="number" name="quantity" min="0" max="5"        value="0"></h2>';
        echo '<input type="text" name="item"  value="'.$this->name.'"       hidden>';
        echo '<input type="submit" value="Add To Cart">';
        echo '</form>';
        echo '</div></div>';
    }
    
    public function displayCart(){
        echo '<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12"><div        id="item">';
        echo '<img class="img-responsive" src="'.$this->photoURL.'">';
        echo '<h2 id="plant_title">'.$this->name."</h2>";
        printf('<h2 id="price">%d at $%.2f</h2>', $this->quantity, $this->price);
        printf('<h2 id="quantity">Subtotal: $%.2f</h2>', ($this->price * $this->quantity));
        echo '<a href="updateCart.php?quantity=-'.$this->quantity.'&item='.$this->name.'&remove=true" class="btn btn-default">Remove</a>';
        echo '</div></div>';
    }
    
        public function displayReceipt(){
        echo '<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12"><div        id="item">';
        echo '<img class="img-responsive" src="'.$this->photoURL.'">';
        echo '<h2 id="plant_title">'.$this->name."</h2>";
        printf('<h2 id="price">%d at $%.2f</h2>', $this->quantity, $this->price);
        printf('<h2 id="quantity">Subtotal: $%.2f</h2>', ($this->price * $this->quantity));
        echo '</div></div>';
    }
}