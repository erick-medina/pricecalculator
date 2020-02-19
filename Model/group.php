<?php

// getting all json files
$groups_json = file_get_contents('JSON/groups.json');

//decoding json files into arrays
$groups_array = json_decode($groups_json);
//var_dump($groups_array);


class Group
{
    private $id;
    private $name;
    private $variable_discount;
    private $fixed_discount;
    private $group_id;

    public function __construct($id, $name, $variable_discount, $fixed_discount, $group_id ) {
        $this->id = $id;
        $this->name = $name;
        $this->variable_discount = $variable_discount;
        $this->fixed_discount = $fixed_discount;
        $this->group_id = $group_id;

    }
    public function getId() : string
    {
        return $this->id;
    }
    public function getName() : string
    {
        return $this->name;
    }
    public function getVariableDiscount()
    {
        if ($this->variable_discount == null) {
            $this->variable_discount = 0;
        }
        return $this->variable_discount;

    }
    public function fixedDiscount()
    {
        if ($this->fixed_discount == null) {
            $this->fixed_discount = 0;
        }
        return $this->fixed_discount;
    }

    public function getGroupId() : string
    {
        return $this->group_id;
    }


}