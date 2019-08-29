<?php 

  # Cadastro de Cooperado
  
    if (!isset($_SESSION['login'])) 
    header('location:?a=login');

 ?>

<script>
  document.title = "Coopa-Ifes | Cadastro";
</script>

<form id="regForm" method="POST" action="?a=inserir-coop">
      
  <h1>Ficha de Matrícula de Cooperado</h1>
      
  <div id="tab-1" class="tab">

  <!-- MATRICULA -->

    <div class="form-row">

    <h3 class="tform col-12 pl-5">Matrícula</h3>

    <div class="form-group col-4">
      <p class="w-100">
      <label>Ano de entrada</label>
      <input autofocus class="h-50" type="number" oninput="this.className = ''" 
      name="nmat1" id="nmat1">
      </p>
    </div>

    <div class="form-group col-4">
      <p class="w-100 text-center">
      <label>Curso</label><br>
      <select class="w-100 h-50 p-0" oninput="this.className = ''" 
      name="nmat2" id="nmat2" onchange="verificar();">
          <option value="null">Selecionar: </option>
          <option value="1STADS">1STADS</option>
          <option value="1SCAFE">1SCAFE</option>
          <option value="1SEAQUI">1SEAQUI</option>
          <option value="1SLBIO">1SLBIO</option>
          <option value="1SBCB">1SBCB</option>
      </select>
      </p>
    </div>
    <div class="group-form col-4 h-50">
      <p class="w-100">
      <label>Número de matrícula</label>
      <input class="h-50" type="number" oninput="this.className = ''" 
      name="nmat3" id="nmat3">
      </p>
    </div>

    </div>
       
    <!-- DADOS PESSOAIS -->

    <div class="form-row">
      
    <h3 class="tform col-12 pl-5">Dados Pessoais</h3>
        
      <div class="group-form col-12 mb-2">
        <p class="w-100">
        <label>Nome</label>
        <input class="h-50" oninput="this.className = ''" name="nome" id="nome">
        </p>
      </div>
      <div class="group-form col-6">
        <p class="w-100">
        <label>CPF</label>
        <input class="h-50" oninput="this.className = ''" name="cpf" id="cpf">
      </p>
      </div>
      <div class="group-form col-6">
        <p class="w-100">
        <label>Data de nascimento</label>
        <input class="h-50" oninput="this.className = ''" name="datanasci" id="datanasci" type="date">
        </p>
      </div>
        
      <div class="group-form col-3">
        <p class="w-100">
        <label>RG/UF</label>
        <input class="h-50" oninput="this.className = ''" name="rguf" id="rguf">
        </p>
      </div>     
      <div class="group-form col-3">
        <p class="w-100">
        <label>Órgão Expedidor</label>
        <input class="h-50" oninput="this.className = ''" name="orgx" id="orgx">
        </p>
      </div>
      <div class="group-form col-6">
        <p class="w-100">
        <label>Data de Expedição</label>
        <input class="h-50" type="date" oninput="this.className = ''" name="datax" id="datax">
        </p>
      </div>

      <div class="group-form col-4">
        <p class="w-100">
        <label>Natural</label>
        <input class="h-50" oninput="this.className = ''" name="natu" id="natu">
        </p>
      </div>
      <div class="group-form col-4">
        <p class="w-100">
        <label>Nacionalidade</label>
        <input class="h-50" oninput="this.className = ''" name="nacio" id="nacio">
        </p>
      </div>
      <div class="group-form col-4 mb-2 pl-2">
        <p class="w-100">
        <label id="sx-label" class="mb-2">Sexo <span id="sx-obg" style="color: #FF1744; display: none;">*Campo Obrigatório</span></label><br>
        <input onchange="verificar2();" class="form-check-input w-25 h-25" type="radio" name="sexo" value="M" id="sexom">
        <label class="form-check-label ml-5">M</label>
        <input onchange="verificar2();" class="form-check-input w-25 h-25" type="radio" name="sexo" value="F" id="sexof">
        <label class="form-check-label ml-5">F</label>
        </p>
      </div>

      <div class="group-form col-12 mb-2">
        <p class="w-100">
        <label>Filiação</label>
        <input class="h-50" oninput="this.className = ''" name="fil" id="fil">
        </p>
      </div>

      <div class="group-form col-12 mb-2">
        <p class="w-100">
        <label>E-Mail</label>
        <input class="h-50" oninput="this.className = ''" name="email" id="email" type="email">
        </p>
      </div>

    </div>

  </div>

  <div class="tab">

    <div class="form-row">
      
      <h3 class="tform col-12 pl-5">Localização</h3>
        
      <div class="group-form col-12">
        <p class="w-100">
          <label>Endereço</label>
          <input class="h-50" oninput="this.className = ''" name="end" id="end">
        </p>
      </div>

      <div class="group-form col-2">
        <p class="w-100">
          <label>Número</label>
          <input class="h-50" oninput="this.className = ''" name="endnum" id="endnum"></p>
        </p>
      </div>
      <div class="group-form col-5">
        <p class="w-100">
        <label>Complemento</label>
        <input class="h-50" oninput="this.className = ''" name="endcomp" id="endcomp">
        </p>
      </div>
      <div class="group-form col-5">
        <p class="w-100">
          <label>Bairro</label>
          <input class="h-50" oninput="this.className = ''" name="endbairro" id="endbairro"></p>
        </p>
      </div>

      <div class="group-form col-4">
        <p class="w-100">
          <label>Município</label>
          <input class="h-50" oninput="this.className = ''" name="endmun" id="endmun"></p>
        </p>
      </div>
      <div class="group-form col-4">
        <p class="w-100">
        <label>CEP</label>
        <input class="h-50" oninput="this.className = ''" name="endcep" id="endcep">
        </p>
      </div>
      <div class="group-form col-4">
        <p class="w-100">
          <label>UF</label>
          <input class="h-50" oninput="this.className = ''" name="enduf" id="enduf"></p>
        </p>
      </div>
          
      <div class="group-form col-6">
        <p class="w-100">
          <label>Telefone Residêncial</label>
          <input oninput="this.className = ''" name="telres" id="telres">
        </p>
      </div>
      <div class="group-form col-6">
        <p class="w-100">
          <label>Telefone Celular</label>
          <input oninput="this.className = ''" name="telcel" id="telcel">
        </p>
      </div>

    </div>
  
  </div>

      <div id="tab-3" class="tab" style="color: #222;">

        <h3 class="tform" style="color: white;">Dados Adicionais Obrigatórios</h3>

          <div>
            <ul>
              <label id="ec-label">Estado Cívil <span id="ec-obg" style="color: #FF1744; display: none;">*Campo Obrigatório</span></label>
           
              <li><input type="radio" value="s" name="ec" id="ec1" onchange="verificar3();">Solteiro</li>
              <li><input type="radio" value="c" name="ec" id="ec2" onchange="verificar3();">Casado</li>
              <li><input type="radio" value="ue" name="ec" id="ec3" onchange="verificar3();">União Estável</li>
              <li><input type="radio" value="v" name="ec" id="ec4" onchange="verificar3();">Viúvo</li>
              <li><input type="radio" value="d" name="ec" id="ec5" onchange="verificar3();">Divorciado</li>
              <li><input type="radio" value="dsj" name="ec" id="ec6" onchange="verificar3();">Desquitado ou Separado Judicialmente</li>
            </ul>
          </div>

          <div>
            <ul>
              
              <label id="ne-label">Nível de Escolaridade <span id="ne-obg" style="color: #FF1744; display: none;">*Campo Obrigatório</span></label>
              
              <li><input type="radio" value="efi" name="ne" id="ne1" onchange="verificar3();">Ensino Fundamental Incompleto</li>
              <li><input type="radio" value="emi" name="ne" id="ne2" onchange="verificar3();">Ensino Médio Incompleto</li>
              <li><input type="radio" value="esi" name="ne" id="ne3" onchange="verificar3();">Ensino Superior Incompleto</li>
              <li><input type="radio" value="efc" name="ne" id="ne4" onchange="verificar3();">Ensino Fundamental Completo</li>
              <li><input type="radio" value="emc" name="ne" id="ne5" onchange="verificar3();">Ensino Médio Completo</li>
              <li><input type="radio" value="esc" name="ne" id="ne6" onchange="verificar3();">Ensino Superior Completo</li>
              <li><input type="radio" value="pg" name="ne" id="ne7" onchange="verificar3();">Pós-Graduação</li>
              <li><input type="radio" value="se" name="ne" id="ne8" onchange="verificar3();">Sem Escolaridade</li>
            </ul>
          </div>

          <div>
            <ul>
              
            <label id="nec-label">Necessiades Especiais <span id="nec-obg" style="color: #FF1744; display: none;">*Campo Obrigatório</span></label>
              
              <li><input type="radio" value="a" name="nec" id="nec1" onchange="verificar3();">Auditiva</li>
              <li><input type="radio" value="v" name="nec" id="nec2" onchange="verificar3();">Visual</li>
              <li><input type="radio" value="f" name="nec" id="nec3" onchange="verificar3();">Física</li>
              <li><input type="radio" value="m" name="nec" id="nec4" onchange="verificar3();">Mental</li>
              <li><input type="radio" value="md" name="nec" id="nec5" onchange="verificar3();">Múltiplas Deficiências</li>
              <li><input type="radio" value="nd" name="nec" id="nec6" onchange="verificar3();">Não Declarada</li>
            </ul>
          </div>

          <div>
            <ul>
              
              <label id="rf-label">Renda Familiar <span id="rf-obg" style="color: #FF1744; display: none;">*Campo Obrigatório</span></label>
              
              <li><input type="radio" value="r1" name="rf" id="rf1" onchange="verificar3();">Até ½ salário mínimo</li>
              <li><input type="radio" value="r2" name="rf" id="rf2" onchange="verificar3();">½ a 1 salário mínimo</li>
              <li><input type="radio" value="r3" name="rf" id="rf3" onchange="verificar3();">1 a 3 salários mínimos</li>
              <li><input type="radio" value="r4" name="rf" id="rf4" onchange="verificar3();">3 a 5 salários mínimos</li>
              <li><input type="radio" value="r5" name="rf" id="rf5" onchange="verificar3();">5 a 10 salários mínimos</li>
              <li><input type="radio" value="r6" name="rf" id="rf6" onchange="verificar3();">Acima de 10 salários mínimos</li>
              <li><input type="radio" value="sd" name="rf" id="rf7" onchange="verificar3();">Sem Declaração</li>
            </ul>
          </div>
        
        <div>
          <ul>
            
            <label id="rc-label">Raça / Cor <span id="rc-obg" style="color: #FF1744; display: none;">*Campo Obrigatório</span></label>
            
            <li><input type="radio" value="b" name="rc" id="rc1" onchange="verificar3();">Branca</li>
            <li><input type="radio" value="n" name="rc" id="rc2" onchange="verificar3();">Negra</li>
            <li><input type="radio" value="p" name="rc" id="rc3" onchange="verificar3();">Parda</li>
            <li><input type="radio" value="a" name="rc" id="rc4" onchange="verificar3();">Amarela</li>
            <li><input type="radio" value="i" name="rc" id="rc5" onchange="verificar3();">Indígena</li>
            <li><input type="radio" value="sd" name="rc" id="rc6" onchange="verificar3();">Sem Declaração</li>
          </ul>
        </div>

      </div>

      <div class="tab" style="justify-content: center;">
        
        <h3 class="tform">Completar Cadastro do Cooperado</h3>
        
        <p style="
            font-size: 1.25em; 
            margin: 3em 0 3em 0;
            color: #000;
            text-decoration: underline #FF1744;
            ">
          <i>OBS: Alertamos que para a efetivação da matrícula será verificado se todos os dados estão preenchidos corretamente e com as assinaturas correspondentes.</i>
        </p>

        <p>
          <button class="btn btn-block"style="margin-top: 5em;" type="submit">Ficha .PDF <i class='fa fa-download'></i></button>
        </p>

      </div>

      <div style="overflow: auto;">
        <div style="float: right;">
          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
          <button type="button" id="nextBtn" onclick="nextPrev(1);">Próximo</button>
        </div>
      </div>

      <!-- Circles which indicates the steps of the form: -->
      <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
      </div>
    </form>

