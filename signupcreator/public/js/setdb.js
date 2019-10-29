// var server = location.protocol +'//'+location.host+'/project/signupcreator/';
var server = location.protocol +'//'+location.host+'/signupcreator/';


save_html();

function save_html() {
    $('#main_form').on('submit',function (e) {
        e.preventDefault();

        var url = server+'index/insertData';

        $.ajax({
            url: url,
            type: 'POST',
            success: function (res) {
                console.log(res);
            }
        });
    })
}



setdb();

function setdb() {
    $('#setdb').on('submit',function (e) {
        e.preventDefault();

        var data = $(this).serialize();

        var url = server+'setdb/savedb';

        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function (res) {
                // console.log(res);

                if(res.responsecode == 1)
                {
                    window.location.reload();
                    alert(res.responsemsg);
                }else
                {
                    window.location.reload();
                    alert(res.responsemsg);
                }

            }
        });
    })
}

showdbs();

function showdbs() {
    var url = server+'setdb/showdbs';

    $.ajax({
        url: url,
        type: 'POST',
        success: function (res) {
            // console.log(res.showdbs);

            if(res.responsecode == 1)
            {
                $('#showdbs').prepend(res.showdbs);
            }
            else
            {
                $('#showdbs').prepend(res.showdbs);
            }
        }
    });
}

showhtmls();

function showhtmls() {
    var url = server+'index/show_htmls';


    $.ajax({
        url: url,
        type:'POST',
        success: function (res) {
         // console.log(res);

            if(res.responsecode == 1)
            {
                $('#showhtmls').html(res.outputs);
            }
            else
            {
                $('#showhtmls').html(res.outputs);
            }
        }
    });
}




selectdb();

function selectdb() {
    $('#selectdb').on('submit',function (e) {
        e.preventDefault();

        var data = $(this).serialize();

        var url = server+'index/update_schema';

        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function (res) {
                // console.log(res.result);
                // console.log(data);
                if(res.responsecode == 1)
                {
                    window.location.href = server+'index/get_tables';
                    // location.href = server+"views/db/querys";
                    console.log(res);
                    // alert(res.responsemsg);
                    // window.location.reload();
                }
                else
                {
                    console.log(res);
                    // alert(res.responsemsg);
                }
            }
        });
    })
}


db_tables();

function db_tables() {
    var data =  $('input[name=tables]').change(function () {
        // e.preventDefault();
        var db_t = data.filter(':checked').val();

        getSelecteds(db_t);
        var col = '';
        var url = server+'index/get_columns'

        // alert(db_t);
        var data1 = {'db_tables':db_t};

        $.ajax({
            data: data1,
            url: url,
            type: 'POST',
            dataType: 'json',
            success: function (res) {
                console.log(res);


                    $.each(res, function (k, v) {
                        // console.log(v.column_name);
                        col +=  '<tr class="t-list-group"><td><input type="checkbox" class="checkbox_table" name="columns" value="'+v.column_name+'" > </td>'+
                            '<td class="t-name"><i class="fas fa-table" aria-hidden="true"></i> '+v.column_name+'</td></tr>';
                    });

                    $('#columns').html(col);



            }
        })
    })
}




function getSelecteds(table) {
    $('#setquery').on('submit', function (e) {
        e.preventDefault();

        var columns = new Array();
        $("input[name='columns']:checked").each(function () {
            columns.push($(this).val());
        });

        var tables = table;

        if(tables == "" || tables == null )
        {
            alert('Please select Table first!')
        }
        else if(columns == "" || columns == null )
        {
            alert('Please select Column/s first!')
        }

        // console.log(table);
        // var data = $(this).serialize();
        var url = server+'index/infoquery';

        $.ajax({
            data: {'table': tables, 'columns': columns},
            url: url,
            type: 'POST',
            success: function (res) {
                // console.log(res);

                if(res.responsecode == 1)
                {
                    console.log(res.responsemsg);

                }
                else
                {
                    window.location.href = server+'index/set_val';
                }

            }
        });

    })
}


set_value();

function set_value() {
    $('#signup_form').on('submit',function (e) {
        e.preventDefault();

        var data = $(this).serialize();

        // alert(data);
        var url = server+'index/save_value';

        $.ajax({
            data: data,
            url: url,
            type: 'POST',
            success: function (res) {
                console.log(res)
               



            }
        });
    })

 
}

