<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="background:none;">
        <?php $dados= new Empresa(); 
        $array[]=$dados->contrato($_GET['codigo']);?>
         <img src="view/img/topocf.jpg" width="100%" heigth="150px">
        <div class="contrato">
           
            <p>Rio de janeiro, <?php echo strftime('%A, %d de %B de %Y', strtotime($array[0]['data'])); ?>.</p>
            
            <p><b>EMPRESA</b>
                <br><br>
                <?php  echo $array[0]['razao'];?>
            </p><br><br><br>
            
            <p>At: <?php echo " ".$array[0]['responsavel'] ?>,</p>
            
            <p id="ref"><b>Ref.:	Proposta de Honorários - Serviços de Contabilidade CF</b></p>
            
            <p>Prezado(a),</p><br><br>
            
            <p class="justificado">Agradecemos esta oportunidade e destacamos que com a escolha da CF para 
a sua empresa, você estará obtendo um mix de serviços prestados de forma 
qualificada, ágil e inovadora, adequando a carga tributária a melhor condição e custo para o você e sua empresa.</p>
            <br><br><br>
            <p id="site">Entre no nosso site e conheça mais sobre a organização contábil.<br><br>

                <a href="www.cfcontabilidade.com" target="blank">www.cfcontabilidade.com</a></p><br>
            
            <p id="site">Permanecemos a disposição para os esclarecimentos que se fizerem necessários.</p>
            <p>Atenciosamente,</p>
            <p>
                <b><?php echo $array[0]['atendente'];?></b><br><br>
                <?php echo $array[0]['cargo_at'];?>
            </p><br><br><br><br>
            
            <p><b>1 - OBJETO E ESCOPO CF PREMIUM; </b></p><br>
            
            <p><b>1.1 - ÁREA CONTÁBIL, FISCAL E TRABALHISTA:  </b></p><br>
            
            <p>1.1.1. Elaboração de Folha de Pagamento com eventos fixos e variáveis;<br>
                1.1.2. CF Online Módulo Funcionários;<br>
                1.1.3.  Geração das obrigações previdenciárias;<br>
                1.1.4.  Extrato mensal do Simples;<br>
                1.1.5. Bank Folha;<br>
                1.1.6. Contra Cheque Online;<br>
                1.1.7. Atendimento via Chat Online, CF Online, e-mail e telefone;<br>
                1.1.8. Elaboração de contratos de experiência de empregados;<br>
                1.1.9. Orientação da comunicação ao sindicato de admissão e demissão de empregados;<br>
                1.1.10. Cálculo e recolhimento de FGTS e INSS;<br>
                1.1.11. Elaboração de documentos para homologação de rescisões trabalhistas;<br>
                1.1.12. Elaboração de recibos de férias;<br>
                1.1.13. Emissão de Guia de Contribuição Sindical de Empregado;<br>
                1.1.14. Emissão de comprovante de rendimento de empregado e empregador;<br>
                1.1.15. Cálculo e emissão de guias de impostos, pro-labore;<br>
                1.1.16. Contabilização do movimento mensal;<br>
                1.1.17. Geração de Balanço, Balancete e DRE;<br>
                1.1.18. Elaboração de Relatório Gerencial;<br>
                1.1.19. Consultoria permanente contábil, fiscal, trabalhista e empresarial;<br>
                1.1.20. Treinamento Online;<br>
                1.1.21. Administração de benefícios;<br>
                1.1.22. Guarda dos arquivos XML;<br>
                1.1.23. Certidões negativas (FGTS, Tributos Federais, PGFN, CNDT, ICMS e INSS).
            </p><br><br><br>

            <p><b>1.2 - OUTROS SERVIÇOS: </b></p><br>
<p class="justificado">1.2.1 Os serviços solicitados pela CONTRATANTE não especificados nas Cláusulas acima serão cobrados pela CONTRATADA em apartado, como extraordinários, segundo valor específico constante de orçamento previamente aprovado pela primeira, englobando nessa previsão toda e qualquer inovação da legislação relativamente ao regime tributário, trabalhista ou previdenciário.</p>
<br><br>
<p class="justificado">1.2.2.	São considerados	serviços	extraordinários ou paracontábeis, exemplificativamente:</p>

