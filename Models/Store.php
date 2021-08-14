<?php
namespace Models;

use \Core\Model;

class Store extends Model {

	public function getInfo()
	{
		$array = [];

		$sql ="SELECT * FROM informacoes";
		$sql = $this->db->query($sql);
		
		if ($sql->rowCount() > 0) {
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}
		
		return $array;
	}

	public function getData($company)
	{
		$sql = "SELECT * FROM store_info WHERE id_company = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $company);
		$sql->execute();

		return $resposta = $sql->fetch(\PDO::FETCH_ASSOC);
	}

	public function getPlatforms()
	{
		$array = [];
		$sql ="SELECT DISTINCT platform, COUNT( platform ) as total_platform FROM platform_access GROUP BY platform";
		$sql = $this->db->query($sql);
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function qtPratos($company)
	{
		$array = [];

		$sql ="SELECT count(id) as total FROM products WHERE id_company = :id_company";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_company', $company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function editStore($nome, $rua, $bairro, $cidade, $numero, $telefone, $img=NULL, $cover=null, $company)
	{
		if($img) {

			$sql ="UPDATE store_info SET name_store = :n, street = :r, neighborhood = :b, city = :c, number = :nu, phone = :t, logo = :l WHERE id_company = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':n', $nome);
			$sql->bindValue(':r', $rua);
			$sql->bindValue(':b', $bairro);
			$sql->bindValue(':c', $cidade);
			$sql->bindValue(':nu', $numero);
			$sql->bindValue(':t', $telefone);
			$sql->bindValue(':l', $img);
			$sql->bindValue(':id', $company);
			$sql->execute();

		} else if($cover) {

			$sql ="UPDATE store_info SET name_store = :n, street = :r, neighborhood = :b, city = :c, number = :nu, phone = :t, cover = :cover WHERE id_company = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':n', $nome);
			$sql->bindValue(':r', $rua);
			$sql->bindValue(':b', $bairro);
			$sql->bindValue(':c', $cidade);
			$sql->bindValue(':nu', $numero);
			$sql->bindValue(':t', $telefone);
			$sql->bindValue(':cover', $cover);
			$sql->bindValue(':id', $company);
			$sql->execute();

		} else if($img && $cover) {

			$sql ="UPDATE store_info SET name_store = :n, street = :r, neighborhood = :b, city = :c, number = :nu, phone = :t, logo = :logo, cover = :cover WHERE id_company = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':n', $nome);
			$sql->bindValue(':r', $rua);
			$sql->bindValue(':b', $bairro);
			$sql->bindValue(':c', $cidade);
			$sql->bindValue(':nu', $numero);
			$sql->bindValue(':t', $telefone);
			$sql->bindValue(':logo', $img);
			$sql->bindValue(':cover', $cover);
			$sql->bindValue(':id', $company);
			$sql->execute();
			
			} else {

			$sql ="UPDATE store_info SET name_store = :n, street = :r, neighborhood = :b, city = :c, number = :nu, phone = :t WHERE id_company = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':n', $nome);
			$sql->bindValue(':r', $rua);
			$sql->bindValue(':b', $bairro);
			$sql->bindValue(':c', $cidade);
			$sql->bindValue(':nu', $numero);
			$sql->bindValue(':t', $telefone);
			$sql->bindValue(':id', $company);
			$sql->execute();

		}


		if ($sql->rowCount() > 0) {
            $_SESSION['alert'] = '<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:10px;">
									<i class="fa fa-times"></i>
									</button>
									<span>
									<b> Sucesso - </b> Alteração feita com sucesso!</span>
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

    public function editLayout($layout, $company)
    {

        $sql ="UPDATE config_menu SET view_products = :v WHERE id_company = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':v', $layout);
        $sql->bindValue(':id', $company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $_SESSION['alert'] = '<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:10px;">
									<i class="fa fa-times"></i>
									</button>
									<span>
									<b> Sucesso - </b> Alteração feita com sucesso!</span>
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

    public function editTheme($layout, $company)
    {

        $sql ="UPDATE config_menu SET skin = :s WHERE id_company = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':s', $layout);
        $sql->bindValue(':id', $company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $_SESSION['alert'] = '<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:10px;">
									<i class="fa fa-times"></i>
									</button>
									<span>
									<b> Sucesso - </b> Alteração feita com sucesso!</span>
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

	public function updateHora($hora, $campo)
	{
		$sql ="UPDATE informacoes SET $campo = :c";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':c', $hora);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

    public function closeStore($status, $company)
    {
        $sql ="UPDATE store_info SET open_status = :status WHERE id_company = :idc";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':status', $status);
        $sql->bindValue(':idc', $company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function openStore($status, $company)
    {
        $sql ="UPDATE store_info SET open_status = :status WHERE id_company = :idc";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':status', $status);
        $sql->bindValue(':idc', $company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

}