<script type="text/javascript">

        var t3 =  document.getElementById('tab-3');
        var ec1 = document.getElementById('ec1');
        var ec2 = document.getElementById('ec2');
        var ec3 = document.getElementById('ec3');
        var ec4 = document.getElementById('ec4');
        var ec5 = document.getElementById('ec5');
        var ec6 = document.getElementById('ec6');
        var ecobg = document.getElementById('ec-obg');
        var ec_label = document.getElementById('ec-label');
        
        var ne1 = document.getElementById('ne1');
        var ne2 = document.getElementById('ne2');
        var ne3 = document.getElementById('ne3');
        var ne4 = document.getElementById('ne4');
        var ne5 = document.getElementById('ne5');
        var ne6 = document.getElementById('ne6');
        var ne7 = document.getElementById('ne7');
        var ne8 = document.getElementById('ne8');
        var neobg = document.getElementById('ne-obg');
        var ne_label = document.getElementById('ne-label');
        
        var nec1 = document.getElementById('nec1');
        var nec2 = document.getElementById('nec2');
        var nec3 = document.getElementById('nec3');
        var nec4 = document.getElementById('nec4');
        var nec5 = document.getElementById('nec5');
        var nec6 = document.getElementById('nec6');
        var necobg = document.getElementById('nec-obg');
        var nec_label = document.getElementById('nec-label');
        
        var rf1 = document.getElementById('rf1');
        var rf2 = document.getElementById('rf2');
        var rf3 = document.getElementById('rf3');
        var rf4 = document.getElementById('rf4');
        var rf5 = document.getElementById('rf5');
        var rf6 = document.getElementById('rf6');        
        var rf7 = document.getElementById('rf7');
        var rfobg = document.getElementById('rf-obg');
        var rf_label = document.getElementById('rf-label');
        
        var rc1 = document.getElementById('rc1');
        var rc2 = document.getElementById('rc2');
        var rc3 = document.getElementById('rc3');
        var rc4 = document.getElementById('rc4');
        var rc5 = document.getElementById('rc5');
        var rc6 = document.getElementById('rc6');
        var rcobg = document.getElementById('rc-obg');
        var rc_label = document.getElementById('rc-label'); 



