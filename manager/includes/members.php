<style>
    .selrow{background-color: #D9EBF5;}
    .erow{background-color: #FFFFE0;}
    .contactdivs{border: 1px solid #999999;
        display: inline-block;
        float: left;
        margin-right: 10px;
        padding: 10px; height: 190px;position: relative;}
    #alphatabs li{max-height: 20px !important; margin: 0 !important;}
    #alphatabs a{max-height: 20px !important;
        margin: 0 !important;
        padding: 0 0 0 10px !important;}
    #alphatabs>.active>a {color: #FFFFFF;
    background-color: #0F0E0E;
    }
    .pointer{cursor:pointer;}
    .nav-tabs>li>a {
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
    .nav-tabs>li>a:hover {
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
    #memlistwrapper{
        background-color: #FFFFFF;
        left: 30px;
        max-height: 596px;
        min-height: 596px;
        overflow-x: hidden;
        overflow-y: hidden;
        position: absolute;
        top: 0;
        width: 252px;}
    #memlistfilters input{display: inline-block;
        margin-top: 1px;}
    .input-prepend{margin-bottom: 5px;}
    .input-prepend .add-on {height: 17px;
        line-height: 17px;}
    .input-prepend input {height: 17px;
        line-height: 17px;}
    .fmem{width:140px;}
    .fmem img{margin: -1px 3px 0 0; cursor: pointer;}
    .hse {margin: 0 2px 3px 0;}
    dl{margin: 0;}
    dt{display: inline-block;}
    #ttt {max-height: 543px; overflow-y: scroll;min-height: 543px;}
