<?php 

    #	Funções de Busca
    
    if (!isset($_SESSION['login'])) 
    header('location:?a=login');
	


	class funcoes {

		#	LISTAR

        public static function listar($filtro) {
			
			$configs = include('bd/config.php');
		
			$con = mysqli_connect(
				$configs['BD_HOST'], 
				$configs['BD_USERNAME'],
				$configs['BD_PASSWORD'],
				$configs['BD_DATABASE']
			);

			if ($con) {

				if (!$filtro){
				$sql = "SELECT COOP_ID, COOP_MATRICULA, COOP_NOME, COOP_SITUACAO, COOP_SEXO, COOP_CPF FROM COOPERADO ORDER BY COOP_SITUACAO ASC";
				$result = "";
				}
				else {
				$sql = "SELECT COOP_ID, COOP_MATRICULA, COOP_NOME, COOP_SITUACAO, COOP_SEXO, COOP_CPF FROM COOPERADO WHERE COOP_NOME LIKE '%$filtro%' ORDER BY COOP_SITUACAO ASC";
				$result = " por ".$filtro;
				}
				
				$dados = mysqli_query($con, $sql);
				$fet = mysqli_fetch_assoc($dados);
				$t_linhas = mysqli_num_rows($dados);

				echo "<div class='result'>
				Quantidade de resultados da busca".$result.": ".$t_linhas."
				</div>";
				
				if ($t_linhas > 0) {

					do{

						echo 	"<tr><td>
								 <a href='?a=perfil&u=".$fet['COOP_ID']."' target='_blank'>
								 Ir <i class='fa fa-share-square'></i></a></td>
								 <td>".$fet['COOP_MATRICULA']."</td>". 
								"<td> ".$fet['COOP_NOME']."</td> ".
								"<td> ".$fet['COOP_SITUACAO']."</td> ".
								"<td> ".$fet['COOP_SEXO']."</td> ". 
								"<td> ".$fet['COOP_CPF']."</td></tr>";

					} while($fet = mysqli_fetch_assoc($dados));

				}
				
				mysqli_free_result($dados);
			}
		}

		#	===
		
		#	ALTERAR SITUAÇÃO

		public static function altsit($id, $sit) {
		    
		    $configs = include('bd/config.php');
		
			$con = mysqli_connect(
				$configs['BD_HOST'], 
				$configs['BD_USERNAME'],
				$configs['BD_PASSWORD'],
				$configs['BD_DATABASE']
			);

			if ($con) {
			    
			    $sql = "UPDATE COOPERADO
			            SET COOP_SITUACAO = '$sit'
			            WHERE COOP_ID = '$id'";
			    
			    mysqli_query($con, $sql);

			}
		}

		#	===

		#	ADICIONAR OBSERVAÇÃO

		public static function adicionarObs($id, $assunto, $desc) {
			
			$configs = include('bd/config.php');
		
			$con = mysqli_connect(
				$configs['BD_HOST'], 
				$configs['BD_USERNAME'],
				$configs['BD_PASSWORD'],
				$configs['BD_DATABASE']
			);

			if ($con) { 

				$sql = "INSERT INTO OBSERVACOES (OBS_DATAHORA, OBS_ASSUNTO, OBS_DESCRICAO, COOP_ID)
						VALUES(NOW(), '$assunto', '$desc','$id')";

				mysqli_query($con, $sql);

			}
		}

		#	====

		#	ALTERAR DATA DE ADMISSÃO

		public static function alterarDataAdmissao ($id, $data) {

			$configs = include('bd/config.php');
		
			$con = mysqli_connect(
				$configs['BD_HOST'], 
				$configs['BD_USERNAME'],
				$configs['BD_PASSWORD'],
				$configs['BD_DATABASE']
			);

			if ($con) {

				$sql = "UPDATE COOPERADO
						SET COOP_ADMISSAO = '$data'
						WHERE COOP_ID = '$id'";

				mysqli_query($con, $sql);
			
			}

		}

		#	===

	}
?>