<!DOCTYPE html>
<html style="font-size: 16px;" lang="pt">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords"
        content="CCB, Conheça a Azurita, Como começar a investir na Azurita, Democratizando o acesso aos investimentos">
    <meta name="description" content="Invista em CCB com a AZURITA">

    <title>Azurita - Rentabilidade Real</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('landingPage/img/logoicone.png') }}" />

    <link rel="stylesheet" href="{{ asset('landingPage/css/nicepage.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('landingPage/css/ccb.css') }}" media="screen">

    <script class="u-script" type="text/javascript" src="{{ asset('landingPage/js/jquery.js') }}" defer=""></script>
    <script class="u-script" type="text/javascript" src="{{ asset('landingPage/js/main.js') }}" defer=""></script>

    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">

    <style>
        .calculator {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 100% !important;
        }

        .bars {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        .results p {
            margin: 0;
        }
    </style>
</head>

<body data-home-page="./" data-home-page-title="Página Inicial" data-path-to-root="./" data-include-products="true"
    class="u-body u-overlap u-overlap-contrast u-xl-mode" data-lang="pt">
    <header class="u-clearfix u-header" id="sec-5095" data-animation-name="" data-animation-duration="0"
        data-animation-delay="0" data-animation-direction="">
        <div class="u-clearfix u-sheet u-sheet-1">
            <a href="./" class="u-image u-logo u-image-1" data-image-width="2048" data-image-height="2048">
                <img src="{{ asset('landingPage/img/logoicone.png') }}" class="u-logo-image u-logo-image-1">
            </a>
            <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
                <div class="menu-collapse"
                    style="font-size: 1rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
                    <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                        href="#">
                        <svg class="u-svg-link" viewBox="0 0 24 24">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                        </svg>
                        <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px"
                            y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <rect y="1" width="16" height="2"></rect>
                                <rect y="7" width="16" height="2"></rect>
                                <rect y="13" width="16" height="2"></rect>
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="u-custom-menu u-nav-container">
                    <ul class="u-nav u-spacing-2 u-unstyled u-nav-1">
                        <li class="u-nav-item">
                            <a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-white" href="./" style="padding: 10px 20px;">Azurita</a>
                        </li>
                        <li class="u-nav-item">
                            <a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-white" href="{{ route('investimentos') }}" style="padding: 10px 20px;">Investimentos</a>
                        </li>
                        <li class="u-nav-item">
                            <a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-white" href="{{ route('sobre') }}" style="padding: 10px 20px;">Quem somos</a>
                        </li>
                        <li class="u-nav-item">
                            <a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-white" href="{{ route('ccb') }}" style="padding: 10px 20px;">CCB - Bacen</a>
                        </li>
                        <li class="u-nav-item">
                            <a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-white" href="{{ route('login') }}" style="padding: 10px 20px;">Acessar</a>
                        </li>
                    </ul>
                </div>
                <div class="u-custom-menu u-nav-container-collapse">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                        <div class="u-inner-container-layout u-sidenav-overflow">
                            <div class="u-menu-close"></div>
                            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="./">Azurita</a>
                                </li>
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="{{ route('investimentos') }}">Investimentos</a>
                                </li>
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="{{ route('sobre') }}">Quem somos</a>
                                </li>
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="{{ route('ccb') }}">CCB - Bacen</a>
                                </li>
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="{{ route('login') }}">Acessar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                </div>
            </nav>
        </div>
    </header>

    <section class="u-align-left u-clearfix u-custom-color-1 u-section-1" id="sec-1b39">
        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="fr-view u-clearfix u-rich-text u-text u-text-1">
                <h1 style="text-align: left;">Quanto irá render?</h1>
                <p id="isPasted">
                    <span style="font-size: 1.25rem;">Em nossa plataforma, cada produto exibe prazos e rentabilidades claramente declarados na página correspondente. Além disso, oferecemos uma calculadora rentável, permitindo que você simule e planeje sua carteira de investimentos de forma transparente e conveniente, com prazos de resgate que se adequam a cada perfil de investimento.&nbsp;</span>
                </p>
                <a href="{{ route('registrer') }}" class="u-align-center u-border-none u-btn u-button-style u-custom-color-2 u-btn-1">Quero investir</a>
            </div>
        </div>
    </section>
    <section class="u-clearfix u-section-3" id="sec-391d">
        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="data-layout-selected u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                        <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                            <div class="u-container-layout u-container-layout-1">
                                <p class="u-text u-text-default u-text-1">
                                  <img style="width: 100%;" src="{{ asset('landingPage/img/chart.png') }}" alt="">
                                </p>
                            </div>
                        </div>
                        <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                            <div class="u-container-layout u-container-layout-2">

                                <div class="calculator">

                                    <div class="results">
                                        <h4 class="u-text u-text-custom-color-2 u-text-1">Azurita Capital: <span
                                                id="azurita">0</span></h4> <br>
                                        <p>CDI: <span id="cdi">0</span></p> <br>
                                        <p>Poupança: <span id="poupanca">0</span></p> <br>
                                    </div>

                                    <div class="bars">
                                        <label for="months">Prazo</label>
                                        <input type="range" id="months" min="1" max="36"
                                            value="12">

                                        <label for="amount">R$ 1.000,00</label>
                                        <input type="range" id="amount" min="1000" max="100000"
                                            step="1000" value="1000">
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="u-clearfix u-grey-10 u-section-4" id="sec-75c7">
        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="data-layout-selected u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                        <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                            <div class="u-container-layout u-container-layout-1">
                                <p class="u-text u-text-default u-text-1">
                                    <span style="font-weight: 700; font-size: 1.875rem;"> Cédula de Crédito Bancário
                                        (CCB)</span>
                                    <br>
                                    <br>A Cédula de Crédito Bancário (CCB) é um título de crédito emitido por pessoa
                                    física ou jurídica em favor de uma instituição financeira ou de entidade que se
                                    assemelhe. Acima de tudo, o Projeto de Lei número 8.987/17 autoriza a emissão da
                                    Cédula de Crédito Bancário Digital. Desta forma, a cédula eletrônica se equipara à
                                    cédula física
                                </p>
                            </div>
                        </div>
                        <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                            <div class="u-container-layout u-container-layout-2">
                                <p class="u-text u-text-default u-text-2">
                                    <span style="font-size: 1.875rem; font-weight: 700;">Tributação</span>
                                    <br>
                                    <br>A CCB possui Imposto de Renda Retido na Fonte. Em outras palavras, na data de
                                    retirada, o imposto será deduzido do seu investimento de forma automática com base
                                    na tabela regressiva. Vale lembrar que o imposto de renda irá incidir somente sobre
                                    a REMUNERAÇÃO do investimento e não sobre o montante.<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="u-clearfix u-custom-color-1 u-section-9" id="sec-2bbd">
        <div class="u-clearfix u-sheet u-sheet-1">
          <div class="u-expanded-width u-list u-list-1">
            <div class="u-repeater u-repeater-1">
              <div class="u-container-style u-custom-item u-list-item u-repeater-item">
                <div class="u-container-layout u-similar-container u-container-layout-1">
                  <h3 class="u-text u-text-default u-text-1">Acesso rápido</h3>
                  <ul class="u-text u-text-2">
                    <li>Cadastre-se</li>
                    <li>Acessar</li>
                    <li>Comece a investir</li>
                    <li>Blog</li>
                    <li>Contato</li>
                  </ul>
                </div>
              </div>
              <div class="u-container-style u-custom-item u-list-item u-repeater-item">
                <div class="u-container-layout u-similar-container u-container-layout-2">
                  <h3 class="u-text u-text-default u-text-3">Sobre</h3>
                  <ul class="u-text u-text-4">
                    <li>AZURITA&nbsp;</li>
                    <li>53.571.127/0001-27</li>
                    <li>azurita@azuritacapital.com.br</li>
                  </ul>
                </div>
              </div>
              <div class="u-container-style u-custom-item u-list-item u-repeater-item">
                <div class="u-container-layout u-similar-container u-container-layout-3">
                  <h3 class="u-text u-text-default u-text-5">Legal</h3>
                  <ul class="u-text u-text-6">
                    <li>Termos de uso</li>
                    <li>Política de privacidade</li>
                    <li>Documentos</li>
                    <li>CCB</li>
                    <li>Bacen</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="u-clearfix u-sheet">
          <p style="font-size: 12px !important;" class="u-align-center-lg u-align-center-md u-align-center-xl u-text">
            A AZURITA CAPITAL ("Azurita") como correspondente bancário, não presta consultoria  jurídica ou de investimento, e
            o conteúdo e as informações disponibilizados na página da Azurita são exclusivamente informativos e não devem ser interpretados como 
            assessoria financeira e/ou jurídica; não representam indicação, relatório de acompanhamento, fornecimento de estudos ou análises sobre 
            valores mobiliários, aconselhamento de investimento, parecer jurídico, financeiro e/ou fiscal; nem mesmo recomendação financeira ou solicitação, 
            oferta e/ou compromisso de compra ou venda de valores mobiliários, produtos e/ou quaisquer ativos.
          </p>
          <p style="font-size: 12px !important;" class="u-align-center-lg u-align-center-md u-align-center-xl u-text">
            A Azurita não se responsabiliza por decisões de negócios e/ou investimentos que venham a ser realizados com base nas 
            informações ou nos resultados oferecidos por meio deste website e não é responsável por qualquer prejuízo, 
            direto e/ou indireto, eventualmente decorrente da utilização destas informações.
          </p>
        </div>
    </section>
    <footer class="u-align-center-md u-align-center-sm u-align-center-xs u-clearfix u-footer u-gradient u-footer" id="sec-cc54"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="./" class="u-image u-logo u-image-1" data-image-width="2048" data-image-height="2048">
          <img src="{{ asset('landingPage/img/logoicone.png') }}" class="u-logo-image u-logo-image-1">
        </a>
        <p class="u-align-center-lg u-align-center-md u-align-center-xl u-text u-text-body-alt-color u-text-1">AZURITA - 53.571.127/0001-27</p>
        <div class="u-align-left u-social-icons u-spacing-10 u-social-icons-1">
            <a class="u-social-url" title="facebook" target="_blank" href="">
                <span class="u-icon u-social-facebook u-social-icon u-icon-1">
                    <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-0526"></use></svg>
                    <svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-0526"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2c0-6.7,3.1-17,17-17h12.5v13.9H73.5z"></path></svg>
                </span>
            </a>
            <a class="u-social-url" title="instagram" target="_blank" href="">
                <span class="u-icon u-social-icon u-social-instagram u-icon-2">
                    <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-7806"></use></svg>
                    <svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-7806"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2 z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z"></path><path fill="#FFFFFF" d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z"></path><path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path></svg>
                </span>
            </a>
        </div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            updateResults();

            $("#months, #amount").on("input", function() {
                updateResults();
                updateLabel("amount");
                updateLabel("months");
            });

            function updateResults() {
                var months = $("#months").val();
                var amount = $("#amount").val();

                var azuritaRate = 0.02;
                var cdiRate = 0.014;
                var poupancaRate = 0.005;

                var azuritaResult = calculateResult(azuritaRate, months, amount);
                var cdiResult = calculateResult(cdiRate, months, amount);
                var poupancaResult = calculateResult(poupancaRate, months, amount);

                $("#azurita").text('R$ ' + formatCurrency(azuritaResult));
                $("#cdi").text('R$ ' + formatCurrency(cdiResult));
                $("#poupanca").text('R$ ' + formatCurrency(poupancaResult));
            }

            function calculateResult(rate, months, amount) {
                return amount * Math.pow((1 + rate), months);
            }

            function updateLabel(id) {
                var value = $("#" + id).val();
                var formattedValue = id === "amount" ? formatCurrency(value) : value;
                $("label[for='" + id + "']").text(id === "amount" ? formattedValue : "Prazo: " + formattedValue +
                    " meses");
            }

            function formatCurrency(value) {
                return "R$ " + Number(value).toLocaleString("pt-BR", {
                    minimumFractionDigits: 2
                });
            }
        });
    </script>
</body>

</html>
