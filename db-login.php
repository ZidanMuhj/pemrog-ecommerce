<?php
                    if(isset($_POST['submit'])) {
                        session_start();

                        include 'db.php';
                        $user = mysqli_real_escape_string($conn,$_POST['fullname']);
                        $pass = mysqli_real_escape_string($conn,$_POST['pass']);

                        $query_sql = "SELECT * FROM tb_regis WHERE fullname = '$user' AND pass = '$pass' ";
                        $result = mysqli_query($conn, $query_sql);
                        if(mysqli_num_rows($result) > 0){
                            echo '<script>window.location="dashboard.php"</script>';
                        }else{
                            echo "<center><h1>User atau Password anda salah. Silahkan coba login kembali.</h1>
                                    <button><strong><a href='dashboard.php.php>Login<a></strong></button></center>";
                        }
            
                }
            ?>