</style>
<script>
    var addressobj = new Array();
    $(document).ready(function(){

        $('.flxMembers').css("margin-top","21px");


     //   $("#memlistwrapper .flexigrid").css("margin-top","21px");
     //   $('.flexme1').flexigrid();
        $("#alphatabs li").on("click",function(){
            $("#alphatabs li").removeClass("active");
            $(this).addClass("active");
            $("#ttt").html("");
            $.getJSON("apis/functions.php",{method:"getmembers",initial:$(this).find("a").text(),members:$("#membersfilter").prop("checked"),regulars:$("#regularsfilter").prop("checked"),inactive:$("#inactivefilter").prop("checked")},function(data){
                var erow = "pointer";
                var hse;
                for(i=0;i<data.length;i++){
                    if(i % 2){erow = "erow pointer";}else{erow="pointer";}
                    if(data[i].family_role=='head'){hse = "<img src='/manager/img/icon_small_house.png' class='hse' />";}else{hse = "<dt style='width:18px'>&nbsp;</dt>";}
                   // $(".flxMembers tbody").append("<tr id='"+data[i].mid+"'  class='"+erow+"'><td>"+hse+"</td><td data-address='"+data[i].address_id+"' data-id='"+data[i].mid+"'><div style='width: 110px;' >"+data[i].lastname+"</div></td><td  data-address='"+data[i].address_id+"' data-id='"+data[i].mid+"'><div  style='width: 117px;'>"+data[i].firstname+"</div></td></tr>");
                    $("#ttt").append("<dl id='"+data[i].mid+"'  class='sas "+erow+"'><dt>"+hse+"</dt><dt data-address='"+data[i].address_id+"' data-id='"+data[i].mid+"'><div style='width: 105px;' >"+data[i].lastname+"</div></dt><dt  data-address='"+data[i].address_id+"' data-id='"+data[i].mid+"'><div  style='width: 110px;'>"+data[i].firstname+"</div></dt></dl>");
                }

                //$(".flxMembers tbody tr").on("click",function(){$(".flxMembers tbody tr td").removeClass("selrow");$("#"+$(this).attr("id")).find("td").addClass("selrow");getmember($(this).attr("id"));});
                $("#ttt dl").on("click",function(){$("#ttt dl dt").removeClass("selrow");$("#"+$(this).attr("id")).find("dt").addClass("selrow");getmember($(this).attr("id"));});

                <?php /*               var table = $("#ttt");
                              table.find("dl" ).bind('mousedown', function() {
                                  table.disableSelection();
                              }).bind('mouseup', function() {
                                  table.enableSelection();
                              }).draggable({
                                  helper: function(event) {
                                      //return $('<div class="drag-cart-item"><table></table></div>').find('td').append($(event.target).closest('tr').clone()).end().insertAfter(table); $(event.target).first('dt').text()+
                                      console.log($(event.target).next());
                                      return $('<div class="drag-cart-item"><table></table></div>').find('table').append($(event.target).children('dl').eq(1).text()).end().appendTo('body');
                                  },
                                  cursorAt: {
                                      left: -5,
                                      bottom: 5
                                  },
                                  cursor: 'move',
                                  distance: 10,
                                  delay: 100,
                                  scope: 'cart-item',
                                  revert: true
                              });
               */ ?>
                //$( ".flxMembers tbody tr td").draggable({ revert: true, cursor: 'move', helper: 'clone',tolerance: 'fit' });
                $( "#ttt dl").draggable({ distance: 10,revert: true, cursor: 'move', helper: function(event) {
                    //return $('<div class="drag-cart-item"><table></table></div>').find('td').append($(event.target).closest('tr').clone()).end().insertAfter(table); $(event.target).first('dt').text()+
                    //console.log($(event.target).next());
                    return $("<span>"+$(event.target).parent().parent().html()+"</span>").appendTo('#xo');
                },tolerance: 'fit' });
               //$(".flexigrid .bDiv").css("overflow","hidden");
                //console.log(data);
            });

        });
    <?php /*   $( "#familytree" ).droppable({activeClass: "ui-state-default"});*/ ?>

        $( "#familytree" ).droppable({activeClass: "ui-state-default",
            drop: function( event, ui ) {
               // console.log(event);
              //  console.log(ui);
                var trg = $( this );
                $.getJSON("apis/functions.php",{method:"getname",mid:$(ui.draggable).attr("id")},function(data){
                    var familyname = getvalue("family","members","mid",curmid);
                    if( familyname==""){
                        alert("You must save the family name first");
                        return;
                    }
                   //console.log($(ui.draggable).attr("id"));
                    $.getJSON("apis/functions.php",{method:"addtofamily",family:familyname,mid:curmid,add:$(ui.draggable).attr("id")},function(data){
                        if(data[0].result != "ok"){
                            if(confirm("This person has already been assigned to: ["+data[0].result+"]. \n\nClick OK to switch this person to ["+$("#family").val()+"]")){
                                $.getJSON("apis/functions.php",{method:"addtofamily",switch:"yes",family:familyname,mid:curmid,add:ui.draggable.data("id")},function(data){});
                            }else{
                                return;
                            }
                        }
                    });
                    trg.append( "<span class='fmem badge' data-id='"+ui.draggable.data("id")+"'><img src='/manager/img/red-x.png' />"+data[0].fname+"</span><br>" );
                    $(".fmem").off();
                    $(".fmem").on("click",function(){removefamilymember($(this).data("id"));})
                });

            }
        });

        $("#family").on("focus",function(){
           if($("#familyhead").is(':checked') && $(this).val()==""){
               var newname = $("#lastname").val()+ "-"+$("#firstname").val();
               $(this).val($.trim(newname));
               savefamilyname('\''+newname+'\'');
           }
        });
        $.getJSON("apis/functions.php",{method:"alladdresses"},function(data){
            for(i=0;i<data.length;i++){
                $("#addresslist").append("<option data-id='"+data[i].address_id+"' value='"+data[i].address1+"' />");
                addressobj[data[i].address_id]={adress2:data[i].address2,city:data[i].city,state:data[i].state,zip:data[i].zip};
            }
            $("#address1").bind('change', function () {
                var id =$("<select>"+$("#addresslist").html()+"</select>").find("option[value='"+$(this).val()+"']").data("id");
                $("#address2").val(addressobj[id].address2);
                $("#city").val(addressobj[id].city);
                $("#state").val(addressobj[id].state);
                $("#zip").val(addressobj[id].zip);
            });
        });
    });

    function setvalue(fld,tbl,key,val,newval){
        $.getJSON("apis/functions.php",{method:"setfield",fld:fld,tbl:tbl,key:key,val:val,newval:newval},function(data){
        });

    }
    function getvalue(fld,tbl,key,val){
        var rval = "";
        $.ajax({
            url: "apis/functions.php",
            data:{method:"getfield",fld:fld,tbl:tbl,key:key,val:val},
            dataType:"json",
            async:false,
            cache: false
        }).done(function( data ) {
                rval= data[0].fld;
         });
        //$.ajax("apis/functions.php",{method:"getfield",fld:fld,tbl:tbl,key:key,val:val},async:false, function(data){
        //    rval= data[0].fld;
        //});
        return rval;
    }
    function getfamily(familyname){
        $("#familytree").html("");
        if($("#family").val()==""){return;}
        $.getJSON("apis/functions.php",{method:"getfamily",family:familyname},function(data){
            for(var i=0;i<data.length;i++){
                $("#familytree").append("<span class='fmem badge' data-id='"+data[i].mid+"'><img src='/manager/img/red-x.png' />"+data[i].fname+"</span><br>");
            }
            $(".fmem").on("click",function(){removefamilymember($(this).data("id"));});
        });
    }
    function removefamilymember(mid){
        if(confirm("Are you sure you want to remove "+$('span.fmem[data-id="'+mid+'"]').text())){
            $.getJSON("apis/functions.php",{method:"removefamilymember",mid:mid},function(data){
                $(".fmem").remove('[data-id="'+mid+'"]');
            });
        }
    }
    function makefamilyhead(chk){
        var role = getvalue("family_role","members","mid",curmid);

        if(chk){
            var prnt = getvalue("family","members","mid",curmid);
            if(prnt>""){
                if(confirm("This person has already been assigned to a family. If you make this person the family head, they will be removed from their current family. \n\nClick Cancel to abort.")==false){return;}
            }
            setvalue("family_role","members","mid",curmid,"'head'");
            $( "#familytree" ).droppable("enable");
            $("#family").prop("readonly",false);
            $("#savefamily_btn").show();
        }else{
            if(role=="head"){
                if(confirm("ALERT!!!\n\nThis person has already been identify as the family head. Are you sure you want to delete this family tree?")==false){return;}
            }
            $( "#familytree" ).droppable("disable");
            $("#family").prop("readonly",true);
            $("#savefamily_btn").hide();
        }
    }
    function savefamilyname(newval){
        //alert(curadrs);
        if(curadrs==null){
            alert("Sorry, but you must save the address before you can save a family name");
            return;
        }
        $.getJSON("apis/functions.php",{method:"setfield",fld:"family",tbl:"members",address_id:curadrs,key:"mid",val:curmid,newval:newval},function(data){
            if(data[0].result=="dup"){
                alert("ERROR!!!\n\nThat Family Name already exists");
                $("#family").val("");
            }
        });
    }
    var curmid = "";
    var curadrs ="";
    function getmember(mid){
        $.getJSON("apis/functions.php",{method:"getmember",mid:mid},function(data){
            $(".saveadr_btn").show();
            curmid = data[0].mid;
            curadrs = data[0].address_id;
            $.each(data[0], function(key, value) {
                $("#" + key).val(value);


            });
            $("#displayname").html(data[0].firstname + " " + data[0].lastname);
            if(data[0].family_role=="head"){
                $( "#familytree" ).droppable("enable");
                $("#family").prop("readonly",false);
                $("#savefamily_btn").show();
                $("#familyhead").prop("checked",true);
            }else{
                $( "#familytree" ).droppable("disable");
                $("#family").prop("readonly",true);
                $("#savefamily_btn").hide();
                $("#familyhead").prop("checked",false);
            }
            getfamily(data[0].family);
            $("#firstname").focus();
        });

    }
    function saveadr(){
        if(curadrs==null){
            $.getJSON("apis/functions.php",{method:"addfamilyaddress",mid:curmid,address1:$("#address1").val(),address2:$("#address2").val(),city:$("#city").val(),state:$("#state").val(),zip:$("#zip").val()},function(data){
                curadrs=data[0].address_id;
            });
        }else{
            if(confirm("This will save for ALL FAMILY MEMBERS!!! click Cancel to abort.")){
                $.getJSON("apis/functions.php",{method:"saveaddress",address_id:curadrs,address1:$("#address1").val(),address2:$("#address2").val(),city:$("#city").val(),state:$("#state").val(),zip:$("#zip").val()},function(data){

                });
            }
        }
    }
