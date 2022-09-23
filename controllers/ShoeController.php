<?php
include "./models/Shoe.php";

class ShoeController
{
    public static function index()
    {
        $shoes = Shoe::all();
        return $shoes;
    }

    public static function show()
    {
        $shoe = Shoe::find($_POST['id']);
        return $shoe;
    }
    
    public static function store()
    {
        Shoe::create();
    }
    
    public static function edit()
    {

    }
    
    public static function update()
    {
        $shoe = new Shoe();
        $shoe->id = $_POST['id'];
        $shoe->manufacturer = $_POST['manufacturer'];
        $shoe->color = $_POST['color'];
        $shoe->size = $_POST['size'];
        $shoe->material = $_POST['material'];
        $shoe->update();

    }
    
    public static function destroy()
    {
        Shoe::destroy($_POST['id']);
    }
}
