
<?php
//            exit(print_r($data));
//
//$data1 = print_r($data);

$show = '';


foreach ($data as $key => $val) {

//    $data1 = print_r($val,true);
//    foreach ($val a)
    foreach ($val as $key2)
    {
        $show .='<tr class="t-list-group">
                 <td><input type="radio" id="db_tables" class="checkbox_table" name="tables" value="'.$key2.'" required></td> 
                 <td class="t-name"><i class="fas fa-table" aria-hidden="true"></i> '.$key2.'</td>   
                 </tr>';
    }

}

?>

<div class="panel-form">
    <div class="signup-form-holder col col-10 offset-1">
        <br>
        <h1>Please Select table and column here</h1>

        <div class="container panel ">
            <div class="select-content ">
                <form role="form" id="setquery" method="POST">

                    <div class="section-group-1">
                        <div class="row ">

                            <div class="div-group col-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="searchTlist" placeholder="Search table...">
                                </div>
                                <div class="i-list-holder">
                                    <h3 class="h3">Tables</h3>
                                    <hr>
                                    <table class="t-list " id="table">
                                        <tbody>

                                         <?= $show ?>

                                        </tbody>
                                    </table>
                                </div>
                                <br>
                            </div>

                            <div class="div-group col-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search column..." id="searchClist">
                                </div>
                                <div class="i-list-holder">
                                    <h3 class="h3">Columns</h3>
                                    <hr>
                                    <table>
                                       <tbody id="columns">
                                       </tbody>
                                    </table>
                                </div>
                                <br>
                            </div>

                        </div>
                        <div class="row section-footer">
                            <div class="btn-group col">

                                <button class="btn btn-md btn-primary go-next-s1" id="nextSection" type="submit">(Save) Continue → </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <style>
            .i-list-holder {
                margin-top: 2px;
                height: 50vh;
                overflow-y: auto;
                border-radius: 3px;
                border: 1px solid;
                border-color: #ddd
            }

            .i-list-holder table thead {

                background-color: var(--blue);
                color: var(--white)
            }

            .i-list-holder table thead tr th {
                padding: 10px;
            }

            .h3{
                padding: 5px 5px 0 5px;
            }
        </style>


    </div>
</div>



