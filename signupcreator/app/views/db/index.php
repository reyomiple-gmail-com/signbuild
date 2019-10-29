<?php require 'nav.php';
?>
<div class="panel-form">
    <div class="signup-form-holder col col-10 offset-1">
        <div class="panel-header flex-center">
            <h1>Set Connection</h1>
        </div>
        <br>
        <div>
            <form id="selectdb"  method="post">
                <label>Select your form Title</label>
                <br>
                <div id="showhtmls"></div>
                <br><br>
                <label> Select database form our list</label>
                <br>
                <div id="showdbs"></div>
                <br>
                <div class="btn-group flex-end">
                    <button type="submit" class="btn btn-md btn-primary">SUBMIT</button>
                </div>
            </form>

        </div>

        <div class="panel-body boxshadow">
            <label>Add Database here</label><hr>
            <form id="setdb" role="form" method="post"  >
                <div class="form-group ">
                    <br>
                    <label for="">Connection Name :</label>
                    <div class="input-group flex">
                        <button class="btn">
                            <i class="fas fa-database"></i>
                        </button>
                        <input type="text" name="schema" class="db-name form-control" placeholder="schema..." required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Hostname :</label>

                    <div class="input-group flex">
                        <button class="btn"><i class="fas fa-server"></i></button>
                        <input type="text" name="host" class="db-name form-control" placeholder="127.0.0.1..." required>
                    </div>

                </div>

                <div class="form-group">
                    <label for="">Username:</label>
                    <div class="input-group flex">
                        <button class="btn">
                            <i class="fas fa-user"></i>
                        </button>
                        <input type="text" name="user" class="db-name form-control" placeholder="root..." required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Password:</label>
                    <div class="input-group flex">
                        <button class="btn">
                            <i class="fas fa-lock"></i>
                        </button>
                        <input type="text" name="password" class="db-name form-control" placeholder="****" >

                    </div>
                </div>

                <div class="btn-group flex-end">
                    <button type="submit" class="btn btn-md btn-primary">SUBMIT</button>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>

<style>
    #connectDB {
        /*    background-color: rgba(255, 255, 255, 0.36);*/
        /*    padding-top: 80px;*/
        height: 91.4%;
        /*    opacity: 0.8;*/
        /*    margin: 20px;*/
        /*    top: 50%;*/
        /*    left: 50%;*/
        /*    transform: translate(-50%, -50%);*/
    }
    #connectDB label{
        color: var(--white);
    }
    #connectDB input{
        background-color: var(--white);
    }
    .container-holder{
        /*    padding: 20px;*/

    }


    #connectDB .panel-body {
        padding-top: 50px;
    }
</style>

