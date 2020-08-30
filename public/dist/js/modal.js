
@include('include.footer')

function myFunction(s) {
    //    alert(s[s.selectedIndex].value);
}

(function($)  {

    $.fn.pickList1 = function(options) {

        var opts = $.extend({}, $.fn.pickList1.defaults, options);

        this.fill = function() {
            var option = '';

            $.each(opts.data, function(key, val) {
                option += '<option id=' + val.id + '>' + val.name+'</option>' ;

            });
            this.find('#pickData1').append(option);
        };
        this.controll = function() {
            var pickThis = this;

            $("#pAdd1").on('click', function() {
                var p = pickThis.find("#pickData1 option:selected");
                p.clone().appendTo("#pickListResult1");

                p.remove();
            });

            $("#pAddAll1").on('click', function() {
                var p = pickThis.find("#pickData1 option");
                p.clone().appendTo("#pickListResult1");
                p.remove();
            });

            $("#pRemove1").on('click', function() {
                var p = pickThis.find("#pickListResult1 option:selected");
                p.clone().appendTo("#pickData1");
                p.remove();
            });

            $("#pRemoveAll1").on('click', function() {
                var p = pickThis.find("#pickListResult1 option");
                p.clone().appendTo("#pickData1");
                p.remove();
            });
        };


        this.init = function() {
            var pickListHtml1 =
                "<div class='row'>" +
                "  <div class='col-sm-5'>" +
                "	 <select style=' margin: 2%; height: 90%; ' onclick=\"myFunction(this)\" class='form-control pickListSelect' id='pickData1' multiple>" +
                "                    </select> " +
                " </div>" +
                " <div class='col-sm-2 pickListButtons1' style=' margin-top: 1%;'>" +
                "	<button id='pAdd1' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-right\"></span></button>" +
                "   <br>   <button style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' id='pAddAll1' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-right\"></span></button>" +
                "	<br><button id='pRemove1'  style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" + "<span class=\"fas fa-angle-left\"></span></button>" +
                "	<br><button id='pRemoveAll1' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-left\"></span></button>" +
                " <br></div>" +
                " <div class='col-sm-5'>" +
                "    <select style=' margin: 2%; height: 90%; ' class='form-control pickListSelect' id='pickListResult1' multiple></select>" +
                " </div>" +
                "</div>";

            this.append(pickListHtml1);

            this.fill();
            this.controll();
        };

        this.init();
        return this;
    };

    $.fn.pickList1.defaults = {
        add1: 'Add',
        addAll1: 'Add All',
        remove1: 'Remove',
        removeAll1: 'Remove All'
    };


}(jQuery));

(function($) {

    $.fn.pickList2 = function(options) {

        var opts = $.extend({}, $.fn.pickList2.defaults, options);

        this.fill = function() {
            var option = '';

            $.each(opts.data, function(key, val) {
                option += '<option id=' + val.id + '>' + val.name+'</option>' ;

            });
            this.find('#pickData2').append(option);
        };
        this.controll = function() {
            var pickThis = this;

            $("#pAdd2").on('click', function() {
                var p = pickThis.find("#pickData2 option:selected");
                p.clone().appendTo("#pickListResult2");

                p.remove();
            });

            $("#pAddAll2").on('click', function() {
                var p = pickThis.find("#pickData2 option");
                p.clone().appendTo("#pickListResult2");
                p.remove();
            });

            $("#pRemove2").on('click', function() {
                var p = pickThis.find("#pickListResult2 option:selected");
                p.clone().appendTo("#pickData2");
                p.remove();
            });

            $("#pRemoveAll2").on('click', function() {
                var p = pickThis.find("#pickListResult2 option");
                p.clone().appendTo("#pickData2");
                p.remove();
            });
        };


        this.init = function() {
            var pickListHtml2 =
                "<div class='row'>" +
                "  <div class='col-sm-5'>" +
                "	 <select style=' margin: 2%; height: 90%; '  onclick=\"myFunction(this)\" class='form-control pickListSelect' id='pickData2' multiple>" +
                "                    </select> " +
                " </div>" +
                " <div class='col-sm-2 pickListButtons2' style=' margin-top: 1%;' >" +
                "	<button id='pAdd2' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-right\"></span></button>" +
                "   <br>   <button style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' id='pAddAll2' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-right\"></span></button>" +
                "	<br><button id='pRemove2' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" + "<span class=\"fas fa-angle-left\"></span></button>" +
                "	<br><button id='pRemoveAll2' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-left\"></span></button>" +
                " <br></div>" +
                " <div class='col-sm-5'>" +
                "    <select style=' margin: 2%; height: 90%; ' class='form-control pickListSelect' id='pickListResult2' multiple></select>" +
                " </div>" +
                "</div>";

            this.append(pickListHtml2);

            this.fill();
            this.controll();
        };

        this.init();
        return this;
    };

    $.fn.pickList2.defaults = {
        add2: 'Add',
        addAll2: 'Add All',
        remove2: 'Remove',
        removeAll2: 'Remove All'
    };


}(jQuery));


