<?php
namespace Models;

use \Core\Model;

class Menu extends Model {

    public function getAll($company)
    {
        $sql ="SELECT * FROM products WHERE id_company = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $company);
        $sql->execute();
        return $products = $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCategories($company)
    {
        $array = [];
        $sql ="SELECT * FROM categories WHERE id_company = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $array;
    }
    
    public function getAllCat()
    {
        $sql ="SELECT * FROM products INNER JOIN categories ON products.category = categories.name_category WHERE products.status = 0";
        $sql = $this->db->query($sql);
        return $products = $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function saveProduct($nome, $category, $descricao, $price, $img, $status, $company)
    {
        $sql ="INSERT INTO products SET id_company = :idc, category = :cat, name_product = :np, description = :d, price = :p, image = :im, status = :s";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':idc', $company);
        $sql->bindValue(':cat', $category);
        $sql->bindValue(':np', $nome);
        $sql->bindValue(':d', $descricao);
        $sql->bindValue(':p', $price);
        $sql->bindValue(':im', $img);
        $sql->bindValue(':s', $status);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $_SESSION['alert'] = '<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:10px;">
									<i class="fa fa-times"></i>
									</button>
									<span>
									<b> Sucesso - </b> Produto cadastrado com sucesso!</span>
								  </div>';
        } else {
            $_SESSION['alert'] = '<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:10px;">
									<i class="fa fa-times"></i>
									</button>
									<span>
									<b> Erro - </b> Algo deu errado tente novamente!</span>
								  </div>';
        }
    }

