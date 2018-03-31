<?php



class Item {

	private $id;
	private $name;
	private $price;
	private $image_url;
	private $description;

	function __construct($name='',$price=0,$image_url='',$description=''){
		$this->name=$name;
		$this->price=$price;
		$this->image_url=$image_url;
		$this->description=$description;
	}

	public function arrayAdapter ($row){
		$this->id=$row['id'];
		$this->name=$row['name'];
		$this->price=$row['price'];
		$this->image_url=$row['image_url'];
		$this->description=$row['description'];
		return $this;
	}

	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}
	public function setName($name){
		$this->name=$name;
		return $this;
	}

	public function getPrice(){
		return $this->price;
	}
	public function setPrice($price){
		$this->price=$price;
		return $this;
	}

	public function getImgUrl(){
		return $this->image_url;
	}
	public function setImgUrl($image_url){
		$this->image_url=$image_url;
		return $this;
	}

	public function getDescription(){
		return $this->description;
	}
	public function setDescription($description){
		$this->description=$description;
		return $this;
	}

}




?>