<html>
    <head>
        <title><?= $titulo ?> - <?= $cabecalho ?></title>


        <?php
        if ($this->config->item('cdn')) {
            echo '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">';
            echo '<link rel = "stylesheet" href = "//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">';
            echo '<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
            echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>';
            echo '<link href = "https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/' . $this->config->item('theme') . '/bootstrap.min.css" rel = "stylesheet">';
        } else {
            echo '<link href="' . base_url() . 'assets/css/bootstrap-3.3.5.min.css" rel="stylesheet">';
            echo '<link href="' . base_url() . 'assets/css/bootstrap-theme-3.3.5.min.css" rel="stylesheet">';
            echo '<link href="' . base_url() . 'assets/css/font-awesome-4.4.0.min.css" rel="stylesheet">';
            echo '<script src="' . base_url() . 'assets/js/jquery-1.11.3.min.js"></script> ';
            echo '<script src="' . base_url() . 'assets/js/bootstrap-3.3.5.min.js"></script> ';
        }
        ?>
        <link href = "<?php echo base_url(); ?>assets/css/opendojo.min.css" rel = "stylesheet">
        <script src="<?php echo base_url(); ?>assets/js/opendojo.js"></script>
    </head>
    <body>

        <div class="container">    
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Login</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Esqueceu a senha?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <?php
                            echo form_open('Login');
                        ?>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?php
                                    $attributes_text = array('class' => 'form-control');
                                    $attributes_text['name'] = 'username';
                                    $attributes_text['id'] = 'username';
                                    $attributes_text['placeholder'] = 'Usuário';
                                    echo form_input($attributes_text);
                                ?>
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <?php
                                    $attributes_text = array('class' => 'form-control');
                                    $attributes_text['name'] = 'password';
                                    $attributes_text['id'] = 'password';
                                    $attributes_text['placeholder'] = 'Senha';
                                    echo form_password($attributes_text);
                                ?>    
                            </div>

                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls">
                                    <?php
                                    $attributes_submit = array('class' => 'btn btn-default');
                                    echo form_submit($attributes_submit, 'Login');
                                    ?>
                                </div>
                            </div>
                        </form>     
                    </div>                     
                </div>  
            </div>

        </div> 
</body>
</html>
