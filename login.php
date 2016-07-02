<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- CSS  -->
    <script src="js/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css">
</head>
<body>

    <?php
    /**
     * Created by PhpStorm.
     * User: LUK
     * Date: 7/2/2016
     * Time: 12:31 PM
     */
        require_once "connect.php";
        require_once "function.php";
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $query = 'SELECT * FROM admin';
        $data = $db->query($query);
        $level = 0;
    var_dump($_POST);
        $row = $data->fetch_assoc();
            foreach ($data as $row) {
                if ($username == $row['user'] && $password == $row['pass']) {
                    $row['level'] == $level;
                    session_start();
                    $_SESSION['nama'] = $row['nama'];
                }
            }
                if ($level == 1) {
                    echo "<script>
                        swal({
                            title: \"Login Sukses!\",
                            text: \"Selamat Datang $username\",
                            type: \"success\"
                         },
                    function () {
                        window.location.href = 'home_admin.php';
                    });
                        </script>";
                } elseif ($level > 1) {
                    echo "<script>
                         swal({
                            title: \"Login Sukses!\",
                            text: \"Selamat Datang $username\",
                            type: \"success\"
                        },
                    function () {
                        window.location.href = 'home_pegawa.php';
                    });
                        </script>";
                } else echo "<script>
                        swal({
                            title: \"Gagal!\",
                            text: \"Username atau Password Salah\",
                            type: \"error\"
                        },
                    function () {
                        window.location.href = 'index.php';
                    });
                    </script>";
    ?>
</body>
</html>