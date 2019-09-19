<?php 

  # GERADOR DE PDF, PDFicha v0.1

  $id = $_POST['id'];
  
  $configs = include('../bd/config.php');

  $con = mysqli_connect(
  $configs['BD_HOST'], 
  $configs['BD_USERNAME'],
  $configs['BD_PASSWORD'],
  $configs['BD_DATABASE']
  );

  if ($con) {

    $sql = "SELECT *, DATE_FORMAT(COOP_DATANASC, '%d/%m/%Y') AS COOP_DATANASC, DATE_FORMAT(COOP_DATAX, '%d/%m/%Y') AS COOP_DATAX, DATE_FORMAT(COOP_ADMISSAO, '%d/%m/%Y') AS COOP_ADMISSAO FROM COOPERADO WHERE COOP_ID = '$id'";
        
    $dados = mysqli_query($con, $sql);
    $fet = mysqli_fetch_assoc($dados);
    $t_linhas = mysqli_num_rows($dados);

    if ($t_linhas > 0) {

?>


<div id="pdf" style="opacity: 0;">
  
  <div id="pdfcab">
  
  <div id="pdftitulo">
    <h2>
      COOPERATIVA DOS ALUNOS DO IFES CAMPUS DE ALEGRE
    </h2>
    <h5>
      FICHA DE MATRÍCULA DE COOPERADO
    </h5>
  </div>
    <img src="../img/pdf_img.png">
  </div>
  
  <span id="pdfmat"><p><b>Nº DE MATRÍCULA: NULL</b></p></span>
  
  <div id="pdfdp" class="pdfarea">
    
    <p class="pdft pdft-dp">DADOS PESSOAIS</p>
    
    <div>
      <p>Nome: <?php echo $fet['COOP_NOME']; ?></p>
    </div>
    
    <div>
      <p>CPF: <?php echo $fet['COOP_CPF']; ?></p>
      <p>Data de Nascimento: <?php echo $fet['COOP_DATANASC']; ?></p>
    </div>
    
    <div>
      <p>RG/UF: <?php echo $fet['COOP_RGUF']; ?></p>
      <p>Órgão exp.: <?php echo $fet['COOP_ORGX']; ?></p>
      <p>Data de Exped.: <?php echo $fet['COOP_DATAX']; ?></p>
    </div>
    
    <div>
      <p>Natural: <?php echo $fet['COOP_NATU']; ?></p>
      <p>Nacionalidade: <?php echo $fet['COOP_NACIO']; ?></p>
      <p>Sexo: <?php echo $fet['COOP_SEXO']; ?></p>
    </div>
    
    <div>
      <p>Filiação: <?php echo $fet['COOP_FIL']; ?></p>
    </div>
    
    <div>
      <p>&nbsp;</p>
    </div>
    
    <div>
      <p>Curso: NULL</p>
      <p>Período: NULL</p>
    </div>
    
    <div>
      <p>E-mail: <?php echo $fet['COOP_EMAIL']; ?></p>
    </div>
    
  </div>
  
  <div id="pdfloc" class="pdfarea">
     
    <p class="pdft pdft-loc">LOCALIZAÇÃO</p>
      
    <div>
      <p>Endereço <?php echo $fet['COOP_ENDERECO']; ?></p>
    </div>
    
    <div>
      <p>Nº: <?php echo $fet['COOP_NUM_ENDE']; ?></p>
      <p>Complemento: <?php echo $fet['COOP_COMPLEMENTO']; ?></p>
      <p>Bairro: <?php echo $fet['COOP_BAIRRO']; ?></p>
    </div>
    
    <div>
      <p>Município: <?php echo $fet['COOP_MUNICIPIO']; ?></p>
      <p>CEP: <?php echo $fet['COOP_CEP']; ?></p>
      <p>UF: <?php echo $fet['COOP_UF_ENDE']; ?></p>
    </div>
    
    <div>
      <p>Tel. Residencial: <?php echo $fet['COOP_TELE_RESI']; ?></p>
      <p>Tel. celular: <?php echo $fet['COOP_TEL_CELU']; ?></p>
    </div>
    
  </div>
  
  <div id="pdfdadc" class="pdfarea">
    
    <p class="pdft pdft-dadc">DADOS ADICIONAIS OBRIGATÓRIOS</p>
    
    <div>
      <p>&nbsp;</p>
    </div>
    
  </div>
  
  <div id="ec" class="pdfarea">
    
    <p class="pdft w30">ESTADO CIVIL:</p>
    
    <div>
      <p>Solteiro (<?php if($fet['COOP_ESTADO_CIVIL'] == "s")echo " X "; ?>)</p>
      <p>Casado (<?php if($fet['COOP_ESTADO_CIVIL'] == "c")echo " X "; ?>)</p>
      <p>União estável (<?php if($fet['COOP_ESTADO_CIVIL'] == "ue")echo " X "; ?>)</p>
      <p>Viúvo (<?php if($fet['COOP_ESTADO_CIVIL'] == "v")echo " X "; ?>)</p>
      <p>Divorciado (<?php if($fet['COOP_ESTADO_CIVIL'] == "d")echo " X "; ?>)</p>
    </div>
    
    <div>
      
      <p>
        Desquitado ou separado judicialmente (<?php if($fet['COOP_ESTADO_CIVIL'] == "dsj")echo " X "; ?>)
      </p>      
    </div>
    
  </div>
  
  <div id="nec" class="pdfarea">
    
    <p class="pdft w30">NÍVEL DE ESCOLARIDADE:</p>
    
    <div>
      <p>(<?php if($fet['COOP_NIVEL_ESCOLARIDADE'] == "efi")
      echo " X "; ?>) Ensino Fundamental Incompleto</p>
      <p>(<?php if($fet['COOP_NIVEL_ESCOLARIDADE'] == "efc")
      echo " X "; ?>) Ensino Fundamental Completo</p>
    </div>
    
    <div>
      <p>(<?php if($fet['COOP_NIVEL_ESCOLARIDADE'] == "emi")
      echo " X "; ?>) Ensino Médio Incompleto</p>      
      <p>(<?php if($fet['COOP_NIVEL_ESCOLARIDADE'] == "emc")
      echo " X "; ?>) Ensino Médio Completo</p>
      
    </div>
    
    <div>
      <p>(<?php if($fet['COOP_NIVEL_ESCOLARIDADE'] == "esi")
      echo " X "; ?>) Ensino Superior Incompleto</p>     
      <p>(<?php if($fet['COOP_NIVEL_ESCOLARIDADE'] == "esc")
      echo " X "; ?>) Ensino Superior Completo</p>
    </div>
    
    <div>
      <p>(<?php if($fet['COOP_NIVEL_ESCOLARIDADE'] == "pg")
      echo " X "; ?>) Pós-graduação</p>
      <p>(<?php if($fet['COOP_NIVEL_ESCOLARIDADE'] == "se")
      echo " X "; ?>) Sem Escolaridade</p>
    </div>
    
  </div>
  
  <div id="ne" class="pdfarea">
    
    <p class="pdft w30">NECESSIDADES ESPECIAIS:</p>
    
    <div>
      <p>Auditiva (<?php if($fet['COOP_NECESSIDADES_ESPECIAIS'] == "a")
      echo " X "; ?>)</p>
      <p>Visual (<?php if($fet['COOP_NECESSIDADES_ESPECIAIS'] == "v")
      echo " X "; ?>)</p>
      <p>Física (<?php if($fet['COOP_NECESSIDADES_ESPECIAIS'] == "f")
      echo " X "; ?>)</p>
      <p>Mental (<?php if($fet['COOP_NECESSIDADES_ESPECIAIS'] == "m")
      echo " X "; ?>)</p>
      <p>Múltiplas Deficiências (<?php if($fet['COOP_NECESSIDADES_ESPECIAIS'] == "md")
      echo " X "; ?>)</p>
      <p>Não Declarado (<?php if($fet['COOP_NECESSIDADES_ESPECIAIS'] == "nd")
      echo " X "; ?>)</p>
    </div>
    
  </div>
  
  <div id="renda" class="pdfarea">
    
    <p class="pdft w30">RENDA FAMILIAR:</p>
    
    <div>
      <p>Até ½ salário mínimo (<?php if($fet['COOP_RENDA'] == "r1")
      echo " X "; ?>)</p>
      <p>½ a 1 salário mínimo (<?php if($fet['COOP_RENDA'] == "r2")
      echo " X "; ?>)</p>
      <p>1 a 3 salários mínimos (<?php if($fet['COOP_RENDA'] == "r3")
      echo " X "; ?>)</p>
      <p>3 a 5 salários mín. (<?php if($fet['COOP_RENDA'] == "r4")
      echo " X "; ?>)</p>
    </div>
    
    <div>
      <p>5 a 10 salários mínimos (<?php if($fet['COOP_RENDA'] == "r5")
      echo " X "; ?>)</p>
      <p>Acima de 10 salários mínimos (<?php if($fet['COOP_RENDA'] == "r6")
      echo " X "; ?>)</p>
      <p>sem declaração (<?php if($fet['COOP_RENDA'] == "sd")
      echo " X "; ?>)</p>
    </div>
    
  </div>
  
  <div id="rc" class="pdfarea">
    
    <p class="pdft w30">RAÇA/COR:</p>
    
    <div>
      <p>(<?php if($fet['COOP_RACA_COR'] == "b")
      echo " X "; ?>) branca</p>
      <p>(<?php if($fet['COOP_RACA_COR'] == "n")
      echo " X "; ?>) negra</p>
      <p>(<?php if($fet['COOP_RACA_COR'] == "p")
      echo " X "; ?>) parda</p>
      <p>(<?php if($fet['COOP_RACA_COR'] == "a")
      echo " X "; ?>) amarela</p>
      <p>(<?php if($fet['COOP_RACA_COR'] == "i")
      echo " X "; ?>) indígena</p>
      <p>(<?php if($fet['COOP_RACA_COR'] == "sd")
      echo " X "; ?>) sem declaração</p>
    </div>
    <hr>  
    <div>
      <p><b>Glossário da Raça/Cor:</b> <span>Parda – mulata, cabocla, cafuza, mameluca ou mestiço de negro com pessoa de outra cor ou raça. Amarela – origem japonesa, chinesa, coreana, etc.</span></p>
    </div>
    
  </div>
  
  <div class="pdfarea">
    
    <p class="pdft">MOVIMENTAÇÃO DO COOPERADO:</p>
    
    <div>
      <p><b>CAPITAL SOCIAL:</b> Valor intregalizado correspondente a R$ 10,00 (dez reais).</p>
    </div>
    
    <div>
      <p>Admissão: <?php echo $fet['COOP_ADMISSAO']; ?></p>
      <p>Inativo:</p>
      <p>Exclusão:</p>
    </div>
    
    <div>
      <p>Assinatura do Cooperado:</p>
    </div>
    
    <div>
      <p>Assinatura do Presidente:</p>
    </div>
    
  </div>
  
  <div id="info" class="pdfarea">
    
    <p class="pdft">INFORMAÇÕES:</p>
    
    <div>
      <p>Para ser cooperado, favor preencher e imprimir esta ficha.</p>
    </div>
    <hr>
    <div>
      <p><b>OBS: Alertamos que para efetivação da matrícula será verificado se todos os dados estão preenchidos corretamente e com as assinaturas
        correspondentes.</b></p>
    </div>
    
  </div>
    
</div>

<script>

var pdf = document.getElementById('pdf').innerHTML;

var style = "<style>*{ font-family: Verdana, sans-serif; margin: 0; padding: 0; } body { margin: 10px; border: 1px solid #000; } #pdf { margin: 20px; border: 2px solid #000; } #pdfcab { display: flex; margin: 0 10px; } #pdftitulo { width: 75%; text-align: center; margin: 10px; } #pdftitulo h2 {text-decoration: underline;} #pdftitulo h5 { color: #444; font-size: .75em; margin: 7.5px; } img { width: 96px; height: 96px; } #pdfmat p { font-size: .75em; margin: 2.5px; } .pdfarea { color: #000; font-size: .85em; } .pdft { font-size: .85em; font-weight: bold; border: 1px solid #000; padding: 2px 0 2px 2.5px; color: #fff; background: #3366ff; } .pdfarea div { display: flex; } .pdfarea div p { font-size: .825em; font-weight: justify; border: .1px solid #000; width: 100%; padding: 4px; } #ec div p , #nec div p, #ne div p, #renda div p, #rc div p{ border: none; width: auto; margin: auto; } #rc div p span { color: #555; font-size: .85em; } #info div p { border: none; } .w30{ width: 30%; text-align: center; clip-path: polygon(0 0, 100% 0, 97.5% 100%, 0% 100%); }</style>"

var win = window.open('', '', 'height=100%,width=auto');
win.document.write(style);
win.document.write(pdf);
win.document.close();
win.print();

</script>


<?php   

    } else echo "Erro de conexão!";
  }

  mysqli_free_result($dados);
?>