</script>
<table id="xo"><tr><td>
    <table><tr><td style="vertical-align: top">
                <div style="position: relative;width: 312px;height: 1000px;">
    <ul id="alphatabs" class="nav nav-tabs nav-stacked" STYLE="width: 70px;position: absolute;top:30px; left: 0;">
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
    <div CLASS="thumbnail" id="memlistwrapper" >

      <table class="flxMembers" style="min-width: 260px;margin-left: -4px; ">
          <thead>
          <tr>
              <th colspan="2" class="btn" style="display: table-cell" width="110">Last Name</th><th  style="display: table-cell " class="btn" width="117">First Name</th>
          </tr>
          </thead>
          <tbody>

          </tbody>
      </table>
      <div id="ttt" style="margin-top: 1px;"></div>
      <div id="memlistfilters" style="position: absolute; top:0">
          <span>Members:</span> <input id="membersfilter" type="checkbox" checked>&nbsp;&nbsp;
          <span>Regulars:</span> <input id="regularsfilter" type="checkbox" checked>&nbsp;&nbsp;
          <span>Inactive:</span> <input id="inactivefilter" type="checkbox">
      </div>
    </div>
</div>
</td><td style="vertical-align: top;">

        <ul style="top:30px; left: 0;margin-bottom: -1px;" class="nav nav-tabs"><h3 style="display: inline; line-height: 30px; margin-left: 179px;" id="displayname"></h3>

            <li class="active"><a href="#tabGeneral" data-toggle="tab">General</a></li>
            <li><a href="#tabAttendance" data-toggle="tab">Attendance</a></li>
            <li ><a href="#tabProfile" data-toggle="tab">Profile</a></li>
        </ul>

    <datalist id="addresslist">
    </datalist>
    <div class="tab-content" style="padding: 10px;