(function($) {

    $.fn.pickList3 = function(options) {

        var opts = $.extend({}, $.fn.pickList3.defaults, options);

        this.fill = function() {
            var option = '';

            $.each(opts.data, function(key, val) {
                option += '<option id=' + val.id + '>' + val.name+'</option>' ;

            });
            this.find('#pickData3').append(option);
        };
        this.controll = function() {
            var pickThis = this;

            $("#pAdd3").on('click', function() {
                var p = pickThis.find("#pickData3 option:selected");
                p.clone().appendTo("#pickListResult3");

                p.remove();
            });

            $("#pAddAll3").on('click', function() {
                var p = pickThis.find("#pickData3 option");
                p.clone().appendTo("#pickListResult3");
                p.remove();
            });

            $("#pRemove3").on('click', function() {
                var p = pickThis.find("#pickListResult3 option:selected");
                p.clone().appendTo("#pickData3");
                p.remove();
            });

            $("#pRemoveAll3").on('click', function() {
                var p = pickThis.find("#pickListResult3 option");
                p.clone().appendTo("#pickData3");
                p.remove();
            });
        };


        this.init = function() {
            var pickListHtml3 =
                "<div class='row'>" +
                "  <div class='col-sm-5'>" +
                "	 <select  style=' margin: 2%; height: 90%; ' onclick=\"myFunction(this)\" class='form-control pickListSelect' id='pickData3' multiple>" +
                "                    </select> " +
                " </div>" +
                " <div class='col-sm-2 pickListButtons3' style=' margin-top: 1%;'>" +
                "	<button id='pAdd3' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-right\"></span></button>" +
                "   <br>   <button style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' id='pAddAll3' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-right\"></span></button>" +
                "	<br><button id='pRemove3'  style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" + "<span class=\"fas fa-angle-left\"></span></button>" +
                "	<br><button id='pRemoveAll3' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-left\"></span></button>" +
                " <br></div>" +
                " <div class='col-sm-5'>" +
                "    <select style=' margin: 2%; height: 90%; ' class='form-control pickListSelect' id='pickListResult3' multiple></select>" +
                " </div>" +
                "</div>";

            this.append(pickListHtml3);

            this.fill();
            this.controll();
        };

        this.init();
        return this;
    };

    $.fn.pickList2.defaults = {
        add3: 'Add',
        addAll3: 'Add All',
        remove3: 'Remove',
        removeAll3: 'Remove All'
    };


}(jQuery));


(function($) {

    $.fn.pickList4 = function(options) {

        var opts = $.extend({}, $.fn.pickList4.defaults, options);

        this.fill = function() {
            var option = '';

            $.each(opts.data, function(key, val) {
                option += '<option id=' + val.id + '>' + val.name+'</option>' ;

            });
            this.find('#pickData4').append(option);
        };
        this.controll = function() {
            var pickThis = this;

            $("#pAdd4").on('click', function() {
                var p = pickThis.find("#pickData4 option:selected");
                p.clone().appendTo("#pickListResult4");

                p.remove();
            });

            $("#pAddAll4").on('click', function() {
                var p = pickThis.find("#pickData4 option");
                p.clone().appendTo("#pickListResult4");
                p.remove();
            });

            $("#pRemove4").on('click', function() {
                var p = pickThis.find("#pickListResult4 option:selected");
                p.clone().appendTo("#pickData4");
                p.remove();
            });

            $("#pRemoveAll4").on('click', function() {
                var p = pickThis.find("#pickListResult4 option");
                p.clone().appendTo("#pickData4");
                p.remove();
            });
        };


        this.init = function() {
            var pickListHtml4 =
                "<div class='row'>" +
                "  <div class='col-sm-5'>" +
                "	 <select style=' margin: 2%; height: 90%; ' onclick=\"myFunction(this)\" class='form-control pickListSelect' id='pickData4' multiple>" +
                "                    </select> " +
                " </div>" +
                " <div class='col-sm-2 pickListButtons4' style=' margin-top: 1%;'>" +
                "	<button id='pAdd4' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-right\"></span></button>" +
                "   <br>   <button style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' id='pAddAll4' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-right\"></span></button>" +
                "	<br><button id='pRemove4' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" + "<span class=\"fas fa-angle-left\"></span></button>" +
                "	<br><button id='pRemoveAll4' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-left\"></span></button>" +
                " <br></div>" +
                " <div class='col-sm-5'>" +
                "    <select style=' margin: 2%; height: 90%; ' class='form-control pickListSelect' id='pickListResult4' multiple></select>" +
                " </div>" +
                "</div>";

            this.append(pickListHtml4);

            this.fill();
            this.controll();
        };

        this.init();
        return this;
    };

    $.fn.pickList2.defaults = {
        add4: 'Add',
        addAll4: 'Add All',
        remove4: 'Remove',
        removeAll4: 'Remove All'
    };


}(jQuery));



