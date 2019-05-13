<!DOCTYPE html>
<html>


<body>
<?php $id = $_GET['id'];
$idpost = $_GET['idpost']; ?>
<h3>Modifier un commentaire</h3>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="index.php?idpost=<?php echo $_GET['idpost'] ?>&action=comment" method="post">
                <div class="d-flex justify-content-center">
                    <label for="name">Votre nom</label>
                    <input id="name" name="name" type="text" class="form-control" required>
                    <br>
                    <textarea class="form-control" name="comments" placeholder="Votre message"></textarea>
                </div>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
</body>
