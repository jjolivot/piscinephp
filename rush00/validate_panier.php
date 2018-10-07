<?php
session_start();

if (isset($_SESSION['user']['name']))
{
    if (!file_exists('htdoc'))
      mkdir('htdoc/private/', 0755, true);
    if (!file_exists('htdoc/private'))
      mkdir('htdoc/private',0755);
    if (!file_exists('htdoc/private/archives'))
      file_put_contents('htdoc/private/archives', null);
    $list = unserialize(file_get_contents('htdoc/private/archives'));
    if ($list)
    {
      foreach ($list as $elem)
      {
        if ($elem['login'] == $_POST['login'])
          $elem = array('produit' => $_SESSION['user']['panier'], 'passwd' => $elem['passwd'], 'droits' => $choice);
      }
    }
    if (isset($_SESSION['user']['panier']))
    {
        foreach ($_SESSION['user']['panier'] as $k => $v)
                $list[] = array('client' => $_SESSION['user']['name'], 'produit' => key($v), 'prix' => $v[key($v)]);
        file_put_contents('htdoc/private/archives', serialize($list));
        header("Location: bye.php");
        exit;
    }
    header("Location: index.php");
}
else
    header("Location: index.php");
?>