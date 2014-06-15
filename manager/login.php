<?php

/**
 * Created by Dave Kinkead.
 * User: c0kind6
 * Date: 4/18/13
 * Time: 11:16 AM
 * To change this template use File | Settings | File Templates.
.......................................*/
ini_set("display_errors","off");
session_start();
if(isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
    session_start();
    $success = "?retry";

        if(!isset($_SESSION["user"])){
            require_once("db_include.php");
            //$password_md5=md5($_POST["password"]);
            $dbh = new PDO('mysql:host='.$hostname.';dbname='.$dbname.';charset=utf8', $username, $password);
            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sth = $dbh->prepare("SELECT * FROM admins a join members b on a.mid=b.mid where b.active = 1 and  upper(username) = ? and password = ?");
            $sth->execute(array(strtoupper($_POST["username"]),$_REQUEST["password"]));
            if($sth->rowCount() == 1){
                $success = "";
                foreach($sth as $row){
                    $_SESSION["user"] = $row;
                    break;
                }
                /*
                $sq = "select f.* from saptracker.users u join por.user_roles ur on u.uid = ur.user_id join por.function_roles fr on ur.role_id = fr.role_id join por.appfunctions f on fr.function_id = f.function_id where u.uid = ? ";
                $sth = $dbh->prepare($sq);
                $sth->execute(array($_SESSION["user"]["uid"]));
                $flist = ",";
                if($sth->rowCount()> 1){
                    foreach($sth as $row){
                        $flist .= $row["function_id"] . ",";

                    }
                    $_SESSION["user"]["functions"]=$flist;

                }
                $sq = "select role_id from por.user_roles where user_id = ?";
                $sth = $dbh->prepare($sq);
                $sth->execute(array($_SESSION["user"]["uid"]));
                $rolelist = ",";
                if($sth->rowCount()> 1){
                    foreach($sth as $row){
                        $rolelist .= $row["role_id"] . ",";

                    }
                    $_SESSION["user"]["roles"]=$rolelist;

                }
                */
            }
        }


    echo '<script>parent.location.replace(\''.$_SESSION["loginpath"]. $success . '\'); </script>';
    die();
}



if(!isset($_SESSION["user"])){
    $_SESSION["loginpath"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
    ?>
    <!--- target="loginframe" --->
    <div style="width:100%;" align="center">
        <div class="thumbnail alert-info" style="margin-top: 150px; padding: 0; width: 400px;">
            <form id="frmlogin" name="frmlogin" action="/login.php" method="post"  target="loginframe" >
                <h4 class="alert alert-block" style="margin-top: 0;">NNO Planning <span style="font-size: 85%;margin-left:20px;"> [Application Login]</span></h4>
                <label for="">Username: <input required type="text" id="username" name="username" /></label><br />
                <label for="">Password: <input required type="password" id="password" name="password" /></label><br />

                <input type="submit" id="loginbtn" class="btn btn-success" value="Login" />
                <!---&nbsp;&nbsp; or &nbsp;&nbsp;<input type="button" id="guestbtn" class="btn  btn-warning" value="Login as Guest [no password]" onclick="guestlogin();" />--->
                <br />
                <?php
                if(isset($_GET["retry"])){
                    echo "Invalid Login. Please try again.";
                }
                ?>
                <br />
            </form>
        </div>

    </div>

    <script>
        function guestlogin(){
            document.frmlogin.action="/login.php?guest=yes";
            document.frmlogin.submit();
        }
    </script>
    <iframe src="" id="loginframe" name="loginframe" style="display:none ;" style="border:1px solid black;" ></iframe>
    <?php
    echo "</body></html>";
    die();
}

