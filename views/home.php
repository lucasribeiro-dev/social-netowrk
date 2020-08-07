<html>
    <head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css"/>

    <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <br/><br/><br/><br/>
        
        <div class="row">
            <div class="feed ">
                <form method="POST">
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="msg"></textarea>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                </form> 
                <?php foreach($feed as $item): ?>
                    <strong><?php echo $item['user']; ?></strong> - <?php echo date('H:i', strtotime($item['post_data'])); ?><br/>
                    <?php echo $item['msg']; ?>
                    <hr/>
            <?php endforeach; ?>
            </div>

            

        <div class="card rightside" style="width: 18rem;">
            <div class="card-body ">
                <div class="card-header"><h5 class="card-title">Perfil</h5></div>
                <br/>
                <a class="card-text">Seguidores: <?php echo $viewData['countFollowers']; ?>  </a>
                <br/>    
                <a class="card-text">Seguindo: <?php echo $viewData['countFollowing'];?>  </a>
                <br/><br/>
                <div class="card-header"><h6 class="card-title">Sugestion Friends</h6></div>

                <ul class="list-group list-group-flush">
                    <?php foreach($sugestion as $user):?>
                    <li class=" list-group-item">
                    <?php if($user['followers']=='0'): ?>
                        <a class= "nav-link"href="/social_network/home/follow/<?php echo $user['id']; ?>"><?php echo $user['user'];?> <p>Follow</p></a>
                        <?php else: ?>
                            <a class= "nav-link"href="/social_network/home/unfollow/<?php echo $user['id']; ?>"><?php echo $user['user'];?> <p>Unfollow</p></a>
                    </li>
                    <?php endif; ?>
                    <?php endforeach;?>

                </ul>
            </div>
        </div>
    <div>
        
     


      

        

    </body>

</html>


