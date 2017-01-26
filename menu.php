<?php
$menu = new template('menu.menu');
$item = new template('menu.item');
$sql = 'SELECT content_id, title FROM content WHERE '.'parent_id ="0" AND show_in_menu ="1"';
$sql = $sql.' ORDER BY sort ASC';
$res = $db->getArray($sql);
if($res != false) {
    foreach ($res as $page){
        $item->set('name', $page['title']);
        $link = $http->getLink(array('page_id'=>$page['content_id']));
        $item->set('link',$link);
        $menu->add('items', $item->parse());
    }
}
$tmpl->set('menu', $menu->parse());
?>