<p>(I) Alteração contratual;<br>
    (II) Abertura ou Baixa de empresa;<br>
    (III) Certidão negativa de falências ou protestos;<br>
    (IV) Autenticação/Registro de Livros;<br>
    (V) Encadernação de livros;<br>
    (VI) Declaração de ajuste do imposto de renda pessoa física;<br>
    (VII) Preenchimento de fichas cadastrais / IBGE;<br>
    (VIII) Reprocessamento de tarefas constantes do OBJETO dessa proposta;<br>
    (IX) Declaração de Faturamento;<br>
    (X) Diligências presenciais em Órgãos Públicos;<br>
(XI) Planejamento Tributário.
</p>
<br><br><br>
<p><b>2 - RESPONSABILIDADES;</b><br><br><br>
    <b>2.1 - CONTRATANTE: </b>
</p>

<p class="justificado">2.1.1. É de responsabilidade da CONTRATANTE disponibilizar todos os documentos e informações que se façam necessários ao bom desempenho dos serviços ora contratados, conforme data a ser combinada verbalmente entre as partes; 
    <br><br>
2.1.2.  Os documentos e as informações fornecidas serão de única e exclusiva 
responsabilidade da CONTRATANTE no que tange a sua idoneidade e realidade com os fatos ocorridos.
<br><br>

2.1.3. A CONTRATANTE se responsabiliza em reembolsar a CONTRATADA de todos os 
materiais utilizados na execução dos serviços ora ajustados, tais como material de papelaria, impressos fiscais, trabalhistas e contábeis, bem como livros fiscais, pastas, cópias reprográficas, autenticações, reconhecimentos de firmas, custas, emolumentos e taxas exigidas pelos serviços públicos, sempre que utilizados e mediante recibo discriminado, acompanhado dos respectivos comprovantes de desembolso; 
<br><br>

2.1.4. Fornecer os arquivos em formato XML, correspondente às NF-e emitidas e/ou recebidas de terceiros, pois é de responsabilidade da CONTRATANTE, se e quando solicitados, apresentá-los às autoridades fiscais.
<br><br>

2.1.5. A CONTRATANTE é responsável por todos os dados imputados no sistema CF Online, sendo este a ferramenta a ser utilizada para a troca de documentos, registro de funcionários e eventos da folha de pagamento.
</p>
<br><br>

<p><b>2.2 - CONTRATADO: </b></p>

<p class="justificado">
    2.2.1. Desempenhar os serviços elencados no item 1 com todo zelo, diligência e honestidade, observada   a   legislação   vigente, resguardando   os   interesses   da CONTRATANTE; 
    <br><br>
    2.2.2.  Cumprir integralmente os prazos e acordos firmados com a CONTRATADA, relativos às atividades necessárias ao cumprimento deste contrato; 
    <br><br>
    2.2.3. Fornecer à CONTRATADA, dentro do horário normal de expediente, todas as informações, de maneira ágil, relativas ao andamento dos serviços ora contratados;
    <br><br>
    2.2.4.   Os trabalhos serão planejados e, apropriadamente, supervisionados pela CONTRATADA, e serão conduzidos em harmonia com as atividades da EMPRESA, de modo a não causar transtornos ao andamento normal de seus serviços e horários de trabalho estabelecidos pelas normas internas. 
    <br><br>
    
    
</p>

<p><b>3 - HONORÁRIOS;</b></p>

<p class="justificado">
    3.1.  O cálculo dos Honorários foi baseado nos seguintes dados fornecidos pela CONTRATANTE: 
    <br><br>
    - Tributação da empresa pelo <?php if($array[0]['tributacao']!="simples nacional"){ echo "LUCRO ".$resulta = strtoupper($array[0]['tributacao']);}else{ echo $resulta = strtoupper($array[0]['tributacao']); }?> <br>
    - Quantidade de colaboradores: <?php echo $array[0]['funcionario']; ?> funcionários.<br>
    - Quantidade de produtos:  <?php echo $array[0]['produto']; ?>.<br>
    
    <br><br>
    3.2. Para a execução dos serviços constantes da proposta com a qualidade, presteza e agilidade que a CF sempre dispensa aos seus clientes, a CONTRATADA disporá de profissionais habilitados e registrados nos órgãos competentes, com canal aberto para dúvidas durante todos os dias úteis do mês, com HONORÁRIOS NO VALOR DE R$ 
        <?php 
        $format = new Funcoes();  
         
        $valor= (string) $array[0]['honorario']; 
        $extenso = $format->extenso($valor,true);
        echo $valor = number_format($valor, 2, ",", ".");
         ?>
    ( <?php if(isset($extenso))echo $extenso;?>) por mês de trabalho executado. 
    <br><br>
    3.3. Os pagamentos deverão ser realizados até o dia 1 (primeiro) do mês subsequente ao vencido, podendo a cobrança ser veiculada por meio da respectiva duplicata de serviços, mantida em carteira ou via cobrança bancária. 
