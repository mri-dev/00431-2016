<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Új szobafoglalás</title>
<style media="screen">
  table {
  border-collapse: collapse;
  }
  table thead td {
  background: #f3f3f3;
  text-align: center;
  }
  table td {
  padding: 10px;
  border: 1px solid #eaeaea;
  }
</style>
</head>
<body>
  <h2>Új szobafoglalás érkezett!</h3>
  <h3>Kapcsolattartó adatai:</h3>
  <table>
    <tr>
      <td>
        Vezetéknév:
      </td>
      <td>
        <strong><?=$_POST['roomrent']['contact']['vezeteknev']?></strong>
      </td>
    </tr>
    <tr>
      <td>
        Keresztnév:
      </td>
      <td>
        <strong><?=$_POST['roomrent']['contact']['keresztnev']?></strong>
      </td>
    </tr>
    <tr>
      <td>
        Telefonszám:
      </td>
      <td>
        <strong><?=$_POST['roomrent']['contact']['telefon']?></strong>
      </td>
    </tr>
    <tr>
      <td>
        E-mail cím:
      </td>
      <td>
        <strong><?=$_POST['roomrent']['contact']['email']?></strong>
      </td>
    </tr>
    <tr>
      <td>
        Megjegyzés
      </td>
      <td>
        <strong><?=$_POST['roomrent']['contact']['msg']?></strong>
      </td>
    </tr>
  </table>
  <br>
  <h4>Kiválasztott paraméterek:</h4>
  <table>
    <tr>
      <td>
        Időpont:
      </td>
      <td>
        <strong><?=$_POST['roomrent']['date']['from']?> &mdash; <?=$_POST['roomrent']['date']['to']?> </strong>
      </td>
    </tr>
    <tr>
      <td>
        Felnőttek száma
      </td>
      <td>
        <strong><?=$_POST['roomrent']['people']['adults']?> db</strong>
      </td>
    </tr>
    <tr>
      <td>
        Gyerekek száma
      </td>
      <td>
        <strong><?=$_POST['roomrent']['people']['children']?> db</strong>
      </td>
    </tr>
    <tr>
      <td>
        Gyerekek kora
      </td>
      <td>
        <strong><?=$_POST['roomrent']['settings']['children_ages']?></strong>
      </td>
    </tr>
    <tr>
      <td>
        Gyerekek külön szobában
      </td>
      <td>
        <strong><?=(isset($_POST['roomrent']['settings']['children_eroom']))?'IGEN':'NEM'?></strong>
      </td>
    </tr>
    <tr>
      <td>
        Foglalás jellege
      </td>
      <td>
        <strong><?=$_POST['roomrent']['settings']['visittype']?></strong>
      </td>
    </tr>
    <tr>
      <td>
        Igényelt szobatípus
      </td>
      <td>
        <strong><?=$_POST['roomrent']['settings']['roomtype']?></strong>
      </td>
    </tr>
  </table>
  <br><br>
  Üzenet elküldésének ideje: <?=date('Y-m-d H:i:s')?>
</body>
</html>
