<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once "Controller.php";
include_once "model/LoginModel.php";
include_once "helper/phpmailer/mailer.php";
include_once "helper/functions.php";
class LoginController extends Controller
{

    public function dangkiTK($name, $gender, $email, $address, $phone, $password)
    {
        $userModel = new LoginModel();
        if (isset($name) === true && trim($name) === '') {
            // print_r('aab');
            // die;
            $_SESSION['regiserror'] = 'Tên không hợp lệ';
            header('location:singup.php');
            return;
        } elseif (isset($address) === true && trim($address) === '') {
            // print_r('aaa');
            // die;
            $_SESSION['regiserror'] = 'Địa chỉ không hợp lệ';
            header('location:singup.php');
            return;
        } elseif (isset($email) === true && trim($email) === '') {
            // print_r('aaa');
            // die;
            $_SESSION['regiserror'] = 'Email không hợp lệ';
            header('location:singup.php');
            return;
        } elseif (isset($phone) === true && trim($phone) === '') {
            // print_r('aaa');
            // die;
            $_SESSION['regiserror'] = 'Phone không hợp lệ';
            header('location:singup.php');
            return;
        } elseif (isset($password) === true && trim($password) === '') {
            // print_r('aaa');
            // die;
            $_SESSION['regiserror'] = 'Password không hợp lệ';
            header('location:singup.php');
            return;
        } elseif ($userModel->selectCustomers($email)) {
            $_SESSION['regiserror'] = 'Email đã tồn tại';
            header('location:singup.php');
        }
        try {
            $result = $userModel->insertCustomers($name, $gender, $email, $address, $phone, $password);
         //   $_SESSION['success_regis'] = 'Đăng Kí Thành Công';
            header('location:singup.php');
        } catch (Excetion $e) {
            echo $e;
            return;
        }
        $tokens = $email;
        $tokenDate = date('Y-m-d H:i:s', time());
        $tokenTime = time($tokenDate);
        $link = "http://localhost:8888/shop_balo/accept-order.php?token=$tokens&time=$tokenTime";
        $content = "
        Chào $name<br/>
        Vui lòng chọn vào link sau để xác nhận tài khoản:
        $link
        <br/>
        Thanks and Best Regard.
        ";
        maill($name, $email, 'XÁC NHẬN TÀI KHOẢN',$content);
    }

    public function dangnhapTk($username, $password)
    {

        $userModel = new LoginModel();
        $check = $userModel->selectLogin($username, $password);
        if ($check == false) {
            $_SESSION['error'] = 'Sai email hoặc password';
            header('location:singup.php');
        } else {
            $_SESSION['name'] = $username;
            $_SESSION['customer'] = $check;
            if (isset($_SESSION['error'])) {
                unset($_SESSION['error']);
            }
            header('location:index.php');
        }
    }

    public function selectUse($email)
    {
        $userModel = new LoginModel();
        $check = $userModel->selectCustomers($email);
        return $check;
    }

    public function dangXuatTk()
    {
        unset($_SESSION['name']);
        unset($_SESSION['cart']);
        unset($cart);
        header('location:index.php');
    }

   public function accept($token){
    $model = new LoginModel();
    $model->updateActive($token);
    header('location:singup.php');
    return;
   }
}
