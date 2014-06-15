<?php
/**
 * Created by Dave Kinkead.
 * User: c0kind6
 * Date: 11/8/13
 * Time: 1:30 PM
 */
require_once("db_include.php");
ini_set("display_errors","Off");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <title>Grace Bible Church of Phoenix Manager</title>
    <style>
        td{font-size: 10px; }
        table{background-color: #000000;}

    </style>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("jquery", "1");
    </script>
    <?php /*
    <script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js" type="text/javascript"></script>
    */ ?>
    <script type="text/javascript" src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet" />
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/flexigrid.pack.css" />
    <script type="text/javascript" src="js/flexigrid.pack.js"></script>
<?php /*
    <link href="/assets/css/csstree.css" rel="stylesheet" />
    <script type="text/javascript" src="/assets/js/global.js" charset="utf-8"></script>
    <link type="text/css" rel="stylesheet" href="/assets/css/global.css" charset="utf-8" />
 */ ?>
    <script>
        $(document).ready(function(){

            $(".loadpage").on("click",function(){
                $("#mainmenu button").removeClass("btn-inverse");
                $("#bdy").load($(this).attr("data-page"));
                $(this).addClass("btn-inverse");

            })
        })


    </script>
    <style>
        a:active, a:focus { outline-style: none !important; -moz-outline-style:none !important; }
        li { outline-style: none !important; -moz-outline-style:none !important; }
        button { outline-style: none !important; -moz-outline-style:none !important; }
    </style>
</head>
<body>
<div style="position : absolute; top: 60px; bottom:93px;  display:block; min-height:732px">

    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid" style="position:relative;height:80px;">
                <a style="margin-left:35%" class="brand " href="#"><h3 style="margin-top: -11px; opacity: .5">Grace Bible Church Manager</h3></a>
               <!-- --><img id="gbclogo" width="224px" src="http://gracebiblechurchofphoenix.org/wp-content/uploads/2013/08/gbc_logo_new_300.png" style="position:absolute;top:15px;left:10px;width:224px" />
                <table class="navbar-text pull-right" style=" line-height: 28px;">
                    <tr> <td>GBC Manager</td><td><span class="logout">Logout</span></td></tr>


                    <?php if(strpos($_SESSION["user"]["functions"],",26,")){ ?>
                        <tr><td colspan="2"><a style="font-sixe:9px" href="admin.php">Administration</a></td> </tr>

                    <?php } ?>
                    <tr><td colspan="2"><sup>Logged in as <a href="#" class="navbar-link"><?php echo $_SESSION["user"]["username"]; ?></a></sup></td> </tr>

                </table>

            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<!-- Button trigger modal:  data-toggle="modal" data-target="#myModal" -->
<div class="thumbnail" style="position: fixed;
top: 35px;
z-index: 10000;
left: 250px;">
    <div class="btn-group" id="mainmenu">
        <button type="button" class="btn btn-default loadpage" data-page="includes/members.php">Members</button>
        <button type="button" class="btn btn-default loadpage" data-page="includes/families.php">Families</button>
        <button type="button" class="btn btn-default loadpage" data-page="includes/graphs.php">Attendance</button>
        <button type="button" class="btn btn-default loadpage" data-page="includes/make_flow_graph.php">Donations</button>
        <button type="button" class="btn btn-default loadpage" data-page="includes/make_nw_flow_graph.php">Forms</button>
        <button type="button" class="btn btn-default loadpage" data-page="includes/make_nw_mbps_graph.php">Social Media</button>
        <button type="button" class="btn btn-default loadpage" data-page="includes/make_mbps_graph.php">Email Center</button>


    </div>
</div>

<div id="bdy" style="padding-left: 30px;
padding-top: 20px;
background-color: #D5D8E4;
position: absolute;
top: 81px;
left: 0;
right: 0;
bottom: 0;height: 114%;"></div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit Firewalls</h4>
            </div>
            <div class="modal-body">
                <?php
                $sq="";
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
</body>
</html>