</p>

 
 <p class="justificado">3.4.  Se não justificado, os honorários pagos após a data acima, acarretarão a CONTRATANTE o acréscimo de multa de 1%(um por cento), sem prejuízo de juros moratórios de 1% ao dia. </p>
 
  <p class="justificado">3.5.  Caso a folha de pagamento exceda ao número de colaboradores citados anteriormente, por cada funcionário / sócio / estagiário / administrador / autônomo acrescentado, será cobrado um valor adicional de R$ 50,00. </p>
  
  
  <p>3.6. Periodicamente este contrato de prestação de serviços será reavaliado, levando-se em conta o aumento ou redução das operações, a quantidade de documentos contabilizados, o nº de funcionários e eventuais alterações na legislação. Caso haja alguma alteração relevante, o valor da mensalidade será renegociado, podendo aumentar ou reduzir. </p>
  
  <p>3.7. O Honorário será reajustado anualmente através do IPCA (IBGE) ou IGPM (FGV), sendo sempre optado entre os dois o maior.</p>
  
  <p>3.8. Além da mensalidade acima estipulada, a CONTRATANTE pagará à contratada uma parcela adicional anual, com vencimento para 15 de novembro, correspondente ao valor Além da mensalidade acima estipulada, a CONTRATANTE pagará à contratada uma parcela adicional anual, com vencimento para 15 de novembro, correspondente ao valor de uma mensalidade integral, para atendimento ao acréscimo de serviços e encargos próprios do período final do exercício, tais como o encerramento das demonstrações contábeis anuais e demais obrigações.</p>
  
  <p>3.9. A mensalidade adicional, mencionada no item anterior, é devida mesmo no caso de contrato iniciado em qualquer mês do exercício corrente</p>



    <p><b>3 -4 - RESCISÃO CONTRATUAL E FORO; </b></p>
        
        
    <p>
    4.1. Qualquer uma das partes poderá rescindir o presente termo no tempo que for com prazo de antecedência mínima de 90 dias, devendo realizar tal avisa formalmente. 
    
    </p>
    
    <p>4.2. A falta de pagamento de qualquer parcela de honorários faculta à CONTRATADA suspender, imediatamente, a execução dos serviços ora pactuados, bem como considerar, rescindido o presente, independentemente de notificação judicial ou extrajudicial, desde que transcorridos 5 dias da comunicação do atraso. </p>
    
    <p>4.3. Fica eleito o foro do Estado do Rio de Janeiro, Comarca da Capital, para dirimir quaisquer desacordos de qualquer natureza entre a CONTRATADA e a CONTRATANTE, conforme vontade que as partes manifestam, em caráter irrevogável.</p>
    
   <p>A CONTRATANTE, representada legalmente neste ato, concorda com os termos da presente proposta e contrata a CF Contabilidade para realizar os serviços prestados nela descritos, de acordo com as condições elencadas acima. </p>
    
   
   <p>  <?php if($array[0]['assinatura']!="") echo "<img id='assinatura' src='uploads/".$array[0]['assinatura']."'>";?> <p>
   <p><?php echo $array[0]['atendente'];?></p>
   <p><?php echo $array[0]['cargo_at'];?></p>
   

    
        </div>
        
         
        
        
        <?php 
         
         if(isset($_GET['pagina']) && $_GET['pagina']=="contrato"){
          echo "<form method='post'>".
          "<input type='checkbox' required><b>Para aceitar o contrato clique aqui</b><br><br>".
          "<input type='submit' class='btn btn-primary' name='enviar'>".
          "</form>";
         }
         
         if(isset($_POST['enviar'])){
         
          $aceita = new Empresa();
          $aceita->confirmacontrato($_GET['codigo']) ;
          
         
         }
        ?>
        
    </body>
</html>