var currentTab = 0; // Current tab is set to be the first tab (0)
      showTab(currentTab); // Display the crurrent tab

      function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
          document.getElementById("prevBtn").style.display = "none";
        } else {
          document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
          document.getElementById("nextBtn").innerHTML = "Confirmar";
          // document.getElementById("nextBtn").type = "submit";
        } else {
          document.getElementById("nextBtn").innerHTML = "Próximo";
          // document.getElementById("nextBtn").type = "button";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
      }

      function nextPrev(n) {
        
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
          // ... the form gets submitted:
          document.getElementById("regForm").submit();
          return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
      }

      function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        //=== OUTRAS IMPLEMENTAÇÕES DE VERIFICAÇÃO ==**
        
        //          TAB 1
        
        var t1 =  document.getElementById('tab-1');
        var t1_select = document.getElementById('nmat2'); 

          if(t1.style.display == "block"){
              if (t1_select.value == "null"){
                t1_select.style.background = "#ffdddd";
                valid = false;
              }
            var sxm = document.getElementById('sexom');
            var sxf = document.getElementById('sexof');
            var sxobg = document.getElementById('sx-obg');
            var sx_label = document.getElementById('sx-label');
        
              if(!sxm.checked && !sxf.checked){
                sxobg.style.display = "inline";
                sx_label.style.textDecoration = "underline #FF1744";
                valid = false;
              } else {
                sxobg.style.display = "none";
                sx_label.style.textDecoration = "none";
              }
           }
        
        //      TAB 3
        
        if(t3.style.display == "block"){
          
          if(!ec1.checked && !ec2.checked && !ec3.checked && !ec4.checked && !ec5.checked && !ec6.checked){
                ecobg.style.display = "inline";
                ec_label.style.textDecoration = "underline #FF1744";
                valid = false;
              } else {
                ecobg.style.display = "none";
                ec_label.style.textDecoration = "none";
              }
          
          
          if(!ne1.checked && !ne2.checked && !ne3.checked && !ne4.checked && !ne5.checked && !ne6.checked && !ne7.checked && !ne8.checked){
                neobg.style.display = "inline";
                ne_label.style.textDecoration = "underline #FF1744";
                valid = false;
              } else {
                neobg.style.display = "none";
                ne_label.style.textDecoration = "none";
              }
          
          
          if(!nec1.checked && !nec2.checked && !nec3.checked && !nec4.checked && !nec5.checked && !nec6.checked){
                necobg.style.display = "inline";
                nec_label.style.textDecoration = "underline #FF1744";
                valid = false;
              } else {
                necobg.style.display = "none";
                nec_label.style.textDecoration = "none";
              }
        
        if(!rf1.checked && !rf2.checked && !rf3.checked && !rf4.checked && !rf5.checked && !rf6.checked && !rf7.checked){
                rfobg.style.display = "inline";
                rf_label.style.textDecoration = "underline #FF1744";
                valid = false;
              } else {
                rfobg.style.display = "none";
                rf_label.style.textDecoration = "none";
              }
        
        if(!rc1.checked && !rc2.checked && !rc3.checked && !rc4.checked && !rc5.checked && !rc6.checked){
                rcobg.style.display = "inline";
                rc_label.style.textDecoration = "underline #FF1744";
                valid = false;
              } else {
                rcobg.style.display = "none";
                rc_label.style.textDecoration = "none";
              }
        }
        
        //=====================================**
        
        for (i = 0; i < y.length; i++) {
          // If a field is empty...
          if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
          }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
          document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
      }

      function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
          x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
      }

