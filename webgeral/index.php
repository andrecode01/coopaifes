<?php 

    
    # início página web
    
    if (!isset($_SESSION['login'])) 
    header('location:?a=login');

?>

<script>
    document.title = "Coopa-Ifes | Ínicio";
</script>


<div class="container-fluid">

    <div class="row" id="home">
    
    
      <div class="card col-md-3">
        <a href="?a=cadastro">
        <img src="img/icons/curriculo.png" width="100">
        
        <p class="lorem">Cadastre um novo Cooperado aqui! :)</p>
        
        <p class="txt">Cadastro&nbsp;&nbsp;</p>
        </a>
      </div>
      
      
      <div class="card col-md-3">
        <a href="?a=busca">
        <img src="img/icons/recrutamento.png" width="100">
          
        <p class="lorem">Faça buscas simples e buscas por filtro aqui! :p</p>
        <p class="txt">Busca</p>
        </a>
      </div>
      
      
      <div class="card col-md-3">
        <a href="#">
        <img src="img/icons/analise.png" width="100">
        
        <p class="lorem">Aqui você gera suas estatísticas com gráficos! *-*</p>
        <p class="txt">Estatística</p>
        </a>
      </div>
  
    </div>
    
</div>
<hr>