var pick = $("#pickList1").pickList1({
    data: food1
});

var pick = $("#pickList2").pickList2({
    data: food2
});

var pick = $("#pickList3").pickList3({
    data: food3
});

var pick = $("#pickList4").pickList4({
    data: food4
});





$("#getSelected").click(function() {
    console.log(pick.getValues());
});

$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
})

$('#myTable').on('change', function(){
    alert("fsd");
    $(this).closest('tr').find('input[name="dbFlag"]').val('U');
});



jQuery(document).ready(function ()
{
    document.getElementById("display").style.visibility =  "visible";

    jQuery('select[name="animal_id"]').on('change',function(){
        var animalID = jQuery(this).val();

        if(animalID)
        {
            var table = document.getElementById("myTable");
            while (table.rows.length > 1) {
                table.deleteRow(1);
            }

            document.getElementById("myTable").style.visibility =  "visible";

            jQuery.ajax({
                url : '/dog/' +animalID,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                    $(document).ready(function () {
                        document.getElementById("familyId").style.visibility =  "visible";
                        $('#family').text(data[1]);
                    });

                    $(document).ready(function () {
                        document.getElementById("foodId").style.visibility =  "visible";
                        $('#food').text(data[2]);
                    });

                    $(document).ready(function () {
                        document.getElementById("motionId").style.visibility =  "visible";
                        $('#motion').text(data[3]);
                    });

                    $(document).ready(function () {
                        document.getElementById("ageId").style.visibility =  "visible";
                        $('#age').text(data[4]);
                    });

                    $(document).ready(function () {
                        jQuery.each(data[0,5], function(key,value){
                            jQuery.each(value, function(id,name){
                                console.log(value);

                                if(id === "user_id") {
                                    return false;
                                }
                                if(id === "id") {
                                    return ;
                                }
                                if(id === "animal_id") {
                                    return ;
                                }
                                if(id === "Yag") {
                                    var table = document.getElementById("myTable");
                                    var row = table.insertRow(-1);
                                    table.contentEditable = true;
                                    var cell1 = row.insertCell(0);
                                    var cell2 = row.insertCell(1);
                                    var cell3 = row.insertCell(2);
                                    var cell4 = row.insertCell(3);
                                    cell1.innerHTML = id;
                                    cell2.innerHTML = (0.999* name).toFixed(2);
                                    cell3.innerHTML = (2* name).toFixed(2);
                                    cell4.innerHTML = 0;
                                    if(0.999* name <= cell4.innerHTML && 2* name > cell4.innerHTML)
                                    {
                                        row.style.backgroundColor = "green";
                                    }
                                    else
                                    {
                                        row.style.backgroundColor = "red";
                                    }
                                }
                                else if(id === "Enerji") {
                                    var table = document.getElementById("myTable");
                                    var row = table.insertRow(-1);
                                    table.contentEditable = true;
                                    var cell1 = row.insertCell(0);
                                    var cell2 = row.insertCell(1);
                                    var cell3 = row.insertCell(2);
                                    var cell4 = row.insertCell(3);
                                    cell1.innerHTML = id;
                                    cell2.innerHTML = (0.999* name).toFixed(2);
                                    cell3.innerHTML = (1.2* name).toFixed(2);
                                    cell4.innerHTML = 0;

                                    if(0.999* name <= cell4.innerHTML && 1.2* name > cell4.innerHTML)
                                    {
                                        row.style.backgroundColor = "green";
                                    }
                                    else
                                    {
                                        row.style.backgroundColor = "red";
                                    }
                                }
                                else {
                                    var table = document.getElementById("myTable");
                                    var row = table.insertRow(-1);
                                    table.contentEditable = true;
                                    var cell1 = row.insertCell(0);
                                    var cell2 = row.insertCell(1);
                                    var cell3 = row.insertCell(2);
                                    var cell4 = row.insertCell(3);
                                    cell1.innerHTML = id;
                                    cell2.innerHTML =(0.999* name).toFixed(2);
                                    cell3.innerHTML = name;
                                    cell4.innerHTML = 0;

                                    if(0.999* name > cell4.innerHTML )
                                    {
                                        row.style.backgroundColor = "red";
                                    }
                                    if(0.999* name <= cell4.innerHTML )
                                    {
                                        row.style.backgroundColor = "green";
                                    }

                                }

                            });
                        });


                    });
                }
            });


        }
        else
        {
        }
    });
});
