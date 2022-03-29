<?php

class query
{
    private $cnn = null;
    private $Address = "";

    public function __construct()
    {
        include './connector.php';
        $this->cnn = $cnn;
        $this->Address = $server_address;
    }

    public function getBanner($sql)
    {

        $result = mysqli_query($this->cnn, $sql);
        $export = array();
        $counter = 0;
        while (($row = mysqli_fetch_assoc($result))) {
            $ex = array();
            $ex['id'] = intval($row['id']);
            $ex['title'] = $row['title'];
            $ex['description'] = $row['description'];
            //split price
            $ex['price'] = number_format($row['price']);
            $ex['userID'] = intval($row['userID']);
            $phone = $this->getUserPhone($row['userID']);
            $ex['tell'] = $phone['tell'];

            $ex['city'] = $row['city'];
            $ex['category'] = $row['category'];
            $ex['img1'] = $row['img1'];
            $ex['img2'] = $row['img2'];
            $ex['img3'] = $row['img3'];
            $ex['status'] = $row['status'];
            $ex['date'] = $this->calculate_time($row['date']);

            $export[$counter] = $ex;
            $counter++;
        }

        return $export;
    }

    function calculate_time($date)
    {
        $datetime1 = strtotime(date('Y-m-d H:i:s'));
        $datetime2 = strtotime($date);
        $seconds = abs($datetime2 - $datetime1);
        $min = round($seconds / 60);
        $result = $min;

        if ($min <= 59) {
            if ($min <= 1)
                $result = "همین الان";
            else
                $result .= " دقیقه پیش";
        } else if ($min > 60 && $min <= 60 * 24) {
            $h = round($min / 60);
            $result = $h . " ساعت پیش";
        } else if ($min > 60 * 24 && $min <= 60 * 24 * 30) {
            $hh = round($min / 60 / 24);
            $result = $hh . " روز پیش";
        } else if ($min > 60 * 24 * 30 && $min < 60 * 24 * 30 * 12) {
            $hhh = round($min / 60 / 24 / 30);
            $result = $hhh . " ماه پیش";
        } else if ($min >= 60 * 24 * 30 * 12) {
            $hhhh = round($min / 60 / 24 / 30 / 12);
            $result = $hhhh . " سال پیش";
        }
        return $result;
    }

    public function getUserPhone($id)
    {
        $sql = "select * from user where id='$id'";
        $result = mysqli_query($this->cnn, $sql);
        $row = mysqli_fetch_array($result);

        $export = array();
        $export['id'] = intval($row['id']);
        $export['tell'] = $row['tell'];
        return $export;

    }

    public function getUserIDWIthPhone($tell)
    {
        $sql = "select * from user where tell='$tell'";
        $result = mysqli_query($this->cnn, $sql);
        $row = mysqli_fetch_array($result);

        return intval($row['id']);
    }

    public function addUser($tell)
    {
        $sql = "insert into user(tell) values ('$tell')";

        $result = mysqli_query($this->cnn, $sql);
    }

    //send activation key
    public function sendActivationKey($mobile)
    {
        //create random number
        $send_activation_key = rand(1000, 9999);

        $sql = "insert into activation(mobile,activation_key)values('$mobile','$send_activation_key')";

        $ex = array();
        $result = mysqli_query($this->cnn, $sql);
        if ($result) {
            $ex['msg'] = "کد فعالسازی برای شما ارسال شد";
            $ex['status'] = true;
        } else {
            $ex['msg'] = "اطلاعات وارد شده صحیح نیست !!!";
            $ex['status'] = false;
        }
        return $ex;

        /*
         //send activation key to phoneNumber
         require 'vendor/autoload.php';
         $sender = "1000596446";
         $receptor = $mobile;
         $message = "کد فعال سازی: " . $send_activation_key;

         $api = new \Kavenegar \KavenegarApi("6974695A466E634D4B7845314E544233764A5030716643767849676A774A31474965724C4F7A6639454D553D");
         $api->Send($sender, $receptor, $message);*/
    }

    //login/apply activation key
    public function login($mobile, $apply_activation_key)
    {
        $sql = "select * from activation where mobile='$mobile' and activation_key='$apply_activation_key'";
        $result = mysqli_query($this->cnn, $sql);
        $row = mysqli_fetch_array($result);
        $ex = array();
        if ($row != null && $apply_activation_key = $row['activation_key']) {
            $ex['msg'] = "ورود با موفقیت انجام شد";
            $ex['status'] = true;
            $this->addUser($mobile);
        } else {
            $ex['msg'] = "اطلاعات وارد شده صحیح نیست !!!";
            $ex['status'] = false;
        }
        return $ex;
    }

