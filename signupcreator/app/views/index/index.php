<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!---->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>Form Builder</title>-->
<!--</head>-->
<!--<link rel="stylesheet" href="../public/css/style.css">-->
<!--<link rel="stylesheet" href="../public/font-awesome/font.js">-->
<!--<script src="../public/js/jquery.js"></script>-->
<!---->
<!--<body>-->

<div class="modal " id="section_modal">
    <div class="modal-content fade">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">&times;</a>
            <h2>Add Section</h2>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="input-group">
                    <label for="">Section name</label>
                    <input type="text" class="form-control sec-name form-input">
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <div class="btn-group flex-end">
                <button class="btn btn-primary btn-md" id="add_section">Done</button>
            </div>
        </div>
    </div>
</div>

<div class="container-content">

    <?php
    include 'nav.php';
    ?>
    <form id="main_form" method="post">
        <div class="startup" id="startup">
            <?php
            include 'start-up.php';
            ?>
        </div>
        <div class="content-body flex hide" id="formIndex">
            <?php
            include 'edit-form.php';
            ?>

            <div class="side-nav col col-3">
                <div class="side-nav-header">
                    <div class="input-group">
                        <button type="button" class="btn btn-full btn-primary" id="add_section_fields">Add section</button>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </div>

                <ul class="components">
                    <label class="component-title">Standard Fields</label>

                    <div class="group">
                        <li class="s-elem" tagID="1"><i class="fas fa-plus"></i> Text Box</li>

                        <li href="#" class="s-elem" tagID="2"><i class="fas fa-plus"></i> Text Area</li>
                        <li href="#" class="s-elem" tagID="3"><i class="fas fa-plus"></i> Select List</li>
                        <li href="#" class="s-elem" tagID="4"><i class="fas fa-plus"></i> Email</li>
                        <li href="#" class="s-elem" tagID="5"><i class="fas fa-plus"></i> Password</li>
                        <li href="#" class="s-elem" tagID="6"><i class="fas fa-plus"></i> Telphone</li>
                        <li href="#" class="s-elem" tagID="7"><i class="fas fa-plus"></i> Number</li>
                        <li href="#" class="s-elem" tagID="8"><i class="fas fa-plus"></i> Checkbox</li>
                        <li href="#" class="s-elem" tagID="8"><i class="fas fa-plus"></i> Radio button</li>
                    </div>

                    <label class="component-title">Headings</label>

                    <div class="group">
                        <li href="#" class="s-elem" key="h1"><i class="fas fa-plus"></i> Header h1</li>
                        <li href="#" class="s-elem" key="h2"><i class="fas fa-plus"></i> Header h2</li>
                        <li href="#" class="s-elem"><i class="fas fa-plus"></i> Header h3</li>
                        <li href="#" class="s-elem"><i class="fas fa-plus"></i> Header h4</li>
                        <li href="#" class="s-elem"><i class="fas fa-plus"></i> Header h5</li>
                        <li href="#" class="s-elem"><i class="fas fa-plus"></i> Header h6</li>
                    </div>
                </ul>
            </div>
            <div class="panel-form">
                <div class="signup-form-holder col col-10 offset-1">
                    <ul class="sf-title-tabs">
                        
                    </ul>
                    <br>
                    <div class="sf-content temp">
<!--                        <form class="signup-form" id="signup" action="somewhere" method="POST">-->
                            <ul class="section-dots flex-center">
                            
                            </ul>

                            <div class="fieldsets row" id="fieldsets">

                               
                            </div>
<!--
                            <button type="button" class="btn btn-primary btn-md btn-event" id="prev">Prev</button>
                            <button type="button" class="btn btn-primary btn-md btn-event" id="next">Next</button>
                            <button type="submit" class="btn btn-primary btn-md btn-event" id="submit">Submit</button>
-->
<!--                        </form>-->

                    </div>
                    <div class="sf-footer">
                    </div>
                </div>
                <div class="submit-signupform col ">
                    <div class="row">

                        <div class="btn-group flex-end">
                            
                            <button class="btn btn-primary btn-md" type="submit">Save</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



