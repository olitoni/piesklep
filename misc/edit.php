<?php
include 'connection.php';

if (isset($_POST['edit'])) {

  $stmt = $connection->prepare("SELECT image, thumbnail FROM products WHERE id = ?");
  $stmt -> bind_param('i', $prod);
  $prod = (int)$_POST['edit'];
  $stmt->execute();
  $result = $stmt->get_result();
  $row = mysqli_fetch_array($result);
  $img = $row['image'];
  $thumb = $row['thumbnail'];

  if(isset($_POST['update'])) {
    unlink("..".$img);
    unlink("..".$thumb);

    $filename = date('Y-m-d-H-i-s')."_".$_FILES['file']['name'];
    $path = "../uploads/$filename";
    move_uploaded_file($_FILES['file']['tmp_name'], $path);
    
    $blob = file_get_contents($path);
    $src = imagecreatefromstring($blob);
    list($width, $height) = getimagesize($path);
    $tmp = imagecreatetruecolor(150, 90);
    $file = '../thumbnails/'.$filename;
    imagecopyresampled($tmp, $src, 0, 0, 0, 0, 150, 90, $width, $height);
    imagebmp($tmp, $file, 100);
    
    $img = "/uploads/$filename";
    $thumb = "/thumbnails/$filename";
  }

  $stmt = $connection->prepare("UPDATE products SET name = ?, description = ?, image = ?, thumbnail = ?, price = ?, review = ? WHERE id = ?");
  $stmt->bind_param("ssssiii", $name, $desc, $img, $thumb ,$price, $review, $prod);
  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $price = (int)$_POST['price'];
  $review = (int)$_POST['review'];
  $prod = (int)$_POST['edit'];
  $stmt->execute();

  header('Location: /admin');
}

$stmt = $connection->prepare("SELECT * FROM products WHERE id = ?");
$stmt -> bind_param('i', $prod);
$prod = (int)$_GET['id'];
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_array($result);
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Piesklep</title>
  <link rel="stylesheet" href="/css/normalize.css" />
  <link rel="stylesheet" href="/css/main.css" />
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#mytextarea',
      height: '220px',
      width: 'calc(30vw + 20px)',
      forced_root_block : '',
      menubar: false,
      statusbar: false,
      resize: false,
      language: 'pl',
      toolbar: 'undo redo | bold italic underline strikethrough | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'admin',
      newline_behavior: 'invert',
    });
  </script>
</head>

<body>
  <div class="c-header">
    <div class="o-container">
      <div class="c-header__content">
        <div class="c-logo">
          <h1 class="c-logo__text">Piesklep</h1>

          <div class="c-header__ham">
            <svg viewBox="0 0 100 50" width="40" height="40">
              <rect fill="#9393a5" width="70" height="10"></rect>
              <rect fill="#9393a5" width="70" height="10" y="20"></rect>
              3 <rect fill="#9393a5" width="70" height="10" y="40"></rect>
            </svg>
          </div>
        </div>

        <div class="c-nav">
          <ul class="c-nav__list">
            <li class="c-nav__item">
              <a href="/" class="c-nav__link">Home</a>
            </li>
            <li class="c-nav__item">
              <a href="/cart.php" class="c-nav__link">Koszyk</a>
            </li>
            <li class="c-nav__item">
              <a href="/logout.php" class="c-nav__link">Wyloguj</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="c-panel">
    <div class="o-container">
      <form action="/misc/edit.php" method="post" enctype="multipart/form-data">
        <h3>Name</h3>
        <input class="c-login__input" type="text" name="name" value="<?php echo $row['name'];?>"></input>
        <h3>Description</h3>
        <input class="c-login__input" id="mytextarea" type="textarea" name="desc" value="<?php echo $row['description'];?>"><br>
        <h3>Image</h3>
        <input type="checkbox" name="update" value="1" id="img_update" style="display: none;">
        <input class="c-login__input" type="file" name="file" id="file" accept="image/*" onchange="handleFileSelect(event); document.querySelector('#img_update').checked = 1;"><br>
        <img id='img' src="<?php echo $row['image'];?>" style="margin-top: 10px;" width="300px" height="150px"></img>
        <h3>Price</h3>
        <input class="c-login__input" type="number" name="price" value="<?php echo $row['price'];?>"><br>
        <h3>Review</h3>
        <input class="c-login__input" type="number" name="review" value="<?php echo $row['review'];?>"><br>
        <button class="c-login__btn" name="edit" value="<?php echo $prod ?>">Edit</button>
      </form>
    </div>
  </div>

  <script>
      function handleFileSelect(evt) {
        let files = evt.target.files;
        let f = files[0];
        let reader = new FileReader();
		
        reader.onload = (function(theFile) {
          return function(e) {
            document.querySelector('#img').src = e.target.result;
          };
        })(f);
    
        reader.readAsDataURL(f);
      }
  </script>

  <div class="c-footer">
    <div class="o-container">
      <div class="c-footer__content">
        <a>
          <p class="c-footer__mail">sklep@pies.pl</p>
        </a>
        <p>Piesklep, Copyright © 2022</p>
        <div class="c-footer__socials">
          <a href="https://github.com/" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="30px" viewBox="0 0 24 24" class="c-footer__social">
              <title>Github icon</title>
              <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>