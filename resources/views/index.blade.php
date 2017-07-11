@extends('layouts.frontend')

@section('content')
<!--        <header id="header">
            <h1 class="text-blue left">Seletivo Colégio Polícia Militar</h1>
            <img class="right" title="Logo Colégio Polícia Militar" alt="[Logo Colégio Polícia Militar]" src="image/brasao-tocantins150x150.png" />
        </header>-->
        <!--FECHA CABEÇALHO-->
        <main class="text-dark-blue">
            <article id="destaque" onclick="slide()" class="destaque">
                <div class="logo">
                    <div id="div_logo">
                        
                        <img id="logo_militar" class="center box" title="Logo Colégio Polícia Militar" alt="[Logo Colégio Polícia Militar]" src="image/logo_militar_branca.png" />
                    </div>
                    <div>
                        <h1 class="text-white center box">Colégio</br> Polícia Militar</h1>
                    </div>
                </div>
                <ul class="center" >
                    <li><a class="bg-green text-dark-blue btn-home" href="#matricula" title="Período de inscrição">Período de inscrição 01 a 30 de Novembro/2016</a></li>
                    <li><a class="bg-green text-dark-blue btn-home" href="#cursos" title="Cursos disponíveis">Cursos disponíveis</a></li>
                    <li><a class="bg-green text-dark-blue btn-home" href="#documentos" title="Documentos exigidos no ato da inscrição">Documentos exigidos no ato da inscrição</a></li>
                    <li><a class="bg-green text-dark-blue btn-home"  href="#prova" title="O candidato deverá comparecer no dia da prova portando">O candidato deverá comparecer no dia da prova portando</a></li>
                </ul>
            </article>
            <!--ARTIGO DESTAQUE-->
            <div class="content">
            <article id="matricula">
                <h1>Período de Inscrição</h1>
                <p class="tagline"> De 01 a 30 de novembro de 2016.</p>
                <ul class="ul-box" >
                    <li><a class="text-dark-blue" href="/inscricao" title="inscricoes"><div class="ul-box-icon bg-white li-inscricao"><div></div></div><h3>Inscrição</h3></a></li>
                    <li><a class="text-dark-blue" href="//central3.to.gov.br/arquivo/309435/"><div class="ul-box-icon bg-white li-pdf"><div></div></div><h3>Edital de Abertura</h3><a/></li>
                    <li><a class="text-dark-blue" href="//www.pm.to.gov.br/institucional/estrutura-geral/04-rgaos-especiais/cpm---colegio-da-policia-militar/processo-seletivo-2017/"><div class="ul-box-icon bg-white li-pdf"><div></div></div><h3>Cronograma</h3></a></li>          
                </ul>
            </article>
            <article id="cursos">
                <h1>Cursos Disponíveis</h1>
                <ul class="ul-box" onload="setAlturaArtigo()" >
                    <li class="bg-white"><div class="ul-box-icon bg-green boina"><div></div></div> <h3>CPM Unidade I - Palmas:  6º Ano do Ensino Fundamental;</h3> </li>
                    <li class="bg-white"><div class="ul-box-icon bg-blue boina"><div></div></div> <h3>CPM Unidade II - Palmas: 1ª Série do Ensino Médio Básico;</h3> 
                        <ul>
                            <li>1ª Série do ensino técnico em redes de computadores;</li>
                            <li>1ª Série do ensino técnico em instrumento musical.</li>
                        </ul>
                    </li>
                    <li class="bg-white"><div class="ul-box-icon bg-dark-blue boina"><div></div></div> <h3>CPM Unidade III - Araguaína: 1ª Série do ensino médio básico.</h3> </li>
                </ul>
            </article>
            <article id="documentos">
                <h1>Documentos exigidos no ato da inscrição</h1>
                <ul>
                    <li>RG - (Registo Geral)</li>
                    <li>CPF - (Cadastro de Pessoa Física)</li>
                </ul>
            </article>
            <article id="prova">
                <h1>O candidato deverá comparecer no dia da prova portando:</h1>
                <ul>
                    <li>Comprovante de inscrição;</li>
                    <li>Documento de indentidade;</li>
                    <li>Caneta esferográfica transparente de tinta preta ou azul.</li>
                </ul>
            </article>
            <!--TÓPICOS-->
            </div>
        </main>
        <div id="totop" class="totop bg-red" ><a href="#header" class="text-white"><img title="Botão top" alt="[top]" src="image/top.png"/></a></div>
        
        <footer class="footer bg-dark-blue text-white">
            <h1 class="footer-head">Secretaria Estadual da Educação, Juventude e Esporte</h1>
            <nav>
                <h1 class="footer-h1">Gerência de Sistemas</h1>
                <p class="tagline footer-p" >Colégio Polícia Militar</p>
            </nav>
        </footer>
@endsection
