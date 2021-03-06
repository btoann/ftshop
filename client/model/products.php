<?php

    include_once '.system/lib/controller.php';

    class hotprice
    {
        public function sbs_chosen($limit)
        {
            $sql =
                'SELECT pr.id, pr.name, pr.price, pmt.type as type_pmt, pmt.discount, img.basename
                FROM (SELECT basename FROM product_images WHERE role = 1 LIMIT 1) AS img,
                    products pr INNER JOIN promotions pmt ON pr.promotion = pmt.id
                        ORDER BY id limit '.$limit;
            $dtb = new database();
            return $dtb->query($sql);
        }
    }

    function search($txt)
    {
        $sql = 'SELECT pr.id, pr.name, pr.price, pmt.type as type_pmt, pmt.discount, img.basename
                FROM (SELECT basename FROM product_images WHERE role = 1 LIMIT 1) AS img,
                    products pr INNER JOIN promotions pmt ON pr.promotion = pmt.id
                    WHERE pr.name LIKE "%'.$txt.'%" LIMIT 20';
        // Thực thi
        $dtb = new database();
        return $dtb->query($sql);
    }

    function product($id)
    {
        $sql = 'SELECT pr.id, pr.name, pr.price, pmt.type as type_pmt, pmt.discount, img.basename
                FROM (SELECT basename FROM product_images WHERE role = 1 LIMIT 1) AS img,
                    products pr INNER JOIN promotions pmt ON pr.promotion = pmt.id
                    WHERE pr.id = '.$id;
        // Thực thi
        $dtb = new database();
        return $dtb->queryOne($sql);
    }

?>