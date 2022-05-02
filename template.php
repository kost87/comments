<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="app.js"></script>
        <title>Главная</title>
        <style>
            .edit, .answer
            {
                cursor: pointer;
                font-size: 12px;
                color: #b0b0b0;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light top-bar">
        <div class="container-fluid">
            Добро пожаловать, <?php echo $user->login; ?>
        </div>
        </nav>
        <div class="container">
            <br>
            <div class="row">
                <div class="col">
                    <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur, iure, tempore omnis ducimus delectus amet harum perspiciatis sunt sequi quas repellat porro enim dolore deserunt nobis placeat eum, unde officiis?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quae, nemo odio sint minus molestiae aliquam corrupti voluptate natus? Voluptate cum laboriosam voluptatum modi aut impedit sunt esse dignissimos consectetur.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus a qui nemo, cupiditate rerum corporis natus libero consequatur vitae facilis consequuntur laudantium quibusdam magni totam aut in aspernatur eos maxime?
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur, iure, tempore omnis ducimus delectus amet harum perspiciatis sunt sequi quas repellat porro enim dolore deserunt nobis placeat eum, unde officiis?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quae, nemo odio sint minus molestiae aliquam corrupti voluptate natus? Voluptate cum laboriosam voluptatum modi aut impedit sunt esse dignissimos consectetur.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus a qui nemo, cupiditate rerum corporis natus libero consequatur vitae facilis consequuntur laudantium quibusdam magni totam aut in aspernatur eos maxime?
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur, iure, tempore omnis ducimus delectus amet harum perspiciatis sunt sequi quas repellat porro enim dolore deserunt nobis placeat eum, unde officiis?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quae, nemo odio sint minus molestiae aliquam corrupti voluptate natus? Voluptate cum laboriosam voluptatum modi aut impedit sunt esse dignissimos consectetur.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus a qui nemo, cupiditate rerum corporis natus libero consequatur vitae facilis consequuntur laudantium quibusdam magni totam aut in aspernatur eos maxime?
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur, iure, tempore omnis ducimus delectus amet harum perspiciatis sunt sequi quas repellat porro enim dolore deserunt nobis placeat eum, unde officiis?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quae, nemo odio sint minus molestiae aliquam corrupti voluptate natus? Voluptate cum laboriosam voluptatum modi aut impedit sunt esse dignissimos consectetur.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus a qui nemo, cupiditate rerum corporis natus libero consequatur vitae facilis consequuntur laudantium quibusdam magni totam aut in aspernatur eos maxime?
                    </p>
                </div>
            </div>
            <div class="row" id="0">
                <div class="col">
                    <h4>Коимментарии</h4>
                    <form action="insert" method="post">
                        <div class="form-group">
                            <textarea class="form-control" name="comment" id="txtComment_0" rows="2" placeholder="Оставьте свой комментарий..."></textarea>
                            <br>
                            <input class="btn btn-primary btnSubmitComment" type="button" onClick="btnSubmitCommentClick(0)" value="Отправить">
                            
                        </div>
                    </form>
                </div>
            </div>
                <?php
                function display_comments(array $comments, $level = 0) {
                    foreach ($comments as $comment) {
                        global $user;
                        echo '
                        <div style="margin-left: ' . $level*50 . 'px;" class="comment" id="' . $comment->id . '">
                        <div class="comment_head">' . $comment->user->login . ' - ' . $comment->updated_at .'</div>
                            <div class="comment_content">' . $comment->content . '</div>';
                        if ($comment->id_user == $user->id) echo '<a class="edit">Редакторовать</a> ';    
                        if ($level < 10) echo '<a class="answer">Ответить</a>';
                        echo '<div class="answer_form"></div></div>';
                      if (count($comment->answers)>0) {
                        display_comments($comment->answers, $level + 1);
                      }
                    }
                }
                display_comments($comments);
                ?>
        </div>
    </body>
</html>