    public function editProduct($nome, $category, $descricao, $price, $promo, $img=NULL, $status, $id, $company)
    {
//        echo "<pre>";
//        print_r($id);
//        echo "<pre>";
//        print_r($nome);
//        echo "<pre>";
//        print_r($category);
//        echo "<pre>";
//        print_r($descricao);
//        echo "<pre>";
//        print_r($price);
//        echo "<pre>";
//        print_r($promo);
//        echo "<pre>";
//        print_r($img);
//        echo "<pre>";
//        print_r($status);
//        echo "<pre>";
//        print_r($company);
//        exit;
        if ($img) {
            
            $sql ="UPDATE products SET category = :c, name_product = :np, description = :d, price = :ap, promo_price = :pr, image = :im, status = :s WHERE id = :idp AND id_company = :idc";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':c', $category);
            $sql->bindValue(':np', $nome);
            $sql->bindValue(':d', $descricao);
            $sql->bindValue(':ap', $price);
            $sql->bindValue(':pr', $promo);
            $sql->bindValue(':im', $img);
            $sql->bindValue(':s', $status);
            $sql->bindValue(':idp', $id);
            $sql->bindValue(':idc', $company);
            $sql->execute();

        } else {
            
            $sql ="UPDATE products SET category = :c, name_product = :np, description = :d, price = :ap, promo_price = :pr, status = :s WHERE id = :idp AND id_company = :idc";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':c', $category);
            $sql->bindValue(':np', $nome);
            $sql->bindValue(':d', $descricao);
            $sql->bindValue(':ap', $price);
            $sql->bindValue(':pr', $promo);
            $sql->bindValue(':s', $status);
            $sql->bindValue(':idp', $id);
            $sql->bindValue(':idc', $company);
            $sql->execute();
        }
        

        if ($sql->rowCount() > 0) {
            $_SESSION['alert'] = '<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:10px;">
									<i class="fa fa-times"></i>
									</button>
									<span>
									<b> Sucesso - </b> Produto editado com sucesso!</span>
								  </div>';
        } else {
            $_SESSION['alert'] = '<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:10px;">
									<i class="fa fa-times"></i>
									</button>
									<span>
									<b> Erro - </b> Algo deu errado tente novamente!</span>
								  </div>';
        }
    }

    public function active($id_product, $status, $company)
    {
        $sql ="UPDATE products SET status = :status WHERE id = :id AND id_company = :idc";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':status', $status);
        $sql->bindValue(':id', $id_product);
        $sql->bindValue(':idc', $company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function inactive($id_product, $status, $company)
    {
        $sql ="UPDATE products SET status = :status WHERE id = :id AND id_company = :idc";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':status', $status);
        $sql->bindValue(':id', $id_product);
        $sql->bindValue(':idc', $company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getOptions($id_product)
    {
        $sql ="SELECT
        c.id_category_option,
        c.category_name_option,
        o.id_option,
        o.id_product,
        o.name_option,
        o.price_option,
        o.available
    FROM
        category_option AS c
    LEFT JOIN product_options AS o ON o.id_category_option = c.id_category_option
    WHERE
        c.id_product = :id AND o.available = 0
    GROUP BY
        c.id_category_option,
        c.category_name_option,
        o.id_option,
        o.id_product,
        o.name_option,
        o.price_option";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id_product);
        $sql->execute();
        $dados = $sql->fetchAll(\PDO::FETCH_ASSOC); 
        
        $options = [];
        $currentId = 0;
        $prevId = 0;
        $counter = 0;

        // monta o cabeçalho
        foreach ($dados as $key => $value) {
           
            $currentId = $value['id_category_option'];

            if ($currentId !== $prevId) {
                $options[$counter]['id_category_option'] = $value['id_category_option'];
                $options[$counter]['category_name_option'] = $value['category_name_option'];
                $counter++;
            }

            $prevId = $value['id_category_option'];

        }

        // monta os options
        foreach ($dados as $key => $value) {
            
            foreach ($options as $k => $v) {
                if ($value['id_category_option'] === $v['id_category_option']) {
                    $options[$k]['options'][] = $value['name_option'];
                    $options[$k]['price'][] = $value['price_option'];
                    $options[$k]['id_option'][] = $value['id_option'];
                    $options[$k]['available'][] = $value['available'];
                }
            }
        }

        return $options;
        
    }

    public function getProdutoId($id, $company)
    {
        $sql ="SELECT * FROM products WHERE id = :id AND id_company = :idc";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->bindValue(':idc', $company);
        $sql->execute();
        return $produto = $sql->fetch(\PDO::FETCH_ASSOC);
    }

    public function getProductOptions($id_company)
    {
        $options = [];
        $sql ="SELECT * FROM products WHERE id_company = :id_company";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();
        

        if($sql->rowCount() > 0) {
            $options = $sql->fetchAll(\PDO::FETCH_ASSOC);
            //$options[$key]['options'] = $this->getCategoryOptions('4,5', $id_company);
    
            //dd($options);
            $ids = [];
            foreach ($options as $key => $id_value) {
                $ids[$key] = $id_value['id'];
                $options[$key]['options'] = [];
            }
            
            // foreach ($options as $key => $value) {
                $categories = $this->getCategoryOptions(implode(',',$ids), $id_company);
         
                foreach ($categories as $value) {
                    
                    $id_product_categories = explode(',',$value['id_product']);
                    $d = array_intersect_assoc($id_product_categories, $ids);
                    // $cat_op = [];
                    // if($id_product_categories === $d) {
                    //     $cat_op = $value;
                    // } else {
                    //     $cat_op = $value;
                    // }
                    
                    foreach ($d as $key => $id_verify) {
                           
                        if($options[$key]['id'] === $id_verify) {
                            
                            $options[$key]['options'] = $categories;
                        }
                    }
                    // if(in_array($ids, $id_product_categories)) {
                    //     dd('aqui');
                    // }
                }
               
            // }
        }

        return $options;
    }

    public function getCategoryOptions($id_company)
    {
        
        $sql ="SELECT id, id_product, name_option FROM options_product WHERE id_company = :id_company AND option_status = :stopen";
        $sql = $this->db->prepare($sql);
        //$sql->bindValue(':id', $id);
        $sql->bindValue(':id_company', $id_company);
        $sql->bindValue(':stopen', "ACTIVE");
        $sql->execute();
        $categories = $sql->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($categories as $key => $value) {
            $categories[$key]['options_categorie_item'] = $this->getCOptions($value['id'], $id_company);
        }
//  dde($categories);
        return $categories;
    }

    public function getCOptions($id, $id_company)
    {
        $sql ="SELECT name_option_item, price_option_item, option_item_status FROM options_product_item WHERE id_option_product = :id AND id_company = :id_company AND option_item_status = :ois";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->bindValue(':id_company', $id_company);
        $sql->bindValue(':ois', 'ACTIVE');
        $sql->execute();
        $items = $sql->fetchAll(\PDO::FETCH_ASSOC);

        return $items;
    }

}