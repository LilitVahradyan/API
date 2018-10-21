<!DOCTYPE html>
<html>
<head>
    <title>Books List</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .container{
           display: flex;
           width: 1000px;
           height: 370px;
           border:2px solid #000066;
           margin-top: 10px
        }
        .image{
            width: 200px;
            height:300px;
            margin-top: 20px;
            margin-left:15px;
        }
        .text{
            margin-left:10px;
            margin-top: 40px
        }
        .title, .author, .publisher{
            color:#0000b3
        }
        .description{
            color:#3333ff;
        }
    </style>
</head>
<body>
    <?php
        require_once 'curl.php';
        $result = $result->data;
        $result[0]->publisher;
        foreach($result as $res){
    ?>
    <div class="container">
        <div>
            <img src="<?=  $res->image; ?>" class="image">
        </div>

        <div class="text">
        <h2 class="title">
            <?=  $res->title ;?>
        </h2>
        <h2 class="author">
            by <?=  $res->authors;?>
        </h2>
        <h3 class="publisher">
            Publisher: <?= $res->publisher; ?>
        </h3>
        <p class="description">
            <?= $res->description; ?>
        </p>

    </div>
    
    </div>
    
     <?php } ?>
   
</body>
</html>