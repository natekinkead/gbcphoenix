<style>
    .contactdivs {
        border: 1px solid #999999;
        display: inline-block;
        float: left;
        margin-right: 10px;
        padding: 10px;
        height: 190px
    }

    #alphatabs li {
        max-height: 20px !important;
        margin: 0 !important;
    }

    #alphatabs a {
        max-height: 20px !important;
        margin: 0 !important;
        padding: 0 0 0 10px !important;
    }

    #alphatabs > .active > a {
        color: #FFFFFF;
        background-color: #0F0E0E;
    }

    .pointer {
        cursor: pointer;
    }

    .nav-tabs > li > a {
        padding-top: 8px;
        padding-bottom: 8px;
        line-height: 20px;
        border: 1px solid rgba(78, 60, 60, .3);
        -webkit-border-radius: 4px 4px 0 0;
        -moz-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;
        border-bottom: none;
        background-color: #EEEEEE;

    }

    .nav-tabs > li > a:hover {
        padding-top: 8px;
        padding-bottom: 8px;
        line-height: 20px;
        border: 1px solid rgba(78, 60, 60, 1);
        -webkit-border-radius: 4px 4px 0 0;
        -moz-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;
        border-bottom: none;
        background-color: #EFF7E1;
    }
</style>
<table>
    <tr>
        <td style="vertical-align: top">
            <div style="position: relative;width: 312px;height: 1000px;">
                <ul id="alphatabs" class="nav nav-tabs nav-stacked"
                    STYLE="width: 70px;position: absolute;top:30px; left: 0;">
                    <li><a href="#">A</a></li>
                    <li><a href="#">B</a></li>
                    <li><a href="#">C</a></li>
                    <li><a href="#">D</a></li>
                    <li><a href="#">E</a></li>
                    <li><a href="#">F</a></li>
                    <li><a href="#">G</a></li>
                    <li><a href="#">H</a></li>
                    <li><a href="#">I</a></li>
                    <li><a href="#">J</a></li>
                    <li><a href="#">K</a></li>
                    <li><a href="#">L</a></li>
                    <li><a href="#">M</a></li>
                    <li><a href="#">N</a></li>
                    <li><a href="#">O</a></li>
                    <li><a href="#">P</a></li>
                    <li><a href="#">Q</a></li>
                    <li><a href="#">R</a></li>
                    <li><a href="#">S</a></li>
                    <li><a href="#">T</a></li>
                    <li><a href="#">U</a></li>
                    <li><a href="#">V</a></li>
                    <li><a href="#">W</a></li>
                    <li><a href="#">X</a></li>
                    <li><a href="#">Y</a></li>
                    <li><a href="#">Z</a></li>
                </ul>
                <div CLASS="thumbnail" id="memlistwrapper"
                     style="width: 252px;height:596px; background-color: #ffffff; position: absolute;top:0; left: 30px">

                    <div id="familylist">

                    </div>
                    <div id="memlistfilters" style="position: absolute; top:0">
                        <span>Members:</span> <input id="membersfilter" type="checkbox" checked>&nbsp;&nbsp;
                        <span>Regulars:</span> <input id="regularsfilter" type="checkbox" checked>&nbsp;&nbsp;
                        <span>Inactive:</span> <input id="inactivefilter" type="checkbox">
                    </div>
                </div>
            </div>
        </td>
        <td style="vertical-align: top;">


            <div class="tab-content"
                 style="padding: 10px;border-left: 1px #E2E2E2 solid;border-right: 1px #E2E2E2 solid;background-color: #FFFFFF;min-width: 1000px;min-height: 527px;">
                <div class="contactdivs">
                    <div class="input-prepend">
                        <span class="add-on">Family Name:</span>
                        <input style="width:272px " class="span2" id="firstname" type="text">
                    </div>

                    <br>

                    <div class="input-prepend">
                        <span class="add-on" style="width:85px">Address: </span>
                        <input class="span2" id="address1" type="text" style="width:272px">
                    </div>
                    <br>

                    <div class="input-prepend">
                        <span class="add-on" style="width:85px">Address2:</span>
                        <input class="span2" id="address2" type="text" style="width:272px">
                    </div>
                    <br>

                    <div class="input-prepend">
                        <span class="add-on">City:</span>
                        <input style="width:120px" class="span2" id="city" type="text">
                    </div>
                    &nbsp;
                    <div class="input-prepend">
                        <span class="add-on">State:</span>
                        <input style="width:20px " class="span2" id="state" type="text">
                    </div>
                    &nbsp;
                    <div class="input-prepend">
                        <span class="add-on">Zip:</span>
                        <input style="width:55px" class="span2" id="zip" type="text">
                    </div>

                </div>


            </div>


        </td>
    </tr>
</table>