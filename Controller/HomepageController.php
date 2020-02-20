<?php


class HomepageController
{
    private $customers = array();
    private $products = array();
    private $groups = array();


    public function __construct(){
        //create json  and objects products
        $products_json = file_get_contents('JSON/products.json');
        $products_array = json_decode($products_json, true);

        foreach ($products_array as $products) {
            array_push($this->products, $products['name'] = new Products ($products['name'], $products['id'], $products['description'], $products['price']));
        }


        //create json and objects customers
        $Customers_json = file_get_contents('JSON/customers.json');
        $Customers_array = json_decode($Customers_json, true);

        foreach ($Customers_array as $customer) {
            array_push($this->customers, $customer['name'] = new Customer ($customer['name'], $customer['id'], $customer['group_id']));
        }

        //create json Groups
        $Groups_json = file_get_contents('JSON/groups.json');
        $Groups_array = json_decode($Groups_json,true);

        foreach ($Groups_array as $group) {
            //if value of these properties is null,  change it to a 0 or a string
            if (empty($group['variable_discount'])){
                $group['variable_discount'] = 0;
            }
            if (empty($group['fixed_discount'])){
                $group['fixed_discount'] = 0;
            }
            if (!isset($group['group_id'])){
                $group['group_id'] = 'no';
            }

            //create array of group class objects
            array_push($this->groups, $group['name']  = new Group ($group['id'], $group['name'], $group['variable_discount'], $group['fixed_discount'], $group['group_id']));
        }
<<<<<<< HEAD
        //var_dump($allGroups);
=======
        //var_dump($this->groups);
>>>>>>> 758e263c5bedc4e98aafea7d46aa71d2db826d03
    }

    // creates list to be displayed in the drop down menu, using previous function as parameter
    public function createProductsList($allProducts)
    {
        $list_array = array();
        for ($i = 0; $i < count($allProducts); $i++) {
            $list_item = "<option value =" . $allProducts[$i]->getId() . ">" . ucfirst(strtolower($allProducts[$i]->getName())) . "</option>";
            array_push($list_array, $list_item);
        }

        return implode('<br>', $list_array);
    }

    //createProductsList($allProducts);
    public function createCustomerObject($all)
    {
        $list_array = array();
        for ($i = 0; $i < count($all); $i++) {
            $list_item = "<option >" . ucwords(strtolower($all[$i]->getName())) . "</option>";
            array_push($list_array, $list_item);
        }
        return implode('<br>', $list_array);
    }

     public function getChosenOne($customer_selected)
    {
        foreach ($this->customers as $chosenOne) {

            if ($customer_selected == $chosenOne->getName()) {
                //group Id
                return $chosenOne;
            }
        }

    }

<<<<<<< HEAD
    public function getChosenProduct($product_selected)
    {
        foreach ($this->products as $chosenProduct) {

            if ($product_selected == $chosenProduct->getId()) {
                return $chosenProduct;
            }
        }

    }
=======

>>>>>>> 758e263c5bedc4e98aafea7d46aa71d2db826d03

//render function with both $_GET and $_POST vars available if it would be needed.
public function render()
    {

        if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST)) {
           $customer_selected = $_POST ['customerName'];

           //this is the id of the product
           $product_selected = $_POST ['productName'];

            //chosen customer object
            $foundHim = $this->getChosenOne($customer_selected);
            var_dump($foundHim);

           foreach($this->products as $chosenProduct){

               if($product_selected == $chosenProduct->getId()){
<<<<<<< HEAD
                   $chosenProduct;
                   var_dump($chosenProduct);
=======
                  //var_dump($chosenProduct);
>>>>>>> 758e263c5bedc4e98aafea7d46aa71d2db826d03
               }
           }

            //get group that belongs to customer
            foreach ($this->groups as $group){
                if($foundHim->getGroupId() == $group->getId()){
                    $chosenGroup = $group;
                    var_dump($chosenGroup);
                }
            }

            foreach ($this->groups as $group){
                if($chosenGroup->getGroupId()== $group->getId()){
                    $nestedGroup =$group;
                    var_dump($nestedGroup);
                }
            }

            foreach ($this->groups as $group){
             if($nestedGroup->getGroupId() == $group->getId()){

                 $superNestedGroup = $group;
                 var_dump($superNestedGroup);
             }
            }
           //get all groups that belong to group



        }else{
            $_POST["customerName"] =$_POST ["customerName"] = 0;
            $_POST["productName"] =$_POST ["productName"] = 0;
            }

        }

        //var_dump($chosenProduct);
        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.
<<<<<<< HEAD
//var_dump($this->products);
=======

>>>>>>> 758e263c5bedc4e98aafea7d46aa71d2db826d03
        //load the view
        require 'View/homepage.php';
    }
}
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}
//whatIsHappening();