border-left: 1px #E2E2E2 solid;
border-right: 1px #E2E2E2 solid;
background-color: #FFFFFF;min-width: 1000px;min-height: 527px;">

        <div class="tab-pane active" id="tabGeneral">
            <div class="contactdivs">
                <button onclick="saveadr();" class="btn btn-info saveadr_btn" style="left: 277px;    position: absolute;    top: 181px;display: none">Save&nbsp;Address</button>
                <div class="input-prepend">
                    <span class="add-on">First Name:</span>
                    <input  style="width:203px " class="span2" id="firstname" type="text">
                </div>&nbsp;
                <div class="input-prepend">
                    <span class="add-on">MI:</span>
                    <input style="width:20px " class="span2" id="mi" type="text">
                </div><br>
                <div class="input-prepend">
                    <span class="add-on">Last Name:</span>
                    <input style="width:273px " class="span2" id="lastname" type="text">
                </div><br>
                <div class="input-prepend">
                    <span class="add-on"  style="width:72px">Address: </span>
                    <input list="addresslist" class="span2" id="address1" type="text" style="width:272px">
                </div><br>
                <div class="input-prepend">
                    <span class="add-on" style="width:72px">Address2:</span>
                    <input class="span2" id="address2" type="text" style="width:272px">
                </div><br>
                <div class="input-prepend">
                    <span class="add-on">City:</span>
                    <input style="width:120px" class="span2" id="city" type="text">
                </div>&nbsp;
                <div class="input-prepend">
                    <span class="add-on">State:</span>
                    <input style="width:20px " class="span2" id="state" type="text">
                </div>&nbsp;
                <div class="input-prepend">
                    <span class="add-on">Zip:</span>
                    <input style="width:55px" class="span2" id="zip" type="text">
                </div><br>
                <span class="badge badge-important"><input type="checkbox" id="familyhead" title="check if this is the Family Head" onclick="makefamilyhead($(this).is(':checked'));" /> Head of family</span>
            </div>
            <div  class="contactdivs">

                <div class="input-prepend">
                    <span style="width:80px " class="add-on">Home Phone:</span>
                    <input  style="width:173px " class="span2" id="homephone" type="text">
                </div><br>
                <div class="input-prepend">
                    <span style="width:80px " class="add-on">Cell Phone:</span>
                    <input  style="width:173px " class="span2" id="cellphone" type="text">
                </div><br>
                <div class="input-prepend">
                    <span style="width:80px " class="add-on">Work Phone:</span>
                    <input  style="width:173px " class="span2" id="workphone" type="text">
                </div><br>
                <div class="input-prepend">
                    <span style="width:80px " class="add-on">Email:</span>
                    <input  style="width:173px " class="span2" id="email" type="text">
                </div><br>
            </div>
            <div  class="contactdivs"></div>
            <br clear="all" />
                    <fieldset  ><legend>Family</legend>

                        <div class="input-prepend">
                            <span class="add-on">Family Name:</span>
                            <input style="width:273px " class="span2" id="family" type="text" readonly>
                        </div><button id="savefamily_btn" onclick="savefamilyname('\''+$('#family').val()+'\'');" style="display:none;margin-top: -5px;" type="button">Save Family Name</button> <br>
                        <div id="familytree" style="min-height: 100px; min-width:100px ">
                        </div>
                    </fieldset>


        </div>
        <div class="tab-pane" id="tabAttendance">
            <table class="flexme1">
                <thead>
                <tr>
                    <th width="100">Col 1</th>
                    <th width="100">Col 2</th>
                    <th width="100">Col 3 is a long header name</th>
                    <th width="300">Col 4</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>This is data 1 with overflowing content</td>
                    <td>This is data 2</td>
                    <td>This is data 3</td>
                    <td>This is data 4</td>
                </tr>
                <tr>
                    <td>This is data 1</td>
                    <td>This is data 2</td>
                    <td>This is data 3</td>
                    <td>This is data 4</td>
                </tr>
                <tr>
                    <td>This is data 1</td>
                    <td>This is data 2</td>
                    <td>This is data 3</td>
                    <td>This is data 4</td>
                </tr>
                <tr>
                    <td>This is data 1</td>
                    <td>This is data 2</td>
                    <td>This is data 3</td>
                    <td>This is data 4</td>
                </tr>
                <tr>
                    <td>This is data 1</td>
                    <td>This is data 2</td>
                    <td>This is data 3</td>
                    <td>This is data 4</td>
                </tr>
                <tr>
                    <td>This is data 1</td>
                    <td>This is data 2</td>
                    <td>This is data 3</td>
                    <td>This is data 4</td>
                </tr>
                <tr>
                    <td>This is data 1</td>
                    <td>This is data 2</td>
                    <td>This is data 3</td>
                    <td>This is data 4</td>
                </tr>
                <tr>
                    <td>This is data 1</td>
                    <td>This is data 2</td>
                    <td>This is data 3</td>
                    <td>This is data 4</td>
                </tr>
                <tr>
                    <td>This is data 1</td>
                    <td>This is data 2</td>
                    <td>This is data 3</td>
                    <td>This is data 4</td>
                </tr>
                <tr>
                    <td>This is data 1</td>
                    <td>This is data 2</td>
                    <td>This is data 3</td>
                    <td>This is data 4</td>
                </tr>
                <tr>
                    <td>This is data 1</td>
                    <td>This is data 2</td>
                    <td>This is data 3</td>
                    <td>This is data 4</td>
                </tr>
                <tr>
                    <td>This is data 1</td>
                    <td>This is data 2</td>
                    <td>This is data 3</td>
                    <td>This is data 4</td>
                </tr>
                </tbody>
            </table>


        </div>
        <div class="tab-pane" id="tabProfile">


        </div>
        </div>



</td></tr></table>
</td></tr></table>



