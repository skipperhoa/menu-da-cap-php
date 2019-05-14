<?php
    $conn = mysql_connect('localhost','root','') or die("Connection error");
    mysql_select_db("db_demo");
    mysql_query("set names'utf8'");

    function menu($ds,$parent_id=0){
        $menu_tmp = array();
        foreach($ds as $key=>$value){
            if((int)$value['Parent']==(int)$parent_id){
                $menu_tmp[]=$value;
                unset($ds[$key]);
            }
        }
        if ($menu_tmp) 
        {
            echo '<ul>';
            foreach ($menu_tmp as $item) 
            {
                echo '<li>';
                echo '<a href="' . $item['TieuDeKD'] . '">' . $item['Title'] . '</a>';
                echo '<div>
                            <table border="0">
                                <tr>
                                    <td>Title</td>
                                    <td><input id="menu_title_' . $item['idLoai'] . '" value="' . $item['Title'] . '" /></td>
                                </tr>
                                <tr>
                                    <td>Link</td>
                                    <td><input id="menu_link_' . $item['idLoai'] . '" value="' . $item['TieuDeKD'] . '" /></td>
                                </tr>
                                <tr>
                                    <td>Parent</td>
                                    <td>
                                        <select id="menu_parent_id_' . $item['idLoai'] . '">
                                        </select>
                                        <input type="button" data-id="' . $item['idLoai'] . '" class="button menu-save" value="Lưu" />
                                    </td>
                                </tr>
                            </table>
                    </div>';
                
                // Gọi lại đệ quy
                // Truyền vào danh sách menu chưa lặp và id parent của menu hiện tại
                menu($ds, $item['idLoai']);
                echo '</li>';
            }
            echo '</ul>';
        }
    }

    $sql = "select * from loai";
    $result = mysql_query($sql,$conn);
    $menus = array();
    while($rows = mysql_fetch_array($result)){
        $menus[]=$rows;
    }
    echo '<pre>';
   // echo print_r($menus);
    echo '</pre>';
    menu($menus);



?>