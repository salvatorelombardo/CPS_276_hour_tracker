<?php 
require_once 'server/pageRoutes.php';



?>

<!doctype html>
<html lang="en">

<head>
    <title>
        <?php echo $pageData['title']; ?>
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
        crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $pageData['base'] . " public/css/main.css" ?>">
</head>

<body class="bg-light">
    <div id="msgBox"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">
                    <?php echo $pageData['heading'] ?>
                </h1>
            </div>
        </div>
    </div>
    <?php if($pageData['nav']){
            require_once 'views/partials/navigation.php';
    } ?>
    <?php echo $pageData['content']; ?>










    <div class="footer bg-light" style="position: absolute; bottom: 0; width: 100%; height: 60px; line-height: 60px">
        <div class="container text-center">
            <span class="text-muted ">&copy; 2018</span>
        </div>
    </div>

    <!--container end-->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>
    <?php 

    $jsFilesArray=explode('^',$pageData['js']);
    $i=0;
    $js="";
    while($i<count($jsFilesArray)){
        $js .="<script src=".$pageData['base']."public/js/".$jsFilesArray[$i].".js></script>";
        $i++;

    }
    echo $js;

    ?>
</body>

</html>