<?php  
  
  # Perfil completo do cooperado
  
  if (!isset($_SESSION['login'])) 
  header('location:?a=login');
    
  $sit = false;
    
  $u = $_GET['u'];

  include_once('func/func-busca.php');
  $configs = include('bd/config.php');
    
  $con = mysqli_connect(
  $configs['BD_HOST'], 
  $configs['BD_USERNAME'],
  $configs['BD_PASSWORD'],
  $configs['BD_DATABASE']
  );


  if ($con) {

    $sql = "SELECT *, DATE_FORMAT(COOP_DATANASC, '%d/%m/%Y') AS COOP_DATANASC, DATE_FORMAT(COOP_DATAX, '%d/%m/%Y') AS COOP_DATAX, DATE_FORMAT(COOP_ADMISSAO, '%d/%m/%Y') AS COOP_ADMISSAO FROM COOPERADO WHERE COOP_ID = '$u'";

    $sql_obs = 
    "SELECT *, DATE_FORMAT(OBS_DATAHORA, '%d/%m/%Y às %H:%i') AS OBS_DATAHORA FROM OBSERVACOES AS OBS WHERE OBS.COOP_ID = '$u'";

    $dados_obs = mysqli_query($con, $sql_obs);
    $fet_obs = mysqli_fetch_assoc($dados_obs);
    $t_linhas_obs = mysqli_num_rows($dados_obs);
    
    
        
    $dados = mysqli_query($con, $sql);
    $fet = mysqli_fetch_assoc($dados);
    $t_linhas = mysqli_num_rows($dados);

    if ($t_linhas > 0) {

?>

<div class="container-fluid perfil">

  <div class="box">

    <h3 class="text-center"><i class="fa fa-address-card"></i> Ficha de Cooperação</h3>

    <div class="col-esq">

      <div class="dadosp first">
        <p class="text-center">
          <b><span id="tnome"><?php echo $fet['COOP_NOME'] ?></span></b><br>
          <span><b><?php echo $fet['COOP_MATRICULA'] ?></b></span><br>
          <b>
            <?php 
              
                switch ($fet['COOP_MATCUR']) {
                    case "1STADS":
                        echo "Análise e Desenvolvimento de Sistemas";
                    break;
                    case "1SEAQUI":
                        echo "Engenharia de Aquicultura";
                    break;
                    case "1SCAFE":
                        echo "Tecnologia em Cafeicultura";
                    break;
                    case "1SLBIO":
                        echo "Licenciatura em Ciências Biológicas";
                    break;
                    case "1SBCB":
                        echo "Bacharelado em Ciências Biológicas";
                    break;
                    
                }
              
              ?>
          </b>
        </p>
      </div>

      <div class="pnav">
        <div class="pnav-item"> <!-- SITUAÇÃO -->
          <label>Situação Atual</label><br>
          <p id="coop_sit"><?php echo $fet['COOP_SITUACAO']?></p>
          <button href="" onclick="funcloseopen(1);">Alterar <i class="fa fa-cog"></i></button>
        </div>  

        <div class="pnav-item"> <!-- ADMISSÃO -->
          <label>Data de Admissão</label><br>
            
          <!-- PHP ADMISSÃO -->
          <p>
          <?php if (is_null($fet['COOP_ADMISSAO'])): ?>  
          
          <span class="warn">
            <i class="fa fa-warning"></i> Admissão pendente.
          </span>

          <?php else: ?>

          <span style="color: #ffaa00; font-weight: bold;">
            <?php   echo $fet['COOP_ADMISSAO']; ?>  
          </span>

          <?php endif ?>
            
          </p>

          <!-- PHP ADMISSÃO -->

          <button href="#" onclick="showAltData(1);">Alterar <i class="fa fa-cog"></i></button>

          <div id="altdata">
            <form method="post" action="#">  
              <input type="date" name="datadm">
              <button href="#" onclick="showAltData(0);"><i class="fa fa-close"></i></button><br>
              <input class="sub" type="submit" onclick="vData();" value="Alterar">
            </form>
          </div>

          <?php   

            if (count($_POST) > 0 && $_POST['datadm'] != '') {
                
                $id = $fet['COOP_ID'];
                $datadm = $_POST['datadm'];


                funcoes::alterarDataAdmissao($id, $datadm);
                header('Refresh: 0');
            }

          ?>


        </div>

        <div class="pnav-item"> <!-- FICHA -->
          <label>Ficha .pdf</label><br>
          <p>Baixar/Imprimir</p>
          
          <?php   $id = $fet['COOP_ID']; ?>
          
          <form method="POST" action="pdf/pdficha.php" target="_blank">

            <button type="submit" name="id" value="<?php echo $id; ?>" >
              <i class="fa fa-download"> Gerar</i>
            </button>
          
          </form>
        </div>
      </div>
      
      <div class="dadosp">
        <div class="cont-ficha">
          
         <div class="sit">

          <div id="altsit" class="altsit text-center">
            
            <button id="close" class="close" onclick="funcloseopen(0);">
              X
            </button>
            
            <form action="" method="post">
              <fieldset>
                
                <label for="">
                  <br>Alterar Situação de 
                  <br><span><?php echo $fet['COOP_NOME']; ?></span>
                  <br>para</label><br>
                
                <select class="text-center" name="ss">
                  <option value="Ativo">Ativo</option>
                  <option value="Inativo">Inativo</option>
                </select>
                <br>
                <button type="submit" href="#" class="btnalt">Alterar</button>
                
              </fieldset>
            </form>
            
            <?php 
            
                $id = $fet['COOP_ID'];
            
                if(count($_POST) > 0 && $_POST['ss'] != ''){
                
                $sit = $_POST["ss"];
                
                funcoes::altsit($id, $sit);
                
                header('Refresh: 0');
                }
            
            ?>
            
          </div>
         </div>   
        </div>
      </div>
      
      <div class="dadosp contato text-center">
        <h5>Contato</h5>
        
        <p>
          <i class="fa fa-phone-alt"></i>
          Telefone(Residência): <span><?php echo $fet['COOP_TELE_RESI']?></span>
        </p>
        <p>
          <i class="fa fa-mobile"></i>
          Telefone(Celular): <span><?php echo $fet['COOP_TEL_CELU']?></span>
        </p>
        <p class="text-center contmail">
          <a href="mailto:nome_exemplo012@email.com">
            <i class="far fa-envelope"></i> <?php echo $fet['COOP_EMAIL']?>
        </a>
        </p>
        
      </div>

      <div class="dadosp dp">
        <div class="tcaixa">
          <span><button class="btnx" id="btn-dp" onClick="exdp();">Exibir <i class="fa fa-chevron-down"></i></button>&nbsp;<i class="far fa-user-circle"></i> Dados Pessoais</span>
        </div>
        <div class="caixa" id="caixa-dp">
          <div>
            <p>
              CPF: <span><?php echo $fet['COOP_CPF'] ?></span>
            </p>
            <p>
              Data de Nascimento: <span><?php echo $fet['COOP_DATANASC'] ?></span>
            </p>
          </div>
          <hr>
          <div>
            <p>
              RG/UF: <span><?php echo $fet['COOP_RGUF'] ?></span>
            </p>
            <p>
              Órgão Expedidor: <span><?php echo $fet['COOP_ORGX'] ?></span>
            </p>
            <p>
              Data de Expedição: <span><?php echo $fet['COOP_DATAX'] ?></span>
            </p>
          </div>
          <hr>
          <div>
            <p>
              Natural: <span><?php echo $fet['COOP_NATU'] ?></span>
            </p>
            <p>
              Nacionalidade: <span><?php echo $fet['COOP_NACIO'] ?></span>
            </p>
            <p>
              Sexo: <span><?php echo $fet['COOP_SEXO'] ?></span>
            </p>
          </div>
          <hr>
          <div>
            <p>
              Filiação: <span><?php echo $fet['COOP_FIL'] ?></span>
            </p>
          </div>
        </div>
      </div>

      <div class="dadosp loc">
        <div class="tcaixa">
          <span><button class="btnx" id="btn-loc" onclick="exloc();">Exibir <i class="fa fa-chevron-down"></i></button>&nbsp;<i class="fa fa-map-marked-alt"></i> Localização</span>
        </div>
        <div class="caixa" id="caixa-loc">

          <div>
            <p>
              Endereço: <span><?php echo $fet['COOP_ENDERECO'] ?></span>
            </p>
          </div>
          <hr>
          <div>
            <p>
              Número: <span><?php echo $fet['COOP_NUM_ENDE'] ?></span>
            </p>
            <p>
              Complemento: <span><?php echo $fet['COOP_COMPLEMENTO'] ?></span>
            </p>
            <p>
              Bairro: <span><?php echo $fet['COOP_BAIRRO'] ?></span>
            </p>
          </div>
          <hr>
          <div>
            <p>
              Município: <span><?php echo $fet['COOP_MUNICIPIO'] ?></span>
            </p>
            <p>
              CEP: <span><?php echo $fet['COOP_CEP'] ?></span>
            </p>
            <p>
              UF: <span><?php echo $fet['COOP_UF_ENDE'] ?></span>
            </p>
          </div>

        </div>
      </div>

      <div class="dadosp dadc last">
        <div class="tcaixa">
          <span><button class="btnx" id="btn-dadc" onclick="exdadc();">Exibir <i class="fa fa-chevron-down"></i></button>&nbsp;<i class="fa fa-user-plus"></i> Dados Adicionais Obrigatórios</span>
        </div>
        <div class="caixa" id="caixa-dadc">
          <div>
            <p>Estado Cívil: <span>
              
              <?php 

                switch($fet['COOP_ESTADO_CIVIL']) {
                  case "s":
                    echo "Solteiro";
                  break;
                  case "c":
                    echo "Casado";
                  break;
                  case "ue":
                    echo "União Estável";
                  break;
                  case "v":
                    echo "Viúvo";
                  break;
                  case "d":
                    echo "Divorciado";
                  break;
                  case "dsj":
                    echo "Desquitado ou Separado Judicialmente";
                  break;
                } 

              ?>
                
              </span></p>
          </div>
          <hr>
          <div>
            <p>Nível de Escolaridade: <span>
              
              <?php 

                switch($fet['COOP_NIVEL_ESCOLARIDADE']) {
                  case "efi":
                    echo "Ensino Fundamental Incompleto";
                  break;
                  case "efc":
                    echo "Ensino Fundamental Completo";
                  break;
                  case "emi":
                    echo "Ensino Médio Incompleto";
                  break;
                  case "emc":
                    echo "Ensino Médio Completo";
                  break;
                  case "esi":
                    echo "Ensino Superior Incompleto";
                  break;
                  case "esc":
                    echo "Ensino Superior Completo";
                  break;
                  case "pg":
                    echo "Pós-Graduação";
                  break;
                  case "se":
                    echo "Sem Escolaridade";
                  break;
                } 

              ?>
                
              </span></p>
          </div>
          <hr>
          <div>
            <p>Necessiades Especiais: <span>
              
              <?php 

                switch($fet['COOP_NECESSIDADES_ESPECIAIS']) {
                  case "a":
                    echo "Auditiva";
                  break;
                  case "v":
                    echo "Visual";
                  break;
                  case "f":
                    echo "Física";
                  break;
                  case "m":
                    echo "Mental";
                  break;
                  case "md":
                    echo "Múltiplas Deficiências";
                  break;
                  case "nd":
                    echo "Não Declarada";
                  break;
                } 
              ?>
                
              </span></p>
          </div>
          <hr>
          <div>
            <p>Renda Familiar: <span>
              
              <?php 
                
                switch($fet['COOP_RENDA']) {
                  case "r1":
                    echo "Até ½ salário mínimo";
                  break;
                  case "r2":
                    echo "½ a 1 salário mínimo";
                  break;
                  case "r3":
                    echo "1 a 3 salários mínimos";
                  break;
                  case "r4":
                    echo "3 a 5 salários mínimos";
                  break;
                  case "r5":
                    echo "5 a 10 salários mínimos";
                  break;
                  case "r6":
                    echo "Acima de 10 salários mínimos";
                  break;
                  case "sd":
                    echo "Sem Declaração";
                  break;
                } 
                
              ?>
                
              </span></p>
          </div>
          <hr>
          <div>
            <p>Raça/Cor: 
              <span>
                <?php 
                  switch($fet['COOP_RACA_COR']) {
                  case "b":
                    echo "Branca";
                  break;
                  case "n":
                    echo "Negra";
                  break;
                  case "p":
                    echo "Parda";
                  break;
                  case "a":
                    echo "Amarela";
                  break;
                  case "i":
                    echo "Indígena";
                  break;
                  case "sd":
                    echo "Sem Declarações";
                  break; 
                  } 
                ?>
              </span>
            </p>
          </div>
        </div>
      </div>

    </div>

    <div class="col-dir">
      
      <div class="dadosp lado obs-c">
        <button class="obs-btn-open" onclick="showObs(1);" href=""><h5>
          <i class="fa fa-plus-circle"></i>
          Observação</h5></button>
        
        <div id="obs-menu">
          <button onclick="showObs(0);" class="obs-menu-btn">
            X
          </button>
          <h5>Adicionar Observação</h5>

          <form method="POST" action="">
          <span>
            <label for="">Assunto</label><br>
          <input type="text" name="assunto" placeholder="máx. de 45 caracteres">
          </span><br>
          <span>
            <label for="">Descrição</label><br>
            <textarea name="desc" id="" cols="30" rows="2" placeholder="máx. de 180 caracteres"></textarea>
          </span><br>
          <input type="submit">
          </form>

          <?php 

            if (count($_POST) > 0 && $_POST['assunto'] != '' && $_POST['desc'] != '') {
            
              $id = $fet['COOP_ID'];
              $assunto = $_POST['assunto'];
              $desc = $_POST['desc'];

              funcoes::adicionarObs($id, $assunto, $desc);
              header('Refresh: 0');
            }

          ?>

        </div>
      </div>

      <div class="dadosp obs lado">

        <?php if ($t_linhas_obs > 0): ?>

          <?php do { ?>

          <div class="obs-item">
            <p><span>[<?php echo $fet_obs['OBS_DATAHORA'] ?>]</span></p>
            <p>Assunto: <strong><?php echo $fet_obs['OBS_ASSUNTO'] ?></strong></p>
            <p style="text-decoration: underline;">
                Descrição[...]
                <i class="fa fa-mouse-pointer"></i>
            </p>
            <p class="txtdesc">
                [<?php echo $fet_obs['OBS_DATAHORA'] ?>]<br>
                <b><?php echo $fet_obs['OBS_ASSUNTO'] ?></b><br>
                <?php echo $fet_obs['OBS_DESCRICAO'] ?>
            </p>
          </div>

        <?php  } while($fet_obs = mysqli_fetch_assoc($dados_obs))?>
        
        <?php else: ?>
        
        <p class="text-center">- vazio -</p>
          
        <?php endif ?>

      </div>

  </div>

</div>


<script>

var tnome = document.getElementById('tnome');
document.title = "Coopa-Ifes Perfil | " + tnome.innerHTML;

function exdp() {

		if (document.getElementById('caixa-dp').style.display == 'none'){
      		document.getElementById('caixa-dp').style.display = 'block';
      		document.getElementById('btn-dp').innerHTML = 'Ocultar <i class="fa fa-bars"></i>';
		}
		else{
      		document.getElementById('caixa-dp').style.display = 'none';
      		document.getElementById('btn-dp').innerHTML = 'Exibir <i class="fa fa-chevron-down"></i>';
		}

	}

	function exloc() {

		if (document.getElementById('caixa-loc').style.display == 'none'){
      		document.getElementById('caixa-loc').style.display = 'block';
      		document.getElementById('btn-loc').innerHTML = 'Ocultar <i class="fa fa-bars"></i>';
		}
      	else{
      		document.getElementById('caixa-loc').style.display = 'none';		      
      		document.getElementById('btn-loc').innerHTML = 'Exibir <i class="fa fa-chevron-down"></i>';
      	}
	}

	function exdadc() {

		if (document.getElementById('caixa-dadc').style.display == 'none'){
      		document.getElementById('caixa-dadc').style.display = 'block';
      		document.getElementById('btn-dadc').innerHTML = 'Ocultar <i class="fa fa-bars"></i>';
		}
      	else{
      		document.getElementById('caixa-dadc').style.display = 'none';		      
      		document.getElementById('btn-dadc').innerHTML = 'Exibir <i class="fa fa-chevron-down"></i>';
      	}
	}

function funcloseopen(op){
  var altsit = document.getElementById('altsit');
  if (op == 0)
  altsit.style.display = "none";
  else if (op == 1)
  altsit.style.display = "block";
    
}

function showObs (op) {
  var obs_menu = document.getElementById('obs-menu');
  if (op == 0)
  obs_menu.style.display = "none";
  else if (op == 1)
  obs_menu.style.display = "block";
}

function showAltData (op) {
  var box = document.getElementById('altdata');
  if (op == 0)
  box.style.display = "none";
  else if (op == 1)
  box.style.display = "block"; 
}

</script>

<script type="text/javascript">
        var coop_sit = document.getElementById('coop_sit');
        
        if (coop_sit.innerHTML == 'Ativo')
          coop_sit.style.color = '#4afd4a'
        else
          coop_sit.style.color = '#ffdd22';
</script>


<?php   

    } else echo "Erro ao buscar cooperado";
  }

  mysqli_free_result($dados);
?>