function verificar() {
  
  var t1 =  document.getElementById('tab-1');
  var t1_select = document.getElementById('nmat2'); 
  
  if(t1.style.display == "block"){
      if (t1_select.value == "null"){
        t1_select.style.background = "#ffdddd";
      } else {
        t1_select.style.background = "#fff";
      }   
   }
}

function verificar2() {
  
  var sxm = document.getElementById('sexom');
  var sxf = document.getElementById('sexof');
  var sxobg = document.getElementById('sx-obg');
  var sx_label = document.getElementById('sx-label');
  
  if(!sxm.checked && !sxf.checked){
                sxobg.style.display = "inline";
                sx_label.style.textDecoration = "underline #FF1744";
              } else {
                sxobg.style.display = "none";
                sx_label.style.textDecoration = "none";
              }
  
}      

function verificar3() {
  
        if(!ec1.checked && !ec2.checked && !ec3.checked && !ec4.checked && !ec5.checked && !ec6.checked){} else {
                ecobg.style.display = "none";
                ec_label.style.textDecoration = "none";
              }
      
       if(!ne1.checked && !ne2.checked && !ne3.checked && !ne4.checked && !ne5.checked && !ne6.checked && !ne7.checked && !ne8.checked){} else {
                neobg.style.display = "none";
                ne_label.style.textDecoration = "none";
              }
  
      if(!nec1.checked && !nec2.checked && !nec3.checked && !nec4.checked && !nec5.checked && !nec6.checked){} else {
                necobg.style.display = "none";
                nec_label.style.textDecoration = "none";
              }
  
    if(!rf1.checked && !rf2.checked && !rf3.checked && !rf4.checked && !rf5.checked && !rf6.checked && !rf7.checked){} else {
                rfobg.style.display = "none";
                rf_label.style.textDecoration = "none";
              }
        
        if(!rc1.checked && !rc2.checked && !rc3.checked && !rc4.checked && !rc5.checked && !rc6.checked){} else {
                rcobg.style.display = "none";
                rc_label.style.textDecoration = "none";
              }
  
}

    </script>