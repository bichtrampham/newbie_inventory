<?php 
include 'include/config.php';

    // Messages
    $error_messages = array();
    $success_messages = array();

    // Form sent
    if(!empty($_POST))
    {
        // Default value for gender

        // Retrieve data
        $nameBook       = trim($_POST['nameBook']);
        $author         = trim($_POST['author']);
        $edition        = trim($_POST['edition']);
        $genre           = trim($_POST['genre']);
        $quantity       = (int)$_POST['quantity'];

        // Name errors
        if(empty($nameBook))
            $error_messages['nameBook'] = 'is empty';
        
        // author errors
        if(empty($author))
            $error_messages['author'] = 'is empty';
        
        // Edition errors
        if(empty($edition))
            $error_messages['edition'] = 'is empty';
        
        //genre error
        if(empty($genre))
            $error_messages['genre'] = 'is empty';

        // Quantity errors
        if(empty($quantity))
            $error_messages['quantity'] = 'is empty';
        else if($quantity > 2000)
            $error_messages['quantity'] = 'you are not so rich ';
        else if($quantity < 0)
            $error_messages['quantity'] = 'impossible ';

        
        // No errors
        if(empty($error_messages))
        {
          //prepare the INSERT
          $prepare = $pdo->prepare('INSERT INTO product (nameBook, author, edition, quantity, genre) VALUES (:nameBook, :author, :edition, :quantity, :genre)');
          
          // Set values
          $prepare->bindValue('nameBook', $nameBook);
          $prepare->bindValue('author', $author);
          $prepare->bindValue('edition', $edition);
          $prepare->bindValue('genre', $genre);
          $prepare->bindValue('quantity', $quantity);
          
          // Execute INSERT
          $prepare->execute();
          
            // Add success message
            $success_messages[] = 'Creation complete';

            // Reset values
            $_POST['nameBook'] = '';
            $_POST['author']   = '';
            $_POST['edition']  = '';
            $_POST['genre']     = '';
            $_POST['quantity'] = '';
        }
    }

    // No data sent
    else
    {
        // Default values
        $_POST['nameBook'] = '';
        $_POST['author']   = '';
        $_POST['edition']  = '';
        $_POST['genre']  = '';
        $_POST['quantity'] = '';
    }

// Delete list 

if(!empty($_GET['delete_id']))
    {
        $prepare = $pdo->prepare('DELETE FROM product WHERE id= :id');
        $prepare->bindValue('id', $_GET['delete_id']);
        $prepare->execute();
    }


//modification list

if(!empty($_GET['modification']))
    {
        $prepare = $pdo->prepare('INSERT INTO product (nameBook, author, edition, quantity, genre) VALUES (:nameBook, :author, :edition, :quantity, :genre) WHERE id= :id');
        $prepare->bindValue('id', $_GET['modification']);
        $prepare->execute();
    }