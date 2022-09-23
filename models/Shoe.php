<?php
include "./models/Db.php";

class Shoe
{
    public $id;
    public $manufacturer;
    public $color;
    public $size;
    public $material;

    public function __construct($id = null, $manufacturer = null, $color = null, $size = null, $material = null)
    {
        $this->id = $id;
        $this->manufacturer = $manufacturer;
        $this->color = $color;
        $this->size = $size;
        $this->material = $material;
    }

    public static function all()
    {
        $shoes = [];
        $db = new Db();
        $sql = "SELECT * FROM `shoes`";
        $result = $db->conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $shoes[] = new Shoe($row['id'], $row['manufacturer'], $row['color'], $row['size'], $row['material']);
        }

        $db->conn->close();
        return $shoes;
    }

    public static function create()
    {
        $db = new Db();
        $stmt = $db->conn->prepare("INSERT INTO `shoes`(`manufacturer`, `color`, `size`, `material`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $_POST['manufacturer'], $_POST['color'], $_POST['size'], $_POST['material']);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }

    public static function find($id)
    {
        $shoe;
        $db = new Db();
        $sql = "SELECT * FROM `shoes` WHERE `id` = " . $id;
        $result = $db->conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $shoe = new Shoe($row['id'], $row['manufacturer'], $row['color'], $row['size'], $row['material']);
        }

        $db->conn->close();
        return $shoe;
    }

    public static function update()
    {
        $db = new Db();
        $stmt = $db->conn->prepare("UPDATE `shoes` SET `manufacturer`=?,`color`=?,`size`=?,`material`=? WHERE `id` = ?");
        $stmt->bind_param("ssisi", $_POST['manufacturer'], $_POST['color'], $_POST['size'], $_POST['material'], $_POST['id']);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new Db();
        $stmt = $db->conn->prepare("DELETE FROM `shoes` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }
}
