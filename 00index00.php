<?php

require_once __DIR__ . '/bootstrap.php';

$crawler = new Crawler();
$sites = $crawler->crawl();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-center">Najnowsze zlecenia</h1>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <?php if($sites): ?>
                    <embed src="/res/sound.mp3" hidden="TRUE" autostart="TRUE"></embed>

                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Link</th>
                                <th>Kategoria</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($sites as $site): ?>
                            <tr>
                                <th scope="row"><?php echo $counter; ?></th>
                                <td><a href="<?php echo $site->getUrl(); ?>" target="_blank"><?php echo $site->getUrl(); ?></a></td>
                                <td><?php echo $site->getCategory(); ?></td>
                            </tr>
                            <?php $counter++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <a href="index.php" class="btn btn-success btn-block">Odśwież</a>

                    <?php else: ?>
                        <h3 class="text-center">Brak nowych zleceń...</h3>
                        <?php header("Refresh:120"); ?>
                        <div id="getting-started"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>




        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script src="plugins/jquery.countdown-2.2.0/jquery.countdown.min.js"></script>
        <script type="text/javascript">
            $("#getting-started")
                .countdown("2017/01/01", function(event) {
                    until: 120,
                        format: 'S' // <-- the magic is happening here
                });
        </script>
    </body>
</html>