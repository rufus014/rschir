<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Каталог</title>
  <style>
    table{
      border-collapse: collapse;
      border: 1px solid black;
    }
    tr, td, th{
      padding: 7px 10px;
      border: 1px solid black;
    }
    npm install — save react-router-dom
  </style>
 </head>
 <body>
  <h1>Меню блюд</h1>
  <table>
     <tr>
      <th>Название</th>
      <th>Описание</th>
      <th>Цена</th>
    </tr>
       <?php foreach ($products as $product) : ?>
        <tr> 
          <td>
            <?php echo $product['product_name'] ?>
          </td>
          <td>
            <?php echo $product['product_desc'] ?>
          </td>
          <td>
            <?php echo $product['product_price'] ?>
          </td>
        </tr>
      <?php endforeach; ?> 
   
  </table>
 </body>
</html>
 