<?php

class Items {
	private $id;
	private $name;
	private $price;
	private $image_url;
	private $description;

	// 可以给构造函数传默认值
	function __construct($id='',$name='',$price=0,$image_url='',$description=''){
		$this->id=$id;
		$this->name=$name;
		$this->price=$price;
		$this->image_url=$image_url;
		$this->description=$description;
	}

// $row 是固定用法吗？可以替换成任意值
	// 括号里传值后就可以return $this了
	public function arrayAdapter($row){
		$this->id=$row['id'];
		$this->name=$row['name'];
		$this->price=$row['price'];
		$this->image_url=$row['image_url'];
		$this->description=$row['description'];
		return $this;
	}
	// 改成return $this 行不行？不可以，没有在括号里传值
	public function getID(){
		return $this->id;
	}
	public function setID($id){
		$this->id=$id;
		return $this;
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