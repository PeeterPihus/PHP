<?php
$menu = new template('menu.menu');
$menu->set('items', false);
$item = new template('menu.item');
$sql = 'SELECT content_id, title FROM content WHERE '.'parent_id ="0" AND show_in_menu ="1"';
if (ROLE_ID != ROLE_ADMIN){
    $sql .= ' AND is_hidden = 0';
}
$sql = $sql.' ORDER BY sort ASC';
$res = $db->getArray($sql);
if($res != false) {
    foreach ($res as $page){
        $item->set('name', tr($page['title']));
        $link = $http->getLink(array('page_id'=>$page['content_id']));
        $item->set('link',$link);
        $menu->add('items', $item->parse());
    }
}
if(USER_ID != ROLE_NONE){
    $link = $http->getLink(array('act'=>'logout'));
    $item->set('link', $link);
    $item->set('name', 'Logi välja');
    $menu->add('items', $items->parse());
}
$tmpl->set('menu', $menu->parse());
?>