    //add/edit/delete banner
    public function addBanner($title, $desc, $price, $userId, $city, $cate, $img1, $img2, $img3, $date)
    {
        $result = array();
        $sql = "insert into banners(title,description,price,userID,city,category,img1,img2,img3,date) values ('$title','$desc','$price','$userId','$city','$cate','$img1','$img2','$img3','$date')";
        if (mysqli_query($this->cnn, $sql))
            $result['msg'] = "آگهی مورد نظر ثبت شد و در انتظار بررسی است!!!";
        else
            $result['msg'] = "ثبت آگهی با مشکل مواجه شد";

        return $result;
    }

    public function editBanner($id, $title, $desc, $price, $userId, $city, $cate, $img1, $img2, $img3, $date, $status)
    {
        $sql = "update banners set title='$title',description='$desc',price='$price',userID='$userId',city='$city',category='$cate',img1='$img1',img2='$img2',img3='$img3', date='$date',status='$status' where id='$id'";
        $result = array();
        if (mysqli_query($this->cnn, $sql))
            $result['msg'] = "آگهی مورد نظر با موفقیت آپدیت شد منتظر تایید آگهیتان باشید!";
        else
            $result['msg'] = "آپدیت با شکست مواجه شد!!";

        return $result;
    }


    public function deleteBanner($id)
    {
        $sql = "DELETE FROM banners WHERE id=$id";
        $result = array();
        if (mysqli_query($this->cnn, $sql))
            $result['msg'] = "آگهی مورد نظر حذف شد!!!";
        else
            $result['msg'] = "حذف با شکست مواجه شد";

        return $result;
    }

    //get user id by phone
    public function getUserIdFromPhone($tell)
    {
        $sql = "select * from user where tell='$tell'";

        $result = mysqli_query($this->cnn, $sql);
        $row = mysqli_fetch_array($result);
        $userID = array();
        if (mysqli_query($this->cnn, $sql))
            $userID['userId'] = intval($row['id']);
        return $userID;
    }

    //get phone by user id
    public function getPhoneNumberFromUserId($id)
    {
        $sql = "select * from user where id='$id'";

        $result = mysqli_query($this->cnn, $sql);
        $row = mysqli_fetch_array($result);
        $tell = "";
        if (mysqli_query($this->cnn, $sql))
            $tell['tell'] = $row['tell'];
        return $tell;

    }

    public function getImageBanner($id)
    {
        $sql = "select * from banners where id=$id ";

        $result = mysqli_query($this->cnn, $sql);
        $row = mysqli_fetch_array($result);
        $ex = array();
        if (mysqli_query($this->cnn, $sql)) {
            $ex['image1'] = $row['img1'];
            $ex['image2'] = $row['img2'];
            $ex['image3'] = $row['img3'];

        }
        return $ex;
    }

    public function getMessages($sql)
    {
        $result = mysqli_query($this->cnn, $sql);
        $export = array();
        $counter = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $ex = array();
            $ex['id'] = intval($row['id']);
            $ex['sender'] = $row['sender'];
            $ex['receiver'] = $row['receiver'];
            $ex['message'] = $row['message'];
            $ex['bannerID'] = intval($row['bannerID']);
            $ex['bannerImage'] = $row['bannerImage'];
            $ex['bannerTitle'] = $row['bannerTitle'];

            $export[$counter] = $ex;
            $counter++;
        }

        return $export;
    }


    public function uploadFile($file)
    {
        $path = "images/";
        $result = null;
        //create random name
        $fileName = date("y-m-d-g-i-s-") . rand() . "." . pathinfo($file['name'], PATHINFO_EXTENSION);
        if ($path != null && $path != "") {
            //get file name
            if (is_uploaded_file($file['tmp_name'])) {
                //save file
                if (move_uploaded_file($file['tmp_name'], $path . $fileName)) {
                    $result['state'] = true;
                    $result['fileName'] = $path . $fileName;
                }
            }
        }
        return $result;
    }

    public function removeFile($path)
    {
        //upload new photo -> replace old photo
        $FileName = $path;
        $FileHandle = fopen($FileName, 'w') or die("cant open file");
        fclose($FileHandle);
        unlink($FileName);
    }
}
